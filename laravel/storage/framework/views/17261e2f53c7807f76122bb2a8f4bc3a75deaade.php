<?php if($stories): ?>
    <?php $count = 1;?>
    <?php foreach($stories as $story): ?>
        <div class="item top-<?php echo e($count); ?>" itemscope="" itemtype="http://schema.org/Book">
            <a href="<?php echo e(route('story.show', $story->alias)); ?>" itemprop="url">
                <?php if($story->status == 1): ?>
                <span class="full-label"></span>
                <?php endif; ?>
               
                <?php if($story->image && file_exists(public_path($story->image))): ?>
                   <img src="<?php echo e(url($story->image)); ?>" alt="<?php echo e($story->name); ?>" class="img-responsive" itemprop="image">
                <?php else: ?>
                   <img src="<?php echo e(url('/images/no_signal/no-signal.jpg')); ?>" class="img-responsive" itemprop="image">
                <?php endif; ?>

                <?php if($story->view >= 1000): ?>
                <span class="icon icon-hot"></span>
                <?php endif; ?>
                <div class="title">
                    <h3 itemprop="name"><?php echo e($story->name); ?></h3>
                </div>
                <div class="title view-hot-story">
                    <h3 style="margin-left: 6%;"><span class="glyphicon glyphicon-eye-open"> </span> <?php echo e(number_format($story->view)); ?> </h3>
                </div>
            </a>
        </div>
        <?php $count++;?>
    <?php endforeach; ?>
<?php else: ?>
    <p>Kh&#1043;&#1169;ng c&#1043;&#1110; b&#1043; i vi&#1073;&#1108;&#1111;t n&#1043; o &#1073;»&#1119; &#1044;‘&#1043;&#1118;y !</p>
<?php endif; ?>