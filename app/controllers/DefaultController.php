<?php
class DefaultController{
    private $productModel;
    private $db;
    public function __construct(){
        $this->db = (new Database())->getConnection();
        $this->productModel = new ProductModel($this->db);

    }
    public function index(){
        //Gatewaycx
        if(!SessionHelper::isLoggedIn()){
            header('Location: /DoAn_MNM/account/login');
        }else{
            header('Location: /DoAn_MNM/product/listProducts');
        }

        function home() {
            header('Location: /DoAn_MNM/share/home');
        }

        $products = $this->productModel->readAll();
        include_once 'app/views/share/index.php';
    }
}