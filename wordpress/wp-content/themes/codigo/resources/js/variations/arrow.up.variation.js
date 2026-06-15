/**
 * Add variation to Gutenberg Button block: Arrow Up
 *
 * Bud.js
 * @see {@link https://bud.js.org/extensions/bud-preset-wordpress/editor-integration/variations}
 *
 * Wordpress
 * @see {@link https://developer.wordpress.org/news/2023/08/29/an-introduction-to-block-variations/}
 * @see {@link https://developer.wordpress.org/themes/features/block-variations/}
 * @see {@link https://developer.wordpress.org/block-editor/reference-guides/block-api/block-variations/}
 * @see {@link https://developer.wordpress.org/news/2024/02/06/adding-and-using-grid-support-in-wordpress-themes/}
 */


export default {
  block: `core/button`,
  name: 'button-arrow-up',
  title: `Arrow Up`,
  icon: 'arrow-up-alt',
  description: `Arrow with link.`,
  attributes: {
    className: 'button-arrow-up',
  },
  scope: ['block', 'inserter', 'transform'],
  isActive: (blockAttributes) => blockAttributes.className === 'button-arrow-up',
}
