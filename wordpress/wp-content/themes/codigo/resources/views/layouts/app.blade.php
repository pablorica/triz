@php
  $layoutContainer = function_exists('get_field')
    ? (get_field('layout_container', 'option') ?: 'container-fluid')
    : 'container-fluid';
@endphp


<!doctype html>
<html @php(language_attributes())>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @php(do_action('get_header'))
    @php(wp_head())

    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>

  {{--
    p-0 !p-0
    md:pt-0 !md:pt-0
    w-auto !w-auto
    min-h-screen !min-h-screen
    mb-0 !mb-0
    mb-auto !mb-auto
    mbe-auto !mbe-auto
    mt-auto !mt-auto
    items-start !items-start
    items-center !items-center
    items-end !items-end
    justify-start !justify-start
    justify-center !justify-center
    lg:-ml-5 lg:-ml-5!
    lg:-mr-5 lg:-mr-5!
    md:-ml-5 md:-ml-5!
    md:-mr-5 md:-mr-5!
    hidden  !hidden
    md:block !md:block
    md:sticky !md:sticky
    gap-0 !gap-0
    overscroll-none !overscroll-none

    mobile-only:h-full !mobile-only:h-full
    mobile-only:h-[calc(100dvh-60px)] !mobile-only:h-[calc(100dvh-60px)]
    mobile-only:hidden !mobile-only:hidden

    opacity-0 !opacity-0
    leading-none !leading-none

    --}}



  <body @php(body_class())>
    @php(wp_body_open())

    <div id="app">
      <a class="sr-only focus:not-sr-only" href="#main">
        {{ __('Skip to content', 'sage') }}
      </a>

      @include('sections.header')

      <main id="main" class="main {{$layoutContainer}}">
        @yield('content')
      </main>

      @hasSection('sidebar')
        <aside class="sidebar">
          @yield('sidebar')
        </aside>
      @endif

      @include('sections.footer')
    </div>

    @php(do_action('get_footer'))
    @php(wp_footer())
  </body>
</html>
