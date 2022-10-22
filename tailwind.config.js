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
            colors: {
                mc: {
                    menu: "#595858",
                    tr: "#f9f9f9",
                    dark: "#302e2e",
                    black: "#141313",
                },
                mcblue: {
                    100: "#5e85b2",
                },
                mcgreen: {
                    50: "#6dc48d",
                    100: "#269c58",
                    200: "#327e4f",
                },
                mcred: {
                    200: "#f16357",
                    300: "#e55240",
                },
                mcgray: {
                    50: "#eee",
                    100: "#f0f0f0",
                    200: "#f4f4f4",
                    250: "#f6f6f6",
                    300: "#acabab",
                    350: "#838282",
                    400: "#dadcde",
                    500: "#d3d3d3",
                    600: "#d7d7d7",
                    700: "#8e8c8c",
                },
                mcyellow: {
                    300: "#edda0c",
                },
                alert: {
                    success: "#48b571",
                    warning: "#f39c12",
                    info: "#3498db",
                    error: "#ee3c2d",
                },
            },
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
