<?php $__env->startSection('title', $story->name . ' - ' . $chapter->subname . ' :' . $chapter->name); ?>
<?php $__env->startSection('seo'); ?>
    <meta name="description" content="<?php echo e($chapter->subname); ?>: <?php echo e($chapter->name); ?>. N&#7897;i dung: <?php echo substr(tanvo($chapter->content),0,230); ?>" />
    <meta name="keywords" content="<?php echo e(\App\Option::getvalue('keyword')); ?>" />
    <meta name='ROBOTS' content='INDEX, FOLLOW' />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://tieuthuyet.vn/<?php echo e($story->alias); ?>/<?php echo e($chapter->alias); ?>" />
    <meta property="og:site_name" content="<?php echo e($chapter->subname); ?>: <?php echo e($chapter->name); ?>" />
    <meta property="og:title" content="<?php echo e($chapter->subname); ?>: <?php echo e($chapter->name); ?>" />
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:image" content="<?php echo e(url($story->image)); ?>" />
    <meta property="og:image:width" content="640" />
    <meta property="og:image:height" content="853" />
    <meta property="og:description" content="<?php echo e($chapter->subname); ?>: <?php echo e($chapter->name); ?>. N&#7897;i dung: <?php echo substr(tanvo($chapter->content),0,230); ?>..." />
    <link rel="canonical" href="https://tieuthuyet.vn/<?php echo e($story->alias); ?>/<?php echo e($chapter->alias); ?>" />
    <link href="https://tieuthuyet.vn/<?php echo e($story->alias); ?>/<?php echo e($chapter->alias); ?>" hreflang="vi-vn" rel="alternate" />
    <link data-page-subject="true" href="<?php echo e(url($story->image)); ?>" rel="image_src" />
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tilt+Neon&display=swap" rel="stylesheet">
    
    <script src="https://sp.zalo.me/plugins/sdk.js"></script>
    <script type="application/ld+json"> 
    { 
        "@context":"https://schema.org", 
        "@type":"WebSite", 
        "name": "<?php echo e($chapter->subname); ?>: <?php echo e($chapter->name); ?>", 
        "alternateName": "<?php echo e($story->name); ?> - <?php echo e($chapter->subname); ?> :<?php echo e($chapter->name); ?>", 
        "url":"https://tieuthuyet.vn/<?php echo e($story->alias); ?>/<?php echo e($chapter->alias); ?>",
        "image" : "<?php echo e(url($story->image)); ?>",
        "description":"<?php echo e($chapter->subname); ?>: <?php echo e($chapter->name); ?>. N&#7897;i dung: <?php echo substr(tanvo($chapter->content),0,230); ?>..."
    } 
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb', showBreadcrumb($breadcrumb)); ?>
<?php $__env->startSection('content'); ?>
<script>
 $(document).ready(function(){
 $('#dynamic-content p, #dynamic-content span, #dynamic-content center').css('text-align', 'justify');
});
</script>

<?php
    $cleanedContent = str_replace(['.', ' ;'], '', strip_tags($chapter->content));
    $decodedContent = html_entity_decode($cleanedContent, ENT_QUOTES, 'UTF-8');
    $contentArray = ['content' => $decodedContent];

?>

<script>
        var contentData = <?php echo json_encode($contentArray); ?>;
