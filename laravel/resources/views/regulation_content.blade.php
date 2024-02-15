@extends('layouts.app')
@section('title', 'Quy định về nội dung')
@section('breadcrumb', showBreadcrumb([[url('quy-dinh-ve-noi-dung'), 'Quy định về nội dung']]))
@section('content')
    <div class="container single-page" id="regulation">
        <div class="row">
            <div class="list list-truyen col-xs-12">
                <div class="title-list"><h2>Quy định về nội dung</h2></div>
                <div class="row">
                    <div class="col-xs-12 content">
                        {!! \App\Option::getvalue('regulation_content') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
