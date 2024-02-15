<?php $__env->startSection('title', 'Chuyên mục'); ?>
<?php $__env->startSection('smallTitle', 'Sửa'); ?>
<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('admin.block.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="box box-primary">
      <div class="box-header with-border">
          <h3 class="box-title">Sửa chuyên mục</h3>
      </div>
      <div class="box-body">

    <form action="<?php echo e(route('dashboard.category.update', $data['id'])); ?>" method="POST">
        <?php echo e(csrf_field()); ?>

        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="id" value="<?php echo e($data['id']); ?>">
        <div class="form-group">
            <label>Chuyên mục cha</label>
            <select name="intParent" class="form-control">
                <option value="0">Không có</option>
                <?php echo e(category_parent($parent, null, $data['parent_id'])); ?>

            </select>
        </div>
        <div class="form-group">
            <label>Tên chuyên mục</label>
            <input class="form-control" name="txtCategoryName" placeholder="Nhập tên của chuyên mục" value="<?php echo e(old('txtCategoryName', isset($data['name']) ? $data['name'] : '')); ?>" />
        </div>
        <div class="form-group">
            <label>Từ khóa tìm kiếm</label>
            <input class="form-control" name="txtKeyword" placeholder="Từ khóa thứ 1, từ khóa 2, từ khóa 3" value="<?php echo e(old('txtKeyword', isset($data['keyword']) ? $data['keyword'] : '')); ?>" />
        </div>
        <div class="form-group">
            <label>Mô tả</label>
            <textarea name="txtDescription" class="form-control" rows="3"><?php echo e(old('txtDescription', isset($data['description']) ? $data['description'] : '')); ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
        <button type="reset" class="btn btn-danger">Làm lại</button>
    <form>
</div></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>