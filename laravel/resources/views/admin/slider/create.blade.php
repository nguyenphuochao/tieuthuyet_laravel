@extends('layouts.admin')
@section('title', 'Slider')
@section('smallTitle', 'Thêm mới')
@section('content')

    @include('admin.block.error')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Tạo slider mới</h3>
        </div>
        <div class="box-body">

            <form action="{{ route('dashboard.slider.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Tên slider</label>
                    <input class="form-control" name="name" placeholder="Nhập tên của slider" required />
                </div>
                <div class="form-group">
                    <label>Tên truyện</label>
                    <select name="story_id" id="story_id" class="form-control">
                        @foreach ($stories as $story)
                            <option value="{{ $story->id }}">{{ $story->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Tạo mới</button>
                <button type="reset" class="btn btn-danger">Làm lại</button>
                <form>
        </div>
    </div>
@endsection()
