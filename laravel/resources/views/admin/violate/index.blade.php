@extends('layouts.admin')
@section('title', 'Vi phạm bản quyền')
@section('smallTitle', 'danh sách')
@section('content')
<!-- /.col-lg-12 -->
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v10.0&appId=764582287768925&autoLogAppEvents=1" nonce="QKJ7SiB8"></script>
<div id="result"></div>

<div class="box box-primary">
  <div class="box-header with-border">
      <h3 class="box-title">Quản lý vi phạm bản quyền</h3>
  </div>
  <div class="box-body">

<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr align="center">
            <th>STT</th>
            <th>Link tác phẩm vi phạm</th>
            <th>Link tác phẩm gốc</th>
            <th>Email</th>
            <th>Công cụ</th>
        </tr>
    </thead>
    <tbody>
        @php
            $index = 1;
        @endphp
    @foreach($data as $item)
        <tr class="odd gradeX">
            <td>{{ $index ++ }}</td>
            <td>{{ $item->violate_link }}</td>
            <td>{{ $item->original_link }}</td>
            <td>{{$item->email}}</td>
            <td class="left">
                <form action="{{ route('dashboard.violate.destroy', $item->id) }}" method="POST" class="form-inline">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger btn-xs" onclick="return areYouSureDeleteIt('Bạn có chắc là muốn hủy nó không ?');"><i class="fa fa-trash-o  fa-fw"></i> Đã giải quyết</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{!! $data->links() !!}
</div>
<br><hr>
{{-- <div id="fb" class="fb-comments" data-href="https://tieuthuyet.vn/" data-width="100%" data-numposts="5" data-colorscheme="light" fb-xfbml-state="rendered"></div> --}}
</div>
@endsection
