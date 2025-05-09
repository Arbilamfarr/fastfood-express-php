<?php require __DIR__ . '/../partials/header.php'; ?>

<style>
/* Container styling */
.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 40px 20px;
}

/* Row and column layout */
.row {
    display: flex;
    flex-wrap: wrap;
    gap: 30px;
}

.col-md-8 {
    flex: 2;
    min-width: 300px;
}

.col-md-4 {
    flex: 1;
    min-width: 280px;
}

/* Heading styling */
h2 {
    font-size: 2.2rem;
    color: #2c3e50;
    margin-bottom: 25px;
    position: relative;
    padding-bottom: 10px;
}

h2::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 50px;
    height: 3px;
    background-color: #3498db;
}

h3 {
    font-size: 1.6rem;
    color: #2c3e50;
    margin-bottom: 15px;
}

/* Form styling */
form {
    background-color: #f9f9f9;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.form-label {
    font-weight: 600;
    color: #34495e;
    margin-bottom: 8px;
    display: block;
}

.form-control, .form-select {
    width: 100%;
    padding: 12px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 1rem;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

.form-control:focus, .form-select:focus {
    outline: none;
    border-color: #3498db;
    box-shadow: 0 0 5px rgba(52, 152, 219, 0.3);
}

textarea.form-control {
    resize: vertical;
    min-height: 100px;
}

.mb-3 {
    margin-bottom: 20px;
}

/* Button styling */
.btn-primary {
    background-color: #3498db;
    color: #fff;
    padding: 12px 25px;
    border: none;
    border-radius: 5px;
    font-size: 1.1rem;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.btn-primary:hover {
    background-color: #2980b9;
    transform: translateY(-2px);
}

.btn-primary:active {
    transform: translateY(0);
}

.btn-outline-secondary {
    border-color: #6c757d;
    color: #6c757d;
    padding: 12px 25px;
    border-radius: 5px;
    font-size: 1.1rem;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.btn-outline-secondary:hover {
    background-color: #6c757d;
    color: #fff;
}

.d-flex {
    display: flex;
}

.justify-content-between {
    justify-content: space-between;
}

.mt-4 {
    margin-top: 25px;
}

/* Order summary card */
.card {
    border: none;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.card-header {
    background-color: #f4f4f4;
    padding: 15px;
    border-bottom: 1px solid #ddd;
}

.card-body {
    padding: 20px;
}

.list-group-item {
    border: none;
    padding: 10px 0;
    font-size: 1rem;
    color: #34495e;
}

.fw-bold {
    font-weight: 600;
}

/* Responsive design */
@media (max-width: 768px) {
    .col-md-8, .col-md-4 {
        flex: 100%;
    }

    h2 {
        font-size: 1.8rem;
    }

    h3 {
        font-size: 1.4rem;
    }

    .btn-primary, .btn-outline-secondary {
        width: 100%;
        text-align: center;
        margin-bottom: 10px;
    }

    .form-control, .form-select {
        font-size: 0.95rem;
    }

    .list-group-item {
        font-size: 0.95rem;
    }
}
</style>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h2>Informations de livraison</h2>
            <form action="/fastfood-express/payment" method="post">
                <input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">
                
                <div class="mb-3">
                    <label for="fullname" class="form-label">Nom complet</label>
                    <input type="text" class="form-control" id="fullname" name="fullname" 
                           value="<?= htmlspecialchars($user['username'] ?? '') ?>" required>
                </div>
                
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" 
                           value="<?= htmlspecialchars($user['email'] ?? '') ?>" required>
                </div>
                
                <div class="mb-3">
                    <label for="address" class="form-label">Adresse</label>
                    <textarea class="form-control" id="address" name="address" rows="3" required><?= htmlspecialchars($user['address'] ?? '') ?></textarea>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="city" class="form-label">Ville</label>
                        <input type="text" class="form-control" id="city" name="city" required>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="postal_code" class="form-label">Code postal</label>
                        <input type="text" class="form-control" id="postal_code" name="postal_code" required>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="country" class="form-label">Pays</label>
                    <select class="form-select" id="country" name="country" required>
                        <option value="">Sélectionner...</option>
                        <option value="Maroc">Maroc</option>
                        <option value="France">France</option>
                        <option value="Belgique">Belgique</option>
                        <option value="Canada">Canada</option>
                    </select>
                </div>
                
                <div class="d-flex justify-content-between mt-4">
                    <a href="/fastfood-express/cart" class="btn btn-outline-secondary">Retour au panier</a>
                    <button type="submit" class="btn btn-primary">Passer au paiement</button>
                </div>
            </form>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header"><h3>Votre commande</h3></div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <?php foreach ($items as $item): ?>
                            <li class="list-group-item d-flex justify-content-between">
                                <span><?= htmlspecialchars($item['name']) ?> x <?= $item['quantity'] ?></span>
                                <span><?= number_format($item['price'] * $item['quantity'], 2) ?> MAD</span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="d-flex justify-content-between mt-3 fw-bold">
                        <span>Total</span>
                        <span><?= number_format($total, 2) ?> MAD</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require __DIR__ . '/../partials/footer.php'; ?>