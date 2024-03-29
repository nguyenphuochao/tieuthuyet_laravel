<?php $__env->startSection('title', "Đăng ký"); ?>
<?php $__env->startSection('content'); ?>
    <style>
        .from-button button {
            margin: 0 auto;
            display: block;
            width: 200px;
        }

        .social-register a {
            margin-top: 30px;
        }

        @media  screen and (min-width: 992px) {
            .form-group.row.mb-0.align-row::after {
                content: "";
                border-left: 1px solid #ccc;
                height: 86.6%;
                position: absolute;
                top: 41px;
                left: 50%;
                transform: translateX(-50%);
            }
        }

        @media  screen and (max-width: 992px) {
            .form-group.row.mb-0.align-row::after {
                content: "";
                border-top: 1px solid #ccc;
                width: 96%;
                position: absolute;
                left: 2%;
                top: 86%;
                transform: translateY(-50%);
            }

            .social-register {
                margin-top: 40px;
                text-align: center;
            }
        }

        @media  screen and (max-width: 482px) {
            .form-group.row.mb-0.align-row::after {
                content: "";
                border-top: 1px solid #ccc;
                width: 93%;
                position: absolute;
                left: 3.5%;
                top: 79%;
                transform: translateY(-50%);
            }
            .social-register a{
                margin-top: 12px;
            }
        }

    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <?php echo $__env->make('admin.block.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <section class="content">
                        <?php if(Session::has('flash_message')): ?>
                            <div class="row">
                                <div class="col-lg-12" id="flash">
                                    <div class="alert alert-<?php echo e(Session::get('flash_level')); ?>" role="alert">
                                        <?php echo e(Session::get('flash_message')); ?>

                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                       
                    </section>
                    <div class="panel-heading">Đăng ký</div>
                    <div class="panel-body">
                        <?php if(\App\Option::getvalue('has_register') == 1): ?>
                            <br><br>
                            <div class="form-group row mb-0 align-row">
                                <div class="col-lg-6 col-xs-12 from-button">
                                    <form action="<?php echo e(route('customer.create.post')); ?>" method="POST">
                                        <?php echo e(csrf_field()); ?>

                                        <div class="form-group">
                                            <label>Tên tác giả</label>
                                            <input type="text" class="form-control" name="name"
                                                   placeholder="Nhập tên thành viên"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email"
                                                   placeholder="Nhập email thành viên"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Mật khẩu</label>
                                            <input type="password" class="form-control" name="password"
                                                   placeholder="Nhập mật khẩu thành viên"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Mật khẩu xác nhận</label>
                                            <input type="password" class="form-control" name="password_confirmation"
                                                   placeholder="Nhập mật khẩu thành viên"/>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Đăng ký</button>
                                    </form>
                                </div>
                                <div class="col-lg-6 col-xs-12 social-register">
                                    <a href="<?php echo e(url('/auth/redirect/google')); ?>" class="btn btn-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor"
                                             class="bi bi-google" style="vertical-align: -.125em;" viewBox="0 0 16 16">
                                            <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"/>
                                        </svg>
                                        &nbsp Đăng nhập / Đăng ký Google</a>
                                    <a href="<?php echo e(url('/auth/redirect/facebook')); ?>" class="btn btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             style="vertical-align: -.125em;" fill="currentColor" class="bi bi-facebook"
                                             viewBox="0 0 16 16">
                                            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                                        </svg>
                                        &nbsp Đăng nhập / Đăng ký Facebook
                                    </a>
                                </div>
                            </div>

                            <br>
                        <?php else: ?>
                            <p>
                                Đăng ký đã bị vô hiệu hóa bởi người quản trị
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app_login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>