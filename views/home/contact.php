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
    margin-top: 20px;
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
    min-height: 120px;
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

/* Contact info styling */
.contact-info {
    background-color: #fff;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.contact-info p {
    font-size: 1.1rem;
    color: #34495e;
    margin-bottom: 15px;
    display: flex;
    align-items: center;
}

.contact-info i {
    font-size: 1.4rem;
    color: #3498db;
    margin-right: 10px;
}

/* Opening hours styling */
.opening-hours {
    list-style: none;
    padding: 0;
    margin: 0;
}

.opening-hours li {
    font-size: 1.1rem;
    color: #34495e;
    margin-bottom: 10px;
    padding-left: 20px;
    position: relative;
}

.opening-hours li::before {
    content: '•';
    color: #3498db;
    position: absolute;
    left: 0;
    font-size: 1.2rem;
}

/* Responsive design */
@media (max-width: 768px) {
    .col-md-6 {
        flex: 100%;
    }

    h2 {
        font-size: 1.8rem;
    }

    h3 {
        font-size: 1.4rem;
    }

    .form-control {
        font-size: 0.95rem;
    }

    .btn-primary {
        width: 100%;
        text-align: center;
    }

    .contact-info p,
    .opening-hours li {
        font-size: 1rem;
    }
}

/* Ensure Bootstrap Icons are included */
@import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css");
</style>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>Contactez-nous</h2>
            <form action="/fastfood-express/contact" method="post">
                <input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">
                
                <div class="mb-3">
                    <label for="name" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
        </div>
        
        <div class="col-md-6">
            <h2>Informations de contact</h2>
            <div class="contact-info">
                <p><i class="bi bi-geo-alt"></i> 123 Rue 130, 75001 TAZA, Maroc</p>
                <p><i class="bi bi-telephone"></i> +212 1 23 45 67 89</p>
                <p><i class="bi bi-envelope"></i> contact@fastfoodexpress.com</p>
            </div>
            
            <h3 class="mt-4">Heures d'ouverture</h3>
            <ul class="opening-hours">
                <li>Lundi - Vendredi: 9h - 18h</li>
                <li>Samedi: 10h - 17h</li>
                <li>Dimanche: Fermé</li>
            </ul>
        </div>
    </div>
</div>

<?php require __DIR__ . '/../partials/footer.php'; ?>