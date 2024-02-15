<?php $__env->startSection('title', 'Ti&#7875;u Thuy&#7871;t - ' . \App\Option::getvalue('sitename')); ?>
<?php $__env->startSection('seo'); ?>
<!-- <meta property="ia:rules_url" content="path/to/your/rules-file.json"/> -->
    <meta name="description" content="<?php echo e(\App\Option::getvalue('description')); ?>" />
    <meta name="keywords" content="<?php echo e(\App\Option::getvalue('keyword')); ?>" />
    <meta name='ROBOTS' content='INDEX, FOLLOW' />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://tieuthuyet.vn/" />
    <meta property="og:site_name" content="Trang Ch&#7911;"/>
    <meta property="og:title" content="Ti&ecirc;&#777;u Thuy&ecirc;t -  <?php echo e(\App\Option::getvalue('sitename')); ?>" />
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:description" content="<?php echo e(\App\Option::getvalue('description')); ?>" />
    <meta property="og:image:width" content="1080">
    <meta property="og:image:height" content="600">
    <meta property="og:image" content="https://tieuthuyet.vn/assets/css/img/logo200x200.png" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@TanVo1999" />
    <meta name="twitter:title" content="Ti&ecirc;&#777;u Thuy&ecirc;t -  <?php echo e(\App\Option::getvalue('sitename')); ?>" />
    <meta name="twitter:description" content="<?php echo e(\App\Option::getvalue('description')); ?>" />
    <meta name="twitter:image" content="https://tieuthuyet.vn/assets/css/img/logo200x200.png" />
    <link rel="canonical" href="https://tieuthuyet.vn/" />
    <link href="https://tieuthuyet.vn/" hreflang="vi-vn" rel="alternate" />
    <link data-page-subject="true" href="https://tieuthuyet.vn/assets/css/img/logo200x200.png" rel="image_src" />

    <!-- Card Slide -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/css/swiper.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/js/swiper.min.js"></script>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style_banner.css')); ?>">

    <script type="application/ld+json"> 
    { 
        "@context":"https://schema.org", 
        "@type":"WebSite", 
        "name":"Ti&ecirc;&#777;u Thuy&ecirc;t - <?php echo e(\App\Option::getvalue('sitename')); ?>", 
        "alternateName":"Ti&ecirc;&#777;u Thuy&ecirc;t - <?php echo e(\App\Option::getvalue('sitename')); ?>", 
        "url":"https://tieuthuyet.vn/",
        "description" : "<?php echo e(\App\Option::getvalue('description')); ?>",
        "sameAs": [
            "https://www.facebook.com/tieuthuyetweb",
            "https://www.instagram.com/tanvo1999/",
            "https://www.linkedin.com/in/minh-tan-vo-a402ba196/",
            "https://twitter.com/TanVo1999",
            "https://www.pinterest.com/tieuthuyetmanager/_saved/"
        ]
    } 
    </script>
<!-- Messenger Plugin chat Code -->
<div id="fb-root"></div>

<!-- Your Plugin chat code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
  var chatbox = document.getElementById('fb-customer-chat');
  chatbox.setAttribute("page_id", "108024334796052");
  chatbox.setAttribute("attribution", "biz_inbox");
  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v10.0'
    });
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>
    <!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>
    <!-- Facebook Pixel Code -->

    <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v10.0&appId=568191354515418&autoLogAppEvents=1" nonce="QATi8Qsl"></script>

<!-- End Facebook Pixel Code -->
    <!-- <script>    (function(c,l,a,r,i,t,y){        c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};        t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i+"?ref=bwt";        y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);    })(window, document, "clarity", "script", "5wakjtiaor");</script> -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb', showBreadcrumb()); ?>
<?php $__env->startSection('content'); ?>

    <!-- Card Silder Start-->
    <div class="container-fluid">
        <div class="blog-slider">
            <div class="blog-slider__wrp swiper-wrapper">
                <?php foreach(\App\Story::getListStoriesForCardSlider($id = [2536,2788,2924,2564,2580]) as $newStory): ?>
                    <div class="blog-slider__item swiper-slide">
                        <div class="blog-slider__img">

                            <?php if(file_exists(public_path($newStory->image))): ?>
                                <img src="<?php echo e(url($newStory->image)); ?>" alt="<?php echo e($newStory->name); ?>" itemprop="image">
                            <?php else: ?>
                                <img src="<?php echo e(url('/images/no_signal/no-signal.jpg')); ?>" alt="<?php echo e($newStory->name); ?>"
                                     itemprop="image">
                            <?php endif; ?>

                        </div>
                        <div class="blog-slider__content">
                            <div class="blog-slider__title"><?php echo e($newStory->name); ?></div>
                            <div class="blog-slider__text">
                                    <?php
                                    $html = $newStory->content;

                                    $cleanedContent = preg_replace('/<img[^>]+>/', '', $html);
                                    ?>
                                <?php echo substr($cleanedContent, 0, 300); ?>...
                            </div>
                            <a class="blog-slider__button" href="<?php echo e(route('story.show', $newStory->alias)); ?>"
                               title="<?php echo e($newStory->name); ?>" itemprop="url">
                                XEM TRUY&#7878;N
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
            <div class="blog-slider__pagination"></div>
        </div>
    </div>
    <!-- Card Slider End -->


 <!-- Banner qu&#1073;&#1108;&#1032;ng c&#1043;&#1038;o 2 b&#1043;&#1028;n -->
