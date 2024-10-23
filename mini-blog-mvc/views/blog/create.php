<!-- views/blog/create.php -->
<h1>Créer un nouvel article</h1>
<form action="<?php URL_CREATE_BLOGPOST?>" method="POST">
    <label for="title">Titre</label>
    <input type="text" name="title" required>
    
    <label for="content">Contenu</label>
    <textarea name="content" required></textarea>
    
    <button type="submit">Publier</button>
</form>
