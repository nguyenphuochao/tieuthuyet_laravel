<ul class="pagination">
    <?php if($data['stories']->currentPage() !== 1): ?>
        <li><a href="<?php echo e($data['stories']->url(1)); ?>">&laquo;</a></li>
    <?php endif; ?>

    <?php 
        $maxPages = 3; // Số trang tối đa bạn muốn hiển thị
        $start = max($data['stories']->currentPage() - floor($maxPages / 2), 1);
        $end = min($start + $maxPages - 1, $data['stories']->lastPage());
     ?>

    <?php if($start > 1): ?>
        <li><a href="<?php echo e($data['stories']->url(1)); ?>">1</a></li>
        <?php if($start > 2): ?>
            <li><span>...</span></li>
        <?php endif; ?>
    <?php endif; ?>

    <?php for($page = $start; $page <= $end; $page++): ?>
        <?php if($page == $data['stories']->currentPage()): ?>
            <li class="active"><span><?php echo e($page); ?></span></li>
        <?php else: ?>
            <li><a href="<?php echo e($data['stories']->url($page)); ?>"><?php echo e($page); ?></a></li>
        <?php endif; ?>
    <?php endfor; ?>

    <?php if($end < $data['stories']->lastPage()): ?>
        <?php if($end < $data['stories']->lastPage() - 1): ?>
            <li><span>...</span></li>
        <?php endif; ?>
        <li><a href="<?php echo e($data['stories']->url($data['stories']->lastPage())); ?>"><?php echo e($data['stories']->lastPage()); ?></a></li>
    <?php endif; ?>

    <?php if($data['stories']->currentPage() !== $data['stories']->lastPage()): ?>
        <li><a href="<?php echo e($data['stories']->nextPageUrl()); ?>">&raquo;</a></li>
    <?php endif; ?>
</ul>