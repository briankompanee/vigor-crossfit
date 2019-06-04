@if(isset($content_blocks))

  @foreach($content_blocks as $content_block)
    @if ($content_block->acf_fc_layout == 'cta_list_blocks')
        @php
          $list_blocks_section_title = $content_block->list_blocks_section_title;
          $list_blocks               = $content_block->list_block;
        @endphp
    @endif
  @endforeach

  @if(isset($list_blocks_section_title) || isset($list_blocks))
  <section class="cta-list-blocks container-fluid">
    <div class="row no-gutters justify-content-md-center">
      @if($list_blocks_section_title)
        <div class="col-12 text-center">
          <h2 class="list-blocks-section-title">{!! $list_blocks_section_title !!}</h2>
        </div>
      @endif

      @if($list_blocks)
      <div class="row">
        @foreach($list_blocks as $list_block)
        <div class="list-block col-lg-4">
          <div class="content-wrapper">
            <h4 class="block-title">{!! $list_block->block_title !!}</h4>
            @if(isset ($list_block->block_list))
              @php
                $block_lists = $list_block->block_list;
              @endphp
              <ul class="block-list">
                @foreach ($block_lists as $block_list)
                <li class="block-list-item"><span class="item-text">{!! $block_list->list_item !!}</span><span class="item-icon"><i class="fas fa-check"></i></span></li>
                @endforeach
              </ul>
            @endif

            @if(isset ($list_block->block_cta_button))
              @php
                $link        = $list_block->block_cta_button;
                $link_url    = $link->url;
                $link_title  = $link->title;
                $link_target = $link->target ? $link->target : '_self';
              @endphp
            <div class="button-wrapper">
              <a class="btn button-slanted solid_bg_yellow" href="{!! $link_url !!}" target="{!! $link_target !!}" title="{!! $link_title !!}"><span class="button-slanted-content">{!! $link_title !!}</span></a>
            </div>
            @endif
          </div>
        </div>
        @endforeach
      </div> 
      @endif

    </div>
  </section>
  @endif

@else

@endif
