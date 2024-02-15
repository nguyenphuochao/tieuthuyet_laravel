@extends('layouts.app')
@section('title', 'Giới thiệu')
@section('breadcrumb', showBreadcrumb([[url('gioi-thieu'), 'Giới thiệu']]))
@section('content')
    <div class="container single-page" id="introduct">
        <div class="row">
            <div class="list list-truyen col-xs-12">
                <div class="title-list"><h2>Giới thiệu</h2></div>
                <div class="row">
                    <div class="col-xs-12 content">
                        {!! \App\Option::getvalue('introduct_content') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
