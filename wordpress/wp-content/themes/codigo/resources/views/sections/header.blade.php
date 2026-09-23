{{--
    @name Header
    @desc The layout for main header
--}}

<!-- /codigo/resources/views/sections/header.blade.php -->

@if(function_exists('get_field'))
  @php
    $headerContainer      = get_field('header_layout_container', 'option') ?: 'container-fluid';
    $headerImageID        = get_field('header_image', 'option');
    $headerOverlayColour  = get_field('header_overlay_colour', 'option') ?: '#000';
    $headerOverlayOpacity = get_field('header_overlay_opacity', 'option') ?: '0';
    //error_log('Header image: ' . $headerImageID );
    if($headerImageID) {
      $headerImage = wp_get_attachment_image(
        $headerImageID,
        'full',
        false,
        [
          'class' => 'h-full w-full object-cover',
          'alt'   => get_bloginfo('name', 'display'),
        ]
      );
      //error_log('Header image: ' . print_r($headerImage,true) );

    } else {
      $headerImage = '';
    }


    //Get current page id
    $currentPageId = get_the_ID();
    //Check if the current page is page or post
    if (is_page($currentPageId) || is_single($currentPageId)) {

      $headerContainerOverride = get_field('override_header_layout_container', $currentPageId);
      if ($headerContainerOverride) {
        $headerContainer = $headerContainerOverride;
      }

      $pageImage = get_field('header_image', $currentPageId);
      //error_log('Header display: ' . $headerDisplay);
      //get featured image
      if($pageImage) {
        $headerImage = get_the_post_thumbnail(
          $currentPageId,
          'full',
          [
            'class' => 'h-full w-full object-cover',
            'alt'   => get_the_title($currentPageId),
          ]
        );
      }
    }

  @endphp
@endif

<header class="banner site-header
  relative h-dvh overflow-hidden
  {!! $headerContainer !!}"
>
  @if($headerImage)
    <div class="absolute inset-0 wp-block-cover__image-background">
      <div class="absolute inset-0 wp-block-cover__overlay"
        style="background-color: {!! $headerOverlayColour !!};
          opacity: {!! $headerOverlayOpacity !!};
        "
      ></div>
    {!! $headerImage !!}</div>
  @endif

  <div class="site-header-content absolute
      top-1/2 transform -translate-y-1/2
      left-[20px] right-[20px] md:left-4 md:right-4
      grid grid-cols-6 lg:grid-cols-12"
  >
    <a class="brand no-hover block col-span-6 md:col-span-2 md:-mr-4!"
      href="{!! home_url('/') !!}">
        @include(
          'icons.logo',
          [
            'svg_width' => 768 ,
            'svg_height' => 388,
            'svg_class' => 'w-full h-auto',
            'path_class' => 'fill-white',
          ]
        )
    </a>
    @if (has_nav_menu('primary_navigation'))
      <nav class="nav-primary col-span-6 md:col-span-3 md:col-start-10
          flex gap-0 items-center justify-center
        "
        aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
        {!! wp_nav_menu([
            'theme_location' => 'primary_navigation',
            'container' => false,
            'menu_class' => 'text-white w-full font-medium
              flex gap-2 md:gap-4 lg:gap-6 items-center justify-between',
            'echo' => false
          ]
        ) !!}
      </nav>
    @endif
  </div>
</header>
