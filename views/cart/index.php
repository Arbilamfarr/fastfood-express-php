<?php require __DIR__ . '/../partials/header.php'; ?>

<style>
/* General container styling */
.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

/* Heading styling */
h2 {
    font-size: 2rem;
    color: #333;
    margin-bottom: 20px;
    text-align: center;
}

/* Empty cart styling */
.empty-cart {
    text-align: center;
    padding: 40px;
    background-color: #f8f8f8;
    border-radius: 8px;
}

.empty-cart p {
    font-size: 1.2rem;
    color: #666;
    margin-bottom: 20px;
}

/* Table styling */
.cart-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
    background-color: #fff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.cart-table th,
.cart-table td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.cart-table th {
    background-color: #f4f4f4;
    font-weight: bold;
    color: #333;
}

.cart-table td {
    vertical-align: middle;
}

.cart-table tfoot td {
    font-weight: bold;
    background-color: #f9f9f9;
}

/* Quantity form styling */
.quantity-form {
    display: inline-block;
}

.quantity-form input[type="number"] {
    width: 60px;
    padding: 5px;
    border: 1px solid #ddd;
    border-radius: 4px;
    text-align: center;
}

/* Button styling */
.btn {
    display: inline-block;
    padding: 10px 20px;
    margin: 5px;
    border: none;
    border-radius: 4px;
    text-decoration: none;
    font-size: 1rem;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-primary {
    background-color: #007bff;
    color: #fff;
}

.btn-primary:hover {
    background-color: #0056b3;
}

.btn {
    background-color: #6c757d;
    color: #fff;
}

.btn:hover {
    background-color: #5a6268;
}

.btn-remove {
    background-color: #dc3545;
    color: #fff;
    padding: 8px 15px;
}

.btn-remove:hover {
    background-color: #c82333;
}

/* Cart actions styling */
.cart-actions {
    display: flex;
    justify-content: flex-end;
    gap: 10px;
    margin-top: 20px;
}

/* Responsive design */
@media (max-width: 768px) {
    .cart-table {
        font-size: 0.9rem;
    }

    .cart-table th,
    .cart-table td {
        padding: 10px;
    }

    .cart-actions {
        flex-direction: column;
        align-items: center;
    }

    .btn {
        width: 100%;
        text-align: center;
    }
}
</style>

<div class="container">
    <h2>Votre panier</h2>
    
    <?php if (empty($items)): ?>
        <div class="empty-cart">
            <p>Votre panier est vide.</p>
            <a href="/fastfood-express/products" class="btn">Parcourir nos produits</a>
        </div>
    <?php else: ?>
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item): ?>
                <tr>
                    <td><?= htmlspecialchars($item['name']) ?></td>
                    <td><?= number_format($item['price'], 2) ?> MAD</td>
                    <td>
                        <form action="/fastfood-express/cart/update" method="post" class="quantity-form">
                            <input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">
                            <input type="number" name="items[<?= $item['id'] ?>]" value="<?= $item['quantity'] ?>" min="1">
                        </form>
                    </td>
                    <td><?= number_format($item['price'] * $item['quantity'], 2) ?> MAD</td>
                    <td>
                        <a href="/fastfood-express/cart/remove?id=<?= $item['id'] ?>" class="btn-remove">Supprimer</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3"><strong>Total</strong></td>
                    <td colspan="2"><strong><?= number_format($total, 2) ?> MAD</strong></td>
                </tr>
            </tfoot>
        </table>

        <div class="cart-actions">
            <a href="/fastfood-express/products" class="btn">Continuer vos achats</a>
            <button type="submit" form="update-cart" class="btn">Mettre à jour le panier</button>
            <a href="/fastfood-express/cart/clear" class="btn">Vider le panier</a>
            <a href="/fastfood-express/checkout" class="btn btn-primary">Passer la commande</a>
        </div>
    <?php endif; ?>
</div>

<?php require __DIR__ . '/../partials/footer.php'; ?>