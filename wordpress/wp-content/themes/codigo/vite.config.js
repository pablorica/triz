import { defineConfig } from 'vite'
import tailwindcss from '@tailwindcss/vite';
import laravel from 'laravel-vite-plugin'
import { wordpressPlugin, wordpressThemeJson } from '@roots/vite-plugin';

// Set APP_URL if it doesn't exist for Laravel Vite plugin
if (! process.env.APP_URL) {
  process.env.APP_URL = 'http://example.test';
}
if (! process.env.APP_HOST) {
  process.env.APP_HOST = 'example.test';
}

if (! process.env.VITE_BASE) {
  process.env.VITE_BASE = '/app/themes/sage/public/build/';
}

if (! process.env.VITE_SERVERPORT) {
  process.env.VITE_SERVERPORT = 3000;
}
if (! process.env.VITE_CLIENTPORT) {
  process.env.VITE_CLIENTPORT = 8800;
}


export default defineConfig({
  base: process.env.VITE_BASE,
  server: {
    host: '0.0.0.0',
    port: process.env.VITE_SERVERPORT,
    strictPort: true,
    origin: process.env.APP_URL,
    hmr: {
      host: process.env.APP_HOST,
      protocol: 'wss',
      clientPort: process.env.VITE_CLIENTPORT,
      path: '/_vite/ws',
    },
  },
  plugins: [
    tailwindcss(),
    laravel({
      input: [
        'resources/css/app.css',
        'resources/js/app.js',
        'resources/css/editor.css',
        'resources/js/editor.js',
      ],
      refresh: true,
      assets: ['resources/images/**', 'resources/fonts/**'],
    }),

    wordpressPlugin(),

    // Generate the theme.json file in the public/build/assets directory
    // based on the Tailwind config and the theme.json file from base theme folder
    wordpressThemeJson({
      disableTailwindColors: false,
      disableTailwindFonts: false,
      disableTailwindFontSizes: false,
      //disableTailwindBorderRadius: false,
    }),
  ],
  resolve: {
    alias: {
      '@scripts': '/resources/js',
      '@styles': '/resources/css',
      '@fonts': '/resources/fonts',
      '@images': '/resources/images',
    },
  },
})
