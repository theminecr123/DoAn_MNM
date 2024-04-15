<?php
include_once 'app/views/share/header.php';

// Kiểm tra và hiển thị lỗi nếu có
if(isset($errors) && count($errors) > 0){
    echo '<ul class="error-list">';
    foreach($errors as $error){
        echo '<li>' . $error . '</li>';
    }
    echo '</ul>';
}

// Giữ lại dữ liệu đã nhập nếu có
$nameValue = isset($_POST['name']) ? $_POST['name'] : '';
$emailValue = isset($_POST['email']) ? $_POST['email'] : '';

?>

<form style="margin-left:300px" class="user" action="/QLBanXe/account/save" method="POST" enctype="multipart/form-data">
    <div style="margin-left:50px; width:500px; font-size:18px; border: 1px dashed black;border-radius:50px" class="form-group">
        <input type="text" class="form-control form-control-user" placeholder="Fullname" name="name" value="<?php echo htmlspecialchars($nameValue); ?>">   
    </div> 
    <div style="margin-left:50px; width:500px; font-size:18px;border: 1px dashed black;border-radius:50px" class="form-group">
        <input type="email" class="form-control form-control-user" placeholder="Email" name="email" value="<?php echo htmlspecialchars($emailValue); ?>">
    </div>
    <div style="margin-left:50px; width:500px; font-size:18px;border: 1px dashed black;border-radius:50px" class="form-group">
        <input type="password" maxlength="50" class="form-control form-control-user" placeholder="Password" name="password">
    </div>
    <div style="margin-left:50px; width:500px; font-size:18px;border: 1px dashed black;border-radius:50px" class="form-group">
        <input type="password" maxlength="50" class="form-control form-control-user" placeholder="Confirm Password" name="confirmPassword">
    </div>
    <select name="role" class="custom-select">
        <option value="admin">Admin</option>
        <option value="mod">Mod</option>
        <option value="user">User</option>
    </select>
    <button style="margin-left:50px; width:500px; font-size:18px; margin-top:20px;" class="btn btn-primary btn-user btn-block" name="submit">Register</button>
</form>
<style>
  
    .custom-select {
  position: relative;
  appearance: none;
  -webkit-appearance: none;
  border-radius: 50px;
  background-color: transparent;
  padding: 0.5rem;
  font-size: 1rem;
  cursor: pointer;
  transition: border-color 0.3s ease;
  border: 1px dashed black;
  width:150px;
  height:50px;
  margin-left:50px;
}

.custom-select:focus {
  outline: none;
  border-color: #4c51bf;
}

.custom-select::after {
  content: '';
  position: absolute;
  top: 50%;
  right: 0.75rem;
  transform: translateY(-50%);
  width: 0.5rem;
  height: 0.5rem;
  background-repeat: no-repeat;
  background-size: contain;
  pointer-events: none;
  transition: transform 0.3s ease;
}

.custom-select:focus::after {
  transform: translateY(-50%) rotate(180deg);
}
</style>
<?php
include_once 'app/views/share/footer.php';
?>
