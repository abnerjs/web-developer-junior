<h2>Criar Novo Post</h2>
<form method="post" action="/posts/store">
    <label>Título:</label>
    <input type="text" name="title" required>
    <label>Descrição:</label>
    <textarea name="description" required></textarea>
    <button type="submit">Salvar</button>
</form>
