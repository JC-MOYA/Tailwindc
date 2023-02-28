/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./views/*.{html,js,php}"],
  theme: {
    extend: {},
  },
  plugins: [],
}

const colors = require('tailwindcss/colors')

module.exports = {
  mode: 'jit',
  theme: {
    extend: {
      colors: {
        sky: colors.sky,
        cyan: colors.cyan,
      },
    },
  },
  variants: {},
  plugins: [require('@tailwindcss/forms')],
}