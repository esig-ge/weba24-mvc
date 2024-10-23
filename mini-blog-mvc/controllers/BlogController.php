<?php
// controllers/BlogController.php

require_once '../models/BlogModel.php';

class BlogController {
    private $model;

    public function __construct() {
        $this->model = new BlogModel();
    }

    // Liste tous les articles
    public function index() {
        $posts = $this->model->readAll();
        require '../views/blog/index.php';
    }

    // Créer un article
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $this->model->create($title, $content);
            header("Location: ". ROOT_URL);
        } else {
            require '../views/blog/create.php';
        }
    }

    // Modifier un article
    public function edit($id) {
        $post = $this->model->readById($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $this->model->update($id, $title, $content);
            header("Location: ". ROOT_URL);
        } else {
            require '../views/blog/edit.php';
        }
    }

    // Supprimer un article
    public function delete($id) {
        $this->model->delete($id);
        header("Location: ". ROOT_URL);
    }
}
?>
