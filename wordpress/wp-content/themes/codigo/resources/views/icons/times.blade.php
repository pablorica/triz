{{--
  @name Times icon
  @param svg_width The width of the SVG. Defaults to 54.
  @param svg_height The height of the SVG. Defaults to 54.
  @param svg_class Additional classes for the SVG element.
  @param polygon_class Additional classes for the polygon elements.
  @desc An times icon that can be used for navigation links.

  Example
    @include(
      'icons.times',
      [
        'svg_width' => 16,
        'svg_height' => 16,
        'svg_class' => 'mx-4',
        'polygon_class' => 'opacity-100'
      ]
    )
--}}

<!-- /views/icons/times.blade.php -->
<svg
  width="{{ $svg_width ?? 32 }}"
  height="{{ $svg_height ?? 32 }}"
  class="{{ $svg_class ?? '' }}"
  viewBox="0 0 32 32"
  xmlns="http://www.w3.org/2000/svg"
>
  <g>
    <polygon
      class="transition-all {{ $polygon_class ?? 'fill-orange' }}"
      points="17.3333333 14.6666667 17.3333333 0 16 0 14.6666667 0 14.6666667 14.6666667 0 14.6666667 0 16 0 17.3333333 14.6666667 17.3333333 14.6666667 32 16 32 17.3333333 32 17.3333333 17.3333333 32 17.3333333 32 16 32 14.6666667 17.3333333 14.6666667"/>
  </g>
</svg>
<!-- End /views/icons/times.blade.php -->
