
<?= $this->extend('layout/main') ?>
  <?= $this->section('title') ?>Blog<?= $this->endSection() ?>
  <?= $this->section('content') ?>

<div class="mx-4">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="display-12 fw-bold">Blog</h1>
    <?php if (session()->get('user_id')): ?>
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalNovoPost">Novo Post</button>
    <?php endif; ?>
    <a href="/posts/all" class="btn btn-outline-secondary ms-2">Ver todos os posts</a>
  </div>
  <div class="row g-4" id="bentoPosts">
    <?php foreach ($posts as $post): ?>
      <div class="col-md-6 col-lg-4">
        <div class="card h-100 shadow-sm">
          <?php if (!empty($post->image)): ?>
            <img src="<?= $post->image ?>" class="card-img-top" alt="Imagem do post">
          <?php endif; ?>
          <div class="card-body">
            <h5 class="card-title"><?= $post->title ?></h5>
            <p class="card-text text-truncate"><?= $post->description ?></p>
            <a href="/posts/show/<?= $post->id ?>" class="btn btn-outline-primary btn-sm">Ver</a>
            <a href="/posts/edit/<?= $post->id ?>" class="btn btn-outline-secondary btn-sm">Editar</a>
            <a href="/posts/delete/<?= $post->id ?>" class="btn btn-outline-danger btn-sm">Excluir</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<?php if (session()->get('user_id')): ?>
<!-- Modal Novo Post -->
<div class="modal fade" id="modalNovoPost" tabindex="-1" aria-labelledby="modalNovoPostLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalNovoPostLabel">Criar Novo Post</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" action="/posts/store" enctype="multipart/form-data" id="formNovoPost">
        <div class="modal-body">
          <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" class="form-control" name="title" id="title" required>
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Descrição</label>
            <textarea class="form-control" name="description" id="description" rows="3" required></textarea>
            <script>
              ClassicEditor.create(document.querySelector('#description'));
            </script>
          </div>
          <link href="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/theme-lark.css" rel="stylesheet">
          <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
          <div class="mb-3">
            <label for="image" class="form-label">Imagem</label>
            <input class="form-control" type="file" name="image" id="image" accept="image/*">
            <div id="dropzone" class="border border-primary rounded p-3 mt-2 text-center" style="cursor:pointer;">Arraste e solte ou cole uma imagem aqui</div>
            <img id="preview" src="#" alt="Preview" class="img-fluid mt-2" style="display:none;max-height:200px;">
            <script>
              $(function() {
                var dropzone = $('#dropzone');
                var input = $('#image');
                var preview = $('#preview');
                dropzone.on('click', function() { input.click(); });
                dropzone.on('dragover', function(e) { e.preventDefault(); dropzone.addClass('bg-info'); });
                dropzone.on('dragleave', function(e) { e.preventDefault(); dropzone.removeClass('bg-info'); });
                dropzone.on('drop', function(e) {
                  e.preventDefault(); dropzone.removeClass('bg-info');
                  var files = e.originalEvent.dataTransfer.files;
                  if (files.length > 0) {
                    input[0].files = files;
                    showPreview(files[0]);
                  }
                });
                dropzone.on('paste', function(e) {
                  var items = (e.originalEvent.clipboardData || window.clipboardData).items;
                  for (var i = 0; i < items.length; i++) {
                    if (items[i].type.indexOf('image') !== -1) {
                      var file = items[i].getAsFile();
                      input[0].files = [file];
                      showPreview(file);
                    }
                  }
                });
                input.on('change', function() {
                  if (input[0].files.length > 0) showPreview(input[0].files[0]);
                });
                function showPreview(file) {
                  var reader = new FileReader();
                  reader.onload = function(e) {
                    preview.attr('src', e.target.result).show();
                  };
                  reader.readAsDataURL(file);
                }
              });
            </script>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php endif; ?>
<?= $this->endSection() ?>

<?= $this->section('js_extras') ?>
<script>
  $(function() {
    $('#searchForm').on('submit', function(e) {
      e.preventDefault();
      var termo = $('#searchInput').val();
      $.get('/posts/search', {q: termo}, function(data) {
        var html = '';
        data.forEach(function(post) {
          html += `<div class="col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm">
              ${post.image ? `<img src="${post.image}" class="card-img-top" alt="Imagem do post">` : ''}
              <div class="card-body">
                <h5 class="card-title">${post.title}</h5>
                <p class="card-text text-truncate">${post.description}</p>
                <a href="/posts/show/${post.id}" class="btn btn-outline-primary btn-sm">Ver</a>
                <a href="/posts/edit/${post.id}" class="btn btn-outline-secondary btn-sm">Editar</a>
                <a href="/posts/delete/${post.id}" class="btn btn-outline-danger btn-sm">Excluir</a>
              </div>
            </div>
          </div>`;
        });
        $('#bentoPosts').html(html);
      });
    });
  });
</script>
<?= $this->endSection() ?>
