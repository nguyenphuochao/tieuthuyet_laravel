@extends('layouts.app')
@section('title', $story->name . ' | TieuThuyet.VN')
@section('seo')
    <meta name="keywords" content="{{ \App\Option::getvalue('keyword') }}" />
    <meta name="description" content="{!! substr(tanvo($story->content), 0, 250) !!}" />
    <meta name='ROBOTS' content='INDEX, FOLLOW' />
    <meta property="og:type" content="book" />
    <meta property="og:url" content="https://tieuthuyet.vn/{{ $story->alias }}" />
    <meta property="og:site_name" content="{{ $story->name }}" />
    <meta property="og:title" content="{{ $story->name }} | TieuThuyet.VN" />
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="1019" />
    <meta property="og:image:height" content="609" />
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:image" content="{{ url($story->image) }}" />
    <meta property="og:image:alt" content="Tiểu Thuyết">
    <meta property="og:description" content="{!! substr(tanvo($story->content), 0, 325) !!}" />
    <link rel="canonical" href="https://tieuthuyet.vn/{{ $story->alias }}" />
    <link href="https://tieuthuyet.vn/{{ $story->alias }}" hreflang="vi-vn" rel="alternate" />
    <link data-page-subject="true" href="{{ url($story->image) }}" rel="image_src" />
    <link rel="stylesheet" href="{{ asset('assets/css/style_show_story.css') }}">
    <style>
        @media screen and (max-width:500px) {
            #rateYo {
                margin-left: -30px;
            }
           
        }
        @media screen and (max-width:768px) {
            #image-ads-sidebar{
                width: 100%;
                height: auto;
            }
            #ads_slidebar_tablet{
                display: none;
            }
            #truyen #ads_slidebar_mobile{
                display: block !important;
            }
        }
    </style>
    <script async defer src="https://sp.zalo.me/plugins/sdk.js"></script>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v9.0">
    </script>
    <script type="application/ld+json"> 
    { 
        "@context":"https://schema.org", 
        "@type":"Book", 
        "name": "{{$story->name}}", 
        "alternateName": "{{$story->name}}", 
        "url":"https://tieuthuyet.vn/{{$story->alias}}",
        "image" : "{{ url($story->image) }}",
        "author": [{!! get_author($story->authors) !!}],
        "publisher": {
            "@type": "Person",
            "name": "{{$story->user->name}}"
        },
        "description": "{!! substr(tanvo($story->content),0,250) !!}",
        "about": [{!!  get_catory($story->categories) !!}]
    } 
    </script>
