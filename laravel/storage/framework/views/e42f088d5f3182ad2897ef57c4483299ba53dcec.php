<?php $__env->startSection('title', 'Truyện'); ?>
<?php $__env->startSection('smallTitle', 'sửa'); ?>
<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('admin.block.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="box box-primary"><div class="box-body">
    <form action="<?php echo e(route('dashboard.story.update', $data->id)); ?>" method="POST" id="dqhStoryForm" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="id" value="<?php echo e($data->id); ?>">
        <div class="form-group">
            <label>Tên truyện</label>
            <input class="form-control" name="txtName" value="<?php echo e(old('txtName', $data->name)); ?>"/>
        </div>
        <div class="form-group">
            <label>Chuyên mục</label>
            <select name="intCategory[]" data-placeholder="Chọn chuyên mục" class="form-control chosen-select" multiple>
                <option value=""></option>
                <?php echo e(category_parent($categories, $data->categories)); ?>

            </select>
            <?php if( Auth::user()->isAdmin()): ?>
                <a href="#" class="btn btn-link" id="addNewCategory"><i class="fa fa-plus"></i> Thêm Chuyên Mục Mới</a>
                <div id="addNewCategoryF">
                    <div class="form-inline" >
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" id="nameCategory" placeholder="Tên chuyên mục">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" id="createCategory">Thêm</button>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label>Tác giả</label>
            <select name="intAuthor[]" data-placeholder="Chọn tác giả" class="form-control chosen-select" multiple>
                <option value=""></option>
                <?php echo e(author_options($authors, $data->authors)); ?>

            </select>
                <a href="#" class="btn btn-link" id="addNewAuthor"><i class="fa fa-plus"></i> Thêm Tác giả Mới</a>
                <div id="addNewAuthorF">
                    <div class="form-inline" >
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" id="nameAuthor" placeholder="Tên tác giả">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" id="createAuthor">Thêm</button>
                    </div>
                </div>
        </div>

        <div class="form-group">
            <label>Nội dung</label>
            <textarea class="form-control editor" rows="10" name="txtContent"><?php echo e(old('txtContent', $data->content)); ?></textarea>
        </div>
        <div class="form-group">
            <label>Tóm tắt review truyện (Nhập vào nếu có)</label>
            <textarea class="form-control editor" placeholder="Nhập vào nội dung bạn muốn tóm tắt review nếu có" rows="10" name="txtSumaryReview"><?php echo e(old('txtSumaryReview', $data->summary_review)); ?></textarea>
        </div>
        <div class="form-group">
            <label>Nội dung review truyện (Nhập vào nếu có)</label>
            <textarea class="form-control editor" placeholder="Nhập vào nội dung bạn muốn review nếu có" rows="10" name="txtReviewed"><?php echo e(old('txtReviewed', $data->reviewed)); ?></textarea>
        </div>
        <div class="form-group">
            <label>Ảnh đại diện</label>
            <?php if(!empty($data->image)): ?>
            <p><img src="<?php echo e(url($data->image)); ?>" alt="thumbnail"></p>
            <?php endif; ?>
            <input type="file" name="fImages">
        </div>
        <div class="form-group">
            <label>Từ khoá</label>
            <input class="form-control" name="txtKeyword" value="<?php echo e(old('txtKeyword',$data->keyword)); ?>"/>
        </div>
        <div class="form-group">
            <label>Mô tả ngắn</label>
            <textarea name="txtDescription" class="form-control" rows="3"><?php echo e(old('txtDescription', $data->description)); ?></textarea>
        </div>

        <div class="form-group">
            <label>Nguồn truyện</label>
            <input class="form-control" name="txtSource" value="<?php echo e(old('txtSource', $data->source)); ?>" />
        </div>

        <div class="form-group">
            <label>Tình trạng</label>
            <select name="selStatus" class="form-control">
                <option value="0" <?php if($data->status == 0) echo 'selected="selected"'; ?>>Đang cập nhật</option>
                <option value="1" <?php if($data->status == 1) echo 'selected="selected"'; ?>>Hoàn thành</option>
                <option value="2" <?php if($data->status == 2) echo 'selected="selected"'; ?>>Ngưng cập nhật</option>
                {{--<option value="3" <?php if($data->status == 3) echo 'selected="selected"'; ?>>Bản nháp (không đăng)</option>--}}
            </select>
        </div>
        <div class="form-group">
            <label>Cảnh báo</label>
            <input type="text" placeholder="Nhập vào cảnh báo nếu có" class="form-control" name="is18" value="<?php echo e($data->is18); ?>">
        </div>
        <div class="form-group">
            <label>Giới hạn đọc đến chương</label>
            <input type="number" placeholder="Nhập vào số chương giới hạn. Ví dụ: 20" class="form-control" name="chapter_limit" value="<?php echo e($data->chapter_limit); ?>">
        </div>
        <div class="form-group">
            <label>Giới hạn đọc thành viên VIP</label>
            <input type="number" placeholder="Nhập vào số chương giới hạn cho vip. Ví dụ: 20" class="form-control" name="vip" value="<?php echo e($data->vip); ?>">
        </div>
        <div class="form-group">
            <label>Hiện thông báo</label>
            <input type="text" placeholder="Nhập vào để hiện thông báo trên trang đọc truyện" class="form-control" name="popup" value="<?php echo e($data->popup); ?>">
        </div>
        <div class="form-group">
            <label>Hiện quảng cáo Cốc Cốc ở chương truyện</label>
            <input type="text" placeholder="Nhập vào chương truyện. VD: 1,2,3" class="form-control" name="popup_coccoc" value="<?php echo e($data->popup_coccoc); ?>">
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <button type="reset" class="btn btn-default">Làm lại</button>
    <form>
</div></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>