<?php $__env->startSection('title', $story->name . ' | TieuThuyet.VN'); ?>
<?php $__env->startSection('seo'); ?>
    <meta name="keywords" content="<?php echo e(\App\Option::getvalue('keyword')); ?>" />
    <meta name="description" content="<?php echo substr(tanvo($story->content),0,250); ?>" />
    <meta name='ROBOTS' content='INDEX, FOLLOW' />
    <meta property="og:type" content="book" />
    <meta property="og:url" content="https://tieuthuyet.vn/<?php echo e($story->alias); ?>" />
    <meta property="og:site_name" content="<?php echo e($story->name); ?>" />
    <meta property="og:title" content="<?php echo e($story->name); ?> | TieuThuyet.VN" />
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="200">
    <meta property="og:image:height" content="300">
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:image" content="<?php echo e(url($story->image)); ?>" />
    <meta property="og:image:alt" content="Ti&ecirc;&#777;u Thuy&#7871;t">
    <meta property="og:description" content="<?php echo substr(tanvo($story->content),0,325); ?>" />
    <link rel="canonical" href="https://tieuthuyet.vn/<?php echo e($story->alias); ?>" />
    <link href="https://tieuthuyet.vn/<?php echo e($story->alias); ?>" hreflang="vi-vn" rel="alternate" />
    <link data-page-subject="true" href="<?php echo e(url($story->image)); ?>" rel="image_src" />
    <script src="https://sp.zalo.me/plugins/sdk.js"></script>
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
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v10.0&appId=764582287768925&autoLogAppEvents=1" nonce="QKJ7SiB8"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
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
                    url:'<?php echo e(route("xu-ly-binh-luan")); ?>',
                    data:
                    {
                    _token : '<?php echo csrf_token() ?>',
                    story_id: <?php echo e($story->id); ?>,
                    noi_dung: $nd
                    },
                    success:function(data) {
                        $(".list-comment").html(data);
                        $('#noi_dung').val("");
                    },
                    error:function(){
                        alert("&#272;&#259;ng nh&#7853;p &#273;&#7875; b&igrave;nh lu&#7853;n")
                    }
                });
            }

            function laydl(page)
            {
                $.ajax({
                    url: '/get-comment-story?page='+page,
                    method:"GET",
                    data:{
                        story_id: <?php echo e($story->id); ?>,
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
        <div class="col-xs-12 col-sm-12 col-md-9 col-truyen-main">
            <div class="col-xs-12 col-info-desc" itemscope="" itemtype="http://schema.org/Book">
                <div class="title-list"><h2>TH&Ocirc;NG TIN TRUY&#7878;N</h2></div>
                <div class="col-xs-12 col-sm-4 col-md-4 info-holder">
                    <div class="books">
                        <div class="book">
                     
                           <?php if(file_exists(public_path($story->image))): ?> 
                                <img src="<?php echo e(url($story->image)); ?>" alt="<?php echo e($story->name); ?>" itemprop="image">
                            <?php else: ?> 
                            <img src="<?php echo e(url('/images/no_signal/no-signal.jpg')); ?>" alt="<?php echo e($story->name); ?>" itemprop="image"> 
                            <?php endif; ?> 

                        </div>
                    </div>
                    <div class="info">
                        <div>
                            <h3>T&aacute;c gi&#7843;:</h3>
                            <?php echo the_author($story->authors); ?>

                        </div>
                        <div>
                            <h3>Th&#7875; lo&#7841;i:</h3>
                            <?php echo the_category($story->categories); ?>

                        </div>
                        <div>
                            <h3>L&#432;&#7907;t xem:</h3>
                            <?php echo number_format($story->view); ?>

                        </div>
                        <div>
                            <h3>Ng&#432;&#7901;i &#273;&#259;ng:</h3> <?php echo e($story->user->name); ?>

                        </div>
                        <div>
                            <h3>Tr&#7841;ng th&aacute;i:</h3> <?php echo dqhStatusStoryShow($story->status); ?>

                        </div>
                        <?php if($story->source): ?>
                        <div>
                            <h3>Ngu&#7891;n truy&#7879;n:</h3> <?php echo $story->source; ?>

                        </div>
                        <?php endif; ?>
                        <div>
                        <div class="navbar-social pull-left">
                                <div class="navbar-social pull-left">
                                <div style="width: 87px;" class="fb-like" data-href="<?php echo e(route('story.show', $story->alias)); ?>" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="false"></div>
                                    <div style="top: -8.5px;" class="fb-share-button" data-href="<?php echo e(route('story.show', $story->alias)); ?>" data-layout="button" data-size="small"></div>
                                    <div class="zalo-share-button" data-href="" data-oaid="579745863508352884" data-layout="1" data-color="blue" data-customize=false></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 desc">
                    <h3 class="title" itemprop="name"><?php echo e($story->name); ?></h3>
                    <div class="desc-text desc-text-full" itemprop="description">
                        <?php
                        $html = nl2p($story->content, false);
                        
                        $cleanedContent = preg_replace('/<img[^>]+>/', '', $html);
                        ?>
                        <?php echo $cleanedContent; ?>

                    </div>
                    <div class="showmore">
            					<a class="btn btn-default btn-xs" href="javascript:void(0)" title="Xem th&ecirc;m">Xem th&ecirc;m</a>
            				</div>

                    <?php
                    $chapters = $story->chapters()->orderBy("id", "desc")->take(5)->get();
                    if ($chapters) {
                      echo '<div class="l-chapter"><div class="l-title"><h3>C&aacute;c ch&#432;&#417;ng m&#7899;i nh&#7845;t</h3></div><ul class="l-chapters">';
                      foreach($chapters as $chapter):
                      ?>
                      <li>
                        <span class="glyphicon glyphicon-certificate"></span>
                        <a href="<?php echo e(route('chapter.show', [$story->alias, $chapter->alias])); ?>" title="<?php echo e($story->name); ?> - <?php echo e($chapter->subname); ?>: <?php echo e($chapter->name); ?>">
                            <span class="chapter-text"><?php echo e($chapter->subname); ?> - <?php echo e($chapter->name); ?>

                        </a>
                      <?php
                          endforeach;

                          echo '</ul></div>';
                    }
                    ?>
                </div>
            </div>

            <div class="ads container">
                <?php echo \App\Option::getvalue('ads_story'); ?>

            </div>

            <div class="col-xs-12" id="list-chapter">
                <div class="title-list"><h2>Danh s&aacute;ch ch&#432;&#417;ng</h2></div>
                <div class="row">
                    <?php
                    $t = 1; $c = 1;
                    $chapters = $story->chapters()->orderBy("id", "asc")->paginate(50);
                    foreach($chapters as $chapter):
                        $count = count($chapters);
                        if($t == 1) echo ' <div class="col-xs-12 col-sm-6 col-md-6"><ul class="list-chapter">';
                    ?>
                            <li>
                                <span class="glyphicon glyphicon-certificate"></span>
                                <a href="<?php echo e(route('chapter.show', [$story->alias, $chapter->alias])); ?>" title="<?php echo e($story->name); ?> - <?php echo e($chapter->subname); ?>: <?php echo e($chapter->name); ?>">
                                    <span class="chapter-text"> <?php echo e($chapter->subname); ?> - <?php echo e($chapter->name); ?>

                                </a>
                            </li>
                    <?php
                        if($t == 25 || $count == $c){
                            $t = 0;
                            echo '</ul></div>';
                        }
                            $t++; $c++;
                        endforeach;
                        ?>
                </div>

                <?php echo e($chapters->fragment('list-chapter')->links()); ?>


                </div>
            <div>
                <div class="col-xs-12">
                    <div class="title-list"><h2>B&igrave;nh lu&#7853;n truy&#7879;n</h2></div>
                    <div class="">
                        <button type="button" class="btn btn-info" onclick="showtt('fb','tt')" id="chapter_comment"><span class="glyphicon glyphicon-comment"></span> Tieuthuyet.vn(<?php echo e($story->comment_story->count()); ?>)</button>
                        <button type="button" class="btn btn-info" onclick="showfb('fb','tt')" id="chapter_comment"><span class="glyphicon glyphicon-comment"></span> Facebook</button>
                        <!-- <div id="fb" class="fb-comments"  data-href="http://tieuthuyet.vn" data-width="" data-numposts="5" style="display:none !important"></div> -->
                        <div id="fb" class="fb-comments" data-href="<?php echo e(route('story.show', $story->alias)); ?>" data-width="100%" data-numposts="5" data-colorscheme="light" fb-xfbml-state="rendered" style="display:none !important"></div>
                        <div id="tt" class="form-group " style="margin: 7px;display:none !important">
                            <input style="height: 53px" class="form-control" id="noi_dung" name="noi_dung" required placeholder="Nh&#7853;p b&igrave;nh lu&#7853;n...">
                            <button id="binhluan" type="button" class="btn btn-primary">
                                B&igrave;nh lu&#7853;n
                            </button>
                            <div class="list-comment">
                                <?php echo $__env->make('widgets.comment', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="visible-md-block visible-lg-block col-md-3 text-center col-truyen-side">
            <?php echo $__env->make('widgets.storiesByAuthor', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('widgets.hotstory', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php /*<?php echo $__env->make('widgets.ads', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>*/ ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>