<?php
class ProfileController {
    public function index() {
        if (!isLoggedIn()) {
            header('Location: /fastfood-express/login');
            exit();
        }

        $userModel = new User();
        $user = $userModel->getUserById($_SESSION['user']['id']);

        $orderModel = new Order();
        $orders = $orderModel->getUserOrders($_SESSION['user']['id']);

        require __DIR__ . '/../views/profile/index.php';
    }

    public function edit() {
        if (!isLoggedIn()) {
            header('Location: /fastfood-express/login');
            exit();
        }

        $userModel = new User();
        $user = $userModel->getUserById($_SESSION['user']['id']);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $tel = $_POST['tel'];

            if ($userModel->updateProfile($_SESSION['user']['id'], $username, $email, $address, $tel)) {
                // Mettre à jour les données de session
                $_SESSION['user']['username'] = $username;
                $_SESSION['user']['email'] = $email;
                $_SESSION['user']['address'] = $address;
                $_SESSION['user']['tel'] = $tel;

                header('Location: /fastfood-express/profile');
                exit();
            } else {
                $error = "Une erreur s'est produite lors de la mise à jour";
            }
        }

        require __DIR__ . '/../views/profile/edit.php';
    }
}
?>