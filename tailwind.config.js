import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */


export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            colors: {
                primary: '#8A2BE2', // Button color (violet)
                secondary: '#AA0160', // Another color you might use for hover or other elements
                background: '#f1f9f6', // Background color (light greenish/blue tint)
                textDark: '#2F4F4F', // Dark gray text color
                redError: '#FF0000', // Red for error messages
            },
            fontFamily: {
                sans: ['Poppins', 'Arial', 'sans-serif'], // Font (make sure to add the Google Fonts link in your HTML)
            },
            spacing: {
                '128': '32rem', // Extra spacing options, in case you need it
            },
            borderRadius: {
                xl: '1rem', // Larger rounded corners, like your button
            },
            boxShadow: {
                lg: '0 10px 15px rgba(0, 0, 0, 0.1)', // Larger shadow for depth
            },
            transitionDuration: {
                '300': '300ms', // Hover transition speed
            },
            scale: {
                '105': '1.05', // Hover effect for button enlargement
            },
        },
    },
    plugins: [],
}
