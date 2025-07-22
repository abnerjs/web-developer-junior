<h2>Editar Post</h2>
<form method="post" action="/posts/update/<?= $post->id ?>">
    <label>Título:</label>
    <input type="text" name="title" value="<?= $post->title ?>" required>
    <label>Descrição:</label>
    <textarea name="description" required><?= $post->description ?></textarea>
    <button type="submit">Atualizar</button>
</form>
