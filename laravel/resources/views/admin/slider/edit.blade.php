@extends('layouts.admin')
@section('title', 'Slider')
@section('smallTitle', 'Sửa')
@section('content')

    @include('admin.block.error')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Sửa slider</h3>
        </div>
        <div class="box-body">
            <form action="{{ route('dashboard.slider.update',$slider->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <label>Tên slider</label>
                    <input class="form-control" name="name" placeholder="Nhập tên của slider"  value="{{$slider->name}}" required />
                </div>
                <div class="form-group">
                    <label>Tên truyện</label>
                    <select name="story_id" id="story_id" class="form-control">
                        @foreach ($stories as $story)
                            <option {{$slider->story_id == $story->id ? 'selected' : ''}} value="{{ $story->id }}">{{ $story->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Sửa</button>
                <button type="reset" class="btn btn-danger">Làm lại</button>
                <form>
        </div>
    </div>
@endsection()
