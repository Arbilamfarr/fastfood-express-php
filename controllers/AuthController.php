<?php
class AuthController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $remember = isset($_POST['remember']);

            $userModel = new User();
            $user = $userModel->login($email, $password);

            if ($user) {
                $_SESSION['user'] = $user;
                
                if ($remember) {
                    // Créer un cookie pour se souvenir de l'utilisateur
                    $token = bin2hex(random_bytes(32));
                    setcookie('remember_token', $token, time() + (86400 * 30), "/");
                    // Stocker le token dans la base de données
                }

                header('Location: /fastfood-express/home');
                exit();
            } else {
                $error = "Email ou mot de passe incorrect";
            }
        }

        require __DIR__ . '/../views/auth/login.php';
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm_password'];
            $address = $_POST['address'] ?? null;
            $tel = $_POST['tel'] ?? null;

            // Validation simple
            if ($password !== $confirmPassword) {
                $error = "Les mots de passe ne correspondent pas";
            } else {
                $userModel = new User();
                if ($userModel->register($username, $email, $password, $address, $tel)) {
                    header('Location: /fastfood-express/login');
                    exit();
                } else {
                    $error = "Une erreur s'est produite lors de l'inscription";
                }
            }
        }

        require __DIR__ . '/../views/auth/register.php';
    }

    public function logout() {
        session_unset();
        session_destroy();
        setcookie('remember_token', '', time() - 3600, "/");
        header('Location: /fastfood-express/login');
        exit();
    }
}
?>