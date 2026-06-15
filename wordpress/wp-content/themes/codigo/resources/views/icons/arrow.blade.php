{{--
  @name Arrow icon
  @param svg_width The width of the SVG. Defaults to 54.
  @param svg_height The height of the SVG. Defaults to 54.
  @param svg_class Additional classes for the SVG element.
  @param path_class Additional classes for the path elements.
  @desc An arrow icon that can be used for navigation links.

  Example
    @include(
      'icons.arrow',
      [
        'svg_width' => 23,
        'svg_height' => 26,
        'svg_class' => 'rotate-180',
        'path_class' => 'opacity-100'
      ]
    )
--}}

<!-- /views/icons/arrow.blade.php -->
<svg
  width="{{ $svg_width ?? 17 }}"
  height="{{ $svg_height ?? 15 }}"
  class="{{ $svg_class ?? '' }}"
  viewBox="0 0 23 26"
  fill="none"
  xmlns="http://www.w3.org/2000/svg"
>
  <path
    class="transition-all {{ $path_class ?? 'fill-orange' }}"
    d="M0 12.728L12.7279 0L13.4351 0.707153L14.1421 1.41425L2.82812 12.7282L14.1421 24.0422L13.4351 24.7493L12.7279 25.4565L0 12.7285L0.0002441 12.7282L0 12.728Z"
  />
</svg>
<!-- End /views/icons/arrow.blade.php -->
