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
    gap: 20px;
}

.justify-content-center {
    justify-content: center;
}

.col-md-8 {
    flex: 0 0 100%;
    max-width: 800px;
}

/* Card styling */
.card {
    border: none;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.card-header {
    background-color: #f4f4f4;
    padding: 15px;
    border-bottom: 1px solid #ddd;
    border-radius: 10px 10px 0 0;
}

.card-body {
    padding: 25px;
}

/* Heading styling */
h2 {
    font-size: 2.2rem;
    color: #2c3e50;
    margin-bottom: 15px;
}

/* Form styling */
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

/* Alert styling */
.alert-danger {
    background-color: #f8d7da;
    color: #721c24;
    padding: 15px;
    border-radius: 5px;
    margin-bottom: 20px;
    border: 1px solid #f5c6cb;
}

/* Flex utilities */
.d-flex {
    display: flex;
}

.justify-content-between {
    justify-content: space-between;
}

/* Responsive design */
@media (max-width: 768px) {
    .col-md-8 {
        flex: 100%;
    }

    h2 {
        font-size: 1.8rem;
    }

    .btn-primary, .btn-outline-secondary {
        width: 100%;
        text-align: center;
        margin-bottom: 10px;
    }

    .form-control {
        font-size: 0.95rem;
    }
}
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Modifier mes informations</h2>
                </div>
                <div class="card-body">
                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger"><?= $error ?></div>
                    <?php endif; ?>
                    
                    <form action="/fastfood-express/profile/edit" method="post">
                        <input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">
                        
                        <div class="mb-3">
                            <label for="username" class="form-label">Nom d'utilisateur</label>
                            <input type="text" class="form-control" id="username" name="username" 
                                   value="<?= htmlspecialchars($user['username']) ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" 
                                   value="<?= htmlspecialchars($user['email']) ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="tel" class="form-label">Téléphone</label>
                            <input type="tel" class="form-control" id="tel" name="tel" 
                                   value="<?= htmlspecialchars($user['tel'] ?? '') ?>">
                        </div>
                        
                        <div class="mb-3">
                            <label for="address" class="form-label">Adresse</label>
                            <textarea class="form-control" id="address" name="address" rows="3"><?= htmlspecialchars($user['address'] ?? '') ?></textarea>
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <a href="/fastfood-express/profile" class="btn btn-outline-secondary">Annuler</a>
                            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require __DIR__ . '/../partials/footer.php'; ?>