@extends('layouts.admin')
@section('title', 'Chỉnh sửa quy định về nội dung')
@section('smallTitle', '')
@section('content')
@include('admin.block.error')
<div class="box box-primary"><div class="box-body">

        <form action="{{ route('dashboard.setting.update') }}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_redirect" value="dashboard.setting.regulation">
            <div class="form-group">
                <label>Nội dung</label>
                <textarea name="regulation_content" id="regulation_content" class="form-control editor" cols="30" rows="20">{{ old('regulation_content', \App\Option::getvalue('regulation_content'))}}</textarea>
            </div>
            <button type="submit" class="btn btn-default">Cập nhật</button>
            <button type="reset" class="btn btn-default">Làm lại</button>
            <form>
    </div>
</div></div>
@endsection()
