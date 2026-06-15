/**
 * Add variation to Gutenberg Button block: Arrow Down
 *
 * Bud.js
 * @see {@link https://bud.js.org/extensions/bud-preset-wordpress/editor-integration/variations}
 *
 * Wordpress
 * @see {@link https://developer.wordpress.org/news/2023/08/29/an-introduction-to-block-variations/}
 * @see {@link https://developer.wordpress.org/themes/features/block-variations/}
 * @see {@link https://developer.wordpress.org/block-editor/reference-guides/block-api/block-variations/}
 * @see {@link https://developer.wordpress.org/news/2024/02/06/adding-and-using-grid-sdownport-in-wordpress-themes/}
 */


export default {
  block: `core/button`,
  name: 'button-inverse',
  title: `Inverse`,
  icon: 'block-default',
  description: `Button with black background and white text.`,
  attributes: {
    className: 'button-inverse',
  },
  scope: ['block', 'inserter', 'transform'],
  isActive: (blockAttributes) => blockAttributes.className === 'button-inverse',
}
