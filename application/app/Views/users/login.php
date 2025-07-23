<?= $this->extend('layout/main') ?>
<?= $this->section('title') ?>Entrar<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container d-flex justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="card shadow-lg p-4" style="max-width: 400px; width: 100%;">
        <h2 class="mb-4 text-center fw-bold">Entrar</h2>
        <form method="post" action="/users/login">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Entrar</button>
        </form>
        <div class="mt-3 text-center">
            <p>Não tem uma conta? <a href="/users/register" class="link-primary">Faça registro</a></p>
        </div>
    </div>
</div>
<?= $this->endSection() ?>