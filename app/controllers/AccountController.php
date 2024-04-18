<?php
class AccountController{
    private $db;
    private $accountModel;
    function __construct(){
        $this->db = (new Database())->getConnection();
        $this->accountModel = new AccountModel($this->db);
    }
    function login(){
        include_once 'app/views/account/login.php';
    }
    function home(){
        include_once 'app/views/share/home.php';
    }
    //Ma hoa mat khau bang BCrypt
    function register(){
        include_once 'app/views/account/register.php';
    }

    
    function logout(){
        if(!empty($_SESSION['id'])){
            header('Location: /DoAn_MNM/account/login');
            session_destroy();
            exit;
        }
    }

    function save(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $confirmPassword = $_POST['confirmPassword'] ?? '';
            $role = "user";
    
            $errors=[];
            if(empty($name)){
                $errors['name'] = 'Name is required';
            }
            if(empty($email)){
                $errors['email'] = 'Email is required';
            }
            if(empty($password)){
                $errors['password'] = 'Password is required';
            }
            if(empty($confirmPassword)){
                $errors['confirmPassword'] = 'Confirm Password is required';
            }
            if($password != $confirmPassword){
                $errors['confirmPassword'] = 'Confirm Password does not match';
            }
            if($this->accountModel->getAccountByEmail($email)){
                $errors['account'] = 'Email is already existed';
            }
    
            if(count($errors) > 0){
                // Truyền mảng lỗi vào trang đăng ký
                include_once 'app/views/account/register.php';
            } else {
                //$password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
                $result = $this->accountModel->createAccount($name, $email, $password, $role, "");
                if($result){
                    // Tài khoản được tạo thành công, chuyển hướng đến trang đăng nhập
                    header('Location: ../account/login');
                    exit; // Dừng kịch bản sau khi chuyển hướng
                } else {
                    // Xảy ra lỗi khi tạo tài khoản, hiển thị thông báo lỗi
                    $errors['account'] = 'Failed to create account';
                    include_once 'app/views/account/register.php';
                }
            }
        }
    }
    function checkLogin(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $errors = [];
            if(empty($email)){
                $errors['email'] = 'Email is required';
            }
            if(empty($password)){
                $errors['password'] = 'Password is required';
            }
            if(count($errors)>0){
                include_once 'app/views/account/login.php';
            }
            $account = $this->accountModel->getAccountByEmail($email);
            if($account){
                // Lấy mật khẩu đã mã hóa từ cơ sở dữ liệu
                $hashedPasswordFromDatabase = $account->password;
            
                // So sánh mật khẩu nhập vào với mật khẩu đã mã hóa từ cơ sở dữ liệu
                //if($account && password_verify($password, $hashedPasswordFromDatabase)){
                if($account && $password == $hashedPasswordFromDatabase){
                    
                    // Mật khẩu đúng, thực hiện các hành động tiếp theo
                    $_SESSION['id'] = $account->id;
                    $_SESSION['name'] = $account->name;
                    $_SESSION['email'] = $account->email;
                    $_SESSION['role'] = $account->role;
                    $_SESSION['address'] = $account->address;

                    header('Location: ../product/listProducts');
                } else {
                    // Mật khẩu không đúng
                    $errors['account'] = 'Email or password is incorrect';
                    include_once 'app/views/account/login.php';
                }
            }else{
                include_once 'app/views/account/login.php';
            }
            

        }
    }
    function info() {
        // Check if the user is logged in
        if (!isset($_SESSION['id'])) {
            // If not logged in, redirect to the login page
            header('Location: /DoAn_MNM/account/login');
            exit;
        }
        
        // Get the user's ID from the session
        $userId = $_SESSION['id'];
        
        // Use the AccountModel to get the user's information
        $userInfo = $this->accountModel->getAccountById($userId);
        
        // Check if the user's information was found
        if ($userInfo) {
            // Include the view file for displaying user information
            include_once 'app/views/account/info.php';
        } else {
            // If the user's information is not found, redirect to the home page
            header('Location: /DoAn_MNM/home');
            exit;
        }
    }
    public function edit() {
        if (!isset($_SESSION['id'])) {
            header('Location: /DoAn_MNM/account/login');
            exit;
        }

        $userId = $_SESSION['id'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve form data
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $address = $_POST['address'] ?? '';

            // Update the user's information
            $result = $this->accountModel->updateAccount($userId, $name, $email, $address);

            if ($result) {
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                $_SESSION['address'] = $address;
                header('Location: /DoAn_MNM/account/info'); // Redirect to user info page
            } else {
                $error = 'Failed to update user information';
            }
        }

        // Get user information
        $user = $this->accountModel->getAccountById($userId);

        // Include the edit_info view file
        include_once 'app/views/account/edit_info.php';
    }
    
    public function editInfo() {
        if (!isset($_SESSION['id'])) {
            header('Location: /DoAn_MNM/account/login');
            exit;
        }

        $userId = $_SESSION['id'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve form data
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $address = $_POST['address'] ?? '';

            // Update the user's information
            $result = $this->accountModel->updateAccount($userId, $name, $email, $address);

            if ($result) {
                header('Location: /DoAn_MNM/order/showCheckoutForm'); // Redirect to user info page
            } else {
                $error = 'Failed to update user information';
            }
        }

        // Get user information
        $user = $this->accountModel->getAccountById($userId);
    }
}