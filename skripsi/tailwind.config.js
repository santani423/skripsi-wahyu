/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
    ],
    theme: {
    screens: {
      'sm': '640px',
      'md': '768px',
      'lg': '1024px',
      'xl': '1280px',
      '2xl': '1440px',

    },
    extend: {
        colors: {
            neutral: {
                0: "#FFFFFF",
                50: "#F5F5F5",
                100: "#D2CFE3",
                200: "#A19CC2",
                300: "#645A9C",
                400: "#433C6F",
                500: "#0E0E0E",
            },
            primary: {
                50: "#AEFFEF",
                100: "#7EFCE3",
                200: "#63F0D4",
                300: "#52E6C9",
                400: "#4AD7BB",
                500: "#EAC70F",
            },
            success: {
                50: "#C5FFEF",
                100: "#95FFE2",
                200: "#61F8CF",
                300: "#38E9BA",
                400: "#1DD1A1",
            },
            danger: {
                50: "#FFD2D2",
                100: "#FFAEAE",
                200: "#FF8A8A",
                300: "#FF6B6B",
                400: "#FF3131",
            },
        },
    },
    },
    plugins: [
      require('@tailwindcss/forms'),
    ],
  }
