import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'oxley': {
                    '50': '#f5f8f7',
                    '100': '#dcebe4',
                    '200': '#b9d6c9',
                    '300': '#8fb9a8',
                    '400': '#6a9c89',
                    '500': '#4d7f6d',
                    '600': '#3c6557',
                    '700': '#335248',
                    '800': '#2c433c',
                    '900': '#273a33',
                    '950': '#13201d',
                },
                'primary' : '#2c433c'
            }
        },
    },
    plugins: [],
};
