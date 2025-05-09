<?php
class CartController {
    public function index() {
        $cart = new Cart();
        $items = $cart->getItems();
        $total = $cart->getTotal();
        require __DIR__ . '/../views/cart/index.php';
    }

    public function add($productId, $quantity) {
        $cart = new Cart();
        $cart->add($productId, $quantity);
        header('Location: /fastfood-express/cart');
    }

    public function update($items) {
        $cart = new Cart();
        $cart->update($items);
        header('Location: /fastfood-express/cart');
    }

    public function clear() {
        $cart = new Cart();
        $cart->clear();
        header('Location: /fastfood-express/cart');
    }
}
?>