<?php $__env->startSection('title', 'B&#7843;ng qu&#7843;n tr&#7883;'); ?>
<?php $__env->startSection('smallTitle', 'Trang Ch&#7911;'); ?>
<?php $__env->startSection('content'); ?>

    <div class="row">

        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Th&ocirc;ng tin</h3>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <tbody>
                        <tr>
                            <td>T&ecirc;n</td>
                            <td><strong><?php echo e(Auth::user()->name); ?></strong></td>
                        </tr>
                        <tr>
                            <td>Ch&#7913;c v&#7909;</td>
                            <td><strong><?php echo e(dqhLevelName(Auth::user()->level)); ?></strong></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?php echo e(Auth::user()->email); ?></td>
                        </tr>
                        <tr>
                            <td>Ng&agrave;y tham gia</td>
                            <td><?php echo e(date_format(Auth::user()->created_at,"d/m/Y H:i:s")); ?></td>
                        </tr>
                        <tr>
                            <td><a href="<?php echo e(route('dashboard.changepassword')); ?>">&#272;&#7893;i m&#7853;t kh&#7849;u</a></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><a href="<?php echo e(route('dashboard.changename')); ?>">&ETH;&#7893;i t&ecirc;n</a></td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <?php if(Auth::user()->isComposer()): ?>

            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Th&#7889;ng k&ecirc;</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tbody>
                            <?php if(Auth::user()->isAdmin()): ?>
                            <tr>
                                <td>T&#7893;ng s&#7889; b&agrave;i vi&#7871;t c&#7911;a trang</td>
                                <td><strong><?php echo e($story->count()); ?></strong></td>
                            </tr>
                            <tr>
                                <td>T&#7893;ng s&#7889; l&#432;&#7907;t xem c&#7911;a trang</td>
                                <td><strong><?php echo e($story->sum('view')); ?></strong></td>
                            </tr>
                            <?php endif; ?>
                            <tr>
                                <td>T&#7893;ng s&#7889; b&agrave;i vi&#7871;t c&#7911;a b&#7841;n</td>
                                <td><strong><?php echo e(Auth::user()->stories()->count()); ?></strong></td>
                            </tr>
                            <tr>
                                <td>T&#7893;ng s&#7889; l&#432;&#7907;t xem c&#7911;a b&#7841;n</td>
                                <td><strong><?php echo e(Auth::user()->stories()->sum('view')); ?></strong></td>
                            </tr>
                            <tr>
                                <td><a href="<?php echo e(route('dashboard.story.create')); ?>">&#272;&#259;ng truy&#7879;n m&#7899;i</a></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        <?php endif; ?>

        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Truy&#7879;n &#273;ang xem</h3>
                </div>
                <div class="panel-body">
                  <?php
                  $viewed = new \App\Viewed;
                  $data = $viewed->getListReading();
                  if(count($data) > 0):
                   ?>
                   <ul>
                      <?php foreach($data as $item): ?>
                      <?php if(!is_null($item->story)): ?>
                      <li><a href="<?php echo e(route('story.show', $item->story->alias)); ?>/"><?php echo e($item->story->name); ?></a> (<a href="<?php echo e(route('chapter.show', [$item->story->alias, $item->chapter->alias])); ?>">&#272;&#7885;c ti&#7871;p <?php echo e($item->chapter->subname); ?></a>)</li>
                      <?php endif; ?>
                      <?php endforeach; ?>
                    </ul>
                  <?php else: ?>
                    <p>
                      B&#7841;n ch&#432;a &#273;&#7885;c truy&#7879;n n&#1072;o c&#7843; :)
                    </p>
                  <?php endif; ?>
                </div>
            </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>