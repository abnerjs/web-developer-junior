<?= $this->extend('layout/main') ?>
<?= $this->section('title') ?>Cadastro<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container d-flex justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="card shadow-lg p-4" style="max-width: 400px; width: 100%;">
        <h2 class="mb-4 text-center fw-bold">Cadastro</h2>
        <form method="post" action="/users/register">
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" name="name" id="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Cadastrar</button>
        </form>
        <?php if (!empty($error)): ?>
            <div class="alert alert-danger mt-3" role="alert">Erro: <?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <div class="mt-3 text-center">
            <p>Já tem uma conta? <a href="/users/login" class="link-primary">Faça login</a></p>
        </div>
    </div>
</div>
<?= $this->endSection() ?>