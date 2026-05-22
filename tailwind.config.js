/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './app/**/*.php',
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Inter', 'ui-sans-serif', 'system-ui', 'sans-serif'],
      },
      colors: {
        tiwi: {
          red: '#ee0011',
          blue: '#0067b8',
          ink: '#111827',
          soft: '#f7fafc',
        },
      },
      boxShadow: {
        zoho: '0 18px 45px rgba(15, 23, 42, .08)',
      },
    },
  },
  plugins: [],
}
