<?php if($stories && $category): ?>
    <div class="container" id="truyen-slide">
        <div class="list list-thumbnail col-xs-12">
            <div class="title-list"><h2><a
                            href="<?php echo e(route('category.list.index', ['alias' => $category->alias])); ?>"
                            title="Truyện <?php echo e($category->name); ?>">TIỂU THUYẾT <?php echo e($category->name); ?></a>
                </h2><span
                        class="glyphicon glyphicon-menu-right"></span>
            </div>
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

                            <?php /*    <?php if($story->storyView >= 1000): ?>*/ ?>
                            <?php /*        <span class="icon icon-hot" style="top:6px; right:8%;"></span>*/ ?>
                            <?php /*    <?php endif; ?>*/ ?>
                                <div class="caption">
                                    <h3><?php echo e($story->name); ?></h3>
                                    <small class="btn-xs label-primary">Hoàn thành
                                        - <?php echo e($story->chapters()->count()); ?> chương</small>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Không có bài viết nào ở đây!!!</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>