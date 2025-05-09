-- Création de la base de données
CREATE DATABASE IF NOT EXISTS fastfood_express;
USE fastfood_express;

-- Table des utilisateurs
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    address VARCHAR(255),
    tel VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table des produits
CREATE TABLE produits (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(100) NOT NULL,
    product_price DECIMAL(10,2) NOT NULL,
    description TEXT,
    product_image VARCHAR(255),
    stock INT NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table des commandes
CREATE TABLE commandes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    date_commande DATETIME NOT NULL,
    total DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Table des détails des commandes
CREATE TABLE commandes_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    commande_id INT NOT NULL,
    product_id INT NOT NULL,
    quantite INT NOT NULL,
    user_id INT NOT NULL,
    total DECIMAL(10,2) NOT NULL,
    status VARCHAR(20) NOT NULL DEFAULT 'processing',
    payment_method VARCHAR(50) NOT NULL,
    FOREIGN KEY (commande_id) REFERENCES commandes(id),
    FOREIGN KEY (product_id) REFERENCES produits(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Insertion de quelques produits de test
INSERT INTO produits (product_name, product_price, description, product_image, stock) VALUES
('PIZZA', 68.00, 'La meilleure pizza sur notre site web', 'pizza.jpg', 80),
('BURGER', 48.00, 'Le plus vendu sur notre site web', 'burger.jpg', 100),
('SALADE', 35.00, 'Salade fraîche et saine', 'salad.jpg', 50),
('FRIES', 20.00, 'Frites croustillantes', 'fries.jpg', 200),
('SOFT DRINK', 15.00, 'Boisson rafraîchissante', 'drink.jpg', 150);