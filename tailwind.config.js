const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');

module.exports = {
    mode: 'jit',

    purge: [
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            container: {
                center: true
            },
            colors: colors
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography'),],
};
