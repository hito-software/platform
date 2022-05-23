import * as Turbo from '@hotwired/turbo';
import moment from "moment";
import flatpickr from 'flatpickr';

window.OverlayScrollbars = require('overlayscrollbars');
window.ClassicEditor = require('@ckeditor/ckeditor5-build-classic');
//window.Calendar = require('tui-calendar');
window.Flickity = require('flickity');
window.Choices = require('choices.js');
window.moment = moment;
window.flatpickr = flatpickr;
require('flickity-as-nav-for');
require('flickity-sync');

window.Turbo = Turbo;

window.userID = document.querySelector('meta[name="user-id"]').getAttribute('content');

Turbo.start();
Turbo.session.drive = false;

(function () {
    // The debounce function receives our function as a parameter
    const debounce = (fn) => {
        // This holds the requestAnimationFrame reference, so we can cancel it if we wish
        let frame;

        // The debounce function returns a new function that can receive a variable number of arguments
        return (...params) => {

            // If the frame variable has been defined, clear it now, and queue for next frame
            if (frame) {
                cancelAnimationFrame(frame);
            }

            // Queue our function call for the next frame
            frame = requestAnimationFrame(() => {

                // Call our function and pass any params we received
                fn(...params);
            });
        }
    };

    // Reads out the scroll position and stores it in the data attribute
    // so we can use it in our stylesheets
    const storeScroll = () => {
        const oldValue = parseInt(document.documentElement.dataset.scroll) || 0;
        const value = window.scrollY;
        let direction;

        const scrollDifference = value - oldValue;
        const scrollDirectionOffset = 10;

        if (Math.abs(scrollDifference) > scrollDirectionOffset) {
            if (scrollDifference <= 0) {
                direction = 'up';
            } else {
                direction = 'down';
            }

            document.documentElement.dataset.scrollDirection = direction;
        }

        document.documentElement.dataset.scroll = window.scrollY;
    }

    // Listen for new scroll events, here we debounce our `storeScroll` function
    document.addEventListener('scroll', debounce(storeScroll), { passive: true });

    // Update scroll position for first time
    storeScroll();

    document.addEventListener('turbo:load', function () {
        setTimeout(() => {
            const elements = document.querySelectorAll('[data-scrollbar]');

            if (!elements) {
                return;
            }

            for(const element of elements) {
                let options = {
                    autoHide: 'move'
                };

                if (element.dataset.scrollbar) {
                    const attrOptions = JSON.parse(element.dataset.scrollbar);
                    options = {
                        ...options,
                        ...attrOptions
                    };
                }

                window.OverlayScrollbars(element, {
                    scrollbars: options
                });
            }
        });

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
    });
})();
