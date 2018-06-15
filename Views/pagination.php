<?php if ($pages > 1): ?>
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <?php if ($page > 1) : ?>
                <li class="page-item">
                    <a class="page-link" href="./?page=<?= ($page - 1); ?>&sort=<?= $sort; ?>">&laquo;</a>
                </li>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $pages; $i++): ?>
                <li class="page-item <?= ($page == $i) ? 'active' : ''; ?>">
                    <a class="page-link" href="./?page=<?= $i; ?>&sort=<?= $sort; ?>"><?= $i; ?></a>
                </li>
            <?php endfor; ?>

            <?php if ($page < $pages) : ?>
                <li class="page-item">
                    <a class="page-link" href="./?page=<?= ($page + 1); ?>&sort=<?= $sort; ?>">&raquo;</a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
<?php endif; ?>