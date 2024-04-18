<?php
include_once 'app/views/share/header.php';

// Tính tổng giá trị của giỏ hàng
$totalCartValue = 0;

// echo "Dia chi:" . $_SESSION['address'];

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    // echo "Giỏ hàng đang trống!";
    echo '<div style="font-weight:bold; font-size:50px; color: #333; padding: 10px; border-radius: 4px; text-align: center;">Giỏ hàng đang trống!</div>';
    echo '<img style="margin-left:350px;margin-top:-10px;" src="https://cdnl.iconscout.com/lottie/premium/thumb/shopping-bag-6866084-5624247.gif"/>';
    echo '<img style="width:120px; height:100px;transform: rotate(190deg);margin-left:-930px;margin-top:-350px;" src="https://media3.giphy.com/media/VSeTR5iGkgDwrS9cff/giphy.gif?cid=6c09b952jpuvbm6rvonzib9iftzi5x5vf5uppm96ys7vci1b&ep=v1_internal_gif_by_id&rid=giphy.gif&ct=s"/>';
    echo '<span style="position:absolute; top:670px;left:330px;border: 2px dashed #fd6254;border-radius:10px;padding:20px;margin-left:-100px;margin-top:-350px; color:black;font-weight:bold;">Bạn bấm vào "Sản Phẩm" để thêm vào giỏ hàng nhé!</span>';
    } else {
    echo "<h2>Danh sách giỏ hàng</h2>";
    echo "<table id='cartTable' class='display'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Name</th>";
    echo "<th>Price</th>";
    echo "<th>Image</th>";
    echo "<th>Quantity</th>";
    echo "<th>Total</th>"; // Thêm cột mới để hiển thị tổng tiền của từng sản phẩm
    echo "<th>Action</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    foreach ($_SESSION['cart'] as $item) {
        echo "<tr>";
        echo "<td class='table-header-item'>$item->id</td>";
        echo "<td class='table-header-item'>$item->name</td>";
        echo "<td class='table-header-item'>" . number_format($item->price, 0, ',', '.') . " </td>";
        echo "<td class='table-header-item'><img src='/DoAn_MNM/$item->image' alt='Product Image' style='width:120px; height:120px; border-radius:10px;'></td>";
        echo "<td>
                <input name='id' type='hidden' value='$item->id' /> 
                <input name='quantity' type='number' value='$item->quantity' class='quantityInput' data-id='$item->id'/> <!-- Thêm data-id để xác định sản phẩm -->
            </td>";
        echo "<td class='itemTotal'></td>"; 
        echo "<td>
                <button class='btn btn-danger deleteButton' data-id='$item->id'>Delete</button>
            </td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    // Thêm một định dạng mới với id 'totalCartValueContainer'
    echo "<p style='font-weight:bold; color:black; font-size:24px;' id='totalCartValueContainer'>Total Cart Value: <span id='totalCartValue'></span></p>";
    echo "<input id='confirmInformationButton' type='submit' value='Xác nhận' class='button-checkout'></input>";

    
   // Form nhập thông tin người dùng
   echo "<div id='userInfoForm' style='display: none; margin-top: 20px;'>"; // Added margin top for better spacing
   echo "<form id='userInfoForm' method='post' action='/DoAn_MNM/account/editInfo' class='form-group' style='max-width: 500px; margin: auto;'>"; // Added max-width and center form
   echo "<div class='form-group'>";
   echo "<label for='name'>Họ và tên:</label>";
   echo "<input type='text' id='name' name='name' class='form-control' value='" . $_SESSION['name'] . "' required>";
   echo "</div>";
   echo "<div class='form-group'>";
   echo "<label for='email'>Email:</label>";
   echo "<input type='email' id='email' name='email' class='form-control' value='" . $_SESSION['email'] . "' readonly required>";
   echo "</div>";
   echo "<div class='form-group'>";
   echo "<label for='address'>Địa chỉ:</label>";
   echo "<input type='text' id='address' name='address' class='form-control' value='" . $_SESSION['address'] . "' required>";
   echo "</div>";
   echo "<div class='form-group'>";
   echo "<input type='submit' value='Lưu thay đổi' id='submitUserInfoForm' class='btn btn-primary'>"; // Changed button text and added Bootstrap class
   echo "</div>";
   echo "</form>";
   echo "</div>";
   

}
include_once 'app/views/share/footer.php';

echo '<script>';
if (isset($_SESSION['id'])) {
    echo 'var isLoggedIn = true;';
} else {
    echo 'var isLoggedIn = false;';
}
echo '</script>';
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>


