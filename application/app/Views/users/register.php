<h2>Cadastro</h2>
<form method="post" action="/users/register">
    <label>Nome:</label>
    <input type="text" name="name" required>
    <label>Email:</label>
    <input type="email" name="email" required>
    <label>Senha:</label>
    <input type="password" name="password" required>
    <button type="submit">Cadastrar</button>
</form>
<?php if (!empty($error)): ?>
    <p style="color:red;">Erro: <?= htmlspecialchars($error) ?></p>
<?php endif; ?>
<p>Já tem uma conta? <a href="/users/login">Faça login</a></p>