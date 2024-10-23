<!-- views/blog/index.php -->
<h1>Liste des articles</h1>
<?php 

?>
<a href=<?php echo URL_CREATE_BLOGPOST?>>Créer un nouvel article</a>

<ul>
<?php foreach ($posts as $post): ?>
    <li>
        <h2><?= htmlspecialchars($post['title']); ?></h2>
        <p><?= htmlspecialchars($post['content']); ?></p>
        <a href="<?php echo URL_EDIT_BLOGPOST . '&id=' . $post['id']; ?>">Modifier</a>
        <a href="<?php echo URL_DELETE_BLOGPOST . '&id=' . $post['id']; ?>" onclick="return confirm('Voulez-vous vraiment supprimer cet article ?');">Supprimer</a>
    </li>
<?php endforeach; ?>
</ul>
