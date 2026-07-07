/*
import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

//    plugins: [forms],

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./spa/**/*.{vue,js,ts,jsx,tsx}",
    "./resources/**/*.blade.php",
  ],
  theme: {
    extend: {
      fontFamily: {
        'display': ['Tiro Bangla', 'serif'],
        'mast': ['Tiro Bangla', 'serif'],
        'utility': ['Noto Sans Bengali', 'sans-serif'],
      },
      colors: {
        'primary': '#0C3B2E',
        'secondary': '#B08D57',
        'accent': '#C8102E',
        'cream': '#FAF6EE',
        'dark': '#1A1A1A',
        'muted': '#7a6a4f',
        'gray-text': '#4a4a4a',
      }
    },
  },
  plugins: [forms],
}
