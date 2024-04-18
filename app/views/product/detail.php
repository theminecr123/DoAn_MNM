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



<a href="/DoAn_MNM/product/listProducts">
<button class="button_detail_product_back">

  
  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"></path>
  </svg>

 
  <div class="text">
    Trang Sản Phẩm
  </div>

</button>
</a>

<style>
    .button_detail_product_back {
  background-color: red;
  color: white;
  width: 13em;
  height: 2.9em;
  border: black 0.2em solid;
  border-radius: 11px;
  text-align: right;
  transition: all 0.6s ease;
  margin-top:50px;
  margin-left:80px;
}

.button_detail_product_back:hover {
  background-color: #3654ff;
  cursor: pointer;
}

.button_detail_product_back svg {
  width: 1.6em;
  margin: -0.2em 0.8em 1em;
  position: absolute;
  display: flex;
  transition: all 0.6s ease;
}

.button_detail_product_back:hover svg {
  transform: translateX(5px);
}

.text {
  margin: 0 1.5em
}
</style>

<?php include_once 'app/views/share/footer.php'; ?>
