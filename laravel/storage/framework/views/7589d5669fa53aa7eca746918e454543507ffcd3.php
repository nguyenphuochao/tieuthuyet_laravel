<div class="container" id="truyen-slide">
    <div class="list list-thumbnail col-xs-12">
        <div class="title-list"><h2><a href="<?php echo e(route('danhsach.truyenhot')); ?>" title="Truyện hot">AI CŨNG THÍCH ĐỌC
                </a></h2><span class="glyphicon glyphicon-menu-right"></span></div>
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
                                <img src="<?php echo e(url('/images/no_signal/no-signal.jpg')); ?>" alt="<?php echo e($story->name); ?>"
                                     loading="lazy">
                            <?php endif; ?>

                            <?php if($story->view >= 1000): ?>
                                <span class="icon icon-hot" style="top:6px; right:8%;"></span>
                            <?php endif; ?>
                            <div class="caption">
                                <h3><?php echo e($story->name); ?></h3>
                                <small class="btn-xs label-primary">Hoàn thành
                                    - <?php echo e($story->chapters()->count()); ?> chương</small>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Kh&ocirc;ng c&oacute; truyện nào ở đây !</p>
            <?php endif; ?>
        </div>

    </div>
</div>