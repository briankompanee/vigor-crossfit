@if(isset($content_blocks))

  @foreach($content_blocks as $content_block)
    @if ($content_block->acf_fc_layout == 'subscribe_block')
        @php
          $subscribe_block_section_title  = $content_block->subscribe_block_section_title;
          $subscribe_text_area            = $content_block->subscribe_text_area;
          $form_shortcode                 = $content_block->form_shortcode;
          $subscribe_text_area_after_form = $content_block->subscribe_text_area_after_form;
        @endphp
    @endif
  @endforeach

  @if(isset($subscribe_block_section_title) || isset($subscribe_text_area) || isset($form_shortcode) || isset($subscribe_text_area_after_form))
  <section class="subscribe-block">
    <div class="row no-gutters">
      <div class="col">
        @if($subscribe_block_section_title)
          <h2 class="subscribe-block-section-title">{!! $subscribe_block_section_title !!}</h2>
        @endif

        @if($subscribe_text_area)
          <div class="subscribe-text-area">{!! $subscribe_text_area !!}</div>
        @endif

        @if($form_shortcode)
          <div class="form-shortcode">{!! $form_shortcode !!}</div>
        @endif

        @if($subscribe_text_area_after_form)
          <div class="subscribe-text-area-after-form">{!! $subscribe_text_area_after_form !!}</div>
        @endif
      </div>
    </div>
  </section>
  @endif

@else

@endif
