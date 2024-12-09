import defaultTheme from 'tailwindcss/defaultTheme';
import colors from "tailwindcss/colors.js";

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
                primary: {
                    50: '#f5f8f7',
                    100: '#dcebe4',
                    200: '#b9d6c9',
                    300: '#8fb9a8',
                    400: '#6a9c89',
                    500: '#4d7f6d',
                    600: '#3c6557',
                    700: '#335248',
                    800: '#2c433c',
                    900: '#273a33',
                    950: '#13201d',
                },
                error: {
                    50: '#ec5e5e',
                    100: '#e9bdbd',
                    200: '#e3c2c2',
                    300: '#ddbebe',
                    400: '#d9b7b7',
                    500: '#d4b2b2',
                    600: '#d0a9a9',
                    700: '#cda2a2',
                    800: '#c89f9f',
                    900: '#c69595',
                    950: '#c08e8e',
                },
                success: {
                    50: '#b2ff59',
                    100: '#a8e463',
                    200: '#90d76a',
                    300: '#73c576',
                    400: '#56b987',
                    500: '#3aaf96',
                    600: '#2f9d9f',
                    700: '#24969d',
                    800: '#1f8b9b',
                    900: '#178a99',
                    950: '#138599',
                },
                info: {
                    50: '#87ceeb',
                    100: '#6ac2dc',
                    200: '#4bb1d2',
                    300: '#3092c7',
                    400: '#1e85be',
                    500: '#1287b3',
                    600: '#0f73a8',
                    700: '#0c6c9e',
                    800: '#066193',
                    900: '#025988',
                    950: '#01547e',
                },
                warning: {
                    50: '#ffe082',
                    100: '#ffd700',
                    200: '#ffcc00',
                    300: '#ffb300',
                    400: '#ff9900',
                    500: '#ff8c00',
                    600: '#ff7f00',
                    700: '#ff7300',
                    800: '#ff6800',
                    900: '#ff6200',
                    950: '#ff5a00',
                },
            },
            height: {
                'app-height': 'calc(100vh - 73px)',
            },
            minHeight: {
                'app-height': 'calc(100vh - 73px)',
            }
        },
    },
    plugins: [
        require('@tailwindcss/typography'),
        require('@tailwindcss/forms'),
    ],
};
