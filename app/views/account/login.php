<?php
include_once 'app/views/share/header.php' ?>

<?php
    if(isset($errors)){
        foreach($errors as $x){
            echo '<li>' .$x.'</li>';
        }
        echo '</ul>';
    }
?>

<form style="margin-left:300px;" class="user" action="/QLBanXe/account/checkLogin" method="post" enctype="multipart/form-data">
    <div style="margin-left:50px; width:500px; font-size:18px;border: 1px dashed black;border-radius:50px"" class="form-group">
        <input type="email" class="form-control form-control-user"  placeholder="Email" name="email">
    </div>
    <div style="margin-left:50px; width:500px; font-size:18px;border: 1px dashed black;border-radius:50px"" class="form-group">
        <input type="password" maxlength="50" class="form-control form-control-user"  placeholder="Password" name="password">
    </div>

    <button href="index.html" style="margin-left:220px; width:200px; font-size:18px;" class="btn btn-primary btn-user btn-block" name = "submit">Login</button>
</form>

<?php
include_once 'app/views/share/footer.php' ?>