<?php include_once 'app/views/share/header.php'; ?>

<div class="container">
    <h2>User Information</h2>
    <div class="user-info">
        <div class="form-group">
            <label>Name:</label>
            <p><?php echo htmlspecialchars($userInfo->name, ENT_QUOTES, 'UTF-8'); ?></p>
        </div>
        <div class="form-group">
            <label>Email:</label>
            <p><?php echo htmlspecialchars($userInfo->email, ENT_QUOTES, 'UTF-8'); ?></p>
        </div>
        <div class="form-group">
            <label>Address:</label>
            <p><?php echo htmlspecialchars($userInfo->address, ENT_QUOTES, 'UTF-8'); ?></p>
        </div>
        <!-- Add any other user information fields here -->
        
        <!-- Button to edit user information -->
        <a href="/DoAn_MNM/account/edit" class="btn btn-primary">Edit Information</a>
    </div>
</div>

<?php include_once 'app/views/share/footer.php'; ?>
