@extends('layouts.admin')
@section('title', 'Slider')
@section('smallTitle', 'danh sách')
@section('content')
    <!-- /.col-lg-12 -->
    <div id="result"></div>

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Quản lý slider</h3>
        </div>
        <div class="box-body">
            <a href="{{route('dashboard.slider.create')}}" class="btn btn-primary">Thêm mới</a>
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
                    @foreach ($sliders as $slider)
                        <?php $stt++; ?>
                        <tr class="odd gradeX" align="center">
                            <td>{{$stt}}</td>
                            <td>{{$slider->name}}</td>
                            <td>
                                @if (!empty($slider->story->image))
                                    <p><img width="100px" src="{{ url($slider->story->image) }}" alt="thumbnail"></p>
                                @endif
                            </td>
                            <td>{{$slider->story->name}}</td>
                            <td class="center">
                                <form action="{{ route('dashboard.slider.destroy', ['slider'=>$slider->id]) }}" method="POST"
                                    class="form-inline">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger btn-xs"
                                        onclick="return areYouSureDeleteIt('Bạn có chắc là muốn xóa nó không ?');"><i
                                            class="fa fa-trash-o  fa-fw"></i> Xóa</button>

                                    <a class="btn btn-primary btn-xs"
                                        href="{{ URL::route('dashboard.slider.edit', ['slider'=>$slider->id]) }}">
                                        <i class="fa fa-pencil fa-fw"></i> Sửa
                                    </a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
