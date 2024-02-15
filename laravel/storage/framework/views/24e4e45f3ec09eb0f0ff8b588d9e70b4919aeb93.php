<div class="container" id="truyen-slide">
    <div class="list list-thumbnail col-xs-12">
        <div class="title-list"><h2><a href="<?php echo e(route('danhsach.truyenfull')); ?>" title="Truy&#7879;n full">TRUY&#7878;N M&#7898;I C&#7852;P NH&#7852;T</a></h2><span class="glyphicon glyphicon-menu-right"></span></a></div>
        <div class="row">
            <?php if($stories): ?>
                <?php foreach($stories as $story): ?>
                    <?php
                    $chapter = $story->chapters()->orderBy('created_at', 'DESC')->first();
                    ?>
                    <div class="col-xs-4 col-sm-3 col-md-2">
                        <a href="<?php echo e(route('story.show', $story->alias)); ?>" title="<?php echo e($story->name); ?>">
                           
                            <?php if($story->image && file_exists(public_path($story->image))): ?>
                                <img src="<?php echo e(url($story->image)); ?>" alt="<?php echo e($story->name); ?>" loading="lazy">
                            <?php else: ?>
                                <img src="<?php echo e(url('/images/no_signal/no-signal.jpg')); ?>" alt="<?php echo e($story->name); ?>" loading="lazy">
                            <?php endif; ?>

                            <?php if($story->view >= 1000): ?>
                            <span class="icon icon-hot" style="top:6px; right:8%;"></span>
                            <?php endif; ?>
                            <div class="caption">
                                <h3><?php echo e($story->name); ?></h3>
                                <small class="btn-xs label-primary">Ho&agrave;n th&agrave;nh - <?php echo e($story->chapters()->count()); ?> ch&#432;&#417;ng</small>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Kh&ocirc;ng c&oacute; b&agrave;i vi&#7871;t n&agrave;o &#7903; &#273;&acirc;y !</p>
            <?php endif; ?>
        </div>

    </div>
</div>