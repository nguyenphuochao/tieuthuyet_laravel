<ul class="pagination">
    <?php if($getListForCategory->currentPage() !== 1): ?>
        <li><a href="<?php echo e($getListForCategory->url(1)); ?>#list-category">&laquo;</a></li>
    <?php endif; ?>

    <?php 
        $maxPages = 3; // Số trang tối đa bạn muốn hiển thị
        $start = max($getListForCategory->currentPage() - floor($maxPages / 2), 1);
        $end = min($start + $maxPages - 1, $getListForCategory->lastPage());
     ?>

    <?php if($start > 1): ?>
        <li><a href="<?php echo e($getListForCategory->url(1)); ?>#list-category">1</a></li>
        <?php if($start > 2): ?>
            <li><span>...</span></li>
        <?php endif; ?>
    <?php endif; ?>

    <?php for($page = $start; $page <= $end; $page++): ?>
        <?php if($page == $getListForCategory->currentPage()): ?>
            <li class="active"><span><?php echo e($page); ?></span></li>
        <?php else: ?>
            <li><a href="<?php echo e($getListForCategory->url($page)); ?>#list-category"><?php echo e($page); ?></a></li>
        <?php endif; ?>
    <?php endfor; ?>

    <?php if($end < $getListForCategory->lastPage()): ?>
        <?php if($end < $getListForCategory->lastPage() - 1): ?>
            <li><span>...</span></li>
        <?php endif; ?>
        <li><a href="<?php echo e($getListForCategory->url($getListForCategory->lastPage())); ?>#list-category"><?php echo e($getListForCategory->lastPage()); ?></a></li>
    <?php endif; ?>

    <?php if($getListForCategory->currentPage() !== $getListForCategory->lastPage()): ?>
        <li><a href="<?php echo e($getListForCategory->nextPageUrl()); ?>#list-category">&raquo;</a></li>
    <?php endif; ?>
</ul>