<?php $__env->startSection('title', 'Vấn đề về bản quyền'); ?>
<?php $__env->startSection('breadcrumb', showBreadcrumb([[url('van-de-ve-ban-quyen'), 'Vấn đề về bản quyền']])); ?>
<?php $__env->startSection('content'); ?>
    <div class="container single-page" id="license">
        <div class="row">
            <div class="list list-truyen col-xs-12">
                <div class="title-list"><h2>Vấn đề về bản quyền</h2></div>
                <div class="row">
                    <div class="col-xs-12 content">
                        <?php echo \App\Option::getvalue('license_content'); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>