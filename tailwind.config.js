const defaultTheme = require("tailwindcss/defaultTheme");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        screens: {
            sm: { max: "639px" },

            md: { max: "767px" },

            lg: { max: "1023px" },

            xl: { max: "1279px" },
        },
        fontFamily: {
            sans: ["Ubuntu", "Sans-serif"],
        },
        extend: {
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
            },
            spacing: {
                72: "18rem",
                84: "21rem",
                96: "24rem",
            },
        },

        animatedSettings: {
            animatedSpeed: 1000,
            heartBeatSpeed: 1000,
            hingeSpeed: 2000,
            bounceInSpeed: 750,
            bounceOutSpeed: 750,
            animationDelaySpeed: 1000,
        },
    },

    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
        require("tailwindcss-animatecss"),
    ],
};
