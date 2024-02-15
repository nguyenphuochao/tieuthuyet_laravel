@extends('layouts.app')
@section('title', 'Vấn đề về bản quyền')
@section('breadcrumb', showBreadcrumb([[url('van-de-ve-ban-quyen'), 'Vấn đề về bản quyền']]))
@section('content')
    <div class="container single-page" id="license">
        <div class="row">
            <div class="list list-truyen col-xs-12">
                <div class="title-list"><h2>Vấn đề về bản quyền</h2></div>
                <div class="row">
                    <div class="col-xs-12 content">
                        {!! \App\Option::getvalue('license_content') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
