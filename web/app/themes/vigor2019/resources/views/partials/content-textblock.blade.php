@if(isset($content_blocks))

  @foreach($content_blocks as $content_block)
    @if ($content_block->acf_fc_layout == 'text_block')
        @php
          $text_block_title = $content_block->text_block_title;
          $title_location   = $content_block->title_location;
          $text_area        = $content_block->text_area;
        @endphp
    @endif
  @endforeach

  @if(isset($text_block_title) || isset($text_area))
  <section class="text-block container-fluid">
    <div class="row no-gutters">
      @if($text_block_title)
      <div class="text-block-content col-md-6 @if(isset($title_location)){!! $title_location !!}@endif">
        <h2 class="text-block-title">{!! $text_block_title !!}</h2>
      </div>
      @endif

      @if($text_area)
        <div class="text-block-content col-md-6">
          <div>{!! $text_area !!}</div>
        </div>
      @endif
    </div>
  </section>
  @endif

@else

@endif
