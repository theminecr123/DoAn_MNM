<!-- app/views/product/detail.php -->
<?php include_once 'app/views/share/header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2><?= htmlspecialchars($product->name) ?></h2>
            <p>Mô tả: <?= htmlspecialchars($product->description) ?></p>
            <p>Giá: <?= number_format($product->price, 0, ',', '.') ?> VND</p>
            <?php if (!empty($product->image) && file_exists($_SERVER['DOCUMENT_ROOT'] . '/DoAn_MNM/' . $product->image)): ?>
                <img src="/DoAn_MNM/<?= htmlspecialchars($product->image) ?>" alt="<?= htmlspecialchars($product->name) ?>" style="max-width: 300px; max-height: 300px;">
            <?php else: ?>
                <p>Không có hình ảnh</p>
            <?php endif; ?>
        </div>
    </div>
</div>


<?php include_once 'app/views/share/footer.php'; ?>
