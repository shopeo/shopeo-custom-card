/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './src/**/*.php',
        './assets/src/js/components/**/*.vue'
    ],
    theme: {
        extend: {},
    },
    experimental: {
        optimizeUniversalDefaults: true,
    },
    plugins: [],
}
