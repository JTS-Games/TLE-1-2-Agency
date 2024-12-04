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
                sans: ['Radikal', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    violet: '#AA0160',
                    violet_hover: '#8e014f',
                    violet_dark: '#7C1A51', // Correct color code if different
                    yellow: '#FAEC02',
                    moss_medium: '#92AA83',
                    moss_light: '#E2ECC8',
                    moss_dark: '#2E342A',
                },
                basic: {
                    white: '#FFFFFF',
                    cream: '#FBFCF6',
                },
                others: {
                    stroke_thin: '#DFDFDF',
                },
            },
        },
    },
    plugins: [forms],
};
