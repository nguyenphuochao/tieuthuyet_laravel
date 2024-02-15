
<?php $__env->startSection('title', $story->name . ' | TieuThuyet.VN'); ?>
<?php $__env->startSection('seo'); ?>
    <meta name="keywords" content="<?php echo e(\App\Option::getvalue('keyword')); ?>" />
    <meta name="description" content="<?php echo substr(tanvo($story->content), 0, 250); ?>" />
    <meta name='ROBOTS' content='INDEX, FOLLOW' />
    <meta property="og:type" content="book" />
    <meta property="og:url" content="https://tieuthuyet.vn/<?php echo e($story->alias); ?>" />
    <meta property="og:site_name" content="<?php echo e($story->name); ?>" />
    <meta property="og:title" content="<?php echo e($story->name); ?> | TieuThuyet.VN" />
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="1019" />
    <meta property="og:image:height" content="609" />
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:image" content="<?php echo e(url($story->image)); ?>" />
    <meta property="og:image:alt" content="Tiểu Thuyết">
    <meta property="og:description" content="<?php echo substr(tanvo($story->content), 0, 325); ?>" />
    <link rel="canonical" href="https://tieuthuyet.vn/<?php echo e($story->alias); ?>" />
    <link href="https://tieuthuyet.vn/<?php echo e($story->alias); ?>" hreflang="vi-vn" rel="alternate" />
    <link data-page-subject="true" href="<?php echo e(url($story->image)); ?>" rel="image_src" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style_show_story.css')); ?>">
    <style>
        @media  screen and (max-width:500px) {
            #rateYo {
                margin-left: -30px;
            }
           
        }
        @media  screen and (max-width:768px) {
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
        "name": "<?php echo e($story->name); ?>", 
        "alternateName": "<?php echo e($story->name); ?>", 
        "url":"https://tieuthuyet.vn/<?php echo e($story->alias); ?>",
        "image" : "<?php echo e(url($story->image)); ?>",
        "author": [<?php echo get_author($story->authors); ?>],
        "publisher": {
            "@type": "Person",
            "name": "<?php echo e($story->user->name); ?>"
        },
        "description": "<?php echo substr(tanvo($story->content),0,250); ?>",
        "about": [<?php echo get_catory($story->categories); ?>]
    } 
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb', showBreadcrumb($breadcrumb)); ?>