</script>
 
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v10.0&appId=764582287768925&autoLogAppEvents=1" nonce="exk2P4NV"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">

    $(document).ready(function(){
        
        showtt('fb', 'tt');
        
        if( sessionStorage.getItem("maunen") == 2)
        {
            $("body").css('background','#f1e5c5');
            $(".mau-nen").css('background','#F4F4F4');
        }
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
                url:'<?php echo e(route("xu-ly-binh-luan-chapter")); ?>',
                data:
                {
                _token : '<?php echo csrf_token() ?>',
                chapter_id: <?php echo e($chapter->id); ?>,
                noi_dung: $nd
                },
                success:function(data) {
                    $(".list-comment").html(data);
                    $('#noi_dung').val("");
                },
                error:function(){
                    alert("&#1044;&#1106;&#1044;&#1107;ng nh&#1073;&#1108;­p &#1044;‘&#1073;»&#1107; b&#1043;¬nh lu&#1073;&#1108;­n")
                }
            });
        }

        function laydl(page)
        {
            $.ajax({
                url: '/get-comment-story-chapter?page='+page,
                method:"GET",
                data:{
                    chapter_id: <?php echo e($chapter->id); ?>,
                    _token : '<?php echo csrf_token() ?>'
                },
                success:function(data){
                    $(".list-comment").html(data);
                }
            });
        }

        $(document).on('click','.pagination a', function(e){
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
        $(".mau-nen").click(function (){
            if(sessionStorage.getItem("maunen") == 1)
            {
                sessionStorage.setItem("maunen", 2);
                $("body").css('background','#f1e5c5');
                $(".mau-nen").css('background','#F4F4F4');
            }
            else
            {
                $("body").css('background','#F4F4F4');
                $(".mau-nen").css('background','#f1e5c5');
                sessionStorage.setItem("maunen", 1);
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
        // Auto read.
        function readText() {
            var cleanedContent = (contentData && contentData.content) ? contentData.content.trim() : '';
            if (cleanedContent !== '') {
                responsiveVoice.speak(cleanedContent, "Vietnamese Male", {rate: 1});
            }
        }
       
</script>

                    <!-- FB share -->
                    <?php
function getCurURL()
{
    if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {
        $pageURL = "https://";
    } else {
      $pageURL = 'http://';
    }
    if (isset($_SERVER["SERVER_PORT"]) && $_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    }
    return $pageURL;
}
?>   
    <div class="container chapter" id="chapterBody" style="margin-top: 0px; overflow-x: hidden;">
        <div style="float:right" class="fb-like" data-href="<?php echo getCurURL(); ?>" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="true"></div>
        <div style="margin-left: 954px;" class="zalo-share-button" data-href="" data-oaid="579745863508352884" data-layout="2" data-color="blue" data-customize=false></div>
        <div class="row">
            <div class="col-xs-12">
                <div>
                    <button type="button" class="btn btn-responsive btn-success toggle-nav-open">
                        <span class="glyphicon glyphicon-menu-up"></span>
                    </button>
                    <button type="button" class="btn mau-nen" style="float: right;background:#f1e5c5">
                        <span class="	glyphicon glyphicon-refresh"></span><span> M&agrave;u n&#7873;n</span>
                    </button>   
                </div>
                <br><br>
                <a class="truyen-title" href="<?php echo e(route('story.show', $story->alias)); ?>" title="<?php echo e($story->name); ?>"><?php echo e($story->name); ?></a>
            <?php /*    <div class="col-lg-12 col-12" style="margin-bottom: 16px"> */ ?>
            <?php /*        <button onclick="readText()">Đọc Truyện</button> */ ?>
            <?php /*    </div> */ ?>
                <h2>
                    <a class="chapter-title" href="<?php echo e(route('chapter.show', [$story->alias, $chapter->alias])); ?>" title="<?php echo e($story->name); ?> - <?php echo e($chapter->subname); ?>: <?php echo e($chapter->name); ?>">
                        <span class="chapter-text"><?php echo e($chapter->subname); ?></span>: <?php echo e($chapter->name); ?>

                    </a>
                </h2>
                <hr class="chapter-start">
                <?php echo $__env->make('partials.chapter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <hr class="chapter-end">
                <?php /*<?php echo $__env->make('widgets.asd_ngang', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>*/ ?>
                <div class="chapter-content" id="dynamic-content">
                    <?php echo ($chapter->content); ?>

                </div>

                <div class="ads container">
                    <?php echo \App\Option::getvalue('ads_chapter'); ?>

                </div>

                <hr class="chapter-end">
                <div class="chapter-nav" id="chapter-nav-bot">
                    <?php echo $__env->make('partials.chapter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <div class="text-center">
                        <button type="button" class="btn btn-warning" id="chapter_error" chapter-id="<?php echo e($chapter->id); ?>"><span class="glyphicon glyphicon-exclamation-sign"></span> B&aacute;o l&#7895;i ch&#432;&#417;ng</button>
                        <button type="button" class="btn btn-info" onclick="showtt('fb','tt')" id="chapter_comment" chapter-id="<?php echo e($chapter->id); ?>"><span class="glyphicon glyphicon-comment"></span> Tieuthuyet.vn(<?php echo e($chapter->comment_chapter->count()); ?>)</button>
                        <button type="button" class="btn btn-info" onclick="showfb('fb','tt')" id="chapter_comment"chapter-id="<?php echo e($chapter->id); ?>"><span class="glyphicon glyphicon-comment"></span> Facebook</button>
                <!--(<span class="fb-comments-count" data-href="<?php echo e(route('chapter.show', [$story->alias, $chapter->alias])); ?>"></span>)-->
                    </div>
                    <div class="bg-info text-center visible-md visible-lg box-notice">B&igrave;nh lu&#7853;n v&#259;n minh l&#7883;ch s&#7921; l&agrave; &#273;&#7897;ng l&#7921;c cho t&aacute;c gi&#7843;. N&#7871;u g&#7863;p ch&#432;&#417;ng b&#7883; l&#7895;i h&atilde;y "B&aacute;o l&#7895;i ch&#432;&#417;ng" &#273;&#7875; BQT x&#7917; l&yacute;!
</div>
                    <div class="col-xs-12">
                       
                            <div id="fb" class="fb-comments" data-href="<?php echo e(route('chapter.show', [$story->alias, $chapter->alias])); ?>" data-width="100%" data-numposts="5" data-colorscheme="light" fb-xfbml-state="rendered" style="display:none !important"></div>
                            <div id="tt" class="form-group " style="display:none !important; text-align: left;">
                                <input style="height: 53px; width:100%" class="form-control" id="noi_dung" name="noi_dung" required placeholder="Nh&#7853;p b&#236;nh lu&#7853;n...">
                                <button id="binhluan" type="button" class="btn btn-primary">
                                    B&igrave;nh lu&#7853;n
                                </button>
                                <div class="list-comment">
                                    <?php echo $__env->make('widgets.comment-chapter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                </div>
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
       
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>