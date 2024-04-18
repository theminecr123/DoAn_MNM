<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php include_once 'app/views/share/header.php'; ?>
<link rel="stylesheet" href="../public/css/style.css">
<div class="container-fluid">

<head>
<link href="/DoAn_MNM/public//css/style.css" rel="stylesheet">
</head>
    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
        <a href="add">
            <button style="margin-left: -3px;" class="btn-add-product">Thêm Sản Phẩm</button>
        </a>
        <!-- DataTables Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>DESCRIPTION</th>
                                <th>PRICE</th>
                                <th>IMAGE</th>
                                <th>Action</th>
                                <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'user'): ?>
                                    <th>Add to Cart</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                                <tr>
                                    <td class='table-header-listproduct-item'><?= $row['id']; ?></td>
                                    <td style="width:200px" class='table-header-listproduct-item'><?= $row['name']; ?></td>
                                    <td style="width:400px" class='table-header-listproduct-item'><?= $row['description']; ?></td>
                                    <td class='table-header-listproduct-item'><?= number_format($row['price'], 0, '.', ''); ?></td>
                                    <td style="max-width: 120px;">
                                        <?php if (empty($row['image']) || !file_exists($row['image'])): ?>
                                            No Image!
                                        <?php else: ?>
                                            <img src="/DoAn_MNM/<?= $row['image']; ?>" alt="" style="width: 120px; height: 120px; border-radius: 20px; margin-left: 5px;">
                                        <?php endif; ?>
                                    </td>
                                    <td style="max-width: 80px;">
                                        <button class="button-edit-listproduct" onclick="window.location.href='edit?id=<?= $row['id']; ?>'">Sửa</button>
                                        <br>
                                        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                                            <button class="deleteButton" data-id="<?= $row['id']; ?>">Xoá</button>
                                        <?php endif; ?>
                                    </td>
                                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'user'): ?>
                                        <td>
                                            <button class="addToCartButton btn btn-danger" data-id="<?= $row['id']; ?>">Thêm vào giỏ hàng</button>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php else: ?>
        <!-- Product Blocks -->
        <div class="row">
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="<?php echo empty($row['image']) || !file_exists($row['image']) ? 'path/to/default/image.jpg' : '/DoAn_MNM/' . $row['image']; ?>" alt="<?= $row['name']; ?>" class="card-img-top" style="height: 180px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row['name']; ?></h5>
                        <p class="card-text"><?= number_format($row['price'], 0, '', ','); ?> VND</p>
                        <button class="btn btn-danger viewDetailButton" data-id="<?= $row['id']; ?>">Chi tiết</button>
                        <button class="btn btn-danger addToCartButton" data-id="<?= $row['id']; ?>">Thêm vào giỏ hàng</button>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
        </div>

        
    <?php endif; ?>
</div>



<?php include_once 'app/views/share/footer.php'; ?>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script>
   
    // Đoạn script để xử lý sự kiện click vào nút "Chi tiết"
    $('.viewDetailButton').click(function() {
    var productId = $(this).data('id');
    
    // Truyền productId cho hàm detail
    window.location.href = '/DoAn_MNM/product/detail/' + productId;
    });

    $(document).ready(function() {
        // Event handler for "Add to Cart" button
        $('.addToCartButton').click(function() {
            var productId = $(this).data('id');

            // AJAX request to add product to cart
            $.ajax({
                url: '/DoAn_MNM/cart/Add/' + productId,
                type: 'POST',
                success: function(response) {
                    // Use SweetAlert to display a success message
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Đã thêm sản phẩm vào giỏ hàng!',
                        confirmButtonText: 'OK'
                    });
                },
                error: function(xhr, status, error) {
                    // Use SweetAlert to display an error message
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Error adding product to cart: ' + error,
                        confirmButtonText: 'OK'
                    });
                }
            });
        });

        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
            // Event handler for "Delete" button
            $('.deleteButton').click(function() {
                var productId = $(this).data('id');

                // Display a confirmation dialog using SweetAlert
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'Do you want to delete the product with ID ' + productId + '?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, keep it'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // If the user confirmed, proceed with the deletion
                        $.ajax({
                            url: '/DoAn_MNM/product/delete/' + productId,
                            type: 'POST',
                            success: function(response) {
                                Swal.fire(
                                    'Deleted!',
                                    'Product with ID ' + productId + ' has been deleted.',
                                    'success'
                                ).then(() => {
                                    location.reload(); // Reload page to update data
                                });
                            },
                            error: function(xhr, status, error) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'Error deleting product: ' + error,
                                    confirmButtonText: 'OK'
                                });
                            }
                        });
                    }
                });
            });
        <?php endif; ?>
    });
</script>
