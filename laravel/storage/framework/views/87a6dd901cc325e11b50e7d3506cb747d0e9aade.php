<?php $__env->startSection('title', 'Tiểu Thuyết - ' . \App\Option::getvalue('sitename')); ?>
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
    <meta name="twitter:title" content="Tiểu Thuyết -  <?php echo e(\App\Option::getvalue('sitename')); ?>" />
    <meta name="twitter:description" content="<?php echo e(\App\Option::getvalue('description')); ?>" />
    <meta name="twitter:image" content="https://tieuthuyet.vn/assets/css/img/logo200x200.png" />
    <link rel="canonical" href="https://tieuthuyet.vn/" />
    <link href="https://tieuthuyet.vn/" hreflang="vi-vn" rel="alternate" />
    <link data-page-subject="true" href="https://tieuthuyet.vn/assets/css/img/logo200x200.png" rel="image_src" />

    <!-- Card Slide -->
    <?php /*<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/css/swiper.min.css">*/ ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <?php /*<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/js/swiper.min.js"></script>*/ ?>
    <?php /*<link rel="stylesheet" href="<?php echo e(asset('assets/css/style_banner.css')); ?>">*/ ?>

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
<?php /*<div id="fb-root"></div> */ ?>

<!-- Your Plugin chat code -->
<?php /*<div id="fb-customer-chat" class="fb-customerchat"> */ ?>
<?php /*</div> */ ?>

<?php /*<script> */ ?>
<?php /*  var chatbox = document.getElementById('fb-customer-chat'); */ ?>
<?php /*  chatbox.setAttribute("page_id", "108024334796052"); */ ?>
<?php /*  chatbox.setAttribute("attribution", "biz_inbox"); */ ?>
<?php /*  window.fbAsyncInit = function() { */ ?>
<?php /*    FB.init({ */ ?>
<?php /*      xfbml            : true, */ ?>
<?php /*      version          : 'v10.0' */ ?>
<?php /*    }); */ ?>
<?php /*  }; */ ?>

<?php /*  (function(d, s, id) { */ ?>
<?php /*    var js, fjs = d.getElementsByTagName(s)[0]; */ ?>
<?php /*    if (d.getElementById(id)) return; */ ?>
<?php /*    js = d.createElement(s); js.id = id; */ ?>
<?php /*    js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js'; */ ?>
<?php /*    fjs.parentNode.insertBefore(js, fjs); */ ?>
<?php /*  }(document, 'script', 'facebook-jssdk')); */ ?>
<?php /*</script> */ ?>
    <!-- Messenger Plugin chat Code -->
<?php /*    <div id="fb-root"></div> */ ?>

    <!-- Your Plugin chat code -->
<?php /*    <div id="fb-customer-chat" class="fb-customerchat"> */ ?>
<?php /*    </div> */ ?>
    <!-- Facebook Pixel Code -->

<?php /*    <div id="fb-root"></div> */ ?>
<?php /*<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v10.0&appId=568191354515418&autoLogAppEvents=1" nonce="QATi8Qsl"></script> */ ?>

<!-- End Facebook Pixel Code -->
    <!-- <script>    (function(c,l,a,r,i,t,y){        c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};        t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i+"?ref=bwt";        y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);    })(window, document, "clarity", "script", "5wakjtiaor");</script> -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <div style="display: flex; flex-wrap: wrap;">
        <?php $categoryList = \App\Category::getListCategoryHome([4,38,25,29,47,24]); ?>
        <?php foreach($categoryList as $category): ?>
            <div class="text-category" style="flex: 1; margin: 0 5px 5px 0;font-weight: bold; font-size: 16px">
                <a href="<?php echo e(route('category.list.index', ['alias' => $category->alias])); ?>">
                    <?php echo e($category->name); ?></a>
            </div>
        <?php endforeach; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

 <!-- Banner quảng cáo 2 banner -->
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
    
    
    <!-- Truyện Full -->
    <?php echo \App\Story::getListNewStoriesImage(); ?>


    <!-- Truyện Ai Cũng Thích Đọc -->
