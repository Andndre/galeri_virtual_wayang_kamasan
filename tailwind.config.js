/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
        colors: {
            bg: '#FFF3DB',
            marun: '#8F2918'
        },
        fontFamily: {
            joti: ['Joti One', 'cursive']
        }
    },
  },
  plugins: [],
}
