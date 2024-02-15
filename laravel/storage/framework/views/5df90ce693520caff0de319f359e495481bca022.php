<?php $__env->startSection('title', $data['title'] . ' | TieuThuyet.VN'); ?>
<?php $__env->startSection('seo'); ?>
    <meta name="description" content="<?php echo e($data['description']); ?>">
    <meta name="keywords" content="<?php echo e($data['keyword']); ?>">
    <meta name='ROBOTS' content='INDEX, FOLLOW'/>
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo e($data['alias']); ?>">
    <meta property="og:site_name" content="<?php echo e($data['title']); ?>">
    <meta property="og:title" content="<?php echo e($data['title']); ?>">
    <meta property="og:locale" content="vi_VN">
    <meta property="og:description" content="<?php echo e($data['description']); ?>">
    <link href="<?php echo e($data['alias']); ?>" hreflang="vi-vn" rel="alternate"/>
    <link rel="canonical" href="<?php echo e($data['alias']); ?>"/>
    <script type="application/ld+json">
        {
            "@context":"https://schema.org",
            "@type":"WebSite",
            "name":"<?php echo e($data['title']); ?>",
        "alternateName":"<?php echo e($data['title']); ?>",
        "url":"<?php echo e($data['alias']); ?>",
        "description":"<?php echo e($data['description']); ?>",
        "sameAs": [
            "https://www.facebook.com/www.phimtruyen.vn",
        ]
    }
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb', showBreadcrumb($breadcrumb)); ?>
<?php $__env->startSection('content'); ?>

    <div class="container" id="truyen-slide">
        <div class="list list-thumbnail col-xs-12">
            <div class="title-list"><h2><a href="<?php echo e($data['alias']); ?>" title="Truyện full"><?php echo e($data['title']); ?></a></h2><span class="glyphicon glyphicon-menu-right"></span></div>
            <div class="row">
                <?php if($data['stories']): ?>
                    <?php foreach($data['stories'] as $story): ?>
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
                                    <small class="btn-xs label-primary">Hoàn thành - <?php echo e($story->chapters()->count()); ?>

                                        chương</small>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Không có tập truyện nào ở đây !</p>
                <?php endif; ?>
            </div>
        </div>
        <div class="container text-center pagination-container">
            <div class="col-xs-12 col-lg-12">
                <?php echo $__env->make('name_2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>