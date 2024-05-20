import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';


import preset from './vendor/filament/support/tailwind.config.preset'

const colors = require('tailwindcss/colors')
/** @type {import('tailwindcss').Config} */
export default {
    presets: [preset],
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',

        './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                gray: colors.neutral,
                'app': {
                    '50': '#e7eeff',
                    '100': '#d3dfff',
                    '200': '#b0c3ff',
                    '300': '#809aff',
                    '400': '#4f60ff',
                    '500': '#2728ff',
                    '600': '#1703ff',
                    '700': '#1300ff',
                    '800': '#1000d4',
                    '900': '#150cb5',
                    '950': '#0e075f',
                },

            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms, typography],
};
