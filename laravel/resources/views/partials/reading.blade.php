<?php
$viewed = new \App\Viewed;
$data = $viewed->getListReading();
if(count($data) > 0):

 ?>

  <div class="list list-truyen list-history col-xs-12 col-sm-12 col-md-12" style="padding: 0">
    <div class="title-list"><h2>Truy&#7879;n B&#7841;n &#272;ang &#272;&#7885;c</h2></div>
    @foreach ($data as $item)
    @if (Auth::user())
      @if(!is_null($item->story))
          <div class="row">
              <div class="col-xs-7 col-sm-6 col-md-9 col-title-history">
                  <span class="glyphicon glyphicon-chevron-right"></span> <h3 itemprop="name"><a href="{{route('story.show', $item->story->alias)}}/">{{ $item->story->name}}</a></h3>
              </div>
              <div class="col-xs-5 col-sm-6 col-md-3 text-info">
                  <a href="{{route('chapter.show', [$item->story->alias, $item->chapter->alias])}}">&#272;&#7885;c ti&#7871;p {{ $item->chapter->subname}}</a>
              </div>
          </div>
      @endif
    @else
        <?php
        $story   = \App\Story::select('alias', 'name')->where([['id', $item['story_id']],['show',1]])->first();
        $chapter =\App\Chapter::select('alias', 'subname')->where('id', $item['chapter_id'])->first();
         ?>
         <div class="row">
           <div class="col-xs-7 col-sm-6 col-md-9 col-title-history">
             <span class="glyphicon glyphicon-chevron-right"></span> <h3 itemprop="name"><a href="{{route('story.show', $story->alias)}}/">{{ $story->name}}</a></h3>
           </div>
           <div class="col-xs-5 col-sm-6 col-md-3 text-info">
             <a href="{{route('chapter.show', [$story->alias, $chapter->alias])}}">&#272;&#7885;c ti&#7871;p {{ $chapter->subname}}</a>
           </div>
         </div>
    @endif
    @endforeach
  </div>

<?php endif; ?>
