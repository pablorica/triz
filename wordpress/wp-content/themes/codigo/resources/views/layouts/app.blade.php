@php
  $currentId = get_the_ID();
  $layoutContainer = function_exists('get_field')
    ? (get_field('override_layout_container', $currentId) ?: (
        get_field('layout_container', 'option') ?: 'container-fluid'
      ))
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
    min-h-screen !min-h-screen md:min-h-screenmd:!min-h-screen
    min-h-[75vh] !min-h-[75vh] md:min-h-[75vh] md:!min-h-[75vh]
    min-h-[60vh] !min-h-[60vh] md:min-h-[60vh] md:!min-h-[60vh]
    min-h-[50vh] !min-h-[50vh] md:min-h-[50vh] md:!min-h-[50vh]
    min-h-[40vh] !min-h-[40vh] md:min-h-[40vh] md:!min-h-[40vh]
    min-h-[33.333vh] !min-h-[33.333vh] md:min-h-[33.333vh] md:!min-h-[33.333vh]
    min-h-[30vh] !min-h-[30vh] md:min-h-[30vh] md:!min-h-[30vh]

    max-w-[50vw] !max-w-[50vw] md:max-w-[50vw] md:!max-w-[50vw]
    max-w-[40vw] !max-w-[40vw] md:max-w-[40vw] md:!max-w-[40vw]

    [&>p]:opacity-0
    [&>p]:animate-appearsin
    [&>p:nth-child(1)]:[animation-delay:0s]
    [&>p:nth-child(2)]:[animation-delay:0.4s]
    [&>p:nth-child(3)]:[animation-delay:0.8s]

    mb-0 !mb-0
    mb-auto !mb-auto
    mbe-auto !mbe-auto
    mt-auto !mt-auto
    mt-[-6.77vw] !mt-[-6.77vw]
    mt-[-7.5vw] !mt-[-7.5vw]
    lg:mt-[-7.5vw] lg:mt-[-7.5vw]!
    items-start !items-start
    items-center !items-center
    items-end !items-end
    justify-start !justify-start
    justify-center !justify-center
    lg:max-w-[45%] lg:max-w-[45%]!
    lg:max-w-[75%] lg:max-w-[75%]!
    lg:max-w-[33vw] lg:max-w-[33vw]!
    lg:ml-0 lg:ml-0!
    lg:-ml-5 lg:-ml-5!
    lg:-mr-5 lg:-mr-5!
    md:-ml-5 md:-ml-5!
    md:-mr-5 md:-mr-5!
    hidden  !hidden md:hidden  md:!hidden
    md:block !md:block
    md:sticky !md:sticky
    gap-0 !gap-0
    overscroll-none !overscroll-none

    mobile-only:h-full !mobile-only:h-full
    mobile-only:h-[calc(100dvh-60px)] !mobile-only:h-[calc(100dvh-60px)]
    mobile-only:hidden !mobile-only:hidden
    mobile-only:block !mobile-only:block
    mobile-only:order-first !mobile-only:order-first

    opacity-0 !opacity-0
    leading-none !leading-none

    object-cover md:object-cover lg:object-cover
    aspect-[5/4] md:aspect-[5/4] lg:aspect-[5/4]
    aspect-[4/3] md:aspect-[4/3] lg:aspect-[4/3]
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
