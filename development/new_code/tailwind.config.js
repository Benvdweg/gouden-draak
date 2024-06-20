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
                times: ['Times New Roman', 'serif'],
            },

            backgroundImage: {
                'menu-gradient': "url('/public/images/menu_bg_gradient.png')",
            }
        },
    },
    plugins: [],
}

