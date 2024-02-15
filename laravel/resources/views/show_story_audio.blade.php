@extends('layouts.app')
@section('title', $story->name . ' | TieuThuyet.VN')
@section('seo')
    <meta charset="UTF-8">
    <meta name="keywords" content="{{\App\Option::getvalue('keyword')}}" />
    <meta name="description" content="{!! substr(tanvo($story->content),0,250) !!}" />
    <meta name='ROBOTS' content='INDEX, FOLLOW' />
    <meta property="og:type" content="book" />
    <meta property="og:url" content="https://tieuthuyet.vn/{{$story->alias}}" />
    <meta property="og:site_name" content="{{$story->name}}" />
    <meta property="og:title" content="{{$story->name}} | TieuThuyet.VN" />
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="1019" />
    <meta property="og:image:height" content="609" />
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:image" content="{{ url($story->image) }}" />
    <meta property="og:image:alt" content="Ti&#7875;u Thuy&#7871;t">
    <meta property="og:description" content="{!! substr(tanvo($story->content),0,325) !!}" />
    <link rel="canonical" href="https://tieuthuyet.vn/{{$story->alias}}" />
    <link href="https://tieuthuyet.vn/{{$story->alias}}" hreflang="vi-vn" rel="alternate" />
    <link data-page-subject="true" href="{{ url($story->image) }}" rel="image_src" />
    <link rel="stylesheet" href="{{ asset('assets/css/style_show_story.css') }}">
    <script src="https://sp.zalo.me/plugins/sdk.js"></script>
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
            "name": "{{$story->user_id}}"
        },
        "description": "{!! substr(tanvo($story->content),0,250) !!}",
        "about": [{!!  get_catory($story->categories) !!}]
    } 
    </script>
@endsection
@section('breadcrumb', showBreadcrumb($breadcrumb))

