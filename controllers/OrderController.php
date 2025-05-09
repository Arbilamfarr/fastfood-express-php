<?php
class OrderController {
    public function checkout() {
        if (!isLoggedIn()) {
            header('Location: /fastfood-express/login');
            exit();
        }

        $cart = new Cart();
        if ($cart->count() === 0) {
            header('Location: /fastfood-express/cart');
            exit();
        }

        $userModel = new User();
        $user = $userModel->getUserById($_SESSION['user']['id']);
        $items = $cart->getItems();
        $total = $cart->getTotal();

        require __DIR__ . '/../views/order/checkout.php';
    }

    public function payment() {
        if (!isLoggedIn()) {
            header('Location: /fastfood-express/login');
            exit();
        }

        $cart = new Cart();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
                die('Erreur de sécurité CSRF');
            }

            $paymentMethod = $_POST['payment_method'];
            $total = $cart->getTotal();

            $orderModel = new Order();
            $orderId = $orderModel->create($_SESSION['user']['id'], $total, $paymentMethod);

            if ($orderId) {
                $_SESSION['last_ordered_product'] = end($_SESSION['cart'])['id'] ?? null;
                $cart->clear();
                $_SESSION['order_success'] = true;
                header('Location: /fastfood-express/profile');
                exit();
            } else {
                $error = "Une erreur s'est produite lors de la commande";
            }
        }

        $items = $cart->getItems();
        $total = $cart->getTotal();
        require __DIR__ . '/../views/order/payment.php';
    }
}

?>