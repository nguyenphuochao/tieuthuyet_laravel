<link rel="stylesheet" href="{{ asset('assets/css/style_navbar.css') }}">

<!-- navibar -->
<script>
    function vietTruyen() {
        var r = confirm("Bạn muốn đăng ký trở thành biên soạn!");
        if (r == true) {
            $.ajax({
                type: 'POST',
                url: '{{ route("dang-ky-bien-soan") }}',
                success: function (data) {
                    if (data == 1)
                        window.location.replace("{{ route('dashboard.story.create') }}");
                    else
                        alert("Có lỗi trong quá trình đăng ký, vui lòng kiểm tra lại!");
                },
                error: function () {
                    alert("Có lỗi trong quá trình đăng ký, vui lòng kiểm tra lại!");
                }
            });
        }
    }
</script>

<script type="application/ld+json">
    {
        "@context": "http://schema.org",
        "@type": "WebSite","url": "https://tieuthuyet.vn/",
        "potentialAction": 
        {
            "@type": "SearchAction",
            "target": "https://tieuthuyet.vn/search?q={q}",
            "query-input": "required name=q"
        }
    }
</script>

<!-- Navbar New Start -->
<div class="navbar navbar-default navbar-static-top" role="navigation" id="nav">
    <div class="container">
        <div class="navbar-header" style="display: flex">
            <!-- Add class navbar-toggle-sidebar and data-target -->
            <button type="button" class="navbar-toggle navbar-toggle-sidebar" data-toggle="collapse"
                    data-target=".navbar-collapse">
                <span class="sr-only">Hiện menu</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <h1 class="navbar-logo">
                <a class="header-logo" href="/" title="Trang chủ">@yield('title')</a>
            </h1>
            <div class="visible-sm visible-xs pull-right navbar-toggle-account">
                @if(Auth::user())
                    <div class="rounded-button">
                        @if(Auth::user()->avatar)
                            <img src="{!! Auth::user()->avatar !!}" class="rounded-img" alt="User Image">
                        @else
                            <img src="http://www.gravatar.com/avatar/{!! md5( Auth::user()->email ) !!}?s=160&d=mp"
                                 class="rounded-img" alt="User Image">
                        @endif
                    </div>
                @else
                    <button class="rounded-button"><a href="{{ url("/login") }}"><i
                                    class="glyphicon glyphicon-user"></i></a></button>
                @endif
            </div>
        </div>
        <div class="navbar-collapse collapse navbar-right">
                <ul class="control nav navbar-nav ">
                    <li>
                        <a style="color:white" href="{{route('review')}}"><i class="fa-solid fa-eye"></i> Review truyện</a>
                    </li>
                    {{-- <li class="dropdown">
                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-book"></i> Danh sách <i class="caret"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('danhsach.truyenhotnhat') }}" title="Truyện Full"><i class="glyphicon glyphicon-heart"></i> Truyện HOT nhất</a></li>
                            <li><a href="{{ route('danhsach.truyenmoi') }}" title="Truyện mới cập nhật"><i class="glyphicon glyphicon-refresh"></i> Tiểu thuyết mới cập nhật</a></li>
                            <li><a href="{{ route('danhsach.truyenhot') }}" title="Truyện Hot"><i class="glyphicon glyphicon-eye-open"></i> Tiểu thuyết đọc nhiều</a></li>
                            <li><a href="{{ route('danhsach.truyenfull') }}" title="Truyện Full"><i class="glyphicon glyphicon-ok"></i> Truyện full</a></li>
                        </ul>
                    </li> --}}
                    <li class="dropdown">
                        <a style="color: white" href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-list"></span> Thể loại <span class="caret"></span></a>
                        <ul class="dropdown-menu dropdown-menu-2" role="menu"
                            style="overflow: auto;width:350px!important;height: 340px!important;">
                            <?php
                            $categories = \App\Category::select('id', 'name', 'alias', 'parent_id')->orderBy('id', 'DESC')->get();
                            ?>
                            @foreach($categories as $category)
                                <li class="col-md-6">
                                    <a href="{{ route('category.list.index', ['alias' => $category->alias]) }}">
                                        {{ $category->name }}</a>
                                </li>
                            @endforeach
                                <li class="col-md-6">
                                    <a href="{{ route('danhsach.truyenhotnhat') }}" title="Truyện Full">Truyện HOT nhất</a>
                                </li>
                                <li class="col-md-6">
                                    <a href="{{ route('danhsach.truyenmoi') }}" title="Truyện mới cập nhật">Truyện mới nhất</a>
                                </li>
                                <li class="col-md-6">
                                    <a href="{{ route('danhsach.truyenhot') }}" title="Truyện Hot">Tiểu thuyết đọc nhiều</a>
                                </li>
                                <li class="col-md-6">
                                    <a href="{{ route('danhsach.truyenfull') }}" title="Truyện Full">Truyện full</a>
                                </li>
                                
                        </ul>
                    </li>
                   
                    @if(Auth::user())
                        <li class="dropdown user user-menu" style="width: 30%">
                            <a style="color: white" href="#" class="dropdown-toggle" data-toggle="dropdown">
                                @if(Auth::user()->avatar)
                                    <img src="{!! Auth::user()->avatar !!}" class="" alt="User Image"
                                         style="width: 19%">
                                @else
                                    <img src="http://www.gravatar.com/avatar/{!! md5( Auth::user()->email ) !!}?s=160&d=mp"
                                         class="" alt="User Image" style="width: 19%">
                                @endif
                                <span>{!! Auth::user()->name !!} <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu user-info-header">
                                <!-- User image -->
                                <li class="user-header">
                                    <p>
                                        <a href="/dashboard">
                                            @if(Auth::user()->avatar)
                                                <img src="{!! Auth::user()->avatar !!}" class="img-circle img-thumbnail"
                                                     style="width: 50%" alt="User Image">
                                            @else
                                                <img src="http://www.gravatar.com/avatar/{!! md5( Auth::user()->email ) !!}?s=160&d=mp"
                                                     class="img-circle img-thumbnail" style="width: 50%"
                                                     alt="User Image">
                                            @endif
                                        </a>
                                    </p>

                                    <p>
                                        <a href="/dashboard">{!! Auth::user()->name !!} </a> </br>
                                        <small>Hôm nay là {!! date('d/m/Y') !!}</small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="col-lg-12">
                                        @if(Auth::user() && Auth::user()->level == 0)
                                            <a class="hidden-xs btn btn-default btn-flat" onclick="vietTruyen()"><i
                                                        class="glyphicon glyphicon-open"></i> Quản lý & Đăng truyện</a>
                                        @elseif(Auth::user() && Auth::user()->level == 1)
                                            <a class="hidden-xs" href="{{ route('dashboard.story.create') }}"><i
                                                        class="glyphicon glyphicon-open"></i> Quản lý & Đăng truyện</a>
                                        @elseif(Auth::user() && Auth::user()->level == 1)
                                            <a class="hidden-xs btn btn-default btn-flat" href="/dashboard/leech"><i
                                                        class="glyphicon glyphicon-open"></i> Quản lý & Đăng truyện</a>
                                        @else
                                            <a class="hidden-xs btn btn-default btn-flat" href="/dashboard"><i
                                                        class="glyphicon glyphicon-open"></i> Quản lý & Đăng truyện</a>
                                        @endif
                                    </div>
                                    <div class="col-lg-12">
                                        <a href="{{route('dashboard.changepassword')}}"
                                           class="btn btn-default btn-flat"><i class="glyphicon glyphicon-edit"></i> Đổi
                                            mật khẩu</a>
                                    </div>
                                    <div class="col-lg-12">
                                        <a href="{{ url('logout') }}" class="btn btn-default btn-flat"><i
                                                    class="glyphicon glyphicon-off"></i> Đăng xuất</a>
                                    </div>
                                </li>

                            </ul>
                        </li>
                    @else
                        <li class="dropdown user user-menu">
                            <a style="color: white" href="{{ url("/login") }}"><i class="glyphicon glyphicon-user"></i> Tài khoản </a>
                        </li>
                    @endif
                </ul>
            </div>
    </div>
    <div class="navbar-breadcrumb">
        <div class="container breadcrumb-container">
            @yield('breadcrumb')
        </div>
    </div>
