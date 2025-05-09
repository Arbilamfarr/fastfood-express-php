<?php
require_once __DIR__ . '/init.php';

// Router basique
$request = $_SERVER['REQUEST_URI'];
$path = parse_url($request, PHP_URL_PATH);

switch ($path) {
    case '/fastfood-express/home':
            require __DIR__ . '/controllers/HomeController.php';
            $controller = new HomeController();
            $controller->index();
            break;
    case '/fastfood-express/products':
            require __DIR__ . '/controllers/ProductController.php';
            $controller = new ProductController();
            $controller->index();
            break;
    case '/fastfood-express/product':
        require __DIR__ . '/controllers/ProductController.php';
        $controller = new ProductController();
        $controller->show($_GET['id'] ?? 0);
        break;
    case '/fastfood-express/cart':
        require __DIR__ . '/controllers/CartController.php';
        $controller = new CartController();
        $controller->index();
        break;
    case '/fastfood-express/cart/add':
        require __DIR__ . '/controllers/CartController.php';
        $controller = new CartController();
        $controller->add($_POST['product_id'] ?? 0, $_POST['quantity'] ?? 1);
        break;
    case '/fastfood-express/cart/update':
        require __DIR__ . '/controllers/CartController.php';
        $controller = new CartController();
        $controller->update($_POST);
        break;
    case '/fastfood-express/cart/clear':
        require __DIR__ . '/controllers/CartController.php';
        $controller = new CartController();
        $controller->clear();
        break;
    case '/fastfood-express/checkout':
        require __DIR__ . '/controllers/OrderController.php';
        $controller = new OrderController();
        $controller->checkout();
        break;
    case '/fastfood-express/payment':
        require __DIR__ . '/controllers/OrderController.php';
        $controller = new OrderController();
        $controller->payment();
        break;
    case '/fastfood-express/login':
        require __DIR__ . '/controllers/AuthController.php';
        $controller = new AuthController();
        $controller->login();
        break;
    case '/fastfood-express/register':
        require __DIR__ . '/controllers/AuthController.php';
        $controller = new AuthController();
        $controller->register();
        break;
    case '/fastfood-express/logout':
        require __DIR__ . '/controllers/AuthController.php';
        $controller = new AuthController();
        $controller->logout();
        break;
    case '/fastfood-express/profile':
        require __DIR__ . '/controllers/ProfileController.php';
        $controller = new ProfileController();
        $controller->index();
        break;
    case '/fastfood-express/profile/edit':
        require __DIR__ . '/controllers/ProfileController.php';
        $controller = new ProfileController();
        $controller->edit();
        break;
    case '/fastfood-express/contact':
        require __DIR__ . '/controllers/HomeController.php';
        $controller = new HomeController();
        $controller->contact();
        break;
    case '/fastfood-express/theme':
            if (isset($_GET['theme'])) {
                setTheme($_GET['theme']);
            }
            header('Location: ' . $_SERVER['HTTP_REFERER'] ?? '/');
            break;
    case '/fastfood-express/language':
            if (isset($_GET['lang'])) {
                setLanguage($_GET['lang']);
            }
            header('Location: ' . $_SERVER['HTTP_REFERER'] ?? '/');
            break;
    default:
        http_response_code(404);
        require __DIR__ . '/views/errors/404.php';
        break;
}
?>