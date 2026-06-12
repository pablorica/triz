import postcssImport from 'postcss-import';
import tailwindcss from '@tailwindcss/postcss';
import autoprefixer from 'autoprefixer';
import nested from 'postcss-nested';

export default {
  plugins: [
    postcssImport(),
    tailwindcss(),
    autoprefixer(),
    nested(),
  ],
};
