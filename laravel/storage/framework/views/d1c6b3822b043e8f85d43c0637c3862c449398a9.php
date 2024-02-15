
<?php $__env->startSection('title', $story->name); ?>
<?php $__env->startSection('breadcrumb', showBreadcrumb($breadcrumb)); ?>
<?php $__env->startSection('content'); ?>
    <style>
        @media  screen and (max-width: 992px) {
            img {
                width: 257px;
            }
        }
        @media  screen and (max-width: 500px) {
            img {
                width: 100%;
            }
        }
    </style>
    <div class="container" style="background-color;padding-top:10px;box-shadow: 0 0 10px rgba(0, 0, 0, 0.7);margin-top: 10px">
        <div class="row">
            <div class="col-sm-12 col-md-3 col-lg-3 text-center">
                <a href="<?php echo e(route('review.detail', ['alias' => $story->alias])); ?>"><img src="<?php echo e(url($story->image)); ?>"
                        alt="<?php echo e($story->name); ?>" alt="" width="100%" class="img-fluid"></a>
            </div>
            <div class="col-sm-12 col-md-9 col-lg-9">
                <p style="font-size: 25px;color:orange;margin-top:10px"><strong><?php echo e($story->name); ?></strong></p>
                <p>Tác giả: <?php foreach($story->authors as $author): ?>
                        <?php echo e($author->name); ?>

                    <?php endforeach; ?>
                </p>
                <p>Tag: <?php foreach($story->categories as $cate): ?>
                        <span class="badge badge-primary"><?php echo e($cate->name); ?></span>
                    <?php endforeach; ?>
                </p>
                <p>Độ dài: <?php echo e(count($story->chapters)); ?> chương</p>
                <p>Tình trạng: <?php echo e($story->status == 0 ? 'Đang cập nhật' : 'Đã hoàn thành'); ?></p>
                <p>Review: <?php echo e($story->date_reviewed != null ? $story->date_reviewed : 'Chưa có review'); ?></p>
            </div>
            <div class="col-md-12" style="margin-top: 20px">
                <?php if($story->reviewed != null): ?>
                    <?php echo $story->reviewed; ?>

                <?php else: ?>
                    <h2>Truyện hiện tại chưa có review!</h2>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 15px;padding:10px">
        <div class="list-see-more">
            <div class="title-list">
                <h2>MỜI BẠN XEM THÊM</h2>
                <span class="glyphicon glyphicon-menu-right"></span>
            </div>
                <?php foreach($list_see_more as $item): ?>
                <div class="row" style="margin-top: 10px;margin-bottom: 15px">
                    <div class="col-md-2 text-center">
                        <a href="<?php echo e(route('review.detail', ['alias' => $item->alias])); ?>">
                            <?php if($item->image && file_exists(public_path($item->image))): ?>
                                <img src="<?php echo e(url($item->image)); ?>" alt="<?php echo e($item->name); ?>" width="100%"
                                    class="img-fluid">
                            <?php else: ?>
                                <img src="<?php echo e(url('/images/no_signal/no-signal.jpg')); ?>" alt="<?php echo e($item->name); ?>"
                                    width="100%" class="img-fluid">
                            <?php endif; ?>
                        </a>
                    </div>
                    <div class="col-md-10">
                        <p style="font-size: 20px"><strong><a
                                    href="<?php echo e(route('review.detail', ['alias' => $item->alias])); ?>"><?php echo e($item->name); ?></a></strong>
                        </p>
                        <p>Tag: <?php foreach($item->categories as $cate): ?>
                                <span class="badge badge-primary"><?php echo e($cate->name); ?></span>
                            <?php endforeach; ?>
                        </p>
                        <p class="review-date"><i style="color: #4E4E4E">Review:
                                <?php echo e($item->date_reviewed != null ? $item->date_reviewed : 'Chưa có review'); ?></i>
                        </p>
                        <p>
                            <?php if($item->summary_review != null): ?>
                                <?php echo $item->summary_review; ?>

                            <?php endif; ?>
                        </p>
                    </div>
                </div>
                <?php endforeach; ?>
        </div>
        <div class="text-center">
            <?php echo e($list_see_more->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>