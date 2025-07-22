
<div class="container py-4">
  <div class="card mx-auto" style="max-width: 600px;">
    <?php if (!empty($post->image)): ?>
      <img src="<?= $post->image ?>" class="card-img-top" alt="Imagem do post">
    <?php endif; ?>
    <div class="card-body">
      <h2 class="card-title mb-3"><?= $post->title ?></h2>
      <p class="card-text mb-2"><?= $post->description ?></p>
      <p class="text-muted">Autor: <?= isset($post->user) ? $post->user->name : 'Desconhecido' ?></p>
      <div class="d-flex gap-2">
        <a href="/posts/edit/<?= $post->id ?>" class="btn btn-outline-secondary btn-sm">Editar</a>
        <a href="/posts/delete/<?= $post->id ?>" class="btn btn-outline-danger btn-sm">Excluir</a>
      </div>
    </div>
  </div>
</div>
