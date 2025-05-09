<?php
class Cart {
    public function add($productId, $quantity = 1) {
        $productModel = new Product();
        $product = $productModel->getById($productId);

        if (!$product) {
            return false;
        }

        // Vérifier si le produit est déjà dans le panier
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['id'] == $productId) {
                $item['quantity'] += $quantity;
                return true;
            }
        }

        // Ajouter un nouveau produit au panier
        $_SESSION['cart'][] = [
            'id' => $product['id'],
            'name' => $product['product_name'],
            'price' => $product['product_price'],
            'quantity' => $quantity,
            'image' => $product['product_image']
        ];

        return true;
    }

    public function update($items) {
        foreach ($items as $productId => $quantity) {
            foreach ($_SESSION['cart'] as &$item) {
                if ($item['id'] == $productId) {
                    $item['quantity'] = $quantity;
                    break;
                }
            }
        }
    }

    public function remove($productId) {
        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item['id'] == $productId) {
                unset($_SESSION['cart'][$key]);
                break;
            }
        }
        // Réindexer le tableau après suppression
        $_SESSION['cart'] = array_values($_SESSION['cart']);
    }

    public function clear() {
        $_SESSION['cart'] = [];
    }

    public function getTotal() {
        $total = 0;
        foreach ($_SESSION['cart'] as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }

    public function getItems() {
        return $_SESSION['cart'] ?? [];
    }

    public function count() {
        return count($_SESSION['cart'] ?? []);
    }
}
?>