</div>

<!-- Sidebar Start -->
<div class="sidebar">
    <!-- Add button close -->
    <div class="sidebar-close">Đóng x</div>

    <!-- The content of the sidebar here -->
    <div class="sidebar-content">
        <hr>
        <div class="row">
            <form class="col-lg-12 col-xs-12" action="{{ route('danhsach.search') }}" role="search">
                <div class="input-group search-holder">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span>
                        </button>
                    </div>
                    <input class="form-control search-input" id="search-input" type="search" name="q"
                           placeholder="Nhập từ khóa Tìm Kiếm Truyện"
                           value="{{ old('q') }}" required="">

                </div>
                <div class="list-group list-search-res hide"></div>
            </form>
        </div>
        <hr>
        <!-- Insert the content of the sidebar here -->
        <div class="row">
            <div class="col-lg-12 list-story-sidebar" style="font-size: 11px">
                {{-- Review --}}
                <a style="font-size:15px;margin-top: -15px;margin-bottom: 8px;display:block;margin-bottom: 0;padding: 5px 10px;background-color: #2c7aaa;color: #FFFFFF;font-size: 15px;" 
                href="{{route('review')}}">REVIEW TRUYỆN</a>
                {{-- <p>DANH SÁCH</p>
                <ul class="list-unstyled">
                    <li><a href="{{ route('danhsach.truyenhotnhat') }}" title="Truyện Full"><i class="glyphicon glyphicon-heart"></i> Truyện HOT nhất</a></li>
                    <li><a href="{{ route('danhsach.truyenmoi') }}" title="Truyện mới cập nhật"><i class="glyphicon glyphicon-refresh"></i> Tiểu thuyết mới cập nhật</a></li>
                    <li><a href="{{ route('danhsach.truyenhot') }}" title="Truyện Hot"><i class="glyphicon glyphicon-eye-open"></i> Tiểu thuyết đọc nhiều</a></li>
                    <li><a href="{{ route('danhsach.truyenfull') }}" title="Truyện Full"><i class="glyphicon glyphicon-ok"></i> Tiểu thuyết hoàn thành</a></li>
                </ul> --}}
                <p style="margin-top: 5px">THỂ LOẠI</p>
                <ul class="list-unstyled" style="display:flex;flex-wrap:wrap">
                    <?php
                    $categories = \App\Category::select('id', 'name', 'alias', 'parent_id')->orderBy('id', 'DESC')->get();
                    ?>
                    @foreach($categories as $category)
                        <li style="width: 50%">
                            <a href="{{ route('category.list.index', ['alias' => $category->alias]) }}">
                                <i class="fa fa-tags"></i> {{ $category->name }}</a>
                        </li>
                    @endforeach
                    <li style="width: 50%">
                        <a href="{{ route('danhsach.truyenhotnhat') }}" title="Truyện Full"><i class="glyphicon glyphicon-heart"></i> Truyện HOT nhất</a>
                    </li>
                    <li style="width: 50%">
                        <a href="{{ route('danhsach.truyenmoi') }}" title="Truyện mới cập nhật"><i class="glyphicon glyphicon-refresh"></i> Truyện mới nhất</a>
                    </li>
                    <li style="width: 50%">
                        <a href="{{ route('danhsach.truyenhot') }}" title="Truyện Hot"><i class="glyphicon glyphicon-eye-open"></i> Tiểu thuyết đọc nhiều</a>
                    </li>
                    <li style="width: 50%">
                        <a href="{{ route('danhsach.truyenfull') }}" title="Truyện Full"><i class="glyphicon glyphicon-ok"></i> Truyện Full</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Sidebar End -->

