@extends('layouts.app')
@section('title', $data['title'] . ' | TieuThuyet.VN')
@section('seo')
    <meta name="description" content="{{$data['description']}}">
    <meta name="keywords" content="{{$data['keyword']}}">
    <meta name='ROBOTS' content='INDEX, FOLLOW'/>
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{$data['alias']}}">
    <meta property="og:site_name" content="{{$data['title']}}">
    <meta property="og:title" content="{{$data['title']}}">
    <meta property="og:locale" content="vi_VN">
    <meta property="og:description" content="{{$data['description']}}">
    <link href="{{$data['alias']}}" hreflang="vi-vn" rel="alternate"/>
    <link rel="canonical" href="{{$data['alias']}}"/>
    <script type="application/ld+json">
        {
            "@context":"https://schema.org",
            "@type":"WebSite",
            "name":"{{$data['title']}}",
        "alternateName":"{{$data['title']}}",
        "url":"{{$data['alias']}}",
        "description":"{{$data['description']}}",
        "sameAs": [
            "https://www.facebook.com/www.phimtruyen.vn",
        ]
    }
    </script>
@endsection

@section('breadcrumb', showBreadcrumb($breadcrumb))
@section('content')

    <div class="container" id="truyen-slide">
        <div class="list list-thumbnail col-xs-12">
            <div class="title-list"><h2><a href="{{ $data['alias'] }}" title="Truyện full">{{ $data['title'] }}</a></h2><span class="glyphicon glyphicon-menu-right"></span></div>
            <div class="row">
                @if($data['stories'])
                    @foreach($data['stories'] as $story)
                            <?php
                            $chapter = $story->chapters()->orderBy('created_at', 'DESC')->first();
                            ?>
                        <div class="col-xs-4 col-sm-3 col-md-2">
                            <a href="{{route('story.show', $story->alias)}}" title="{{$story->name}}">

                                @if ($story->image && file_exists(public_path($story->image)))
                                    <img src="{{ url($story->image) }}" alt="{{$story->name}}" loading="lazy">
                                @else
                                    <img src="{{ url('/images/no_signal/no-signal.jpg') }}" alt="{{$story->name}}"
                                         loading="lazy">
                                @endif

                                @if($story->view >= 1000)
                                    <span class="icon icon-hot" style="top:6px; right:8%;"></span>
                                @endif
                                <div class="caption">
                                    <h3>{{$story->name}}</h3>
                                    <small class="btn-xs label-primary">Hoàn thành - {{$story->chapters()->count()}}
                                        chương</small>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @else
                    <p>Không có tập truyện nào ở đây !</p>
                @endif
            </div>
        </div>
        <div class="container text-center pagination-container">
            <div class="col-xs-12 col-lg-12">
                @include('name_2')
            </div>
        </div>
    </div>
@endsection
