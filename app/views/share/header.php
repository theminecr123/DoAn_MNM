    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="https://i.imgur.com/RxUqBxZ.png" type="image/x-icon">

        <title>RICE</title>

        <!-- Custom fonts for this template-->
        <link href="/DoAn_MNM/public//vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="/DoAn_MNM/public//css/sb-admin-2.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../public/css/style.css">
    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul style="background-image: linear-gradient(180deg, #e9b74b 10%, #4e9857 100%);" class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a style="background-color: #672929;" class="sidebar-brand d-flex align-items-center justify-content-center" href="../account/home">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-laugh-wink"></i>
                    </div>
                    <!-- <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div> -->
                    <img style="width:50px; height:50px" src="https://i.imgur.com/RxUqBxZ.png" />
                    <div style="font-size:35px; margin-left:-20px;" class="sidebar-brand-text mx-3">RICE</div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item active display: flex-col">
                    <a class="nav-link" href="/DoAn_MNM/account/home">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span style="font-size:24px;">Home</span></a>
                        <a class="nav-link" href="/DoAn_MNM/product/listProducts">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span style="font-size:24px;">Sản Phẩm</span></a>
                        <a class="nav-link" href="/DoAn_MNM/cart/show">
                        
                </li>
                <?php
                    if (isset($_SESSION['role'])) {
                        if($_SESSION['role'] != "admin"){
                            echo'
                            <hr class="sidebar-divider">
    
                            <li class="nav-item active display: flex-col">
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                            <span style="font-size:24px;">Giỏ Hàng</span></a>
                            <a class="nav-link" href="/DoAn_MNM/order/showOrderHistory">
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                            <span style="font-size:24px;">Lịch Sử Mua Hàng</span></a>
                            </li>';
                        }
                        

                    }
                ?>
                <!-- Divider -->

                <!-- Heading -->
                

                <?php
                // Check if the session variable 'name' exists
                if (!isset($_SESSION['name'])) {
                    // If the session variable does not exist, hide the registration and login navigation items
                    echo '
                    <hr class="sidebar-divider">

                    <div style="font-size:18px; font-weight: bold; color:#672929" class="sidebar-heading">
                    Account
                </div>
                    <!-- Nav Item - Pages Collapse Menu -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="../account/register" data-target="#collapseTwo"    
                            aria-expanded="true" aria-controls="collapseTwo">
                            <i class="fas fa-fw fa-cog"></i>
                            <span style="font-size:24px;font-weight:bold">Đăng Ký</span>
                        </a>
                    </li>

                    <!-- Nav Item - Utilities Collapse Menu -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="../account/login" data-target="#collapseUtilities"
                            aria-expanded="true" aria-controls="collapseUtilities">
                            <i class="fas fa-fw fa-wrench"></i>
                            <span style="font-size:24px;font-weight:bold">Đăng Nhập</span>
                        </a>
                    </li>';
                }
                ?>


                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div style="font-size:18px; font-weight: bold; color:#672929" class="sidebar-heading">
                    Addons
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                        aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Pages</span>
                    </a>
                    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Login Screens:</h6>
                            <a class="collapse-item" href="login.html">Login</a>
                            <a class="collapse-item" href="register.html">Register</a>
                            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                            <div class="collapse-divider"></div>
                            <h6 class="collapse-header">Other Pages:</h6>
                            <a class="collapse-item" href="404.html">404 Page</a>
                            <a class="collapse-item" href="blank.html">Blank Page</a>
                        </div>
                    </div>
                </li>

                

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

                

            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div style="background-color: #ffffff;" id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav style="    background-color: #e9b74b !important;" class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <ul class="navbar-nav ml-auto">
                                <!-- Nav Item - Cart -->
                                <li class="nav-item">
                                    <a class="nav-link" href="/DoAn_MNM/cart/show" style="font-size: 20px;">
                                        
                                        <button style="margin-top:20px;margin-left:-750px;" class="CartBtn">
                                        <span class="IconContainer"> 
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512" fill="rgb(17, 17, 17)" class="cart"><path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"></path></svg>
                                        </span>
                                        <p class="text-cart">Giỏ Hàng</p>
                                        </button>
                                    </a>
                                </li>
                                <!-- Other topbar items ... -->
                                <?php
                                        if(isset($_SESSION['name'])){
                                        }
                                    ?>
                            </ul>
        
                                    
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                        <?php
                                        if(isset($_SESSION['name'])){
                                            echo '<a href="../account/info" style="position:absolute; top:-90px; left: 800px; font-size:30px;color: white; font-weight:bold; text-decoration: none; margin-left:-140px;margin-top:105px;">' . $_SESSION['name'] . ' | ' . $_SESSION['role'] . '</a>';
                                            // echo "<a class='btn btn-danger' href='../account/logout'>Đăng Xuất2</a>";
                                            echo '
                                            <a href="../account/logout">
                                            <button class="Btn">
                                            <div class="sign">
                                                <svg viewBox="0 0 512 512">
                                                <path
                                                    d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"
                                                ></path>
                                                </svg>
                                            </div>

                                            <div class="text">Đăng Xuất</div>
                                            </button>
                                            </a>
                                            ';
                                    }
                                        ?>
                                    </span>
                                    <img width="50px" style="position:absolute; margin-left:-230px;margin-top:10px" class="img-profile rounded-circle" src="/DoAn_MNM/public//images/undraw_profile.svg">
                                    

                        </ul>

                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                    <style>
                        .Btn {
  display: flex;
  align-items: center;
  justify-content: flex-start;
  width: 45px;
  height: 45px;
  border: none;
  border-radius: 50%;
  cursor: pointer;
  position: relative;
  overflow: hidden;
  transition-duration: 0.3s;
  box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.199);
  background-color: RGB(29, 185, 84);
  margin-top:15px;
  margin-left: -180px;
}

/* plus sign */
.sign {
  width: 100%;
  transition-duration: 0.3s;
  display: flex;
  align-items: center;
  justify-content: center;
}

.sign svg {
  width: 18px;
}

.sign svg path {
  fill: black;
}
/* text */
.text {
  position: absolute;
  right: 0%;
  width: 0%;
  opacity: 0;
  color: black;
  font-size: 18px;
  font-weight: 600;
  transition-duration: 0.3s;
}
/* hover effect on button width */
.Btn:hover {
  width: 185px;
  border-radius: 40px;
  transition-duration: 0.3s;
}

.Btn:hover .sign {
  width: 30%;
  transition-duration: 0.3s;
  padding-left: 20px;
}
/* hover effect button's text */
.Btn:hover .text {
  opacity: 1;
  width: 70%;
  transition-duration: 0.3s;
  padding-right: 10px;
}
/* button click effect*/
.Btn:active {
  transform: translate(2px, 2px);
}


                    </style>