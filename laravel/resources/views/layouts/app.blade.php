<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="apple-mobile-web-app-status-bar-style" content="#2c7aaa" />
    <meta name="apple-mobile-web-app-title" content="Tiểu Thuyết" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo/logo.ico') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
        href="https://tieuthuyet.vn/fav/apple-touch-icon-144x144.png" />
    <link rel="icon" type="image/png" href="{{ asset('images/logo/logo_196x196.png') }}" sizes="196x196" />
    <link rel="icon" type="image/png" href="{{ asset('images/logo/logo_96x96.png') }}" sizes="96x96" />
    <link rel="icon" type="image/png" href="{{ asset('images/logo/logo_32x32.png') }}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{ asset('images/logo/logo_16x16.png') }}" sizes="16x16" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="fav/apple-touch-icon-144x144.png" />
    <meta name = "theme-color" content = "#2c7aaa" />
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    @yield('seo')
    {!! \App\Option::getvalue('pageheader') !!}
    <meta name="google-site-verification" content="{!! \App\Option::getvalue('google_veri') !!}" />
    <meta name="facebook-domain-verification" content="8c3c33i5c2r48f3pwjr48uv7wd5ty7" />
    <meta property="fb:admins" content="{{ \App\Option::getvalue('fb_admin_id') }}" />
    <meta property="fb:app_id" content="{{ \App\Option::getvalue('fb_app') }}" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Google Tag Manager -->
    <!-- <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-5MPR87P');
    </script> -->
    <!-- End Google Tag Manager -->
    <script src="https://apis.google.com/js/platform.js" async defer>
        {
            lang: 'vi'
        }
    </script>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2769146024033953"
        crossorigin="anonymous"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-EE037EGTQG"></script>
    {{-- SweetAlert2 --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.min.css" integrity="sha256-ZCK10swXv9CN059AmZf9UzWpJS34XvilDMJ79K+WOgc=" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js" integrity="sha256-IW9RTty6djbi3+dyypxajC14pE6ZrP53DLfY9w40Xn4=" crossorigin="anonymous"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-EE037EGTQG');
    </script>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-11316483462"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'AW-11316483462');
    </script>

    <style>
        .footer-category p {
            font-size: 12px;
            font-weight: bold;
            color: #000000;
        }

        .footer-category a {
            background-color: #34323a;
            color: #FFFFFF;
            border-radius: 10px
        }

        .footer-category a:hover {
            color: #CE5A67;
        }

        .policy a {
            font-size: 12px;
            font-weight: bold;
        }

        @media screen and (max-width: 393px) {
            .policy a {
                font-size: 13px;
            }
        }
    </style>

</head>

<body>
    <script>
        $(document).ready(function() {
            $(".fade-loop").addClass("active");
        });
    </script>

    <!-- Google Tag Manager (noscript) -->
    <!-- <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5MPR87P"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript> -->
    <!-- End Google Tag Manager (noscript) -->
    {{-- Facebook --}}
    <div id="fb-root"></div>

    <div class="wrapper" id="backOnTop">
        @include('partials.navibar_new')

        @include('partials.searchbar')

        <div class="ads container">
            {!! \App\Option::getvalue('ads_header') !!}
        </div>

        @yield('content')

        <!-- Footer -->
        <div class="clearfix"></div>
        <!--<div class="ads container">-->
        <!--    {!! \App\Option::getvalue('ads_footer') !!}-->
        <!--    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>-->
        <!--    <ins class="adsbygoogle"-->
        <!--        style="display:block"-->
        <!--        data-ad-format="fluid"-->
        <!--        data-ad-layout-key="-gv-4+19-50+7o"-->
        <!--        data-ad-client="ca-pub-6827872033566527"-->
        <!--        data-ad-slot="7723761327"></ins>-->
        <!--    <script>
            -- >
            <
            !--(adsbygoogle = window.adsbygoogle || []).push({});
            -- >
            <
            !--
        </script>-->
        <!--</div>-->

        <div class="footer">
            <div class="container">
                <div class="row">
                    <div style="margin-top: 16px" class="logo-footer navbar-header col-12 col-md-12 col-lg-2 text-left">
                        <h1>
                            <a href="/" class="header-logo"></a>
                        </h1>
                    </div>

                    <div class="col-xs-12 col-md-12 col-lg-7 text-center footer-category" style="margin-top: 14px;">
                        <?php
                        $categories = \App\Category::select('id', 'name', 'alias', 'parent_id')
                            ->orderBy('id', 'DESC')
                            ->get();
                        ?>
                        @foreach ($categories as $category)
                            <p class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <a class="category-link"
                                    href="{{ route('category.list.index', ['alias' => $category->alias]) }}">
                                    {{ $category->name }}</a>
                            </p>
                        @endforeach
                    </div>

                    <div class="contact col-xs-12 col-lg-3 col-md-12"
                        style="margin-top: 12px;display: flex;justify-content: flex-start">
                        <div class="text-left">
                            <h1
                                style="padding-bottom:8px;font-size: 14px;font-weight: bold; color: white; margin: 0;">
                                KẾT NỐI VỚI CHÚNG TÔI</h1>
                            <p style="font-size: 12px;font-weight: bold; color: white; margin-bottom:8px;">Email:
                                brightstar24h@gmail.com</p>
                            <div class="fade-loop" style="font-size: 12px;font-weight: bold; color: white;">
                                <a style="color: white" href="https://www.facebook.com/tieuthuyet.vn"><i class="fa-brands fa-facebook"></i>
                                    Tiểu Thuyết</a>
                                <br>
                                <a style="color: white" href="https://www.tiktok.com/@tieuthuyet.vn?_t=8hLkTe0hlI7&_r=1"><i
                                        class="fa-brands fa-tiktok"></i> Mê Tiểu Thuyêt</a>
                            </div>
                          
                            <!-- Modal báo cáo vi phạm bản quyền -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"><b>Báo cáo tác phẩm vi phạm bản quyền</b></h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('violate')}}" method="POST" id="violate">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <div class="form-group">
                                                    <label for="violate_link">Link tác phẩm vi phạm</label>
                                                    <input type="text" class="form-control" name="violate_link" required placeholder="Ex:https://tieuthuyet/tac-pham-vi-pham/1">
                                                </div>
                                                <div class="form-group">
                                                    <label for="original_link">Link tác phẩm gốc</label>
                                                    <input type="text" class="form-control" name="original_link" required placeholder="Ex:https://tieuthuyet/tac-pham-vi-pham/1">
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email liên hệ</label>
                                                    <input type="email" class="form-control" name="email">
                                                </div>
                                                <div>
                                                    <label><input type="checkbox" required id="commit">Tôi cam kết báo cáo đúng sự thật</label>
                                                </div>
                                                <div>
                                                    <button class="btn btn-danger btn-md btn-block">Gửi báo cáo</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--            <div class="hidden-xs col-sm-5"> --}}
                    {{--                {!! \App\Option::getvalue('copyright') !!} --}}
                    {{--            </div> --}}
                    <ul class="col-xs-12 col-lg-12 policy" style="margin-top: 12px">
                        <li class="text-center" style="color: white">
                            <a style="color:white" href="{{ url('contact') }}" title="Liên hệ">Liên hệ </a>-<a style="color: white"
                                href="{{ url('dieu-khoan-su-dung') }}" title="Terms of Service"> Điều
                                khoản </a>-<a style="color: white" href="{{ url('chinh-sach-bao-mat') }}" title="Terms of Service"> Chính
                                sách bảo mật </a>-<a style="color: white" href="{{ url('gioi-thieu') }}" title="Terms of Service"> Giới
                                thiệu </a>-<a style="color: white" href="{{ url('quy-dinh-ve-noi-dung') }}" title="Terms of Service"> Quy
                                định về nội dung </a>-<a style="color: white" href="{{ url('van-de-ve-ban-quyen') }}"
                                title="Terms of Service"> Bản quyền</a>
                                 {{-- Button Modal --}}
                                -<a style="color: white" href="#" data-toggle="modal" data-target="#exampleModal"> Báo cáo vi phạm bản quyền</a>
                        </li>
                        <li class="hidden-xs tag-list"></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- #Wrapper -->

    <!-- Jquery -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <!-- bootstrap -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <!-- My Script -->
    <script src="{{ asset('assets/js/dinhquochan.js') }}"></script>

    <!-- ReponsiveVoice -->
    {{-- <script src="https://code.responsivevoice.org/responsivevoice.js?key=O02Lj58v"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.18/jquery.touchSwipe.min.js"></script>
    @yield('script')
    <script src="{{ asset('assets/js/nguyenphuochao.js') }}"></script>

</body>

</html>

<!-- Script used to adjust the padding of all a cards evenly -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var links = document.querySelectorAll('.category-link');
        var maxTextWidth = 0;

        links.forEach(function(link) {
            var textWidth = link.offsetWidth;
            maxTextWidth = Math.max(maxTextWidth, textWidth);
        });

        links.forEach(function(link) {
            link.style.padding = '5px ' + (maxTextWidth / 2 - link.offsetWidth / 2 + 6) + 'px';
        });
    });
</script>
