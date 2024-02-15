<?php $__env->startSection('title', 'Chỉnh sửa quảng cáo'); ?>
<?php $__env->startSection('smallTitle', ''); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.block.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="box box-primary">
        <div class="box-body">
            <form action="<?php echo e(route('dashboard.setting.update')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_redirect" value="dashboard.setting.ads">
                <div class="form-group">
                    <label>Hình quảng cáo trang truyện</label>
                    <input type="file" name="image">
                    <img style="margin-top: 5px" src="<?php echo e(url(\App\Option::getImage('ads_slidebar'))); ?>"  class="img-fluid" width="200px" alt="">
                    <?php if(\App\Option::getImage('ads_slidebar')): ?>
                        <a onclick="return confirm('Bạn chắc xóa chứ?')" href="<?php echo e(route('dashboard.setting.adsdelete',['id'=>24])); ?>" class="btn btn-danger">Xóa</a>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label>Link trang web</label>
                    <input type="text" placeholder="Nhập vào địa chỉ quảng cáo" class="form-control" name="ads_slidebar" value="<?php echo e(old('ads_slidebar', \App\Option::getvalue('ads_slidebar'))); ?>">
                </div>

                <?php /* <div class="form-group">
                <label>Đầu trang</label>
                <textarea name="ads_header" class="form-control" cols="30" rows="10"><?php echo e(old('ads_header', \App\Option::getvalue('ads_header'))); ?></textarea>
            </div>
            <div class="form-group">
                <label>Cuối Trang</label>
                <textarea name="ads_footer" class="form-control" cols="30" rows="10"><?php echo e(old('ads_footer', \App\Option::getvalue('ads_footer'))); ?></textarea>
            </div>
            <div class="form-group">
                <label>Ở giữa truyện</label>
                <textarea name="ads_story" id="ads_story" class="form-control" cols="30" rows="10"><?php echo e(old('ads_story', \App\Option::getvalue('ads_story'))); ?></textarea>
            </div>
            <div class="form-group">
                <label>Ở Cuối Chương</label>
                <textarea name="ads_chapter" id="description" class="form-control" cols="30" rows="10"><?php echo e(old('ads_chapter', \App\Option::getvalue('ads_chapter'))); ?></textarea>
            </div> */ ?>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
                <button type="reset" class="btn btn-default">Làm lại</button>
                <form>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>