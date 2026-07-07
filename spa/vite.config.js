import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import path from 'path'

export default defineConfig({
  plugins: [vue()],
  resolve: {
    alias: {
      '@': path.resolve(__dirname, './src'),
    },
  },
  css: {
    postcss: './postcss.config.js',
  },
  server: {
    port: 5173,
    strictPort: true,
    cors: true,
  },
  build: {
    outDir: '../public/spa-build',
    emptyOutDir: true,
    cssCodeSplit: true,
    rollupOptions: {
      output: {
        assetFileNames: 'assets/[name].[hash].[ext]',
      },
    },
  },
})