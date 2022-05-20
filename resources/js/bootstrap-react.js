import {combineReducers, configureStore} from "@reduxjs/toolkit";
import {connect, Provider, useSelector} from "react-redux";
import * as React from "react";
import * as ReactDOM from "react-dom";

window.React = React;
window.ReactDOM = ReactDOM;
window.Redux = {
    useSelector
};

let reducers = {};
window.store = null;
window.reduxReady = false;

window.reducers.subscribe((data) => {
    reducers = {
        ...reducers,
        [data.name]: data.reducer
    };

    const storeReducer = combineReducers(reducers);

    if (window.store === null) {
        window.store = configureStore({
            reducer: storeReducer
        });

        document.dispatchEvent(new Event('hito:redux-ready'));
        window.reduxReady = true;
    } else {
        window.store.replaceReducer(storeReducer);
    }
});

window.defineComponent = (tag, Component, shadowDOM) => {
    const define = () => {
        const ConnectedComponent = connect()(Component);

        customElements.define(tag, class extends HTMLElement {
            connectedCallback() {
                const content = this.innerHTML;

                const props = {};
                for (const prop of this.getAttributeNames()) {
                    props[prop] = this.getAttribute(prop);
                }

                props.state = window.store.getState();

                let container;

                if (shadowDOM) {
                    container = this.attachShadow({ mode: 'open' });
                } else {
                    container = ReactDOM.findDOMNode(this);
                }

                ReactDOM.render(<Provider store={window.store}>
                    <ConnectedComponent {...props}>{content}</ConnectedComponent>
                </Provider>, container);
            }
        });
    };

    if (window.reduxReady) {
        define();
    } else {
        document.addEventListener('hito:redux-ready', () => {
            define();
        }, {
            once: true
        });
    }
};
