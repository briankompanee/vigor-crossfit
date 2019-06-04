@if(isset($content_blocks))

  @foreach($content_blocks as $content_block)
    @if ($content_block->acf_fc_layout == 'featured_products_block')
        @php
          $featured_products_title     = $content_block->featured_products_title;
          $featured_products_text_area = $content_block->featured_products_text_area;
          $featured_products_link      = $content_block->featured_products_link;
          $products                    = $content_block->products;
        @endphp
    @endif
  @endforeach

  @if(isset($featured_products_title) || isset($featured_products_text_area) || isset($featured_products_link) || isset($products))
  <section class="featured-products-block">
    <div class="row">

      @if($featured_products_title || $featured_products_text_area)  
      <div class="col-md-4">
        <div class="featured-products-content">
          <h2 class="featured-products-title">{!! $featured_products_title !!}</h2>
          <div class="featured-products-text-area">{!! $featured_products_text_area !!}</div>
          @if($featured_products_link)
            @php
              $link        = $featured_products_link;
              $link_url    = $link->url;
              $link_title  = $link->title;
              $link_target = $link->target ? $link->target : '_self';
            @endphp
          <a class="featured-products-link" href="{!! $link_url !!}" target="{!! $link_target !!}" title="{!! $link_title !!}">{!! $link_title !!}</a>
          @endif
        </div>
      </div>
      @endif

      @if($products)
        @foreach($products as $p)
        <div class="col-md-4">
          <div class="featured-product">
            <div class="featured-product-img">
              <img class="img-fluid" src="{!! get_the_post_thumbnail_url( $p->ID, 'large' ) !!} ">
            </div>
            <div class="featured-product-info">
              <div class="featured-product-name">
                <a href="{!! get_permalink( $p->ID ) !!}">{!! get_the_title( $p->ID ) !!}</a>
              </div>
              {!! do_shortcode('[add_to_cart id="' . $p->ID . '" style="border: none; padding: auto"]') !!}
            </div>
          </div>
        </div>
        @endforeach
      @endif

    </div>
  </section>
  @endif

@else

@endif
