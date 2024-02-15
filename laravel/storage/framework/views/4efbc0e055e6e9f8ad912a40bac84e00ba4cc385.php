<ul class="pagination">
    <?php if($chapters->currentPage() !== 1): ?>
        <li><a href="<?php echo e($chapters->url(1)); ?>#list-chapter">&laquo;</a></li>
    <?php endif; ?>

    <?php 
        $maxPages = 3; // Số trang tối đa bạn muốn hiển thị
        $start = max($chapters->currentPage() - floor($maxPages / 2), 1);
        $end = min($start + $maxPages - 1, $chapters->lastPage());
     ?>

    <?php if($start > 1): ?>
        <li><a href="<?php echo e($chapters->url(1)); ?>#list-chapter">1</a></li>
        <?php if($start > 2): ?>
            <li><span>...</span></li>
        <?php endif; ?>
    <?php endif; ?>

    <?php for($page = $start; $page <= $end; $page++): ?>
        <?php if($page == $chapters->currentPage()): ?>
            <li class="active"><span><?php echo e($page); ?></span></li>
        <?php else: ?>
            <li><a href="<?php echo e($chapters->url($page)); ?>#list-chapter"><?php echo e($page); ?></a></li>
        <?php endif; ?>
    <?php endfor; ?>

    <?php if($end < $chapters->lastPage()): ?>
        <?php if($end < $chapters->lastPage() - 1): ?>
            <li><span>...</span></li>
        <?php endif; ?>
        <li><a href="<?php echo e($chapters->url($chapters->lastPage())); ?>#list-chapter"><?php echo e($chapters->lastPage()); ?></a></li>
    <?php endif; ?>

    <?php if($chapters->currentPage() !== $chapters->lastPage()): ?>
        <li><a href="<?php echo e($chapters->nextPageUrl()); ?>#list-chapter">&raquo;</a></li>
    <?php endif; ?>
</ul>
