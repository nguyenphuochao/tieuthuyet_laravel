<?php $__env->startSection('title', 'Chính sách bảo mật'); ?>
<?php $__env->startSection('breadcrumb', showBreadcrumb([[url('chinh-sach-bao-mat'), 'Chính sách bảo mật']])); ?>
<?php $__env->startSection('content'); ?>
    <div class="container single-page" id="private">
        <div class="row">
            <div class="list list-truyen col-xs-12">
                <div class="title-list"><h2>Chính sách bảo mật</h2></div>
                <div class="row">
                    <div class="col-xs-12 content">
                        <?php echo \App\Option::getvalue('private_content'); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>