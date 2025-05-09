<?php
class User {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function register($username, $email, $password, $address = null, $tel = null) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("INSERT INTO users (username, email, password, address, tel) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$username, $email, $hashedPassword, $address, $tel]);
    }

    public function login($email, $password) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            unset($user['password']);
            return $user;
        }
        return false;
    }

    public function updateProfile($userId, $username, $email, $address, $tel) {
        $stmt = $this->db->prepare("UPDATE users SET username = ?, email = ?, address = ?, tel = ? WHERE id = ?");
        return $stmt->execute([$username, $email, $address, $tel, $userId]);
    }

    public function getUserById($userId) {
        $stmt = $this->db->prepare("SELECT id, username, email, address, tel FROM users WHERE id = ?");
        $stmt->execute([$userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>