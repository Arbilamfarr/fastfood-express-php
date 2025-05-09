<?php require __DIR__ . '/../partials/header.php'; ?>

<style>
/* Container styling */
.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 40px 20px;
}

/* Hero section styling */
.hero-section {
    background: linear-gradient(135deg, #3498db, #2ecc71);
    border-radius: 10px;
    padding: 60px 20px;
    text-align: center;
    color: #fff;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
}

.hero-content h1 {
    font-size: 2.8rem;
    margin-bottom: 15px;
    font-weight: 700;
}

.hero-content .lead {
    font-size: 1.3rem;
    margin-bottom: 25px;
    opacity: 0.9;
}

.btn-primary {
    background-color: #e74c3c;
    border: none;
    padding: 12px 30px;
    font-size: 1.2rem;
    border-radius: 5px;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.btn-primary:hover {
    background-color: #c0392b;
    transform: translateY(-2px);
}

.btn-primary:active {
    transform: translateY(0);
}

/* Recommendation section */
.recommendation {
    margin-bottom: 40px;
}

.recommendation h2 {
    font-size: 2rem;
    color: #2c3e50;
    margin-bottom: 20px;
    position: relative;
    padding-bottom: 10px;
}

.recommendation h2::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 50px;
    height: 3px;
    background-color: #3498db;
}

.recommendation .card {
    border: none;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.recommendation .card:hover {
    transform: translateY(-5px);
}

.recommendation .card-body {
    padding: 25px;
}

.recommendation h3 {
    font-size: 1.6rem;
    color: #34495e;
    margin-bottom: 15px;
}

.btn-outline-primary {
    border-color: #3498db;
    color: #3498db;
    padding: 8px 20px;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.btn-outline-primary:hover {
    background-color: #3498db;
    color: #fff;
}

/* Products section */
h2.mb-4 {
    font-size: 2rem;
    color: #2c3e50;
    margin-bottom: 30px;
    position: relative;
    padding-bottom: 10px;
}

h2.mb-4::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 50px;
    height: 3px;
    background-color: #3498db;
}

.row {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.col-md-4 {
    flex: 1;
    min-width: 280px;
}

.product-card {
    border: none;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.product-card:hover {
    transform: translateY(-5px);
}

.card-img-top {
    height: 200px;
    object-fit: cover;
}

.card-body {
    padding: 20px;
}

.card-title {
    font-size: 1.4rem;
    color: #34495e;
    margin-bottom: 10px;
}

.card-text {
    font-size: 1rem;
    color: #7f8c8d;
    margin-bottom: 15px;
}

.price {
    font-size: 1.2rem;
    font-weight: 600;
    color: #e74c3c;
}

.d-flex {
    display: flex;
}

.justify-content-between {
    justify-content: space-between;
}

.align-items-center {
    align-items: center;
}

.btn-sm {
    padding: 6px 15px;
    font-size: 0.9rem;
}

/* Responsive design */
@media (max-width: 768px) {
    .hero-content h1 {
        font-size: 2rem;
    }

    .hero-content .lead {
        font-size: 1.1rem;
    }

    .btn-primary {
        padding: 10px 20px;
        font-size: 1rem;
    }

    .recommendation h2,
    h2.mb-4 {
        font-size: 1.8rem;
    }

    .recommendation h3 {
        font-size: 1.4rem;
    }

    .col-md-4 {
        flex: 100%;
    }

    .card-img-top {
        height: 180px;
    }
}
</style>

<div class="container">
    <div class="hero-section mb-5">
        <div class="hero-content">
            <h1>Bienvenue chez FastFood Express</h1>
            <p class="lead">Commandez vos plats préférés en quelques clics</p>
            <a href="/fastfood-express/products" class="btn btn-primary btn-lg">Voir nos produits</a>
        </div>
    </div>

    <?php if ($lastOrderedProduct): ?>
        <div class="recommendation mb-5">
            <h2>Votre dernière commande</h2>
            <div class="card">
                <div class="card-body">
                    <h3><?= htmlspecialchars($lastOrderedProduct['product_name']) ?></h3>
                    <p><?= htmlspecialchars($lastOrderedProduct['description']) ?></p>
                    <a href="/fastfood-express/product?id=<?= $lastOrderedProduct['id'] ?>" class="btn btn-outline-primary">Commander à nouveau</a>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <h2 class="mb-4">Nos produits populaires</h2>
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