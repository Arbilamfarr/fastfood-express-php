<!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FastFood Express</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Global body styling */
        body {
            margin: 0;
            font-family: 'Roboto', Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }

        /* Header styling */
        .main-header {
            background: linear-gradient(90deg, #e67e22, #d35400);
            color: #fff;
            padding: 15px 0;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .header-container {
            max-width: 1280px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            flex-wrap: wrap;
        }

        /* Logo styling */
        .logo-container {
            display: flex;
            align-items: center;
        }

        .logo-link {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: #fff;
            gap: 12px;
            transition: opacity 0.3s ease;
        }

        .logo-link:hover {
            opacity: 0.9;
        }

        .logo-icon {
            font-size: 32px;
        }

        .logo-text {
            font-size: 24px;
            font-weight: 700;
            margin: 0;
            letter-spacing: 1px;
        }

        /* Navigation styling */
        .main-nav .nav-list {
            display: flex;
            gap: 30px;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .nav-link {
            color: #fff;
            text-decoration: none;
            font-weight: 500;
            font-size: 16px;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: #f1c40f;
        }

        /* User actions styling */
        .user-actions {
            display: flex;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .action-link {
            color: #fff;
            text-decoration: none;
            font-size: 15px;
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 12px;
            border-radius: 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .action-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: #f1c40f;
        }

        /* Theme toggle button */
        .theme-btn {
            background: none;
            border: 1px solid #fff;
            color: #fff;
            cursor: pointer;
            font-size: 14px;
            padding: 8px 12px;
            border-radius: 5px;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .theme-btn:hover {
            background-color: #fff;
            color: #d35400;
        }

        /* Cart link styling */
        .cart-link {
            color: #fff;
            text-decoration: none;
            position: relative;
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 12px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .cart-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .cart-count {
            background: #f1c40f;
            color: #d35400;
            border-radius: 50%;
            padding: 4px 8px;
            font-size: 12px;
            font-weight: 600;
            position: absolute;
            top: -8px;
            right: -8px;
        }

        /* Mobile menu button */
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            font-size: 24px;
            color: #fff;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .mobile-menu-btn:hover {
            color: #f1c40f;
        }

        /* Dark theme styling */
        body.dark {
            background-color: #2c3e50;
            color: #ecf0f1;
        }

        body.dark .main-header {
            background: linear-gradient(90deg, #2c3e50, #34495e);
        }

        body.dark .action-link:hover,
        body.dark .nav-link:hover,
        body.dark .cart-link:hover {
            background-color: rgba(255, 255, 255, 0.2);
            color: #3498db;
        }

        body.dark .theme-btn:hover {
            background-color: #3498db;
            color: #fff;
        }

        body.dark .cart-count {
            background: #3498db;
            color: #fff;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .main-nav,
            .user-actions {
                display: none;
            }

            .mobile-menu-btn {
                display: block;
            }

            .header-container {
                padding: 0 15px;
            }

            .logo-text {
                font-size: 20px;
            }

            .logo-icon {
                font-size: 28px;
            }
        }
    </style>
</head>
<body class="<?= $theme ?>">
    <header class="main-header">
        <div class="container header-container">
            <div class="logo-container">
                <a href="/fastfood-express/home" class="logo-link">
                    <i class="fas fa-hamburger logo-icon"></i>
                    <h1 class="logo-text">FASTFOOD EXPRESS</h1>
                </a>
            </div>

            <nav class="main-nav">
                <ul class="nav-list">
                    <li class="nav-item"><a href="/fastfood-express/home" class="nav-link"><i class="fas fa-home nav-icon"></i> Accueil</a></li>
                    <li class="nav-item"><a href="/fastfood-express/products" class="nav-link"><i class="fas fa-utensils nav-icon"></i> Produits</a></li>
                    <li class="nav-item"><a href="/fastfood-express/contact" class="nav-link"><i class="fas fa-envelope nav-icon"></i> Contact</a></li>
                </ul>
            </nav>

            <div class="user-actions">
                <?php if (isLoggedIn()): ?>
                    <a href="/fastfood-express/profile" class="action-link profile-link">
                        <i class="fas fa-user-circle"></i>
                        <span>Mon compte</span>
                    </a>
                    <a href="/fastfood-express/logout" class="action-link logout-link">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Déconnexion</span>
                    </a>
                <?php else: ?>
                    <a href="/fastfood-express/login" class="action-link login-link">
                        <i class="fas fa-sign-in-alt"></i>
                        <span>Connexion</span>
                    </a>
                    <a href="/fastfood-express/register" class="action-link register-link">
                        <i class="fas fa-user-plus"></i>
                        <span>Inscription</span>
                    </a>
                <?php endif; ?>
<!-- 
                <button id="theme-toggle" class="theme-btn">
                    <i class="<?= $theme === 'dark' ? 'fas fa-sun' : 'fas fa-moon' ?>"></i>
                    <span>Mode <?= $theme === 'dark' ? 'clair' : 'sombre' ?></span>
                </button> -->

                <a href="/fastfood-express/cart" class="cart-link">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="cart-count">(<?= (new Cart())->count() ?>)</span>
                </a>
            </div>

            <button class="mobile-menu-btn">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </header>

    <main>
        <!-- contenu principal ici -->
    </main>
</body>
</html>