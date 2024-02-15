
<?php $__env->startSection('title', 'Slider'); ?>
<?php $__env->startSection('smallTitle', 'danh sách'); ?>
<?php $__env->startSection('content'); ?>
    <!-- /.col-lg-12 -->
    <div id="result"></div>

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Quản lý slider</h3>
        </div>
        <div class="box-body">
            <a href="<?php echo e(route('dashboard.slider.create')); ?>" class="btn btn-primary">Thêm mới</a>
            <table class="table table-striped table-bordered table-hover" id="dataTableList">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên slider</th>
                        <th>Hình ảnh</th>
                        <th>Truyện</th>
                        <th>Công cụ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $stt = 0; ?>
                    <?php foreach($sliders as $slider): ?>
                        <?php $stt++; ?>
                        <tr class="odd gradeX" align="center">
                            <td><?php echo e($stt); ?></td>
                            <td><?php echo e($slider->name); ?></td>
                            <td>
                                <?php if(!empty($slider->story->image)): ?>
                                    <p><img width="100px" src="<?php echo e(url($slider->story->image)); ?>" alt="thumbnail"></p>
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($slider->story->name); ?></td>
                            <td class="center">
                                <form action="<?php echo e(route('dashboard.slider.destroy', ['slider'=>$slider->id])); ?>" method="POST"
                                    class="form-inline">
                                    <?php echo e(csrf_field()); ?>

                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger btn-xs"
                                        onclick="return areYouSureDeleteIt('Bạn có chắc là muốn xóa nó không ?');"><i
                                            class="fa fa-trash-o  fa-fw"></i> Xóa</button>

                                    <a class="btn btn-primary btn-xs"
                                        href="<?php echo e(URL::route('dashboard.slider.edit', ['slider'=>$slider->id])); ?>">
                                        <i class="fa fa-pencil fa-fw"></i> Sửa
                                    </a>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>