{{--
    @name Header component
    @desc The post header with the title
--}}

<!-- /codigo/resources/views/partials/page-header.blade.php -->
@if(function_exists('get_field'))
  @php
    $hideTitleGlobal   = get_field('layout_hide_title', 'option');

    if ($hideTitleGlobal) {
      $hideTitle = true;
    } else {
      $hideTitle = false;
    }

    $hideTitleOverride = get_field('override_layout_hide_title');
    if ($hideTitleOverride) {
      $hideTitle = true;
      if ($hideTitleOverride === 'no') {
        $hideTitle = false;
      }
    }

    $title = '<h1 class="'.($hideTitle?'hidden':'').'">'.$title.'</h1>';

  @endphp
@endif

<div class="page-header my-5">
  {!! $title !!}
</div>
<!-- End /codigo/resources/views/partials/page-header.blade.php -->