@section('content')
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v10.0&appId=764582287768925&autoLogAppEvents=1" nonce="QKJ7SiB8"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            showtt('fb', 'tt');
            
            $('#noi_dung').keypress(function(event) {
                if (event.keyCode == 13 || event.which == 13) {
                    event.preventDefault();
                    if(document.getElementById("noi_dung").value != '')
                    {
                        binhLuan(document.getElementById("noi_dung").value);
                    }
                }
            });
            function binhLuan($nd){
                $.ajax({
                    type:'POST',
                    url:'{{ route("xu-ly-binh-luan") }}',
                    data:
                    {
                    _token : '<?php echo csrf_token() ?>',
                    story_id: {{$story->id}},
                    noi_dung: $nd
                    },
                    success:function(data) {
                        $(".list-comment").html(data);
                        $('#noi_dung').val("");
                    },
                    error:function(){
                        alert("&#272;&#259;ng nh&#7853;p &#273;&#7875; bình lu&#7853;n")
                    }
                });
            }

            function laydl(page)
            {
                $.ajax({
                    url: '/get-comment-story?page='+page,
                    method:"GET",
                    data:{
                        story_id: {{$story->id}},
                        _token : '<?php echo csrf_token() ?>'
                    },
                    success:function(data){
                        $(".list-comment").html(data);
                    }
                });
            }

            $(document).on('click','.comment-paga .pagination a', function(e){
                e.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                laydl(page);
            });

            $("#binhluan").click(function (){
                if(document.getElementById("noi_dung").value != '')
                {
                    binhLuan(document.getElementById("noi_dung").value);
                }
            });
        });

        function showfb(fb,tt) {
				var srcElement = document.getElementById(fb);
                var tieuthuyet = document.getElementById(tt);
                
				if (srcElement != null) {
					if (srcElement.style.display == "block") {
						srcElement.style.display = 'none';
                        
					}
					else {
						srcElement.style.display = 'block';
                        tieuthuyet.style.display = 'none';
					}
					return false;
				}
			}

            function showtt(fb,tt) {
				var srcElement = document.getElementById(fb);
                var tieuthuyet = document.getElementById(tt);
				if (tieuthuyet != null) {
					if (tieuthuyet.style.display == "block") {
						tieuthuyet.style.display = 'none';
					}
					else {
						tieuthuyet.style.display = 'block';
                        srcElement.style.display = 'none';
					}
					return false;
				}
			}
    </script>
    <div class="container" id="truyen">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="col-xs-12 col-info-desc" itemscope="" itemtype="http://schema.org/Book">
                <div class="title-list"></div>
                <div class="col-xs-12 col-lg-12 info-holder flexbox">
                    <div class="book12">
                        @if ($story->image && file_exists(public_path($story->image)))
                            <img src="{{ url($story->image) }}" alt="{{ $story->name }}" itemprop="image"
                                 width="160" height="206">
                        @else
                            <img src="{{ url('/images/no_signal/no-signal.jpg') }}" alt="{{ $story->name }}"
                                 itemprop="image" width="160" height="205">
                        @endif
                    </div>

                    <div class="info col-lg-7 col-md-12 col-sm-12 col-xs-12">
                        <div class="story-name">
                            <h3 class="title"
                                itemprop="name">{{ $story->name }}</h3>
                        </div>

                        <div class="genres">
                            <span class="st-1">
                             {!!  the_category($story->categories) !!}
                            </span>
                            <div style="margin-top: 8px" class="fb-share-button"
                                 data-href="{{ route('story.show', $story->alias) }}" data-layout="button"
                                 data-size="small">
                            </div>
                            <div class="zalo-share-button"
                                 data-href=""
                                 data-oaid="579745863508352884"
                                 data-layout="1" data-color="blue" data-customize=false>
                            </div>
                            <!--<div class="star-rating">-->
                            <!--    <p>&#272;ánh giá: </p>-->
                            <!--    <input type="radio" name="rating" id="star1"><label for="star1"></label>-->
                            <!--    <input type="radio" name="rating" id="star2"><label for="star2"></label>-->
                            <!--    <input type="radio" name="rating" id="star3"><label for="star3"></label>-->
                            <!--    <input type="radio" name="rating" id="star4"><label for="star4"></label>-->
                            <!--    <input type="radio" name="rating" id="star5"><label for="star5"></label>-->
                            <!--</div>-->
                        </div>

                        <div class="statistics">
                            <p>Tác gi&#7843;: <strong>{!! the_author($story->authors) !!}</strong>

                            <p><strong>{{ count($story->chapters()->get()) }}</strong> ch&#432;&#417;ng</p>

                            <p><strong>{!! number_format($story->view) !!}</strong> l&#432;&#7907;t xem</p>

                        </div>

                        <div class="col-lg-12 col-xs-12 story-button">
                            <a href="https://www.facebook.com/thongtinxuphat">Di&#7877;n &#273;àn truy&#7879;n</a>
                            <a href="{{ route('danhsach.truyenmoi') }}">Hôm nay &#273;&#7885;c gì?</a>
                            <a href="{{ route('danhsach.truyenhotnhat') }}">Truy&#7879;n &#273;ang HOT</a>
                        </div>
                    </div>
                    @if(!Auth::user())
                        <div class="col-lg-5 visible-lg story-introduce">
                            <p>Truy&#7879;n &#273;&#7897;c &#273;áo c&#7911;a b&#7841;n có th&#7875; là truy&#7879;n thành công l&#7899;n ti&#7871;p theo.
                                tieuthuyet.vn là n&#417;i &#273;&#7875; các tác gi&#7843; tài n&#259;ng ch&#432;a &#273;&#432;&#7907;c bi&#7871;t &#273;&#7871;n,
                                ch&#432;a có tên tu&#7893;i chia s&#7867; tác ph&#7849;m c&#7911;a mình và k&#7871;t n&#7889;i ng&#432;&#7901;i hâm m&#7897;.
                            </p>
                            <div class="story-button">
                                <a href="{{ url("/login") }}">&#272;&#259;ng nh&#7853;p</a>
                                <a class="pull-right" href="{{ route('customer.create') }}">T&#7841;o tài kho&#7843;n</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Nav Tabs Start -->
            <div class="container nav-tab-container" style="padding: 0; margin-top: 18px">
                <div class="col-lg-12 col-xs-12 nav-tab-custom">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item col-lg-3 col-xs-6">
                            <a class="nav-link active" id="tab1-tab" data-toggle="tab" href="#tab1" role="tab"
                               aria-controls="tab1" aria-selected="true">Tóm t&#7855;t truy&#7879;n</a>
                        </li>
                        <li class="nav-item col-lg-3 col-xs-6">
                            <a class="nav-link" id="tab2-tab" data-toggle="tab" href="#tab2" role="tab"
                               aria-controls="tab2"
                               aria-selected="false">Xem truy&#7879;n</a>
                        </li>
                    </ul>
                    <div class="tab-content mt-2" id="myTabContent">
                        <div class="tab-pane fade active in desc" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                            <div class="desc-text desc-text-full" style="font-size: 16px" itemprop="description">
                                <?php
                                $html = nl2p($story->content, false);

                                $cleanedContent = preg_replace('/<img[^>]+>/', '', $html);
                                ?>
                                {!! $cleanedContent !!}
                            </div>
                            {{-- <div class="showmore">--}}
                            {{--    <a class="btn btn-default btn-xs showmore-btn" href="javascript:void(0)"
                                   title="Xem thêm">Xem
                                    thêm</a>--}}
                            {{--</div>--}}
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
                    <div class="title-list"><h2><i class="glyphicon glyphicon-comment"></i> Nh&#7853;n xét v&#7873; <strong>{{ $story->name }}</strong></h2></div>
                    <div class="">
                        <button type="button" class="btn btn-info" onclick="showtt('fb','tt')" id="chapter_comment"><span class="glyphicon glyphicon-comment"></span> Tieuthuyet.vn({{$story->comment_story->count()}})</button>
                        <button type="button" class="btn btn-info" onclick="showfb('fb','tt')" id="chapter_comment"><span class="glyphicon glyphicon-comment"></span> Facebook</button>
                        <!-- <div id="fb" class="fb-comments"  data-href="http://tieuthuyet.vn" data-width="" data-numposts="5" style="display:none !important"></div> -->
                        <div id="fb" class="fb-comments" data-href="{{ route('story.show', $story->alias) }}" data-width="100%" data-numposts="5" data-colorscheme="light" fb-xfbml-state="rendered" style="display:none !important"></div>
                        <div id="tt" class="form-group " style="margin: 7px;display:none !important">
                            <textarea style="height: 70px" class="form-control" id="noi_dung" name="noi_dung" required placeholder="Nh&#7853;n xét ít nh&#7845;t 15 ký t&#7921; và t&#7889;i &#273;a 500 ký t&#7921;"></textarea>
                            <div style="margin: 12px 0; display: flex; align-items: center;">
                                <p style="margin: 0; flex-grow: 1;font-style: italic;font-weight: bold">S&#7889; ký t&#7921;: <span id="charCount">0</span></p>
                                <button id="binhluan" type="button" class="btn btn-primary">Bình lu&#7853;n</button>
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
            $getListForCategory = \App\Category::getListForCategory($story->id,\App\Story::getCategoryId($story->id)->categoryId);
            ?>
        @if(!$getListForCategory->isEmpty())
            <div class="container" style="padding: 0" id="truyen-slide">
                <div class="list list-thumbnail col-xs-12" id="list-category">
                    <div class="title-list"><h2>TRUY&#7878;N CÙNG TH&#7874; LO&#7840;I</h2><span
                                class="glyphicon glyphicon-menu-right"></span></div>
                    <div class="row">

                        @foreach($getListForCategory as $storyForCategory)

                            <div class="col-xs-4 col-sm-4 col-md-2 list-category">
                                <a href="{{route('story.show', $storyForCategory->alias)}}"
                                   title="{{$storyForCategory->name}}">

                                    @if ($storyForCategory->image && file_exists(public_path($storyForCategory->image)))
                                        <img src="{{ url($storyForCategory->image) }}" alt="{{$storyForCategory->name}}"
                                             loading="lazy">
                                    @else
                                        <img src="{{ url('/images/no_signal/no-signal.jpg') }}"
                                             alt="{{$storyForCategory->name}}"
                                             loading="lazy">
                                    @endif
                                    <div class="caption">
                                        <h3>{{$storyForCategory->name}}</h3>
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
        
        <!-- Truy&#7879;n Full -->
        {!! \App\Story::getListNewStoriesImage() !!}
        
        <!-- Hot Strories Start -->
                {!! \App\Story::getListHotStories() !!}
        <!-- Hot Strories End -->
        
        <!-- Truy&#7879;n Hot Nh&#7845;t -->
        {!! \App\Story::getListStoriesForCategory(47) !!}
    
        <!-- Truy&#7879;n Bá &#272;&#7841;o T&#7893;ng Tài -->
        {!! \App\Story::getListStoriesForCategory(25) !!}

        <!-- Truy&#7879;n Trinh Thám -->
        {!! \App\Story::getListStoriesForCategory(12) !!}
    
        <!-- Truy&#7879;n Tiên Hi&#7879;p -->
        {!! \App\Story::getListStoriesForCategory(28) !!}
    
        <!-- Truy&#7879;n Xuyên Không -->
        {!! \App\Story::getListStoriesForCategory(31) !!}
    
        <!-- Truy&#7879;n Ki&#7871;m Hi&#7879;p -->
        {!! \App\Story::getListStoriesForCategory(4) !!}
    
        <!-- Truy&#7879;n LGBT -->
        {!! \App\Story::getListStoriesForCategory(22) !!}
    
        <!-- Truy&#7879;n Kinh D&#7883; -->
        {!! \App\Story::getListStoriesForCategory(24) !!}
        
        
        
        </div>
{{--        <div class="visible-md-block visible-lg-block col-md-3 text-center col-truyen-side">--}}
{{--            @include('widgets.storiesByAuthor')--}}
{{--            @include('widgets.hotstory')--}}
{{--            --}}{{--@include('widgets.ads')--}}
{{--        </div>--}}
    </div>
@endsection

<script src="{{ asset('assets/js/script_show_story.js') }}"></script>
