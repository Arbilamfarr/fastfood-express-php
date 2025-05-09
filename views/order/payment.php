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
    margin-bottom: 20px;
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

.form-control {
    width: 100%;
    padding: 12px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 1rem;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

.form-control:focus {
    outline: none;
    border-color: #3498db;
    box-shadow: 0 0 5px rgba(52, 152, 219, 0.3);
}

.mb-3 {
    margin-bottom: 20px;
}

.mb-2 {
    margin-bottom: 10px;
}

.mb-4 {
    margin-bottom: 25px;
}

/* Radio button styling */
.form-check {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}

.form-check-input {
    margin-right: 10px;
    cursor: pointer;
}

.form-check-label {
    font-size: 1rem;
    color: #34495e;
    cursor: pointer;
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

/* Alert styling */
.alert-danger {
    background-color: #f8d7da;
    color: #721c24;
    padding: 15px;
    border-radius: 5px;
    margin-bottom: 20px;
    border: 1px solid #f5c6cb;
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

/* Flex utilities */
.d-flex {
    display: flex;
}

.justify-content-between {
    justify-content: space-between;
}

/* Credit card info section */
#credit-card-info {
    display: block;
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

    .form-control {
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
            <h2>Paiement</h2>

            <?php if (isset($error)): ?>
                <div class="alert alert-danger"><?= $error ?></div>
            <?php endif; ?>

            <form action="/fastfood-express/payment" method="post">
                <input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">

                <h3 class="mb-4">Méthode de paiement</h3>

                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="payment_method" id="credit_card" value="credit_card" checked>
                    <label class="form-check-label" for="credit_card">Carte de crédit</label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="payment_method" id="paypal" value="paypal">
                    <label class="form-check-label" for="paypal">PayPal</label>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="payment_method" id="bank_transfer" value="bank_transfer">
                    <label class="form-check-label" for="bank_transfer">Virement bancaire</label>
                </div>

                <div id="credit-card-info">
                    <div class="mb-3">
                        <label for="card_name" class="form-label">Nom sur la carte</label>
                        <input type="text" class="form-control" id="card_name" name="card_name">
                    </div>

                    <div class="mb-3">
                        <label for="card_number" class="form-label">Numéro de carte</label>
                        <input type="text" class="form-control" id="card_number" name="card_number">
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="card_expiry" class="form-label">Expiration (MM/AA)</label>
                            <input type="text" class="form-control" id="card_expiry" name="card_expiry">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="card_cvv" class="form-label">CVV</label>
                            <input type="text" class="form-control" id="card_cvv" name="card_cvv">
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="/fastfood-express/checkout" class="btn btn-outline-secondary">Retour</a>
                    <button type="submit" class="btn btn-primary">Payer <?= number_format($total, 2) ?> MAD</button>
                </div>
            </form>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header"><h3>Résumé de la commande</h3></div>
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

<script>
document.querySelectorAll('input[name="payment_method"]').forEach(radio => {
    radio.addEventListener('change', function() {
        const creditCardInfo = document.getElementById('credit-card-info');
        creditCardInfo.style.display = (this.value === 'credit_card') ? 'block' : 'none';
    });
});
</script>

<?php require __DIR__ . '/../partials/footer.php'; ?>