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
  name: 'button-arrow-down',
  title: `Arrow Down`,
  icon: 'arrow-down-alt',
  description: `Arrow with link.`,
  attributes: {
    className: 'button-arrow-down',
  },
  scope: ['block', 'inserter', 'transform'],
  isActive: (blockAttributes) => blockAttributes.className === 'button-arrow-down',
}
