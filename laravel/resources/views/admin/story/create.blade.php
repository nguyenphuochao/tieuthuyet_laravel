@extends('layouts.admin')
@section('title', 'Truyện')
@section('smallTitle', 'thêm mới')
@section('content')
    @include('admin.block.error')
<div class="box box-primary"><div class="box-body">
    <form action="{{ route('dashboard.story.store') }}" method="POST" id="dqhStoryForm" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label>Tên truyện</label>
            <input class="form-control" name="txtName" value="{{ old('txtName') }}"/>
        </div>
        <div class="form-group">
            <label>Chuyên mục</label>
            <select name="intCategory[]" data-placeholder="Chọn chuyên mục" id="selectCategory" class="form-control chosen-select" multiple>
                <option value=""></option>
                {{ category_parent($categories) }}
            </select>

            @if( Auth::user()->isAdmin())
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
            @endif
        </div>

        <div class="form-group">
            <label>Tác giả</label>
            <select name="intAuthor[]" data-placeholder="Chọn tác giả" class="form-control chosen-select" id="selectAuthor" multiple>
                <option value=""></option>
                {{ author_options($authors) }}
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
            <label>Mô tả nội dung</label>
            <textarea class="form-control editor" rows="10" name="txtContent" >{{ old('txtContent') }}</textarea>
        </div>
        <div class="form-group">
            <label>Tóm tắt review truyện (Nhập vào nếu có)</label>
            <textarea class="form-control editor" placeholder="Nhập vào nội dung bạn muốn review nếu có" rows="10" name="txtSumaryReview">{{ old('txtSumaryReview') }}</textarea>
        </div>
        <div class="form-group">
            <label>Nội dung review truyện (Nhập vào nếu có)</label>
            <textarea class="form-control editor" placeholder="Nhập vào nội dung bạn muốn review nếu có" rows="10" name="txtReviewed">{{ old('txtReviewed') }}</textarea>
        </div>
        <div class="form-group">
            <label>Ảnh đại diện</label>
            <input type="file" name="fImages">
        </div>
        <div class="form-group">
            <label>Từ khoá</label>
            <input class="form-control" name="txtKeyword" value="{{ old('txtKeyword') }}"/>
        </div>
        <div class="form-group">
            <label>Mô tả ngắn</label>
            <textarea name="txtDescription" class="form-control" rows="3">{{ old('txtDescription') }}</textarea>
        </div>

        <div class="form-group">
            <label>Nguồn truyện</label>
            <input class="form-control" name="txtSource" value="{{ old('txtSource') }}" />
        </div>

        <div class="form-group">
            <label>Tình trạng</label>
            <select name="selStatus" class="form-control">
                <option value="0">Đang cập nhật</option>
                <option value="1">Hoàn thành</option>
                <option value="2">Ngưng cập nhật</option>
                {{--<option value="3">Bản nháp (không đăng)</option>--}}
            </select>
        </div>
        <div class="form-group">
            <label>Cảnh báo</label>
            <input type="text" placeholder="Nhập vào cảnh báo nếu có" class="form-control" name="is18" value= "{{old('is18') }}">
        </div>
        <div class="form-group">
            <label>Giới hạn đọc đến chương</label>
            <input type="number" placeholder="Nhập vào số chương giới hạn. Ví dụ: 20" class="form-control" name="chapter_limit" value="{{old('chapter_limit') }}">
        </div>
        <div class="form-group">
            <label>Hiện thông báo</label>
            <input type="text" placeholder="Nhập vào để hiện thông báo trên trang đọc truyện" class="form-control" name="popup" value="{{old('popup') }}">
        </div>
        <div class="form-group">
            <label>Hiện quảng cáo Cốc Cốc ở chương truyện</label>
            <input type="text" placeholder="Nhập vào chương truyện. VD: 1,2,3" class="form-control" name="popup_coccoc" value="{{old('popup_coccoc')}}">
        </div>
        <button type="submit" class="btn btn-primary">Đăng truyện</button>
        <button type="reset" class="btn btn-default">Làm lại</button>
    <form>
</div></div>
@endsection