@endsection
@section('breadcrumb', showBreadcrumb($breadcrumb))

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            showtt('fb', 'tt');

            $('#noi_dung').keypress(function(event) {
                if (event.keyCode == 13 || event.which == 13) {
                    event.preventDefault();
                    if (document.getElementById("noi_dung").value != '') {
                        binhLuan(document.getElementById("noi_dung").value);
                    }
                }
            });

            function binhLuan($nd) {
                $.ajax({
                    type: 'POST',
                    url: '{{ route('xu-ly-binh-luan') }}',
                    data: {
                        _token: '<?php echo csrf_token(); ?>',
                        story_id: {{ $story->id }},
                        noi_dung: $nd
                    },
                    success: function(data) {
                        $(".list-comment").html(data);
                        $('#noi_dung').val("");
                    },
                    error: function() {
                        alert("Đăng nhập để bình luận")
                    }
                });
            }

            function laydl(page) {
                $.ajax({
                    url: '/get-comment-story?page=' + page,
                    method: "GET",
                    data: {
                        story_id: {{ $story->id }},
                        _token: '<?php echo csrf_token(); ?>'
                    },
                    success: function(data) {
                        $(".list-comment").html(data);
                    }
                });
            }

            $(document).on('click', '.comment-paga .pagination a', function(e) {
                e.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                laydl(page);
            });

            $("#binhluan").click(function() {
                if (document.getElementById("noi_dung").value != '') {
                    binhLuan(document.getElementById("noi_dung").value);
                }
            });
        });

        function showfb(fb, tt) {
            var srcElement = document.getElementById(fb);
            var tieuthuyet = document.getElementById(tt);

            if (srcElement != null) {
                if (srcElement.style.display == "block") {
                    srcElement.style.display = 'none';

                } else {
                    srcElement.style.display = 'block';
                    tieuthuyet.style.display = 'none';
                }
                return false;
            }
        }

        function showtt(fb, tt) {
            var srcElement = document.getElementById(fb);
            var tieuthuyet = document.getElementById(tt);
            if (tieuthuyet != null) {
                if (tieuthuyet.style.display == "block") {
                    tieuthuyet.style.display = 'none';
                } else {
                    tieuthuyet.style.display = 'block';
                    srcElement.style.display = 'none';
                }
                return false;
            }
        }
    </script>
    <div class="container" id="truyen">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="col-xs-12 col-info-desc" style="padding-bottom: 10px" itemscope=""
                itemtype="http://schema.org/Book">
                <div class="title-list"></div>
                <div class="col-xs-12 col-lg-12 info-holder flexbox">
                    <div class="book12">
                        @if ($story->image && file_exists(public_path($story->image)))
                            <img src="{{ url($story->image) }}" alt="{{ $story->name }}" itemprop="image" width="160"
                                height="250">
                        @else
                            <img src="{{ url('/images/no_signal/no-signal.jpg') }}" alt="{{ $story->name }}"
                                itemprop="image" width="160" height="205">
                        @endif
                    </div>

                    <div class="info col-lg-7 col-md-12 col-sm-12 col-xs-12">
                        <div class="story-name">
                            <h3 class="title" itemprop="name">{{ $story->name }}</h3>
                        </div>

                        <div class="genres">
                            <span class="st-1">
                                {!! the_category($story->categories) !!}
                            </span>
                            <!--<div class="star-rating">-->
                            <!--    <p>Đánh giá: </p>-->
                            <!--    <input type="radio" name="rating" id="star1"><label for="star1"></label>-->
                            <!--    <input type="radio" name="rating" id="star2"><label for="star2"></label>-->
                            <!--    <input type="radio" name="rating" id="star3"><label for="star3"></label>-->
                            <!--    <input type="radio" name="rating" id="star4"><label for="star4"></label>-->
                            <!--    <input type="radio" name="rating" id="star5"><label for="star5"></label>-->
                            <!--</div>-->
                        </div>

                        <div class="statistics">
                            <p>Tác giả: <strong>{!! the_author($story->authors) !!}</strong>

                            <p><strong>{{ count($story->chapters()->get()) }}</strong> chương</p>

                            <p><strong>{!! number_format($story->view) !!}</strong> lượt xem</p>

                        </div>

                        <div class="col-lg-12 col-xs-12 story-button">
                            <a href="https://www.facebook.com/thongtinxuphat">Diễn đàn truyện</a>
                            <a href="{{ route('danhsach.truyenmoi') }}">Hôm nay đọc gì?</a>
                            <a href="{{ route('danhsach.truyenhotnhat') }}">Truyện đang HOT</a>
                        </div>
                        {{-- Đánh giá rating --}}
                        <input type="hidden" id="rating-check" value="{{ Auth::check() ? 1 : 0 }}" />
                        <!---check đăng nhập-->
                        <form action="{{ route('rating') }}" id="formRating" method="post">
                            {{ csrf_field() }}
                            <div class="rating-container row">
                                <div class="col-xs-6 col-sm-6 col-md-6" id="rateYo"></div>
                                <div class="col-xs-6 col-sm-6 col-md-6" style="font-size: 16px;padding-top:7px;text-align:start"><span
                                        id="rating_value_num">{{ $ratingAvg }}</span>/5 - (<span
                                        id="total_rating">{{ count($ratingCount) }}</span> bình chọn)</div>
                            </div>
                            <input type="hidden" name="rating_value" id="rating_value">
                            <input type="hidden" value="{{ $story->id }}" name="story_id" id="story_id">
                            <input type="hidden" name="rating_num" id="rating_num" value="{{ $ratingAvg }}">
                            @if (Auth::check())
                                <input type="hidden" value="{{ Auth::user()->id }}" name="user_id" id="user_id">
                            @endif
                        </form>
                    </div>
                    @if(\App\Option::getImage('ads_slidebar'))
                        <div class="col-sm-12 col-md-12 col-lg-5 text-right" id="ads_slidebar_tablet">
                            <a target="_blank" href="{{\App\Option::getvalue('ads_slidebar')}}">
                                <img id="image-ads-sidebar" src="{{url(\App\Option::getImage('ads_slidebar'))}}" width="230px" height="400px" class="img-fluid" alt="Trình Duyệt COCOC">
                            </a>
                        </div>
                    @endif
                    {{-- @if (!Auth::user())
                        <div class="col-lg-5 visible-lg story-introduce">
                            <p>Truyện độc đáo của bạn có thể là truyện thành công lớn tiếp theo.
                                tieuthuyet.vn là nơi để các tác giả tài năng chưa được biết đến,
                                chưa có tên tuổi chia sẻ tác phẩm của mình và kết nối người hâm mộ.
                            </p>
                            <div class="story-button">
                                <a href="{{ url('/login') }}">Đăng nhập</a>
                                <a class="pull-right" href="{{ route('customer.create') }}">Tạo tài khoản</a>
                            </div>
                        </div>
                    @endif --}}
                </div>
            </div>
            {{-- Alert danger 18+ or problem --}}
            @if ($story->is18 != '')
                <div class="alert alert-danger" style="font-size: 20px;font-weight:bold">{{ $story->is18 }}</div>
            @endif
            @if(\App\Option::getImage('ads_slidebar'))
            <div class="col-sm-12 col-md-12" id="ads_slidebar_mobile" style="display: none">
                <a target="_blank" href="{{\App\Option::getvalue('ads_slidebar')}}">
                    <img id="image-ads-sidebar" src="{{url(\App\Option::getImage('ads_slidebar'))}}" width="230px" height="400px" class="img-fluid" alt="Trình Duyệt COCOC">
                </a>
            </div>
        @endif
            <!-- Nav Tabs Start -->
            <div class="container nav-tab-container" style="padding: 0; margin-top: 18px">
                <div class="col-lg-12 col-xs-12 nav-tab-custom">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item col-lg-3 col-xs-6">
                            <a class="nav-link active" id="tab1-tab" data-toggle="tab" href="#tab1" role="tab"
                                aria-controls="tab1" aria-selected="true">Tóm tắt truyện</a>
                        </li>
                        <li class="nav-item col-lg-3 col-xs-6">
                            <a class="nav-link" id="tab2-tab" data-toggle="tab" href="#tab2" role="tab"
                                aria-controls="tab2" aria-selected="false">Xem truyện</a>
                        </li>
                    </ul>
                    <div class="tab-content mt-2" id="myTabContent">
                        <div class="tab-pane fade active in desc" id="tab1" role="tabpanel"
                            aria-labelledby="tab1-tab">
                            <div class="desc-text desc-text-full" style="font-size: 16px" itemprop="description">
                                <?php
                                $html = nl2p($story->content, false);
                                
                                $cleanedContent = preg_replace('/<img[^>]+>/', '', $html);
                                ?>
                                {!! $cleanedContent !!}
                            </div>
                            {{-- <div class="showmore"> --}}
                            {{--    <a class="btn btn-default btn-xs showmore-btn" href="javascript:void(0)"
                                   title="Xem thêm">Xem
                                    thêm</a> --}}
                            {{-- </div> --}}
                        </div>
                        <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                            <div class="col-xs-12" id="list-chapter">
                                <div class="row">
                                    <?php
                                    $t = 1; $c = 1;
                                    $chapters = $story->chapters()->orderBy("id", "asc")->paginate(15, ['*'], 'page_chapter');
                                    foreach ($chapters as $chapter):
                                        $count = count($chapters);
                                        if ($t == 1) echo ' <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"><ul class="list-chapter">';
                                        ?>
                                    <li>
                                        <span class="glyphicon glyphicon-certificate"></span>
                                        <a href="{{ route('chapter.show', [$story->alias, $chapter->alias]) }}"
                                            title="{{ $story->name }} - {{ $chapter->subname }}: {{ $chapter->name }}">
                                            <span class="chapter-text"> {{ $chapter->subname }} - {{ $chapter->name }}
                                        </a>
                                    </li>
                                    <?php
                                        if ($t == 5 || $count == $c) {
                                            $t = 0;
                                            echo '</ul></div>';
                                        }
                                        $t++; $c++;
                                    endforeach;
                                    ?>
                                </div>

                                @include('name')

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Nav Tab End -->

            {{--            <div class="ads container">  --}}
            {{--                {!! \App\Option::getvalue('ads_story') !!} --}}
            {{--            </div>  --}}

            <!-- Comment Start -->
            <div class="container" style="padding:0;">
                <div class="title-list"></div>
                <div class="col-xs-12" style="padding:0">
                    <div class="title-list">
                        <h2><i class="glyphicon glyphicon-comment"></i> Nhận xét về <strong>{{ $story->name }}</strong>
                        </h2>
                    </div>
                    <div style="position: relative">
                        <button type="button" class="btn btn-info btn-xs" onclick="showtt('fb','tt')"
                            id="chapter_comment"><span class="glyphicon glyphicon-comment"></span>
                            Tieuthuyet.vn({{ $story->comment_story->count() }})</button>
                        <button type="button" class="btn btn-info btn-xs" onclick="showfb('fb','tt')"
                            id="chapter_comment"><span class="glyphicon glyphicon-comment"></span> Facebook</button>
                        <!-- <div id="fb" class="fb-comments"  data-href="http://tieuthuyet.vn" data-width="" data-numposts="5" style="display:none !important"></div> -->
                        {{-- Share FB , Zalo --}}
                        <span style="display: inline-block;position: absolute;top:15px" class="fb-share-button"
                            data-href="{{ route('story.show', $story->alias) }}" data-layout="button"
                            data-size="small"></span>
                        <span style="display: inline-block;position: absolute;top:7px;left:73px;width:100px"
                            class="zalo-share-button" data-href="" data-oaid="579745863508352884" data-layout="1"
                            data-color="blue" data-customize=false></span>
                        <div id="fb" class="fb-comments" data-href="{{ route('story.show', $story->alias) }}"
                            data-width="100%" data-numposts="5" data-colorscheme="light" fb-xfbml-state="rendered"
                            style="display:none !important"></div>
                        <div id="tt" class="form-group " style="margin: 7px;display:none !important">
                            <textarea style="height: 70px" class="form-control" id="noi_dung" name="noi_dung" required
                                placeholder="Nhận xét ít nhất 15 ký tự và tối đa 500 ký tự"></textarea>
                            <div style="margin: 12px 0; display: flex; align-items: center;">
                                <p style="margin: 0; flex-grow: 1;font-style: italic;font-weight: bold">Số ký tự: <span
                                        id="charCount">0</span></p>
                                <button id="binhluan" type="button" class="btn btn-primary">Bình luận</button>
                            </div>
                            <div class="list-comment">
                                @include('widgets.comment')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Comment End -->

            <!-- Stories For Cateogy Start -->
            <?php
            $getListForCategory = \App\Category::getListForCategory($story->id, \App\Story::getCategoryId($story->id)->categoryId);
            ?>
            @if (!$getListForCategory->isEmpty())
                <div class="container" style="padding: 0" id="truyen-slide">
                    <div class="list list-thumbnail col-xs-12" id="list-category">
                        <div class="title-list">
                            <h2>TRUYỆN CÙNG THỂ LOẠI</h2><span class="glyphicon glyphicon-menu-right"></span>
                        </div>
                        <div class="row">

                            @foreach ($getListForCategory as $storyForCategory)
                                <div class="col-xs-4 col-sm-4 col-md-2 list-category">
                                    <a href="{{ route('story.show', $storyForCategory->alias) }}"
                                        title="{{ $storyForCategory->name }}">

                                        @if ($storyForCategory->image && file_exists(public_path($storyForCategory->image)))
                                            <img src="{{ url($storyForCategory->image) }}"
                                                alt="{{ $storyForCategory->name }}" loading="lazy">
                                        @else
                                            <img src="{{ url('/images/no_signal/no-signal.jpg') }}"
                                                alt="{{ $storyForCategory->name }}" loading="lazy">
                                        @endif
                                        <div class="caption">
                                            <h3>{{ $storyForCategory->name }}</h3>
                                        </div>
                                    </a>
                                </div>
                            @endforeach

                        </div>

                        <div class="text-center">
                            @include('name_1', ['getListForCategory' => $getListForCategory])
                        </div>
                    </div>
                </div>
            @else
                <div class="container" style="padding: 0" id="truyen-slide">
                </div>
            @endif
            <!-- Stories For Cateogy End -->

            <!-- Truyện Full -->
            {!! \App\Story::getListNewStoriesImage() !!}

            <!-- Hot Strories Start -->
            {!! \App\Story::getListHotStories() !!}
            <!-- Hot Strories End -->

            <!-- Truyện Hot Nhất -->
            {!! \App\Story::getListStoriesForCategory(47) !!}

            <!-- Truyện Bá Đạo Tổng Tài -->
            {!! \App\Story::getListStoriesForCategory(25) !!}

            <!-- Truyện Trinh Thám -->
            {!! \App\Story::getListStoriesForCategory(12) !!}

            <!-- Truyện Tiên Hiệp -->
            {!! \App\Story::getListStoriesForCategory(28) !!}

            <!-- Truyện Xuyên Không -->
            {!! \App\Story::getListStoriesForCategory(31) !!}

            <!-- Truyện Kiếm Hiệp -->
            {!! \App\Story::getListStoriesForCategory(4) !!}

            <!-- Truyện LGBT -->
            {!! \App\Story::getListStoriesForCategory(22) !!}

            <!-- Truyện Kinh Dị -->
            {!! \App\Story::getListStoriesForCategory(24) !!}



        </div>
        {{--        <div class="visible-md-block visible-lg-block col-md-3 text-center col-truyen-side"> --}}
        {{--            @include('widgets.storiesByAuthor') --}}
        {{--            @include('widgets.hotstory') --}}
        {{--            --}}{{-- @include('widgets.ads') --}}
        {{--        </div> --}}
    </div>
@endsection

<script src="{{ asset('assets/js/script_show_story.js') }}"></script>
