@extends('layouts.app')
@section('title', 'Chính sách bảo mật')
@section('breadcrumb', showBreadcrumb([[url('chinh-sach-bao-mat'), 'Chính sách bảo mật']]))
@section('content')
    <div class="container single-page" id="private">
        <div class="row">
            <div class="list list-truyen col-xs-12">
                <div class="title-list"><h2>Chính sách bảo mật</h2></div>
                <div class="row">
                    <div class="col-xs-12 content">
                        {!! \App\Option::getvalue('private_content') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
