/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./app/Livewire/**/*.php",
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Inter', 'sans-serif'],
        display: ['Poppins', 'sans-serif'],
      },
      colors: {
        slate: { 900: '#0f172a' }, // Indigo noir profond
        amber: { 400: '#fbbf24', 500: '#f59e0b' }, // Or
        cyan: { 400: '#22d3ee' } // Tech accent
      }
    },
  },
  plugins: [],
}