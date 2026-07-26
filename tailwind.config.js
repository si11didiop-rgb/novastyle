import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                display: ['Anton', ...defaultTheme.fontFamily.sans],
                body: ['Inter', ...defaultTheme.fontFamily.sans],
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                nova: {
                    black: '#0A0A0A',
                    surface: '#161616',
                    line: '#1F1F1F',
                    red: '#E8261C',
                    redDark: '#C41E16',
                    white: '#F5F3EE',
                    muted: '#8A8A8A',
                },
            },
            borderRadius: {
                none: '0px',
            },
        },
    },

    plugins: [forms],
};