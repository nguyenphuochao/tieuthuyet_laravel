<?php $__env->startSection('title', 'Quy định về nội dung'); ?>
<?php $__env->startSection('breadcrumb', showBreadcrumb([[url('quy-dinh-ve-noi-dung'), 'Quy định về nội dung']])); ?>
<?php $__env->startSection('content'); ?>
    <div class="container single-page" id="regulation">
        <div class="row">
            <div class="list list-truyen col-xs-12">
                <div class="title-list"><h2>Quy định về nội dung</h2></div>
                <div class="row">
                    <div class="col-xs-12 content">
                        <?php echo \App\Option::getvalue('regulation_content'); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>