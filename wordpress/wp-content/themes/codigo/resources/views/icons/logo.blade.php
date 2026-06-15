{{--
  @name Logo icon
  @param svg_width The width of the SVG. Defaults to 54.
  @param svg_height The height of the SVG. Defaults to 54.
  @param svg_class Additional classes for the SVG element.
  @param path_class Additional classes for the path elements.
  @param polygon_class Additional classes for the polygon elements.
  @desc The logo icon for the website. The colors and styles can be customized using the provided classes.

  Example
    @include(
      'icons.logo',
      [
        'svg_width' => 768 ,
        'svg_height' => 388,
        'svg_class' => '',
        'path_class' => 'fill-darkplum',
      ]
    )

--}}

<!-- /views/icons/logo.blade.php -->
<svg
  width="{{ $svg_width ?? 768 }}"
  height="{{ $svg_height ?? 388 }}"
  class="{{ $svg_class ?? '' }}"
  viewBox="0 0 768 388"
  xmlns="http://www.w3.org/2000/svg"
>
  <path class="transition-all {{ $path_class ?? 'fill-darkplum' }}"
    d="M636.737 310.591L760.877 171.446V110.771H525.761V187.706H643.338L519.191 326.855V387.526H768V310.591H636.737Z"
    fill="#2E0019"/>
  <path class="transition-all {{ $path_class ?? 'fill-darkplum' }}"
    d="M76.8422 5.44824H0V218.23C0 311.579 75.8515 387.526 169.083 387.526H207.502V310.591H169.083C118.218 310.591 76.8422 269.155 76.8422 218.23V187.706H207.502V110.766H76.8422V5.44824Z" fill="#2E0019"/>
  <path class="transition-all {{ $path_class ?? 'fill-darkplum' }}"
    d="M423.433 110.771H392.763C299.535 110.771 223.676 186.722 223.676 280.075V387.534H300.518V280.075C300.518 229.138 341.898 187.71 392.763 187.71H423.433V387.538H500.271V110.771H423.433Z" fill="#2E0019"/>
  <path class="transition-all {{ $path_class ?? 'fill-darkplum' }}"
    d="M461.852 85.5555C485.448 85.5555 504.576 66.4033 504.576 42.7778C504.576 19.1523 485.448 0 461.852 0C438.257 0 419.128 19.1523 419.128 42.7778C419.128 66.4033 438.257 85.5555 461.852 85.5555Z" fill="#2E0019"/>
</svg>
<!-- End /views/icons/logo.blade.php -->
