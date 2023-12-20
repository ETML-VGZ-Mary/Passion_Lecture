/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js}"],
  theme: {
    extend: {},
    spacing: {
      '1': '14px',
      '2': '18px',
      '3': '22px',
      '4': '28px',
      '5': '36px',
      '6': '48px',}
  },
  plugins: [require("daisyui")],
}

