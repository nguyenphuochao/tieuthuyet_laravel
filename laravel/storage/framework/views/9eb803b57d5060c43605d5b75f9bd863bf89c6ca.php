<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="apple-mobile-web-app-status-bar-style" content="#4b0082" />
        <meta name="apple-mobile-web-app-title" content="Ti&#7875;u Thuy&#7871;t" />
        <link rel="shortcut icon" type="image/x-icon" href="https://tieuthuyet.vn/favicon.ico" />
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="https://tieuthuyet.vn/fav/apple-touch-icon-144x144.png" />
        <link rel="icon" type="image/png" href="https://tieuthuyet.vn/fav/favicon-196x196.png" sizes="196x196" />
        <link rel="icon" type="image/png" href="https://tieuthuyet.vn/fav/favicon-96x96.png" sizes="96x96" />
        <link rel="icon" type="image/png" href="https://tieuthuyet.vn/fav/favicon-32x32.png" sizes="32x32" />
        <link rel="icon" type="image/png" href="https://tieuthuyet.vn/fav/favicon-16x16.png" sizes="16x16" />
        <meta name="msapplication-TileColor" content="#FFFFFF" />
        <meta name="msapplication-TileImage" content="fav/apple-touch-icon-144x144.png" />
        <meta name = "theme-color" content = "#4b0082" />
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
        <?php echo $__env->make('partials.navibar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="ads container">
            <?php echo \App\Option::getvalue('ads_header'); ?>

        </div>

        <?php echo $__env->yieldContent('content'); ?>    

            <!-- Footer -->
            <div class="clearfix"></div>
            <div class="ads container">
                <?php echo \App\Option::getvalue('ads_footer'); ?>

                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <ins class="adsbygoogle"
                    style="display:block"
                    data-ad-format="fluid"
                    data-ad-layout-key="-gv-4+19-50+7o"
                    data-ad-client="ca-pub-6827872033566527"
                    data-ad-slot="7723761327"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>

            <div class="container">
               <div class="row">
                 <div class="col-12 col-lg-12">
                   <?php echo \App\Option::getvalue('pagefooter'); ?>

                 </div>
               </div>
            </div> 

            <div class="footer">
                <div class="container">
                    <div class="row">
                        <div class="logo-footer navbar-header col-12 col-md-12 col-lg-4 text-left">
                           <h1>
                             <a class="header-logo"></a>
                           </h1>
                        </div>

                         <div class="col-12 col-md-12 col-lg-4 text-center">
                           <p class="fade-loop" style="font-style: italic;padding-bottom:16px;font-size: 20px;font-weight: bold; color: #e3c300;">
                        Ch&agrave;o m&#7915;ng b&#7841;n &#273;&#7885;c &#273;&#7871;n v&#7899;i th&#7871; gi&#7899;i <strong>TieuThuyet.VN</strong> - tr&#7889;n bao mu&#7897;n phi&#7873;n, &#273;&acirc;y s&#7869; l&agrave; n&#417;i b&#7841;n t&igrave;m th&#7845;y gi&#7845;c m&#417; c&#7911;a ch&iacute;nh m&igrave;nh.
                           </p>
                         </div>
                       
                        <div class="contact col-12 col-lg-4 col-md-12" style="display: flex;justify-content: flex-end">
                          <div class="text-left">
                              <h1 style="padding-bottom:16px;font-size: 20px;font-weight: bold; color: #FFFFFF; margin: 0;">
                            LI&Ecirc;N H&#7878; H&#7906;P T&Aacute;C</h1>
                              <p style="font-size: 16px;font-weight: bold; color: #FFFFFF; margin: 0;">Hotline: 0908 942
                            789</p>
                              <p style="font-size: 16px;font-weight: bold; color: #FFFFFF; margin: 0;">Email:
                            brightstar24h@gmail.com</p>
                         </div>
                        </div>
                <?php /*            <div class="hidden-xs col-sm-5">*/ ?>
                <?php /*                <?php echo \App\Option::getvalue('copyright'); ?>*/ ?>
                <?php /*            </div>*/ ?>
                    <ul class="col-12 col-lg-12 list-unstyled">
                        <li class="text-center">
                            <a href="<?php echo e(url('contact')); ?>" title="Li&ecirc;n h&#7879;">Li&ecirc;n h&#7879; - </a><a href="<?php echo e(url('tos')); ?>" title="Terms of Service">&#272;i&#7873;u kho&#7843;n</a> <a class="backtop" href="#backOnTop" rel="nofollow"><span class="glyphicon glyphicon-upload"></span></a>
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
        <script src="https://code.responsivevoice.org/responsivevoice.js?key=O02Lj58v"></script>

    </body>
</html>