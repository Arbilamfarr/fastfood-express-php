<?php require __DIR__ . '/../partials/header.php'; ?>

<style>
/* Container styling */
.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 40px 20px;
}

/* Heading styling */
h1 {
    font-size: 2.5rem;
    color: #2c3e50;
    margin-bottom: 30px;
    position: relative;
    padding-bottom: 10px;
    text-align: center;
}

h1::after {
    content: '';
    position: absolute;
    left: 50%;
    bottom: 0;
    transform: translateX(-50%);
    width: 60px;
    height: 3px;
    background-color: #3498db;
}

/* Row and column layout */
.row {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.col-md-4 {
    flex: 1;
    min-width: 280px;
}

/* Product card styling */
.product-card {
    border: none;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
}

.card-img-top {
    height: 200px;
    object-fit: cover;
}

.card-body {
    padding: 20px;
    background-color: #fff;
}

.card-title {
    font-size: 1.5rem;
    color: #34495e;
    margin-bottom: 10px;
}

.card-text {
    font-size: 1rem;
    color: #7f8c8d;
    margin-bottom: 15px;
    line-height: 1.5;
}

.price {
    font-size: 1.2rem;
    font-weight: 600;
    color: #e74c3c;
}

/* Button styling */
.btn-outline-primary {
    border-color: #3498db;
    color: #3498db;
    padding: 8px 15px;
    font-size: 0.95rem;
    border-radius: 5px;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.btn-outline-primary:hover {
    background-color: #3498db;
    color: #fff;
}

/* Flex utilities */
.d-flex {
    display: flex;
}

.justify-content-between {
    justify-content: space-between;
}

.align-items-center {
    align-items: center;
}

/* Margin utilities */
.mb-4 {
    margin-bottom: 20px;
}

/* Responsive design */
@media (max-width: 768px) {
    h1 {
        font-size: 2rem;
    }

    .col-md-4 {
        flex: 100%;
    }

    .card-img-top {
        height: 180px;
    }

    .card-title {
        font-size: 1.3rem;
    }

    .card-text {
        font-size: 0.95rem;
    }

    .btn-outline-primary {
        padding: 6px 12px;
        font-size: 0.9rem;
    }
}
</style>

<div class="container">
    <h1 class="mb-4">Nos produits</h1>
    
    <div class="row">
        <?php foreach ($products as $product): ?>
            <div class="col-md-4 mb-4">
                <div class="card product-card h-100">
                    <img src="/fastfood-express/assets/images/<?= $product['product_image'] ?>" class="card-img-top" alt="<?= htmlspecialchars($product['product_name']) ?>">
                    <div class="card-body">
                        <h3 class="card-title"><?= htmlspecialchars($product['product_name']) ?></h3>
                        <p class="card-text"><?= htmlspecialchars(substr($product['description'], 0, 100)) ?>...</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="price"><?= number_format($product['product_price'], 2) ?> MAD</span>
                            <a href="/fastfood-express/product?id=<?= $product['id'] ?>" class="btn btn-sm btn-outline-primary">Voir détails</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php require __DIR__ . '/../partials/footer.php'; ?>