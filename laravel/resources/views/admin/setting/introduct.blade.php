@extends('layouts.admin')
@section('title', 'Chỉnh sửa giới thiệu')
@section('smallTitle', '')
@section('content')
@include('admin.block.error')
<div class="box box-primary"><div class="box-body">

        <form action="{{ route('dashboard.setting.update') }}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_redirect" value="dashboard.setting.introduct">
            <div class="form-group">
                <label>Nội dung</label>
                <textarea name="introduct_content" id="introduct_content" class="form-control editor" cols="30" rows="20">{{ old('introduct_content', \App\Option::getvalue('introduct_content'))}}</textarea>
            </div>
            <button type="submit" class="btn btn-default">Cập nhật</button>
            <button type="reset" class="btn btn-default">Làm lại</button>
            <form>
    </div>
</div></div>
@endsection()
