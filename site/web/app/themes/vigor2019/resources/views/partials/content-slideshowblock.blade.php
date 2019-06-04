@if(isset($content_blocks))

  @foreach($content_blocks as $content_block)
    @if ($content_block->acf_fc_layout == 'slideshow_block')
        @php
          $slides = $content_block->slide;
        @endphp
    @endif
  @endforeach

  @if(isset($slides))
  <section class="slideshow-block">
    <div class="row no-gutters">
      <div id="carouselSlider" class="carousel slide" data-ride="carousel">
         
        <ol class="carousel-indicators">
          @foreach($slides as $slide)
            @php
              $count = $loop->index;
              $class = '';
            @endphp
            @if ($count == 0) 
              @php $class = "active"; @endphp
            @endif    
          <li data-target="#carouselSlider" data-slide-to="{!! $count !!}" class="{!! $class !!}"></li>
          @endforeach
        </ol>

        <div class="carousel-inner">
          @foreach($slides as $slide)
            @php
              $count = $loop->index;
              $class = '';
            @endphp
            @if ($count == 0) 
              @php $class = "active"; @endphp
            @endif   
            <div class="carousel-item slide-{!! $count !!} {!! $class !!}">
              <img src="{{ $slide->slider_image }}" class="d-block w-100" alt="slide">
              <div class="carousel-header d-none d-sm-block">
                <h2>{!! $slide->slider_title_top !!}</h2>
                <p>{!! $slide->slider_text_area_top!!}</p>
              </div>
              <div class="carousel-caption">
                <h5>{!! $slide->slider_title_bottom !!}</h5>
                <p>{!! $slide->slider_text_area_bottom !!}</p>
                @if(isset ($slide->slider_link_bottom ))
                  @php
                    $link = $slide->slider_link_bottom;
                    $link_url = $link->url;
                    $link_title = $link->title;
                    $link_target = $link->target ? $link->target : '_self';
                  @endphp
                <a href="{!! $link_url !!}" target="{!! $link_target !!}" title="{!! $link_title !!}">{!! $link_title !!}</a>
                @endif
              </div>
            </div>
          @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselSlider" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselSlider" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </section>
  @endif

@else

@endif
