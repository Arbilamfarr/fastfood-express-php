<?php
class Order {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function create($userId, $total, $paymentMethod) {
        $this->db->beginTransaction();
        
        try {
            // Créer la commande principale
            $stmt = $this->db->prepare("INSERT INTO commandes (user_id, date_commande, total) VALUES (?, NOW(), ?)");
            $stmt->execute([$userId, $total]);
            $orderId = $this->db->lastInsertId();

            // Ajouter les détails de la commande
            foreach ($_SESSION['cart'] as $item) {
                $stmt = $this->db->prepare("INSERT INTO commandes_details (commande_id, product_id, quantite, user_id, total, status, payment_method) VALUES (?, ?, ?, ?, ?, 'processing', ?)");
                $stmt->execute([$orderId, $item['id'], $item['quantity'], $userId, $item['price'] * $item['quantity'], $paymentMethod]);
            }

            $this->db->commit();
            return $orderId;
        } catch (PDOException $e) {
            $this->db->rollBack();
            return false;
        }
    }

    public function getUserOrders($userId) {
        $stmt = $this->db->prepare("SELECT c.id, c.date_commande, c.total, cd.status, cd.payment_method 
                                   FROM commandes c 
                                   JOIN commandes_details cd ON c.id = cd.commande_id 
                                   WHERE c.user_id = ? 
                                   GROUP BY c.id 
                                   ORDER BY c.date_commande DESC");
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>