<?php $__env->startSection('content'); ?>
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
                    url: '<?php echo e(route('xu-ly-binh-luan')); ?>',
                    data: {
                        _token: '<?php echo csrf_token(); ?>',
                        story_id: <?php echo e($story->id); ?>,
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
                        story_id: <?php echo e($story->id); ?>,
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
                        <?php if($story->image && file_exists(public_path($story->image))): ?>
                            <img src="<?php echo e(url($story->image)); ?>" alt="<?php echo e($story->name); ?>" itemprop="image" width="160"
                                height="250">
                        <?php else: ?>
                            <img src="<?php echo e(url('/images/no_signal/no-signal.jpg')); ?>" alt="<?php echo e($story->name); ?>"
                                itemprop="image" width="160" height="205">
                        <?php endif; ?>
                    </div>

                    <div class="info col-lg-7 col-md-12 col-sm-12 col-xs-12">
                        <div class="story-name">
                            <h3 class="title" itemprop="name"><?php echo e($story->name); ?></h3>
                        </div>

                        <div class="genres">
                            <span class="st-1">
                                <?php echo the_category($story->categories); ?>

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
                            <p>Tác giả: <strong><?php echo the_author($story->authors); ?></strong>

                            <p><strong><?php echo e(count($story->chapters()->get())); ?></strong> chương</p>

                            <p><strong><?php echo number_format($story->view); ?></strong> lượt xem</p>

                        </div>

                        <div class="col-lg-12 col-xs-12 story-button">
                            <a href="https://www.facebook.com/thongtinxuphat">Diễn đàn truyện</a>
                            <a href="<?php echo e(route('danhsach.truyenmoi')); ?>">Hôm nay đọc gì?</a>
                            <a href="<?php echo e(route('danhsach.truyenhotnhat')); ?>">Truyện đang HOT</a>
                        </div>
                        <?php /* Đánh giá rating */ ?>
                        <input type="hidden" id="rating-check" value="<?php echo e(Auth::check() ? 1 : 0); ?>" />
                        <!---check đăng nhập-->
                        <form action="<?php echo e(route('rating')); ?>" id="formRating" method="post">
                            <?php echo e(csrf_field()); ?>

                            <div class="rating-container row">
                                <div class="col-xs-6 col-sm-6 col-md-6" id="rateYo"></div>
                                <div class="col-xs-6 col-sm-6 col-md-6" style="font-size: 16px;padding-top:7px;text-align:start"><span
                                        id="rating_value_num"><?php echo e($ratingAvg); ?></span>/5 - (<span
                                        id="total_rating"><?php echo e(count($ratingCount)); ?></span> bình chọn)</div>
                            </div>
                            <input type="hidden" name="rating_value" id="rating_value">
                            <input type="hidden" value="<?php echo e($story->id); ?>" name="story_id" id="story_id">
                            <input type="hidden" name="rating_num" id="rating_num" value="<?php echo e($ratingAvg); ?>">
                            <?php if(Auth::check()): ?>
                                <input type="hidden" value="<?php echo e(Auth::user()->id); ?>" name="user_id" id="user_id">
                            <?php endif; ?>
                        </form>
                    </div>
                    <?php if(\App\Option::getImage('ads_slidebar')): ?>
                        <div class="col-sm-12 col-md-12 col-lg-5 text-right" id="ads_slidebar_tablet">
                            <a target="_blank" href="<?php echo e(\App\Option::getvalue('ads_slidebar')); ?>">
                                <img id="image-ads-sidebar" src="<?php echo e(url(\App\Option::getImage('ads_slidebar'))); ?>" width="230px" height="400px" class="img-fluid" alt="Trình Duyệt COCOC">
                            </a>
                        </div>
                    <?php endif; ?>
                    <?php if(!Auth::user()): ?>
                        <div class="col-lg-5 visible-lg story-introduce">
                            <p>Truyện độc đáo của bạn có thể là truyện thành công lớn tiếp theo.
                                tieuthuyet.vn là nơi để các tác giả tài năng chưa được biết đến,
                                chưa có tên tuổi chia sẻ tác phẩm của mình và kết nối người hâm mộ.
                            </p>
                            <div class="story-button">
                                <a href="<?php echo e(url('/login')); ?>">Đăng nhập</a>
                                <a class="pull-right" href="<?php echo e(route('customer.create')); ?>">Tạo tài khoản</a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php /* Alert danger 18+ or problem */ ?>
            <?php if($story->is18 != ''): ?>
                <div class="alert alert-danger" style="font-size: 20px;font-weight:bold"><?php echo e($story->is18); ?></div>
            <?php endif; ?>
            <?php if(\App\Option::getImage('ads_slidebar')): ?>
            <div class="col-sm-12 col-md-12" id="ads_slidebar_mobile" style="display: none">
                <a target="_blank" href="<?php echo e(\App\Option::getvalue('ads_slidebar')); ?>">
                    <img id="image-ads-sidebar" src="<?php echo e(url(\App\Option::getImage('ads_slidebar'))); ?>" width="230px" height="400px" class="img-fluid" alt="Trình Duyệt COCOC">
                </a>
            </div>
        <?php endif; ?>
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
                                <?php echo $cleanedContent; ?>

                            </div>
                            <?php /* <div class="showmore"> */ ?>
                            <?php /*    <a class="btn btn-default btn-xs showmore-btn" href="javascript:void(0)"
                                   title="Xem thêm">Xem
                                    thêm</a> */ ?>
                            <?php /* </div> */ ?>
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
                                        <a href="<?php echo e(route('chapter.show', [$story->alias, $chapter->alias])); ?>"
                                            title="<?php echo e($story->name); ?> - <?php echo e($chapter->subname); ?>: <?php echo e($chapter->name); ?>">
                                            <span class="chapter-text"> <?php echo e($chapter->subname); ?> - <?php echo e($chapter->name); ?>

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

                                <?php echo $__env->make('name', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Nav Tab End -->

            <?php /*            <div class="ads container">  */ ?>
            <?php /*                <?php echo \App\Option::getvalue('ads_story'); ?> */ ?>
            <?php /*            </div>  */ ?>

            <!-- Comment Start -->
            <div class="container" style="padding:0;">
                <div class="title-list"></div>
                <div class="col-xs-12" style="padding:0">
                    <div class="title-list">
                        <h2><i class="glyphicon glyphicon-comment"></i> Nhận xét về <strong><?php echo e($story->name); ?></strong>
                        </h2>
                    </div>
                    <div style="position: relative">
                        <button type="button" class="btn btn-info btn-xs" onclick="showtt('fb','tt')"
                            id="chapter_comment"><span class="glyphicon glyphicon-comment"></span>
                            Tieuthuyet.vn(<?php echo e($story->comment_story->count()); ?>)</button>
                        <button type="button" class="btn btn-info btn-xs" onclick="showfb('fb','tt')"
                            id="chapter_comment"><span class="glyphicon glyphicon-comment"></span> Facebook</button>
                        <!-- <div id="fb" class="fb-comments"  data-href="http://tieuthuyet.vn" data-width="" data-numposts="5" style="display:none !important"></div> -->
                        <?php /* Share FB , Zalo */ ?>
                        <span style="display: inline-block;position: absolute;top:15px" class="fb-share-button"
                            data-href="<?php echo e(route('story.show', $story->alias)); ?>" data-layout="button"
                            data-size="small"></span>
                        <span style="display: inline-block;position: absolute;top:7px;left:73px;width:100px"
                            class="zalo-share-button" data-href="" data-oaid="579745863508352884" data-layout="1"
                            data-color="blue" data-customize=false></span>
                        <div id="fb" class="fb-comments" data-href="<?php echo e(route('story.show', $story->alias)); ?>"
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
                                <?php echo $__env->make('widgets.comment', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
            <?php if(!$getListForCategory->isEmpty()): ?>
                <div class="container" style="padding: 0" id="truyen-slide">
                    <div class="list list-thumbnail col-xs-12" id="list-category">
                        <div class="title-list">
                            <h2>TRUYỆN CÙNG THỂ LOẠI</h2><span class="glyphicon glyphicon-menu-right"></span>
                        </div>
                        <div class="row">

                            <?php foreach($getListForCategory as $storyForCategory): ?>
                                <div class="col-xs-4 col-sm-4 col-md-2 list-category">
                                    <a href="<?php echo e(route('story.show', $storyForCategory->alias)); ?>"
                                        title="<?php echo e($storyForCategory->name); ?>">

                                        <?php if($storyForCategory->image && file_exists(public_path($storyForCategory->image))): ?>
                                            <img src="<?php echo e(url($storyForCategory->image)); ?>"
                                                alt="<?php echo e($storyForCategory->name); ?>" loading="lazy">
                                        <?php else: ?>
                                            <img src="<?php echo e(url('/images/no_signal/no-signal.jpg')); ?>"
                                                alt="<?php echo e($storyForCategory->name); ?>" loading="lazy">
                                        <?php endif; ?>
                                        <div class="caption">
                                            <h3><?php echo e($storyForCategory->name); ?></h3>
                                        </div>

                                    </a>
                                </div>
                            <?php endforeach; ?>

                        </div>

                        <div class="text-center">
                            <?php echo $__env->make('name_1', ['getListForCategory' => $getListForCategory], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="container" style="padding: 0" id="truyen-slide">
                </div>
            <?php endif; ?>
            <!-- Stories For Cateogy End -->

            <!-- Truyện Full -->
            <?php echo \App\Story::getListNewStoriesImage(); ?>


            <!-- Hot Strories Start -->
            <?php echo \App\Story::getListHotStories(); ?>

            <!-- Hot Strories End -->

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




        </div>
        <?php /*        <div class="visible-md-block visible-lg-block col-md-3 text-center col-truyen-side"> */ ?>
        <?php /*            <?php echo $__env->make('widgets.storiesByAuthor', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> */ ?>
        <?php /*            <?php echo $__env->make('widgets.hotstory', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> */ ?>
        <?php /*            */ ?><?php /* <?php echo $__env->make('widgets.ads', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> */ ?>
        <?php /*        </div> */ ?>
    </div>
<?php $__env->stopSection(); ?>

<script src="<?php echo e(asset('assets/js/script_show_story.js')); ?>"></script>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>