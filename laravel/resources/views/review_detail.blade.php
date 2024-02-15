@extends('layouts.app')
@section('title', $story->name)
@section('breadcrumb', showBreadcrumb($breadcrumb))
@section('content')
    <style>
        @media screen and (max-width: 992px) {
            img {
                width: 257px;
            }
        }
        @media screen and (max-width: 500px) {
            img {
                width: 100%;
            }
        }
    </style>
    <div class="container" style="background-color;padding-top:10px;box-shadow: 0 0 10px rgba(0, 0, 0, 0.7);margin-top: 10px">
        <div class="row">
            <div class="col-sm-12 col-md-3 col-lg-3 text-center">
                <a href="{{ route('review.detail', ['alias' => $story->alias]) }}"><img src="{{ url($story->image) }}"
                        alt="{{ $story->name }}" alt="" width="100%" class="img-fluid"></a>
            </div>
            <div class="col-sm-12 col-md-9 col-lg-9">
                <p style="font-size: 25px;color:orange;margin-top:10px"><strong>{{ $story->name }}</strong></p>
                <p>Tác giả: @foreach ($story->authors as $author)
                        {{ $author->name }}
                    @endforeach
                </p>
                <p>Tag: @foreach ($story->categories as $cate)
                        <span class="badge badge-primary">{{ $cate->name }}</span>
                    @endforeach
                </p>
                <p>Độ dài: {{ count($story->chapters) }} chương</p>
                <p>Tình trạng: {{ $story->status == 0 ? 'Đang cập nhật' : 'Đã hoàn thành' }}</p>
                <p>Review: {{ $story->date_reviewed != null ? $story->date_reviewed : 'Chưa có review' }}</p>
            </div>
            <div class="col-md-12" style="margin-top: 20px">
                @if ($story->reviewed != null)
                    {!! $story->reviewed !!}
                @else
                    <h2>Truyện hiện tại chưa có review!</h2>
                @endif
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 15px;padding:10px">
        <div class="list-see-more">
            <div class="title-list">
                <h2>MỜI BẠN XEM THÊM</h2>
                <span class="glyphicon glyphicon-menu-right"></span>
            </div>
                @foreach ($list_see_more as $item)
                <div class="row" style="margin-top: 10px;margin-bottom: 15px">
                    <div class="col-md-2 text-center">
                        <a href="{{ route('review.detail', ['alias' => $item->alias]) }}">
                            @if ($item->image && file_exists(public_path($item->image)))
                                <img src="{{ url($item->image) }}" alt="{{ $item->name }}" width="100%"
                                    class="img-fluid">
                            @else
                                <img src="{{ url('/images/no_signal/no-signal.jpg') }}" alt="{{ $item->name }}"
                                    width="100%" class="img-fluid">
                            @endif
                        </a>
                    </div>
                    <div class="col-md-10">
                        <p style="font-size: 20px"><strong><a
                                    href="{{ route('review.detail', ['alias' => $item->alias]) }}">{{ $item->name }}</a></strong>
                        </p>
                        <p>Tag: @foreach ($item->categories as $cate)
                                <span class="badge badge-primary">{{ $cate->name }}</span>
                            @endforeach
                        </p>
                        <p class="review-date"><i style="color: #4E4E4E">Review:
                                {{ $item->date_reviewed != null ? $item->date_reviewed : 'Chưa có review' }}</i>
                        </p>
                        <p>
                            @if ($item->summary_review != null)
                                {!! $item->summary_review !!}
                            @endif
                        </p>
                    </div>
                </div>
                @endforeach
        </div>
        <div class="text-center">
            {{ $list_see_more->links() }}
        </div>
    </div>
@endsection
