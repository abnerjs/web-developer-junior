<?= $this->extend('layout/main') ?>
<?= $this->section('title') ?>Perfil<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container d-flex justify-content-center align-items-center" style="min-height: 70vh;">
  <div class="card shadow-lg p-4" style="max-width: 400px; width: 100%;">
    <h2 class="mb-4 text-center fw-bold">Perfil do Usuário</h2>
    <div class="mb-3">
      <label class="form-label fw-bold">Usuário:</label>
      <div class="form-control bg-light"><?= $user->name ?></div>
    </div>
    <div class="mb-3">
      <label class="form-label fw-bold">Email:</label>
      <div class="form-control bg-light"><?= $user->email ?></div>
    </div>
    <a href="/users/logout" class="btn btn-outline-danger w-100">Sair</a>
  </div>
</div>
<?= $this->endSection() ?>