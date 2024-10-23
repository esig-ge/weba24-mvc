<!-- views/blog/edit.php -->
<h1>Modifier l'article</h1>
<form action="<?php URL_EDIT_BLOGPOST . '&id=' . $post['id']; ?>" method="POST">
    <label for="title">Titre</label>
    <input type="text" name="title" value="<?= htmlspecialchars($post['title']); ?>" required>
    
    <label for="content">Contenu</label>
    <textarea name="content" required><?= htmlspecialchars($post['content']); ?></textarea>
    
    <button type="submit">Modifier</button>
</form>
