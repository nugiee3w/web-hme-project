/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./public/**/*.html",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {
            screens: {
                'xs': '475px',
            },
            colors: {
                'hme-blue': '#37517e',
                'hme-light': '#47b2e4',
            }
        },
    },
    plugins: [
        require('flowbite/plugin')
    ],
};