window.addEventListener('DOMContentLoaded', function() {
    document.getElementById('confirmInformationButton').addEventListener('click', function(event) {
        if (!isLoggedIn) {
            // Use SweetAlert to show an alert
            Swal.fire({
                title: 'Login Required',
                text: 'You must be logged in to proceed with checkout.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Log In',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If the user clicks "Log In", redirect them to the login page
                    window.location.href = '/DoAn_MNM/account/login';
                }
            });
            
            // Prevent form submission
            event.preventDefault();
        }else{
            document.getElementById('userInfoForm').style.display = 'block';

        }
    });
});


</script>

<script>
    document.getElementById('submitUserInfoForm').addEventListener('click', function(event) {
    event.preventDefault(); // Ngăn chặn hành động mặc định của nút submit
    
    // Lấy giá trị mới từ form
    var newName = document.getElementById('name').value;
    var newAddress = document.getElementById('address').value;
    
    // So sánh giá trị mới với giá trị trong session
    if (newName !== '<?php echo $_SESSION["name"]; ?>' || newAddress !== '<?php echo $_SESSION["address"]; ?>') {
        // Nếu có sự thay đổi, cập nhật thông tin trong session
        <?php
        $_SESSION['name'] = newName;
        $_SESSION['address'] = newAddress;
        ?>
        document.getElementById('userInfoForm').submit();
    } 
    window.location.href = '/DoAn_MNM/order/showCheckoutForm';
});


function updateItemTotal() {
    document.querySelectorAll('.display tbody tr').forEach(row => {
        // Get the price text
        let priceText = row.querySelector('td:nth-child(3)').textContent;

        // Convert the price text from the formatted currency string to a float value
        let price = parseFloat(priceText.replace(/\./g, '').replace(',', '.'));

        // Get the quantity from the input
        let quantity = parseInt(row.querySelector('.quantityInput').value);

        // Calculate the total for the item
        let total = price * quantity;

        // Format the total as currency in VND
        let formattedTotal = total.toLocaleString('vi-VN', {
            style: 'currency',
            currency: 'VND',
            minimumFractionDigits: 0
        });

        // Set the formatted total in the appropriate table cell
        row.querySelector('.itemTotal').textContent = formattedTotal;
    });
}

function updateTotalCartValue() {
    let total = 0;
    document.querySelectorAll('.display tbody tr').forEach(row => {
        let totalItemText = row.querySelector('.itemTotal').textContent;
        
        let totalItemString = totalItemText.replace(/[^\d.,]/g, '');
        
        totalItemString = totalItemString.replace(/\./g, '').replace(',', '.');
        
        let totalItemNumber = parseFloat(totalItemString);
        
        total += totalItemNumber;
    });

    let formattedTotalCartValue = total.toLocaleString('vi-VN', {
        style: 'currency',
        currency: 'VND'
    });

    document.getElementById('totalCartValue').textContent = formattedTotalCartValue;
}

function updateCartItem(id, quantity) {
    id = parseInt(id);
    quantity = parseInt(quantity);

    let formData = new FormData();
    formData.append('id', id);
    formData.append('quantity', quantity);

    fetch('/DoAn_MNM/cart/updateQuantity/', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Cập nhật số lượng sản phẩm không thành công');
        }
        return response.json();
    })
    .then(data => {
        // Sau khi cập nhật số lượng sản phẩm, cập nhật tổng giá trị giỏ hàng và tổng tiền của mỗi sản phẩm
        updateItemTotal();
        updateTotalCartValue();
    })
    .catch(error => {
        console.error('Lỗi: ', error);
    });
}

// Function để gửi yêu cầu xoá sản phẩm khỏi giỏ hàng
function deleteCartItem(id) {
    fetch('/DoAn_MNM/cart/deleteItem/' + id, {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => {
        if (response.ok) {
            // Sau khi xoá sản phẩm, reload trang để cập nhật lại giỏ hàng và tổng giá trị giỏ hàng
            location.reload();
        } else {
            console.error('Xoá sản phẩm không thành công');
        }
    })
    .catch(error => {
        console.error('Lỗi: ', error);
    });
}

// Event listener cho input số lượng sản phẩm
document.querySelectorAll('.quantityInput').forEach(input => {
    input.addEventListener('change', (event) => {
        let id = input.getAttribute('data-id');
        let quantity = input.value;
        updateCartItem(id, quantity); // Gọi function để cập nhật số lượng sản phẩm
    });
});

// Event listener cho nút xoá sản phẩm
document.querySelectorAll('.deleteButton').forEach(button => {
    button.addEventListener('click', (event) => {
        let id = event.target.getAttribute('data-id');
        deleteCartItem(id); // Gọi function để xoá sản phẩm
    });
});

// Hàm được gọi khi trang được load để tính và cập nhật tổng tiền của mỗi sản phẩm và tổng tiền của giỏ hàng
window.onload = function() {
    updateItemTotal();
    updateTotalCartValue();
};
</script>

