@extends('layouts.app')
@section('title', 'Danh mục truyện')
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
    <div class="container">
        @if (count($stories) < 1)
            <h2 style="font-size: 20px;margin-top:30px">Chưa có review nào!</h2>
        @endif
        <div class="row">
            @if (count($stories) > 0)
                <div style="margin-top: 10px;margin-bottom: 10px;font-size:17px"
                    class="col-xs-12 col-sm-12 col-md-12 text-right">
                    <form action="{{ route('review') }}" id="form_category">
                        <select name="sort" id="sort" style="padding: 5px">
                            <option value="#" disabled selected>Sắp xếp theo</option>
                            <option value="name" {{ request()->sort == 'name' ? 'selected' : '' }}>Tên truyện</option>
                            <option value="update" {{ request()->sort == 'update' ? 'selected' : '' }}>Ngày cập nhật
                            </option>
                        </select>
                    </form>
                </div>
            @endif
        </div>
        @foreach ($stories as $story)
            <div class="row" style="margin-bottom: 20px">
                <div class="col-md-2 text-center">
                    <a href="{{ route('review.detail', ['alias' => $story->alias]) }}">
                        @if ($story->image && file_exists(public_path($story->image)))
                            <img src="{{ url($story->image) }}" alt="{{ $story->name }}" width="100%" class="img-fluid">
                        @else
                            <img src="{{ url('/images/no_signal/no-signal.jpg') }}" alt="{{ $story->name }}" width="100%"
                                class="img-fluid">
                        @endif
                    </a>
                </div>
                <div class="col-md-10">
                    <p style="font-size: 20px"><strong><a
                                href="{{ route('review.detail', ['alias' => $story->alias]) }}">{{ $story->name }}</a></strong>
                    </p>
                    <p>Tag: @foreach ($story->categories as $cate)
                            <span class="badge badge-primary">{{ $cate->name }}</span>
                        @endforeach
                    </p>
                    <p class="review-date"><i style="color: #4E4E4E">Review:
                            {{ $story->date_reviewed != null ? $story->date_reviewed : 'Chưa có review' }}</i>
                    </p>
                    <div class="summary-review">
                        @if ($story->summary_review != null)
                            {!! $story->summary_review !!}
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
        <div class="text-center">
            {{ $stories->links() }}
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $("#sort").change(function() {
                $("#form_category").submit();
            });
        });
    </script>
@endsection
