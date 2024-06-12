/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
    ],
    theme: {
        extend: {
            fontFamily: {
                chinese_takeaway: ['chinesetakeaway-webfont', 'sans-serif'],
            },
        },
    },
    plugins: [],
}

