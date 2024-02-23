/** @type {import('tailwindcss').Config} */
module.exports = {
content: ["./**/*.{html,php,js,jsx,ts,tsx,vue}"],
  theme: {
    extend: {},
  },
  plugins: [
    require('@headlessui/react'),    
  ],
}