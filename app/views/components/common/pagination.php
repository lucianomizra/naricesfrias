<?php 
    $pages = round($list['count'] / $list['limit']);
    $more_pages = round($list['more'] / $list['limit']);
    $current = $list['page'];
    $get = $this->input->get() ? '?'.http_build_query($this->input->get()) : '';
?>
<ul class="pagination">
    <?php if ( $current>1 ): ?>
        <li>
            <a href="<?= $url . '/' . ($current - 1) . $get ?>" aria-label="Previous">
                <span aria-hidden="true">«</span>
            </a>
        </li>
    <?php endif ?>
    <?php $len = ($more_pages>6) ? 6 : $more_pages; ?>
    <?php for ($i = 1; $i <= $len; $i++) : ?>
        <?php if ($i==1): ?>
            <li class="active"><a href="<?= $url . '/' . $current . $get ?>"><?= $current ?></a></li>
        <?php else: ?>
            <li><a href="<?= $url . '/' . ($current + $i - 1) . $get ?>"><?= ($current + $i - 1) ?></a></li>
        <?php endif ?>
    <?php endfor ?>
    <?php if ($more_pages>7): ?>
    <li>
        <a href="<?= $url . '/' . ($current + 1) . $get ?>" aria-label="Next">
            <span aria-hidden="true">»</span>
        </a>
    </li>
    <?php endif ?>
</ul>