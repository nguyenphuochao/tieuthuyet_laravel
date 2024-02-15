<?php if($stories): ?>
    <?php foreach($stories as $story): ?>
        <?php
            $chapter = $story->chapters()->orderBy('id', 'DESC')->first();
        ?>
<div class="row" itemscope="" itemtype="http://schema.org/Book" style="display: table-row;">
    <div class="col-xs-9 col-sm-6 col-md-5 col-title">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <h3 itemprop="name" style="display:contents">
            <a href="<?php echo e(route('story.show', $story->alias)); ?>" style="display:contents" title="<?php echo e($story->name); ?>" itemprop="url">
               
                <?php echo e(str_limit($story->name,34)); ?>


            </a>
        </h3>
        <?php if($story->status == 1): ?>
            <span class="label-title label-full"></span>
        <?php endif; ?>
        <?php if((strtotime('now') - strtotime($story->created_at)) < 86400*2): ?>
            <span class="label-title label-new"></span>
        <?php endif; ?>
        <?php if($story->view >=1000): ?>
            <span class="label-title label-hot"></span>
        <?php endif; ?>
    </div>

    <div class="col-xs-3 col-sm-3 col-md-2 col-chap text-info">
        <?php echo ($chapter ? '
        <a href="'.route('chapter.show', [$story->alias, $chapter->alias]) .'" title="'.$chapter->name .'">
            <span class="chapter-text">'.$chapter->subname .'</span>
        </a>' : '...'); ?>

    </div>

    <div class="hidden-xs col-sm-3 col-md-3 col-cat text-888">
        <?php echo the_category($story->categories); ?>

    </div>

    <div class="hidden-xs hidden-sm col-md-2 col-time text-888"><?php echo e($story->updated_at->diffForHumans()); ?> </div>
</div>
<?php endforeach; ?>
<?php else: ?>
    <p>Kh&#1043;&#1169;ng c&#1043;&#1110; b&#1043; i vi&#1073;&#1108;&#1111;t n&#1043; o &#1073;»&#1119; &#1044;‘&#1043;&#1118;y !</p>
<?php endif; ?>