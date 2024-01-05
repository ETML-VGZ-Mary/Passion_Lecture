/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["../../../view/page/*.{html,js,php}", "../../../view/*.{html,js,php}"],
  theme: {
    extend: {},
  },
  plugins: [require("daisyui")],
}

