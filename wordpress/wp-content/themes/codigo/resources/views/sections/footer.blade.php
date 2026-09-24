{{--
    @name Footer
    @desc The layout for main footer
--}}

<!-- /codigo/resources/views/sections/footer.blade.php -->
@php
  $layoutContainer = function_exists('get_field')
    ? (get_field('layout_container', 'option') ?: 'container-fluid')
    : 'container-fluid';
  $address = function_exists('get_field')
    ? (get_field('footer_address', 'option') ?: '')
    : '';

  $isComingSoon = is_page('coming-soon');
  if ($isComingSoon) {
    return;
  }

@endphp
<footer class="content-footer {{$layoutContainer}}">
  <section class="content-footer-up
    grid grid-cols-6 md:grid-cols-12
    py-[10px] md:pt-6 md:pb-5"
  >
    @if (has_nav_menu('primary_navigation'))
      <nav class="nav-primary col-span-3 md:col-span-3 lg:col-span-2"
        aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
        {!! wp_nav_menu([
            'theme_location' => 'primary_navigation',
            'container' => false,
            'menu_class' => 'w-full',
            'echo' => false
          ]
        ) !!}
      </nav>
    @endif
    {{-- @if (has_nav_menu('footer_navigation'))
      <nav class="nav-footer col-span-3 md:col-span-3 lg:col-span-2"
        aria-label="{{ wp_get_nav_menu_name('footer_navigation') }}">
        {!! wp_nav_menu([
          'theme_location' => 'footer_navigation',
          'container' => false,
          'menu_class' => 'w-full',
          'echo' => false
        ]) !!}
      </nav>
    @endif --}}
    <div class="address col-span-3 md:col-span-3 md:col-start-8">{!! $address !!}</div>
    <a class="brand block no-hover col-span-6 md:col-span-2
    pt-[25.26%] md:pt-0"
        href="{!! home_url('/') !!}">
      @include(
        'icons.logo',
        [
          'svg_width' => 768 ,
          'svg_height' => 388,
          'svg_class' => 'w-full h-auto',
        ]
      )
    </a>
  </section>
  @php(dynamic_sidebar('sidebar-footer'))
</footer>
