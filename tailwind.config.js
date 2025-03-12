import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                jp: ['Kiwi Maru', 'Noto Sans Japanese', 'sans-serif'], // 日本語フォント
                kr: ['Nanum Gothic', 'Noto Sans KR', 'sans-serif'], // 韓国語フォント
            },
            scale: {
                '130': '1.30',
                '150': '1.50',
            },
        },
    },

    plugins: [forms, typography],
};
