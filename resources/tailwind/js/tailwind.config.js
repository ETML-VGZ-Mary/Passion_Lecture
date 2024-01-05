/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./build/*.{html,js}"],
  theme: {
    extend: {},
  },
  plugins: [],
  plugins: [require("daisyui")],
}

