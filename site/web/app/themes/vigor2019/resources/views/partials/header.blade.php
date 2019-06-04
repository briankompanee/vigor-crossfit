@if(isset($content_blocks))
  @foreach($content_blocks as $content_block)
    @if ($content_block->acf_fc_layout == 'hero_banner_fields')
      @php
        $hero_image = $content_block->hero_image;
        $hero_title = $content_block->hero_title;
        $hero_text = $content_block->hero_text;
        $hero_buttons = $content_block->hero_buttons;
      @endphp
    @endif
  @endforeach
@endif

<header class="banner flex-fill" @if(isset($hero_image)) style="background: url('{!! $hero_image !!}') no-repeat top center;background-size: cover;"@else @endif>

  <div class="container-fluid">
    <nav id="primaryNav" class="nav-primary navbar navbar-expand-lg fixed-top">

      @if (isset($acf_options->site_logo))
        <a class="brand" href="{{ home_url('/') }}" title="{{ get_bloginfo('name', 'display') }}"><img class="img-fluid logo" src="{{ $acf_options->site_logo}}" alt="{{ get_bloginfo('name', 'display') }}"></a>

      @else
         <h1 class="no_logo">{{ get_bloginfo('name', 'display') }}</h1>
      @endif

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
      </button>

      <div class="justify-content-end collapse navbar-collapse" id="navbarNav">
        @if (has_nav_menu('primary_navigation'))
          {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
        @endif
      </div>
    </nav>
    @if(isset($hero_title) || isset($hero_text) || isset($hero_buttons))
    <div class="row hero-content">
      <div class="col col-lg-6">
        <h1 class="hero-title">{!! $hero_title !!}</h1>
        <div class="hero-text">{!! $hero_text !!}</div>
        @foreach($hero_buttons as $hero_button)
          @php
            $link = $hero_button->button_link;
            $link_url = $link->url;
            $link_title = $link->title;
            $link_target = $link->target ? $link->target : '_self';
          @endphp
          <a class="btn button-slanted btn-lg {!! $hero_button->button_color !!}" href="{!! $link_url !!}" target="{!! $link_target !!}" title="{!! $link_title !!}"><span class="button-slanted-content">{!! $link_title !!}</span></a>
        @endforeach
      </div>
    </div>
    @endif
  </div>
</header>
