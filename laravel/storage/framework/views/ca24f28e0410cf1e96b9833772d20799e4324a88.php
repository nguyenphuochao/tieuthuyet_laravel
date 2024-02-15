<?php $__env->startSection('title', 'Chỉnh sửa quy định về nội dung'); ?>
<?php $__env->startSection('smallTitle', ''); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.block.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="box box-primary"><div class="box-body">

        <form action="<?php echo e(route('dashboard.setting.update')); ?>" method="POST">
            <?php echo e(csrf_field()); ?>

            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_redirect" value="dashboard.setting.regulation">
            <div class="form-group">
                <label>Nội dung</label>
                <textarea name="regulation_content" id="regulation_content" class="form-control editor" cols="30" rows="20"><?php echo e(old('regulation_content', \App\Option::getvalue('regulation_content'))); ?></textarea>
            </div>
            <button type="submit" class="btn btn-default">Cập nhật</button>
            <button type="reset" class="btn btn-default">Làm lại</button>
            <form>
    </div>
</div></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>