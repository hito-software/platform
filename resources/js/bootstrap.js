import tippy from 'tippy.js';

window._ = require('lodash');
window.tippy = tippy;

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */
import Echo from 'laravel-echo';
import {Subject} from "rxjs";

window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    forceTLS: process.env.MIX_PUSHER_APP_USE_SSL === 'true',
    disableStats: true,
    wsHost: process.env.MIX_PUSHER_APP_HOST,
    wsPort: process.env.MIX_PUSHER_APP_PORT || null
});

document.addEventListener('turbo:before-fetch-request', (e) => {
    e.detail.fetchOptions.headers['X-Socket-ID'] = window.Echo.socketId();
});

/**
 * Translations
 */
window.__ = function (key, replace) {
    let translation,
        translationNotFound = true;

    try {
        translation = key
            .split('.')
            .reduce((t, i) => t[i] || null, window._translations.php);

        if (translation) {
            translationNotFound = false;
        }
    } catch (e) {
        translation = key;
    }

    if (translationNotFound) {
        translation = window._translations['json'][key]
            ? window._translations['json'][key]
            : key;
    }

    _.forEach(replace, (value, key) => {
        translation = translation.replace(':' + key, value);
    });

    return translation;
};

/**
 * Tippy.js
 */
document.addEventListener('DOMContentLoaded', function () {
    setTimeout(() => {
        const elements = document.querySelectorAll('[data-tooltip]');

        if (!elements) {
            return;
        }

        for (const element of elements) {
            let options = {};

            if (element.dataset.tooltip) {
                const attrOptions = JSON.parse(element.dataset.tooltip);
                options = {
                    ...options,
                    ...attrOptions
                };
            }

            const title = element.getAttribute('title');

            if (!title) {
                return;
            }

            element.removeAttribute('title');

            window.tippy(element, {
                content: title,
                ...options
            });
        }
    });
}, {
    once: true
});

require('./turbo-echo-stream-tag');

window.reducers = new Subject();

window.registerReducer = (name, reducer) => {
    window.reducers.next({name, reducer});
}

