<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: linear-gradient(to right,rgb(247, 179, 179),rgb(255, 205, 125));
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .col-md-6 {
            background-color: #fff;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 500px;
        }

        h2.text-center {
            color: #333;
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            color: #555;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ccc;
            border-radius: 6px;
            margin-bottom: 1rem;
            box-sizing: border-box;
            font-size: 1rem;
        }

        .form-check-input {
            margin-right: 0.5rem;
        }

        .btn {
            background-color: #4e54c8;
            color: #fff;
            border: none;
            padding: 0.75rem;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #3b40a4;
        }

        .alert {
            background-color: #f8d7da;
            color: #842029;
            padding: 1rem;
            border-radius: 6px;
            margin-bottom: 1rem;
        }

        .text-center {
            text-align: center;
        }

        .mb-3 {
            margin-bottom: 1rem;
        }

        .mb-4 {
            margin-bottom: 1.5rem;
        }

        .mt-3 {
            margin-top: 1rem;
        }

        a {
            color: #4e54c8;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mb-4">Connexion</h2>

            <?php if (isset($error)): ?>
                <div class="alert alert-danger"><?= $error ?></div>
            <?php endif; ?>

            <form action="/fastfood-express/login" method="post">
                <input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Se souvenir de moi</label>
                </div>

                <button type="submit" class="btn w-100">Se connecter</button>
            </form>

            <div class="mt-3 text-center">
                <p>Pas encore de compte ? <a href="/fastfood-express/register">Créer un compte</a></p>
            </div>
        </div>
    </div>
</div>

</body>
</html>
