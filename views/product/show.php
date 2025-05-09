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

.col-md-6 {
    flex: 1;
    min-width: 300px;
}

.col-md-4 {
    flex: 1;
    min-width: 280px;
}

/* Image styling */
.img-fluid {
    max-width: 100%;
    height: auto;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

/* Heading styling */
h1 {
    font-size: 2.5rem;
    color: #2c3e50;
    margin-bottom: 15px;
}

h2.price {
    font-size: 2rem;
    color: #e74c3c;
    font-weight: 600;
    margin-bottom: 20px;
}

h3 {
    font-size: 1.6rem;
    color: #34495e;
    margin-bottom: 15px;
}

/* Description styling */
.description p {
    font-size: 1.1rem;
    color: #7f8c8d;
    line-height: 1.6;
}

/* Form styling */
.form-label {
    font-weight: 600;
    color: #34495e;
    margin-bottom: 8px;
}

.form-control {
    width: 100px;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 1rem;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

.form-control:focus {
    outline: none;
    border-color: #3498db;
    box-shadow: 0 0 ת5px rgba(52, 152, 219, 0.3);
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

/* Availability styling */
.availability p {
    font-size: 1rem;
    font-weight: 600;
}

.text-success {
    color: #2ecc71;
}

.text-danger {
    color: #e74c3c;
}

/* Similar products section */
.similar-products {
    margin-top: 40px;
}

.similar-products h2 {
    font-size: 2rem;
    color: #2c3e50;
    margin-bottom: 25px;
    position: relative;
    padding-bottom: 10px;
}

.similar-products h2::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 50px;
    height: 3px;
    background-color: #3498db;
}

/* Product card styling */
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
    height: 180px;
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
    font-size: 0.95rem;
    color: #7f8c8d;
    margin-bottom: 15px;
}

.price {
    font-size: 1.2rem;
    font-weight: 600;
    color: #e74c3c;
}

.btn-outline-primary {
    border-color: #3498db;
    color: #3498db;
    padding: 6px 15px;
    font-size: 0.9rem;
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

.mt-3 {
    margin-top: 15px;
}

.mt-5 {
    margin-top: 40px;
}

/* Responsive design */
@media (max-width: 768px) {
    .col-md-6, .col-md-4 {
        flex: 100%;
    }

    h1 {
        font-size: 2rem;
    }

    h2 {
        font-size: 1.8rem;
    }

    h3 {
        font-size: 1.4rem;
    }

    .card-img-top {
        height: 160px;
    }

    .btn-primary {
        width: 100%;
        text-align: center;
    }

    .form-control {
        width: 80px;
    }
}
</style>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="/fastfood-express/assets/images/<?= $product['product_image'] ?>" class="img-fluid" alt="<?= htmlspecialchars($product['product_name']) ?>">
        </div>
        
        <div class="col-md-6">
            <h1><?= htmlspecialchars($product['product_name']) ?></h1>
            <h2 class="price"><?= number_format($product['product_price'], 2) ?> MAD</h2>
            
            <div class="description mb-4">
                <h3>Description</h3>
                <p><?= htmlspecialchars($product['description']) ?></p>
            </div>
            
            <form action="/fastfood-express/cart/add" method="post">
                <input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">
                <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantité:</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" value="1" min="1" max="<?= $product['stock'] ?>">
                </div>
                
                <button type="submit" class="btn btn-primary">Ajouter au panier</button>
            </form>
            
            <div class="availability mt-3">
                <?php if ($product['stock'] > 0): ?>
                    <p class="text-success">En stock (<?= $product['stock'] ?> unités disponibles)</p>
                <?php else: ?>
                    <p class="text-danger">Rupture de stock</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    <div class="similar-products mt-5">
        <h2>Produits similaires</h2>
        <div class="row">
            <?php foreach ($similarProducts as $similarProduct): ?>
                <div class="col-md-4 mb-4">
                    <div class="card product-card h-100">
                        <img src="/fastfood-express/assets/images/<?= $similarProduct['product_image'] ?>" class="card-img-top" alt="<?= htmlspecialchars($similarProduct['product_name']) ?>">
                        <div class="card-body">
                            <h3 class="card-title"><?= htmlspecialchars($similarProduct['product_name']) ?></h3>
                            <p class="card-text"><?= htmlspecialchars(substr($similarProduct['description'], 0, 50)) ?>...</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="price"><?= number_format($similarProduct['product_price'], 2) ?> MAD</span>
                                <a href="/fastfood-express/product?id=<?= $similarProduct['id'] ?>" class="btn btn-sm btn-outline-primary">Voir détails</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php require __DIR__ . '/../partials/footer.php'; ?>