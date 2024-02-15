<!-- navibar -->
<script>
function vietTruyen() {
    var r = confirm("Bạn muốn đăng ký trở thành biên soạn!");
    if (r == true) {
        $.ajax({
            type:'POST',
            url:'{{ route("dang-ky-bien-soan") }}',
            success:function(data) {
                if(data == 1)
                    window.location.replace("{{ route('dashboard.story.create') }}");
                else
                    alert("Có lỗi trong quá trình đăng ký, vui lòng kiểm tra lại!");
            },
            error:function(){
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

<style>
    .dropdown-menu-2>li>a {
        padding: 6px 2px !important;
        font-size: 15px !important;
    }
    .dropdown-menu-2 li {
        padding: 0 !important;
        margin: 0 !important;
    }

    .dropdown-menu-2 li a {
        display: block !important;
        padding: 10px !important; 
        margin: 0 !important;
    }

    .dropdown-menu-2 li a:hover {
        background-color: white !important;
    }
</style>

<div class="navbar navbar-default navbar-static-top" role="navigation" id="nav">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Hiện menu</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <h1>
                <a class="header-logo" href="/" title="Trang chủ">@yield('title')</a> 
            </h1>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="control nav navbar-nav ">
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-list"></i> Danh sách <i class="caret"></i></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ route('danhsach.truyenmoi') }}" title="Truyện mới cập nhật">Truyện mới cập nhật</a></li>
                        <li><a href="{{ route('danhsach.truyenhot') }}" title="Truyện Hot">Truyện Hot</a></li>
                        <li><a href="{{ route('danhsach.truyenfull') }}" title="Truyện Full">Truyện Full</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-list"></span> Thể loại <span class="caret"></span></a>
                     <ul class="dropdown-menu dropdown-menu-2" role="menu"
                        style="overflow: auto;width:260px!important;height: 262px!important;">
                        <?php
                        $categories = \App\Category::select('id', 'name', 'alias', 'parent_id')->orderBy('id', 'DESC')->get();
                        ?>
                        @foreach($categories as $category)
                            <li class="col-md-6">
                                <a href="{{ route('category.list.index', ['alias' => $category->alias]) }}">
                                    {{ $category->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>

                <li class="dropdown">
                    @if(Auth::user())
                    <li class="dropdown user user-menu" style="width: 30%">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            @if(Auth::user()->avatar)
                            <img src="{!! Auth::user()->avatar !!}" class="" alt="User Image" style="width: 19%">
                            @else
                            <img src="http://www.gravatar.com/avatar/{!! md5( Auth::user()->email ) !!}?s=160&d=mp" class="" alt="User Image" style="width: 19%">
                            @endif
                            <span >{!! Auth::user()->name !!}</span>
                        </a>
                        <ul class="dropdown-menu user-info-header">
                            <!-- User image -->
                            <li class="user-header">
                            <p>
                                <a href="/dashboard">
                                    @if(Auth::user()->avatar)
                                    <img src="{!! Auth::user()->avatar !!}" class="img-circle img-thumbnail" style="width: 50%" alt="User Image">
                                    @else
                                        <img src="http://www.gravatar.com/avatar/{!! md5( Auth::user()->email ) !!}?s=160&d=mp" class="img-circle img-thumbnail" style="width: 50%" alt="User Image">
                                    @endif
                                </a>
                            </p>

                            <p>
                            <a href="/dashboard">{!! Auth::user()->name !!}</a> </br>
                                <small>Hôm nay là {!! date('d/m/Y') !!}</small>
                            </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{route('dashboard.changepassword')}}" class="btn btn-default btn-flat">Đổi mật khẩu</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ url('logout') }}" class="btn btn-default btn-flat">Thoát</a>
                            </div>
                            </li>
                        </ul>
                    </li>
                    @else
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i> Tài khoản <i class="caret"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url("/login") }}"><span class="glyphicon glyphicon-user"></span> Đăng nhập</a>
                                <a href="{{ url("/register") }}"><span class="glyphicon glyphicon-cog"></span> Đăng ký</a>
                            </li>
                        </ul>
                    @endif
                
                </li>
                <li>
                    @if(Auth::user() && Auth::user()->level == 0)
                        <a class="hidden-xs" onclick="vietTruyen()"><i class="glyphicon glyphicon-open"></i> Viết truyện</a>
                    @elseif(Auth::user() && Auth::user()->level == 1)
                        <a class="hidden-xs" href="{{ route('dashboard.story.create') }}"><i class="glyphicon glyphicon-open"></i> Viết truyện</a>
                    @elseif(Auth::user() && Auth::user()->level == 1)
                        <a class="hidden-xs" href="/dashboard/leech"><i class="glyphicon glyphicon-open"></i> Viết truyện</a>
                    @else
                        <a class="hidden-xs" href="/dashboard"><i class="glyphicon glyphicon-open"></i> Viết truyện</a>
                    @endif
                </li>
            </ul>

</div>
<!--/.nav-collapse -->
</div>
<div class="navbar-breadcrumb">
    <div class="container breadcrumb-container">
        @yield('breadcrumb')


    </div>
</div>
</div><!-- navibar -->
