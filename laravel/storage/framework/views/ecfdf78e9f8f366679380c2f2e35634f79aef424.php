
<?php $__env->startSection('title', 'Danh mục truyện'); ?>
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
    <div class="container">
        <?php if(count($stories) < 1): ?>
            <h2 style="font-size: 20px;margin-top:30px">Chưa có review nào!</h2>
        <?php endif; ?>
        <div class="row">
            <?php if(count($stories) > 0): ?>
                <div style="margin-top: 10px;margin-bottom: 10px;font-size:17px"
                    class="col-xs-12 col-sm-12 col-md-12 text-right">
                    <form action="<?php echo e(route('review')); ?>" id="form_category">
                        <select name="sort" id="sort" style="padding: 5px">
                            <option value="#" disabled selected>Sắp xếp theo</option>
                            <option value="name" <?php echo e(request()->sort == 'name' ? 'selected' : ''); ?>>Tên truyện</option>
                            <option value="update" <?php echo e(request()->sort == 'update' ? 'selected' : ''); ?>>Ngày cập nhật
                            </option>
                        </select>
                    </form>
                </div>
            <?php endif; ?>
        </div>
        <?php foreach($stories as $story): ?>
            <div class="row" style="margin-bottom: 20px">
                <div class="col-md-2 text-center">
                    <a href="<?php echo e(route('review.detail', ['alias' => $story->alias])); ?>">
                        <?php if($story->image && file_exists(public_path($story->image))): ?>
                            <img src="<?php echo e(url($story->image)); ?>" alt="<?php echo e($story->name); ?>" width="100%" class="img-fluid">
                        <?php else: ?>
                            <img src="<?php echo e(url('/images/no_signal/no-signal.jpg')); ?>" alt="<?php echo e($story->name); ?>" width="100%"
                                class="img-fluid">
                        <?php endif; ?>
                    </a>
                </div>
                <div class="col-md-10">
                    <p style="font-size: 20px"><strong><a
                                href="<?php echo e(route('review.detail', ['alias' => $story->alias])); ?>"><?php echo e($story->name); ?></a></strong>
                    </p>
                    <p>Tag: <?php foreach($story->categories as $cate): ?>
                            <span class="badge badge-primary"><?php echo e($cate->name); ?></span>
                        <?php endforeach; ?>
                    </p>
                    <p class="review-date"><i style="color: #4E4E4E">Review:
                            <?php echo e($story->date_reviewed != null ? $story->date_reviewed : 'Chưa có review'); ?></i>
                    </p>
                    <div class="summary-review">
                        <?php if($story->summary_review != null): ?>
                            <?php echo $story->summary_review; ?>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="text-center">
            <?php echo e($stories->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function() {
            $("#sort").change(function() {
                $("#form_category").submit();
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>