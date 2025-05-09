<?php
class ProductController { 
    public function index() {
    require_once __DIR__ . '/../models/Product.php';
    $productModel = new Product();
    $products = $productModel->getAll();
    
    require __DIR__ . '/../views/product/index.php';
}

    public function show($productId) {
        $productModel = new Product();
        $product = $productModel->getById($productId);
        $similarProducts = $productModel->getSimilarProducts($productId);
        require __DIR__ . '/../views/product/show.php';
    }
}
?>