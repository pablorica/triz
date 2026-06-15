/**
 * Add full height to Gutenberg Group Block
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
  block: `core/group`,
  name: 'full-height-group',
  title: `Full Height Group`,
  icon: 'editor-expand',
  description: `Full height group block with CSS grid layout.`,
  attributes: {
    className: 'full-height-group',
  },
  scope: ['block', 'inserter', 'transform'],
  isActive: (blockAttributes) => blockAttributes.className === 'full-height-group'
}
