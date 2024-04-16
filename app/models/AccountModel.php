<?php
class AccountModel {
    private $conn;
    private $table_name = "accounts";

    public function __construct($db) {
        $this->conn = $db;
    }


    public function createAccount($name, $email, $password, $role, $address) {
        $query = "INSERT INTO " . $this->table_name . " (name, email, password, role, address) VALUES (:name, :email, :password, :role, :address)";
        $stmt = $this->conn->prepare($query);

        // Clean and bind data
        $name = htmlspecialchars(strip_tags($name));
        $email = htmlspecialchars(strip_tags($email));
        $password = htmlspecialchars(strip_tags($password));
        $role = htmlspecialchars(strip_tags($role));
        $address = htmlspecialchars(strip_tags($address));

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':role', $role);
        $stmt->bindParam(':address', $address);

        // Execute the statement
        return $stmt->execute();
    }


    public function getAccountByEmail($email) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function getAccountById($userId) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :userId";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function updateAccount($userId, $name, $email, $address) {
        $query = "UPDATE " . $this->table_name . " SET name = :name, email = :email, address = :address WHERE id = :userId";
        $stmt = $this->conn->prepare($query);

        // Clean and bind data
        $name = htmlspecialchars(strip_tags($name));
        $email = htmlspecialchars(strip_tags($email));
        $address = htmlspecialchars(strip_tags($address));

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':userId', $userId);

        return $stmt->execute();
    }
}
