@if(isset($content_blocks))

  @foreach($content_blocks as $content_block)
    @if ($content_block->acf_fc_layout == 'map_block')
        @php
          $map_block_section_title  = $content_block->map_block_section_title;
          $locations                = $content_block->locations;
        @endphp
    @endif
  @endforeach

  @if(isset($map_block_section_title) || isset($locations))
  <section class="map-block">

      @if($map_block_section_title)
      <div class="title-wrapper">
        <h2 class="text-center">{!! $map_block_section_title !!}</h2>
      </div>
      @endif

      @if($locations)
      <div id="AcfMap" class="acf-map">
        @foreach($locations as $location)
          @php
            $location_marker  = $location->location_marker;
            $location_lat     = $location_marker->lat;
            $location_lng     = $location_marker->lng;
            $location_address = $location_marker->address;

            $image_gallery    = $location->image_gallery;
          @endphp

        <div class="marker" data-lat="{!! $location_lat !!}" data-lng="{!! $location_lng !!}">
          <div class="marker-window-content">
            <h4>{!! $location->location_name !!}</h4>
            <p class="address">{!! $location_address!!}</p>
            <p>{!! $location->location_description !!}</p>

            @if($image_gallery)
            <div class="image-gallery">
              @foreach($image_gallery as $indexKey => $image)
                @php
                  $count = $loop->index;
                  $class = '';

                  $img_url      = $image->url;
                  $img_alt      = $image->alt;
                  $img_caption  = $image->caption;
                  $img_sizes    = $image->sizes;
                @endphp
                @if ($count <= 3) 
                  @php
                    $class = "active";
                    $remaining_slides = count($image_gallery) - 4;
                  @endphp
                @else 
                  @php
                  $class ="inactive";
                  @endphp
                @endif 
                <a class="gallery-image-link image-{!! $count !!} image-{!! $class !!}" href="{!! $img_sizes->large !!}" data-lightbox="roadtrip" title="{!! $img_caption !!}">
                  <img class="gallery-image img-fluid" src="{!! $img_sizes->thumbnail !!}" alt="{!! $img_alt !!}" />
                  @if ($count == 3) <span class="remaining-slides">{!! $remaining_slides !!} more</span> @endif
                </a>
              @endforeach
            </div>
            @endif
          </div>
        </div>
        @endforeach
      </div>
      @endif

  </section>
  @endif

@else

@endif
