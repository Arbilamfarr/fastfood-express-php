<?php
class HomeController {
    public function index() {
        $productModel = new Product();
        $products = $productModel->getAll();

        $lastOrderedProduct = null;
        if (isLoggedIn() && isset($_SESSION['last_ordered_product'])) {
            $lastOrderedProduct = $productModel->getById($_SESSION['last_ordered_product']);
        }

        require __DIR__ . '/../views/home/index.php';
    }

    public function contact() {
        require __DIR__ . '/../views/home/contact.php';
    }
}
?>