<!-- Sidebar Account Start -->
@if(Auth::user())
    <div class="sidebar-account">
        <!-- Add button close -->
        <div class="sidebar-account-close">Đóng x</div>

        <!-- The content of the sidebar here -->
        <div class="sidebar-account-content">

            <!-- Insert the content of the sidebar here -->
            <div class="row" style="justify-content: flex-start;">
                <hr>
                <div class="col-lg-12 image-account" style="display: flex">
                    @if(Auth::user()->avatar)
                        <img src="{!! Auth::user()->avatar !!}" class="" alt="User Image">
                    @else
                        <img src="http://www.gravatar.com/avatar/{!! md5( Auth::user()->email ) !!}?s=160&d=mp"
                             class="" alt="User Image">
                    @endif

                    <div style="padding-left: 5px">
                        {{ Auth::user()->name }} </br>
                        <small>Hôm nay là {!! date('d/m/Y') !!}</small>
                    </div>
                </div>
                <hr>
                <div class="col-lg-12">
                    @if(Auth::user() && Auth::user()->level == 0)
                        <a onclick="vietTruyen()"><i
                                    class="glyphicon glyphicon-open"></i> Quản lý & Đăng truyện</a>
                    @elseif(Auth::user() && Auth::user()->level == 1)
                        <a href="{{ route('dashboard.story.create') }}"><i
                                    class="glyphicon glyphicon-open"></i> Quản lý & Đăng truyện</a>
                    @elseif(Auth::user() && Auth::user()->level == 1)
                        <a class="hidden-xs btn btn-default btn-flat" href="/dashboard/leech"><i
                                    class="glyphicon glyphicon-open"></i> Quản lý & Đăng truyện</a>
                    @else
                        <a href="/dashboard"><i
                                    class="glyphicon glyphicon-open"></i> Quản lý & Đăng truyện</a>
                    @endif
                </div>
                <hr>
                <div class="col-lg-12">
                    <a href="{{route('dashboard.changepassword')}}"><i class="glyphicon glyphicon-edit"></i> Đổi mật
                        khẩu</a>
                </div>
                <hr>
                <div class="col-lg-12">
                    <a href="{{ url('logout') }}"><i class="glyphicon glyphicon-off"></i> Đăng xuất</a>
                </div>
            </div>

        </div>
    </div>
@endif
<!-- Sidebar Account End -->

<!-- Navbar New End -->

<script src="{{ asset('assets/js/navbar_script.js') }}"></script>
