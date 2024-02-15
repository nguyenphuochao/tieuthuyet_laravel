<?php
$viewed = new \App\Viewed;
$data = $viewed->getListReading();
if(count($data) > 0):

 ?>

  <div class="list list-truyen list-history col-xs-12 col-sm-12 col-md-12" style="padding: 0">
    <div class="title-list"><h2>Truy&#7879;n B&#7841;n &#272;ang &#272;&#7885;c</h2></div>
    <?php foreach($data as $item): ?>
    <?php if(Auth::user()): ?>
      <?php if(!is_null($item->story)): ?>
          <div class="row">
              <div class="col-xs-7 col-sm-6 col-md-9 col-title-history">
                  <span class="glyphicon glyphicon-chevron-right"></span> <h3 itemprop="name"><a href="<?php echo e(route('story.show', $item->story->alias)); ?>/"><?php echo e($item->story->name); ?></a></h3>
              </div>
              <div class="col-xs-5 col-sm-6 col-md-3 text-info">
                  <a href="<?php echo e(route('chapter.show', [$item->story->alias, $item->chapter->alias])); ?>">&#272;&#7885;c ti&#7871;p <?php echo e($item->chapter->subname); ?></a>
              </div>
          </div>
      <?php endif; ?>
    <?php else: ?>
        <?php
        $story   = \App\Story::select('alias', 'name')->where([['id', $item['story_id']],['show',1]])->first();
        $chapter =\App\Chapter::select('alias', 'subname')->where('id', $item['chapter_id'])->first();
         ?>
         <div class="row">
           <div class="col-xs-7 col-sm-6 col-md-9 col-title-history">
             <span class="glyphicon glyphicon-chevron-right"></span> <h3 itemprop="name"><a href="<?php echo e(route('story.show', $story->alias)); ?>/"><?php echo e($story->name); ?></a></h3>
           </div>
           <div class="col-xs-5 col-sm-6 col-md-3 text-info">
             <a href="<?php echo e(route('chapter.show', [$story->alias, $chapter->alias])); ?>">&#272;&#7885;c ti&#7871;p <?php echo e($chapter->subname); ?></a>
           </div>
         </div>
    <?php endif; ?>
    <?php endforeach; ?>
  </div>

<?php endif; ?>