<!-- <div id="sl1" class="sl1" style=" position: fixed; right: 55%; margin-right: 500px; bottom: 100px;">
							
    <a rel="nofollow" href="#" title="m88" target="_blank"><img src="https://aff.opus-static.com/m88/120x300_VN.gif" alt="m88" border="0" width="120" height="500">
    </a>
    

<br>	
    <a rel="nofollow" href="#" target="_blank">
        <img border="0" alt="sbobb" src="https://i.imgur.com/jye8JMj.gif" width="120" height="500">
    </a>

</div> -->


<!-- <div id="sl2" style=" position: fixed; left: 55%; margin-left: 500px; bottom: 100px;">
            
    <a rel="nofollow" href="/img/mibetFR1" target="_blank">
        <img border="0" alt="mibet" src="https://i.imgur.com/jye8JMj.gif" width="120" height="500">
    </a>
<br>	
     <a rel="nofollow" href="/img/fabetFR" target="_blank">
        <img border="0" alt="fabet" src="https://aff.opus-static.com/m88/120x300_VN.gif" width="120" height="500">
    </a> 					
</div> -->
    <div class="container visible-md-block visible-lg-block" id="intro-index">
        <div class="title-list">
            <h2><a href="<?php echo e(route('danhsach.truyenhot')); ?>" title="Truy&#7879;n hot">Truy&#7879;n HOT <span class="glyphicon glyphicon-fire"></span></a></h2>
            <select id="hot-select" class="form-control new-select">
                <option value="all">T&#7845;t c&#7843;</option>
             
                 <?php echo e(category_parent(\App\Category::get())); ?>


            </select>
        </div>

        <div class="index-intro">
            <?php echo \App\Story::getListHotStories(); ?>

        </div>
       
    </div>

             <?php echo \App\Story::getListNewStoriesImage(); ?>

 
<?php /*    <div class="ads container">*/ ?>
<?php /*        <?php echo $__env->make('widgets.asd_ngang', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>*/ ?>
<?php /*    </div>*/ ?>

    <div class="container" id="list-index">
      
        <div class="list list-truyen list-new col-xs-12 col-sm-12 col-md-8 col-truyen-main">
            <div class="title-list">
                <h2><a href="<?php echo e(route('danhsach.truyenmoi')); ?>" title="Truy&#7879;n m&#7899;i">Truy&#7879;n m&#7899;i c&#7853;p nh&#7853;t <span class="glyphicon glyphicon-menu-right"></span></a></h2>
           <?php /*     <select id="new-select" class="form-control new-select"> */ ?>
           <?php /*          <option value="all">T&#7845;t c&#7843;</option>     */ ?>
           <?php /*         <?php echo e(category_parent(\App\Category::get())); ?>          */ ?>
           <?php /*     </select>    */ ?>
            </div>
                <?php echo \App\Story::getListNewStories(); ?>

        </div>

        <?php echo $__env->make('partials.reading', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <?php /*Sidebar*/ ?>
        <div class="visible-md-block visible-lg-block col-md-4 text-center col-truyen-side">

            <?php echo $__env->make('widgets.categories', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
         
<?php /*            <div class="list-truyen list-cat col-xs-12">*/ ?>
<?php /*                <div class="fb-page" data-href="https://www.facebook.com/tieuthuyetweb" data-tabs="timeline"*/ ?>
<?php /*                     data-width="" data-height="70" data-small-header="false" data-adapt-container-width="true"*/ ?>
<?php /*                     data-hide-cover="false" data-show-facepile="true">*/ ?>
<?php /*                    <blockquote cite="https://www.facebook.com/tieuthuyetweb" class="fb-xfbml-parse-ignore"><a*/ ?>
<?php /*                                href="https://www.facebook.com/tieuthuyetweb">TieuThuyet.vn</a></blockquote>*/ ?>
<?php /*                </div>&nbsp;*/ ?>
<?php /*                <?php echo $__env->make('widgets.ads', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>*/ ?>
<?php /*            </div>*/ ?>
        </div>
    </div>

    

    <?php echo \App\Story::getListDoneStories(); ?>


<script src="<?php echo e(asset('assets/js/myscript.js')); ?>"></script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>