/**
 * Add CSS Hidden on mobile to Gutenberg Spacer Block
 *
 * Bud.js
 * @see {@link https://bud.js.org/extensions/bud-preset-wordpress/editor-integration/styles}
 *
 * Wordpress
 * @see {@link https://developer.wordpress.org/news/2024/02/06/adding-and-using-grid-support-in-wordpress-themes/}
 * @see {@link https://developer.wordpress.org/block-editor/reference-guides/block-api/block-styles/}
 * @see {@link https://developer.wordpress.org/themes/features/block-style-variations/}
 *
 * Wordpress Note: For adding the custom CSS, you’ll need to load a custom block stylesheet or add your CSS by some other means (inline_style attribute does not work in the javascript fuction wp.blocks.registerBlockStyle )
 */


export default {
  block: `core/spacer`,
  name: 'mobile-only:hidden',
  label: `Hide on mobile`,
  isDefault: false
}
