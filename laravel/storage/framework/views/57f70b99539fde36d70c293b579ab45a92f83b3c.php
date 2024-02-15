
<?php $__env->startSection('title', 'Slider'); ?>
<?php $__env->startSection('smallTitle', 'Thêm mới'); ?>
<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('admin.block.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Tạo slider mới</h3>
        </div>
        <div class="box-body">

            <form action="<?php echo e(route('dashboard.slider.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <div class="form-group">
                    <label>Tên slider</label>
                    <input class="form-control" name="name" placeholder="Nhập tên của slider" required />
                </div>
                <div class="form-group">
                    <label>Tên truyện</label>
                    <select name="story_id" id="story_id" class="form-control">
                        <?php foreach($stories as $story): ?>
                            <option value="<?php echo e($story->id); ?>"><?php echo e($story->name); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Tạo mới</button>
                <button type="reset" class="btn btn-danger">Làm lại</button>
                <form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>