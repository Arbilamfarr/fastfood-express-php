<?php
session_start();

// Configuration de base
define('BASE_URL', 'http://localhost/fastfood-express');
define('DEFAULT_LANG', 'fr');
define('DEFAULT_THEME', 'light');

// Gestion des cookies pour la langue et le thème
$lang = $_COOKIE['lang'] ?? DEFAULT_LANG;
$theme = $_COOKIE['theme'] ?? DEFAULT_THEME;

// Inclure les dépendances
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/models/User.php';
require_once __DIR__ . '/models/Product.php';
require_once __DIR__ . '/models/Order.php';
require_once __DIR__ . '/models/Cart.php';

// Initialiser le panier si non existant
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Fonctions utilitaires
function isLoggedIn() {
    return isset($_SESSION['user']);
}

function getUser() {
    return $_SESSION['user'] ?? null;
}

function setLanguage($lang) {
    setcookie('lang', $lang, time() + (86400 * 30), "/");
}

function setTheme($theme) {
    setcookie('theme', $theme, time() + (86400 * 30), "/");
}

function redirect($path) {
    header("Location: " . BASE_URL . $path);
    exit();
}

function csrf_token() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}
?>