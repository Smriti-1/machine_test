<?php
namespace App;

class Contact {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function create($name, $phone, $email, $address) {
        $stmt = $this->pdo->prepare('INSERT INTO contacts (name, phone, email, address) VALUES (?, ?, ?, ?)');
        return $stmt->execute([$name, $phone, $email, $address]);
    }

    public function getAll() {
        $stmt = $this->pdo->query('SELECT * FROM contacts');
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare('SELECT * FROM contacts WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function update($id, $name, $phone, $email, $address) {
        $stmt = $this->pdo->prepare('UPDATE contacts SET name = ?, phone = ?, email = ?, address = ? WHERE id = ?');
        return $stmt->execute([$name, $phone, $email, $address, $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare('DELETE FROM contacts WHERE id = ?');
        return $stmt->execute([$id]);
    }
}
