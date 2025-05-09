<?php
class Product {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM produits");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($productId) {
        $stmt = $this->db->prepare("SELECT * FROM produits WHERE id = ?");
        $stmt->execute([$productId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getSimilarProducts($productId) {
        // Récupère 3 produits aléatoires différents du produit actuel
        $stmt = $this->db->prepare("SELECT * FROM produits WHERE id != ? ORDER BY RAND() LIMIT 3");
        $stmt->execute([$productId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>