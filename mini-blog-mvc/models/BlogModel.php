<?php
// models/BlogModel.php

require_once '../config/Database.php';

class BlogModel {
    private $conn;
    private $table_name = "blog_posts";

    public function __construct() {
        $this->conn = Database::getInstance();
    }

    // Créer un nouveau post
    public function create($title, $content) {
        $query = "INSERT INTO " . $this->table_name . " (title, content) VALUES (:title, :content)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":content", $content);
        return $stmt->execute();
    }

    // Lire tous les posts
    public function readAll() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY creation_date DESC";
        $stmt = $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lire un post par ID
    public function readById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Mettre à jour un post
    public function update($id, $title, $content) {
        $query = "UPDATE " . $this->table_name . " SET title = :title, content = :content WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":content", $content);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }

    // Supprimer un post
    public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}
?>
