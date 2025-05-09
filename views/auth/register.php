<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un compte</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f7f7f7;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            margin-top: 60px;
        }

        h2 {
            font-weight: bold;
            color: #343a40;
        }

        form {
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-label {
            font-weight: 500;
            color: #495057;
        }

        .form-control:focus {
            border-color: #ff5722;
            box-shadow: 0 0 0 0.2rem rgba(255, 87, 34, 0.25);
        }

        .btn-primary {
            background-color: #ff5722;
            border-color: #ff5722;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #e64a19;
            border-color: #e64a19;
        }

        .alert-danger {
            border-radius: 5px;
            font-size: 14px;
        }

        a {
            color: #ff5722;
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
            <h2 class="text-center mb-4">Créer un compte</h2>

            <?php if (isset($error)): ?>
                <div class="alert alert-danger"><?= $error ?></div>
            <?php endif; ?>

            <form action="/fastfood-express/register" method="post">
                <input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">

                <div class="mb-3">
                    <label for="username" class="form-label">Nom d'utilisateur</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Confirmer le mot de passe</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Adresse</label>
                    <input type="text" class="form-control" id="address" name="address">
                </div>

                <div class="mb-3">
                    <label for="tel" class="form-label">Téléphone</label>
                    <input type="tel" class="form-control" id="tel" name="tel">
                </div>

                <button type="submit" class="btn btn-primary w-100">S'inscrire</button>
            </form>

            <div class="mt-3 text-center">
                <p>Déjà un compte ? <a href="/fastfood-express/login">Se connecter</a></p>
            </div>
        </div>
    </div>
</div>
</body>
</html>
