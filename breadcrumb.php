<?php
// Usage: include 'includes/breadcrumb.php';
// Set $breadcrumbItems before including, e.g.:
// $breadcrumbItems = [ ['url'=>'/index.php','label'=>'Home'], ['label'=>'Katalog'] ];
if (!isset($breadcrumbItems)) $breadcrumbItems = [];
?>
<nav aria-label="breadcrumb" style="margin-bottom:1.5rem;">
    <ol class="breadcrumb" style="background:transparent;padding:0;margin:0;font-size:.82rem;">
        <?php foreach ($breadcrumbItems as $i => $item): ?>
            <?php if (isset($item['url']) && $i < count($breadcrumbItems)-1): ?>
                <li class="breadcrumb-item">
                    <a href="<?= $item['url'] ?>" style="color:var(--fas-muted);text-decoration:none;transition:color .2s;"
                       onmouseover="this.style.color='var(--fas-orange)'" onmouseout="this.style.color='var(--fas-muted)'">
                        <?= $item['label'] ?>
                    </a>
                </li>
            <?php else: ?>
                <li class="breadcrumb-item active" style="color:var(--fas-white);font-weight:600;">
                    <?= $item['label'] ?>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ol>
</nav>