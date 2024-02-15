<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="apple-mobile-web-app-status-bar-style" content="#2c7aaa" />
        <meta name="apple-mobile-web-app-title" content="Tiểu Thuyết" />
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('images/logo/logo.ico')); ?>" />
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="https://tieuthuyet.vn/fav/apple-touch-icon-144x144.png" />
        <link rel="icon" type="image/png" href="<?php echo e(asset('images/logo/logo_196x196.png')); ?>" sizes="196x196" />
        <link rel="icon" type="image/png" href="<?php echo e(asset('images/logo/logo_96x96.png')); ?>" sizes="96x96" />
        <link rel="icon" type="image/png" href="<?php echo e(asset('images/logo/logo_32x32.png')); ?>" sizes="32x32" />
        <link rel="icon" type="image/png" href="<?php echo e(asset('images/logo/logo_16x16.png')); ?>" sizes="16x16" />
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        
        <meta name="msapplication-TileColor" content="#FFFFFF" />
        <meta name="msapplication-TileImage" content="fav/apple-touch-icon-144x144.png" />
        <meta name = "theme-color" content = "#2c7aaa" />
        <title><?php echo $__env->yieldContent('title'); ?></title>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>" />
        <?php echo $__env->yieldContent('seo'); ?>
        <?php echo \App\Option::getvalue('pageheader'); ?>

        <meta name="google-site-verification" content="<?php echo \App\Option::getvalue('google_veri'); ?>" />
        <meta name="facebook-domain-verification" content="8c3c33i5c2r48f3pwjr48uv7wd5ty7" />
        <meta property="fb:admins" content="<?php echo e(\App\Option::getvalue('fb_admin_id')); ?>" />
        <meta property="fb:app_id" content="<?php echo e(\App\Option::getvalue('fb_app')); ?>" />
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Google Tag Manager -->
        <!-- <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-5MPR87P');</script> -->
        <!-- End Google Tag Manager -->
        <script src="https://apis.google.com/js/platform.js" async defer>
        {lang: 'vi'}
        </script>
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2769146024033953" crossorigin="anonymous"></script> <script async src="https://www.googletagmanager.com/gtag/js?id=G-EE037EGTQG"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'G-EE037EGTQG');
        </script>      
        <!-- Google tag (gtag.js) --> <script async src="https://www.googletagmanager.com/gtag/js?id=AW-11316483462"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'AW-11316483462'); </script>
       
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
            
           @media  screen and (max-width: 393px){
            .policy a {
                font-size: 13px;
               }
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
        <?php /*Facebook*/ ?>
        <div id="fb-root"></div>

        <div class="wrapper" id="backOnTop">
        <?php echo $__env->make('partials.navibar_new', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        
        <?php echo $__env->make('partials.searchbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="ads container">
            <?php echo \App\Option::getvalue('ads_header'); ?>

        </div>

        <?php echo $__env->yieldContent('content'); ?>    

            <!-- Footer -->
            <div class="clearfix"></div>
            <!--<div class="ads container">-->
            <!--    <?php echo \App\Option::getvalue('ads_footer'); ?>-->
            <!--    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>-->
            <!--    <ins class="adsbygoogle"-->
            <!--        style="display:block"-->
            <!--        data-ad-format="fluid"-->
            <!--        data-ad-layout-key="-gv-4+19-50+7o"-->
            <!--        data-ad-client="ca-pub-6827872033566527"-->
            <!--        data-ad-slot="7723761327"></ins>-->
            <!--    <script>-->
            <!--        (adsbygoogle = window.adsbygoogle || []).push({});-->
            <!--    </script>-->
            <!--</div>-->

            

            <div class="footer">
                <div class="container">
                    <div class="row">
                        <div style="margin-top: 16px" class="logo-footer navbar-header col-12 col-md-12 col-lg-3 text-left">
                           <h1>
                             <a href="/" class="header-logo"></a>
                           </h1>
                        </div>

                         <div class="col-xs-12 col-md-12 col-lg-6 text-center footer-category" style="margin-top: 14px">
                            <?php
                             $categories = \App\Category::select('id', 'name', 'alias', 'parent_id')->orderBy('id', 'DESC')->get();
                             ?>
                             <?php foreach($categories as $category): ?>
                                 <p class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                     <a class="category-link" href="<?php echo e(route('category.list.index', ['alias' => $category->alias])); ?>">
                                         <?php echo e($category->name); ?></a>
                                 </p>
                             <?php endforeach; ?>
                        </div>
                       
                        <div class="contact col-xs-12 col-lg-3 col-md-12" style="margin-top: 12px;display: flex;justify-content: flex-start">
                          <div class="text-left">
                              <h1 style="padding-bottom:8px;font-size: 14px;font-weight: bold; color: #000000; margin: 0;">
                            KẾT NỐI VỚI CHÚNG TÔI</h1>
                            <p style="font-size: 12px;font-weight: bold; color: #000000; margin-bottom:8px;">Email: brightstar24h@gmail.com</p>
                              <div class="fade-loop" style="font-size: 12px;font-weight: bold; color: #000000;">
                                <a href="https://www.facebook.com/thongtinxuphat"><i class="fa-brands fa-facebook"></i>Tiểu Thuyết</a>
                             </div>
                         </div>
                        </div>
                <?php /*            <div class="hidden-xs col-sm-5">*/ ?>
                <?php /*                <?php echo \App\Option::getvalue('copyright'); ?>*/ ?>
                <?php /*            </div>*/ ?>
                    <ul class="col-xs-12 col-lg-12 policy" style="margin-top: 12px">
                        <li class="text-center">
                            <a href="<?php echo e(url('contact')); ?>" title="Liên hệ">Liên hệ </a>-<a href="<?php echo e(url('dieu-khoan-su-dung')); ?>"
                                                                                         title="Terms of Service"> Điều
                                khoản </a>-<a href="<?php echo e(url('chinh-sach-bao-mat')); ?>"
                                              title="Terms of Service"> Chính sách bảo mật </a>-<a
                                    href="<?php echo e(url('gioi-thieu')); ?>"
                                    title="Terms of Service"> Giới thiệu </a>-<a
                                    href="<?php echo e(url('quy-dinh-ve-noi-dung')); ?>"
                                    title="Terms of Service"> Quy định về nội dung </a>-<a
                                    href="<?php echo e(url('van-de-ve-ban-quyen')); ?>"
                                    title="Terms of Service"> Vấn đề về bản quyền </a>
                        </li>
                        <li class="hidden-xs tag-list"></li>
                    </ul>
                   </div>
                </div>
            </div>
        </div> <!-- #Wrapper -->

        <!-- Jquery -->
        <script src="<?php echo e(asset('assets/js/jquery.min.js')); ?>"></script>
        <!-- bootstrap -->
        <script src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>
        <!-- My Script -->
        <script src="<?php echo e(asset('assets/js/dinhquochan.js')); ?>"></script>

        <!-- ReponsiveVoice -->
        <?php /*<script src="https://code.responsivevoice.org/responsivevoice.js?key=O02Lj58v"></script>*/ ?>

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
            link.style.padding = '5px ' + (maxTextWidth/2 - link.offsetWidth/2 + 6) + 'px';
        });
    });
</script>