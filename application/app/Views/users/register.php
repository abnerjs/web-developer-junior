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
<p>Já tem uma conta? <a href="/users/login">Faça login</a></p>