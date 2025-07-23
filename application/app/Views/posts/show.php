<?= $this->extend('layout/main') ?>
<?= $this->section('title') ?>Visualizar Post<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container d-flex justify-content-center align-items-center" style="min-height: 70vh;">
  <div class="card shadow-lg p-4" style="max-width: 600px; width: 100%;">
    <?php if (!empty($post->image)): ?>
      <img src="<?= $post->image ?>" class="card-img-top mb-3 rounded" alt="Imagem do post">
    <?php endif; ?>
    <div class="card-body p-0">
      <h2 class="card-title mb-3 fw-bold text-primary"><?= $post->title ?></h2>
      <p class="card-text mb-2 fs-5 text-dark"><?= $post->description ?></p>
      <p class="text-muted mb-3">Autor: <?= isset($post->user) ? $post->user->name : 'Desconhecido' ?></p>
      <div class="d-flex gap-2">
        <a href="/posts/edit/<?= $post->id ?>" class="btn btn-outline-secondary btn-sm">Editar</a>
        <a href="/posts/delete/<?= $post->id ?>" class="btn btn-outline-danger btn-sm">Excluir</a>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>