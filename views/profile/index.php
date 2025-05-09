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

.col-md-4 {
    flex: 1;
    min-width: 280px;
}

.col-md-8 {
    flex: 2;
    min-width: 300px;
}

/* Heading styling */
h3 {
    font-size: 1.6rem;
    color: #2c3e50;
    margin-bottom: 15px;
}

h4 {
    font-size: 1.4rem;
    color: #34495e;
    margin-bottom: 10px;
}

/* Card styling */
.card {
    border: none;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
}

.card-header {
    background-color: #f4f4f4;
    padding: 15px;
    border-bottom: 1px solid #ddd;
    border-radius: 10px 10px 0 0;
}

.card-body {
    padding: 20px;
}

/* Profile avatar */
.profile-avatar {
    width: 60px;
    height: 60px;
    background-color: #3498db;
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    font-size: 2rem;
    font-weight: 600;
    margin: 0 auto 10px;
}

/* List group styling */
.list-group-item {
    border: none;
    padding: 10px 0;
}

.list-group-item a {
    color: #3498db;
    transition: color 0.3s ease;
}

.list-group-item a:hover {
    color: #2980b9;
}

/* Form static text */
.form-label {
    font-weight: 600;
    color: #34495e;
    margin-bottom: 5px;
}

.form-control-static {
    font-size: 1rem;
    color: #34495e;
    margin-bottom: 10px;
}

/* Button styling */
.btn-primary {
    background-color: #3498db;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    font-size: 1rem;
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

/* Table styling */
.table {
    width: 100%;
    border-collapse: collapse;
}

.table th, .table td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.table th {
    background-color: #f9f9f9;
    font-weight: 600;
    color: #2c3e50;
}

.table td {
    color: #34495e;
}

/* Badge styling */
.badge {
    padding: 6px 12px;
    border-radius: 12px;
    font-size: 0.9rem;
}

.bg-warning {
    background-color: #f39c12;
    color: #fff;
}

.bg-success {
    background-color: #2ecc71;
    color: #fff;
}

.bg-secondary {
    background-color: #7f8c8d;
    color: #fff;
}

/* Text center */
.text-center {
    text-align: center;
}

/* Margin utilities */
.mb-3 {
    margin-bottom: 15px;
}

.mb-4 {
    margin-bottom: 20px;
}

/* Responsive table */
.table-responsive {
    overflow-x: auto;
}

/* Responsive design */
@media (max-width: 768px) {
    .col-md-4, .col-md-8 {
        flex: 100%;
    }

    h3 {
        font-size: 1.4rem;
    }

    h4 {
        font-size: 1.2rem;
    }

    .profile-avatar {
        width: 50px;
        height: 50px;
        font-size: 1.8rem;
    }

    .table th, .table td {
        padding: 10px;
        font-size: 0.95rem;
    }

    .btn-primary {
        width: 100%;
        text-align: center;
    }
}
</style>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">
                    <h3>Mon Compte</h3>
                </div>
                <div class="card-body">
                    <div class="text-center mb-3">
                        <div class="profile-avatar">
                            <?= strtoupper(substr($user['username'], 0, 1)) ?>
                        </div>
                        <h4><?= htmlspecialchars($user['username']) ?></h4>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <a href="/fastfood-express/profile/edit" class="text-decoration-none">Modifier mon profil</a>
                        </li>
                        <li class="list-group-item">
                            <a href="/fastfood-express/logout" class="text-decoration-none">Déconnexion</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h3>Mes Informations</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Nom d'utilisateur</label>
                        <p class="form-control-static"><?= htmlspecialchars($user['username']) ?></p>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <p class="form-control-static"><?= htmlspecialchars($user['email']) ?></p>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Adresse</label>
                        <p class="form-control-static"><?= htmlspecialchars($user['address'] ?? 'Non renseignée') ?></p>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Téléphone</label>
                        <p class="form-control-static"><?= htmlspecialchars($user['tel'] ?? 'Non renseigné') ?></p>
                    </div>
                    
                    <a href="/fastfood-express/profile/edit" class="btn btn-primary">Modifier mes informations</a>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header">
                    <h3>Mes Commandes</h3>
                </div>
                <div class="card-body">
                    <?php if (empty($orders)): ?>
                        <p>Vous n'avez pas encore passé de commande.</p>
                        <a href="/fastfood-express/products" class="btn btn-primary">Voir nos produits</a>
                    <?php else: ?>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>N° Commande</th>
                                        <th>Date</th>
                                        <th>Total</th>
                                        <th>Statut</th>
                                        <th>Méthode de paiement</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($orders as $order): ?>
                                        <tr>
                                            <td>#<?= $order['id'] ?></td>
                                            <td><?= date('d/m/Y', strtotime($order['date_commande'])) ?></td>
                                            <td><?= number_format($order['total'], 2) ?> MAD</td>
                                            <td>
                                                <span class="badge bg-<?= 
                                                    $order['status'] === 'processing' ? 'warning' : 
                                                    ($order['status'] === 'completed' ? 'success' : 'secondary')
                                                ?>">
                                                    <?= ucfirst($order['status']) ?>
                                                </span>
                                            </td>
                                            <td><?= ucfirst(str_replace('_', ' ', $order['payment_method'])) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require __DIR__ . '/../partials/footer.php'; ?>