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
            marun: '#8F2918',
            cokelat: '#521919',
        },
        fontFamily: {
            joti: ['Joti One', 'cursive']
        },
        keyframes: {
            pop: {
                '0%': {
                    transform: 'scale(0.5)',
                    opacity: '0',
                },
                '100%': {
                    transform: 'scale(1)',
                    opacity: '1',
                },
            },
            fadeIn: {
                '0%': {
                    opacity: '0',
                },
                '100%': {
                    opacity: '1',
                },
            }
        },
        animation: {
            pop: 'pop 0.5s ease-out',
            fadeIn: 'fadeIn 1s ease-out',
        }
    },
  },
  plugins: [],
}
