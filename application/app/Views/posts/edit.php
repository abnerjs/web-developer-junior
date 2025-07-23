<?= $this->extend('layout/main') ?>
<?= $this->section('title') ?>Editar Post<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container d-flex justify-content-center align-items-center" style="min-height: 70vh;">
  <div class="card shadow-lg p-4" style="max-width: 600px; width: 100%;">
    <h2 class="mb-4 text-center fw-bold">Editar Post</h2>
    <form method="post" action="/posts/update/<?= $post->id ?>" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="title" class="form-label">Título</label>
        <input type="text" class="form-control" name="title" id="title" value="<?= $post->title ?>" required>
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Descrição</label>
        <textarea class="form-control" name="description" id="description" rows="3"
          required><?= $post->description ?></textarea>
        <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
        <script>
          ClassicEditor.create(document.querySelector('#description'));
        </script>
      </div>
      <div class="mb-3">
        <label for="image" class="form-label">Imagem</label>
        <input class="form-control" type="file" name="image" id="image" accept="image/*">
        <img id="preview" src="#" alt="Preview" class="img-fluid mt-2" style="display:none;max-height:200px;">
        <?php if (!empty($post->image)): ?>
          <img src="<?= $post->image ?>" alt="Imagem atual" class="img-fluid mt-2 rounded" style="max-height: 200px;">
        <?php endif; ?>
      </div>
      <button type="submit" class="btn btn-primary w-100">Atualizar</button>
    </form>
  </div>
</div>
<?= $this->endSection() ?>