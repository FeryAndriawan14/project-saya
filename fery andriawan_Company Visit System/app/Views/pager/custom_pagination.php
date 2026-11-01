<?php $pager->setSurroundCount(2) ?>

<ul class="pagination pagination-sm shadow-sm">
    <?php if ($pager->hasPrevious()) : ?>
        <li class="page-item">
            <a href="<?= $pager->getFirst() ?>" class="page-link"><i class="fas fa-angle-double-left"></i></a>
        </li>
        <li class="page-item">
            <a href="<?= $pager->getPrevious() ?>" class="page-link"><i class="fas fa-angle-left"></i></a>
        </li>
    <?php endif ?>

    <?php foreach ($pager->links() as $link) : ?>
        <li class="page-item <?= $link['active'] ? 'active' : '' ?>">
            <a href="<?= $link['uri'] ?>" class="page-link"><?= $link['title'] ?></a>
        </li>
    <?php endforeach ?>

    <?php if ($pager->hasNext()) : ?>
        <li class="page-item">
            <a href="<?= $pager->getNext() ?>" class="page-link"><i class="fas fa-angle-right"></i></a>
        </li>
        <li class="page-item">
            <a href="<?= $pager->getLast() ?>" class="page-link"><i class="fas fa-angle-double-right"></i></a>
        </li>
    <?php endif ?>
</ul>