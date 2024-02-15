<!-- navibar -->
<script>
function vietTruyen() {
    var r = confirm("Bạn muốn đăng ký trở thành biên soạn!");
    if (r == true) {
        $.ajax({
            type:'POST',
            url:'<?php echo e(route("dang-ky-bien-soan")); ?>',
            success:function(data) {
                if(data == 1)
                    window.location.replace("<?php echo e(route('dashboard.story.create')); ?>");
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
                <a class="header-logo" href="/" title="Trang chủ"><?php echo $__env->yieldContent('title'); ?></a> 
            </h1>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="control nav navbar-nav ">
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-list"></i> Danh sách <i class="caret"></i></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo e(route('danhsach.truyenmoi')); ?>" title="Truyện mới cập nhật">Truyện mới cập nhật</a></li>
                        <li><a href="<?php echo e(route('danhsach.truyenhot')); ?>" title="Truyện Hot">Truyện Hot</a></li>
                        <li><a href="<?php echo e(route('danhsach.truyenfull')); ?>" title="Truyện Full">Truyện Full</a></li>
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
                        <?php foreach($categories as $category): ?>
                            <li class="col-md-6">
                                <a href="<?php echo e(route('category.list.index', ['alias' => $category->alias])); ?>">
                                    <?php echo e($category->name); ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>

                <li class="dropdown">
                    <?php if(Auth::user()): ?>
                    <li class="dropdown user user-menu" style="width: 30%">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <?php if(Auth::user()->avatar): ?>
                            <img src="<?php echo Auth::user()->avatar; ?>" class="" alt="User Image" style="width: 19%">
                            <?php else: ?>
                            <img src="http://www.gravatar.com/avatar/<?php echo md5( Auth::user()->email ); ?>?s=160&d=mp" class="" alt="User Image" style="width: 19%">
                            <?php endif; ?>
                            <span ><?php echo Auth::user()->name; ?></span>
                        </a>
                        <ul class="dropdown-menu user-info-header">
                            <!-- User image -->
                            <li class="user-header">
                            <p>
                                <a href="/dashboard">
                                    <?php if(Auth::user()->avatar): ?>
                                    <img src="<?php echo Auth::user()->avatar; ?>" class="img-circle img-thumbnail" style="width: 50%" alt="User Image">
                                    <?php else: ?>
                                        <img src="http://www.gravatar.com/avatar/<?php echo md5( Auth::user()->email ); ?>?s=160&d=mp" class="img-circle img-thumbnail" style="width: 50%" alt="User Image">
                                    <?php endif; ?>
                                </a>
                            </p>

                            <p>
                            <a href="/dashboard"><?php echo Auth::user()->name; ?></a> </br>
                                <small>Hôm nay là <?php echo date('d/m/Y'); ?></small>
                            </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?php echo e(route('dashboard.changepassword')); ?>" class="btn btn-default btn-flat">Đổi mật khẩu</a>
                            </div>
                            <div class="pull-right">
                                <a href="<?php echo e(url('logout')); ?>" class="btn btn-default btn-flat">Thoát</a>
                            </div>
                            </li>
                        </ul>
                    </li>
                    <?php else: ?>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i> Tài khoản <i class="caret"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="<?php echo e(url("/login")); ?>"><span class="glyphicon glyphicon-user"></span> Đăng nhập</a>
                                <a href="<?php echo e(url("/register")); ?>"><span class="glyphicon glyphicon-cog"></span> Đăng ký</a>
                            </li>
                        </ul>
                    <?php endif; ?>
                
                </li>
                <li>
                    <?php if(Auth::user() && Auth::user()->level == 0): ?>
                        <a class="hidden-xs" onclick="vietTruyen()"><i class="glyphicon glyphicon-open"></i> Viết truyện</a>
                    <?php elseif(Auth::user() && Auth::user()->level == 1): ?>
                        <a class="hidden-xs" href="<?php echo e(route('dashboard.story.create')); ?>"><i class="glyphicon glyphicon-open"></i> Viết truyện</a>
                    <?php elseif(Auth::user() && Auth::user()->level == 1): ?>
                        <a class="hidden-xs" href="/dashboard/leech"><i class="glyphicon glyphicon-open"></i> Viết truyện</a>
                    <?php else: ?>
                        <a class="hidden-xs" href="/dashboard"><i class="glyphicon glyphicon-open"></i> Viết truyện</a>
                    <?php endif; ?>
                </li>
            </ul>

</div>
<!--/.nav-collapse -->
</div>
<div class="navbar-breadcrumb">
    <div class="container breadcrumb-container">
        <?php echo $__env->yieldContent('breadcrumb'); ?>


    </div>
</div>
</div><!-- navibar -->