<?php /*    <div class="container visible-md-block visible-lg-block" id="intro-index">*/ ?>
<?php /*        <div class="title-list">*/ ?>
<?php /*            <h2><a href="<?php echo e(route('danhsach.truyenhot')); ?>" title="Truyện hot" style="font-weight: bold">AI CŨNG THÍCH ĐỌC <span class="glyphicon glyphicon-menu-right"></span></a></h2>*/ ?>
        <?php /*    <select id="hot-select" class="form-control new-select">*/ ?>
        <?php /*        <option value="all">Tất cả</option>*/ ?>
             
        <?php /*         <?php echo e(category_parent(\App\Category::get())); ?>*/ ?>

        <?php /*    </select>*/ ?>
<?php /*        </div>*/ ?>

<?php /*        <div class="index-intro">*/ ?>
            <?php echo \App\Story::getListHotStories(); ?>

<?php /*        </div>*/ ?>
      
<?php /*    </div>*/ ?>
    
    <!-- Truyện Hot Nhất -->
    <?php echo \App\Story::getListStoriesForCategory(47); ?>

    
    <!-- Truyện Bá Đạo Tổng Tài -->
    <?php echo \App\Story::getListStoriesForCategory(25); ?>


    <!-- Truyện Trinh Thám -->
    <?php echo \App\Story::getListStoriesForCategory(12); ?>

    
    <!-- Truyện Tiên Hiệp -->
    <?php echo \App\Story::getListStoriesForCategory(28); ?>

    
    <!-- Truyện Xuyên Không -->
    <?php echo \App\Story::getListStoriesForCategory(31); ?>

    
    <!-- Truyện Kiếm Hiệp -->
    <?php echo \App\Story::getListStoriesForCategory(4); ?>

    
    <!-- Truyện LGBT -->
    <?php echo \App\Story::getListStoriesForCategory(22); ?>

    
    <!-- Truyện Kinh Dị -->
    <?php echo \App\Story::getListStoriesForCategory(24); ?>

    
 
<?php /*    <div class="ads container">*/ ?>
<?php /*        <?php echo $__env->make('widgets.asd_ngang', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>*/ ?>
<?php /*    </div>*/ ?>

<?php /*    <div class="container" id="list-index"> */ ?>
      
<?php /*        <div class="list list-truyen list-new col-xs-12 col-sm-12 col-md-8 col-truyen-main"> */ ?>
<?php /*            <div class="title-list">
                <h2><a href="<?php echo e(route('danhsach.truyenmoi')); ?>" title="Truyện mới">Truyện mới cập nhật <span class="glyphicon glyphicon-menu-right"></span></a></h2>
           <?php echo e(--     <select id="new-select" class="form-control new-select"> */ ?>
           <?php /*          <option value="all">Tất cả</option>     */ ?>
           <?php /*         {{ category_parent(\App\Category::get())); ?>          */ ?>
           <?php /*     </select>    */ ?>
<?php /*            </div>
<?php echo e(--                <?php echo \App\Story::getListNewStories(); ?> */ ?>
<?php /*        </div>

{{--        <?php echo $__env->make('partials.reading', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> */ ?>

        <?php /*Sidebar*/ ?>
<?php /*        <div class="visible-md-block visible-lg-block col-md-4 text-center col-truyen-side"> */ ?>

<?php /*            <?php echo $__env->make('widgets.categories', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> */ ?>
         
<?php /*            <div class="list-truyen list-cat col-xs-12">*/ ?>
<?php /*                <div class="fb-page" data-href="https://www.facebook.com/tieuthuyetweb" data-tabs="timeline"*/ ?>
<?php /*                     data-width="" data-height="70" data-small-header="false" data-adapt-container-width="true"*/ ?>
<?php /*                     data-hide-cover="false" data-show-facepile="true">*/ ?>
<?php /*                    <blockquote cite="https://www.facebook.com/tieuthuyetweb" class="fb-xfbml-parse-ignore"><a*/ ?>
<?php /*                                href="https://www.facebook.com/tieuthuyetweb">TieuThuyet.vn</a></blockquote>*/ ?>
<?php /*                </div>&nbsp;*/ ?>
<?php /*                <?php echo $__env->make('widgets.ads', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>*/ ?>
<?php /*            </div>*/ ?>
<?php /*        </div>*/ ?>
    </div>

    

<?php /*    <?php echo \App\Story::getListDoneStories(); ?>*/ ?>

<?php /*<script src="{{ asset('assets/js/myscript.js')); ?>"></script>*/ ?>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>