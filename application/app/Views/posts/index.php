<?= $this->extend('layout/main') ?>
<?= $this->section('title') ?>Central de Notícias<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="mx-4">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div class="d-flex">
      <h1 class="display-12 fw-bolder"><?= (strpos($_SERVER['REQUEST_URI'], '/posts/all') === 0) ? 'Todas as notícias' : 'Últimas Notícias' ?></h1>
      <?php if (strpos($_SERVER['REQUEST_URI'], '/posts/all') === 0): ?>
        <a href="/posts/all"
          class="btn ms-2 d-flex justify-content-between align-items-center gap-1 !text-xs !text-zinc-400 hover:!text-zinc-600"><i>Ver todos os posts</i>
          <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 16 16">
            <path fill="currentColor"
              d="M5.646 3.146a.5.5 0 0 0 0 .708L9.793 8l-4.147 4.146a.5.5 0 0 0 .708.708l4.5-4.5a.5.5 0 0 0 0-.708l-4.5-4.5a.5.5 0 0 0-.708 0" />
          </svg>
        </a>
      <?php else: ?>
        <a href="/"
          class="btn ms-2 d-flex justify-content-between align-items-center gap-1 !text-xs !text-zinc-400 hover:!text-zinc-600"><i>Voltar ao início</i>
          <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 16 16">
            <path fill="currentColor"
              d="M5.646 3.146a.5.5 0 0 0 0 .708L9.793 8l-4.147 4.146a.5.5 0 0 0 .708.708l4.5-4.5a.5.5 0 0 0 0-.708l-4.5-4.5a.5.5 0 0 0-.708 0" />
          </svg>
        </a>
      <?php endif; ?>
    </div>
    <?php if (session()->get('user_id')): ?>
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalNovoPost">Novo Post</button>
    <?php endif; ?>
  </div>
  <div class="row g-2" id="bentoPosts">
    <?php if (strpos($_SERVER['REQUEST_URI'], '/posts/all') === 0): ?>
    <div class="d-flex flex-column gap-4 container px-5 w-50" id="bentoPosts">
      <?php foreach ($posts as $post): ?>
        <div class="card shadow-sm !rounded-xl !border-none overflow-hidden w-100 min-h-48">
          <?php if (!empty($post->image)): ?>
            <img src="<?= $post->image ?>" class="w-100 object-fit-cover" alt="Imagem do post" style="max-height:300px;">
          <?php endif; ?>
          <div class="card-body p-3">
            <h5 class="card-title mb-2" style="font-size:1.2rem; font-weight:bold;"><?= $post->title ?></h5>
            <p class="card-text mb-2" style="font-size:1rem; color:#555;"><?= $post->description ?></p>
            <div class="dropdown position-absolute end-0 top-0 m-2" style="z-index:3;">
              <button class="btn btn-sm btn-light !size-8 d-flex align-items-center justify-content-center !bg-zinc-200/50 !border-none !backdrop-blur-2xl" type="button hover:!bg-zinc-300" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius:50%; padding:0.3rem 0.5rem;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path fill="black" d="M8 5.25a1.25 1.25 0 1 1 0-2.5a1.25 1.25 0 0 1 0 2.5m0 4a1.25 1.25 0 1 1 0-2.5a1.25 1.25 0 0 1 0 2.5M6.75 12a1.25 1.25 0 1 0 2.5 0a1.25 1.25 0 0 0-2.5 0"/></svg>
              </button>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="/posts/show/<?= $post->id ?>">Ver</a></li>
                <li><a class="dropdown-item" href="/posts/edit/<?= $post->id ?>">Editar</a></li>
                <li><a class="dropdown-item text-danger" href="/posts/delete/<?= $post->id ?>">Excluir</a></li>
              </ul>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php else: ?>
    <div class="row g-3" id="bentoPosts" style="min-height:60vh; display:grid; grid-template-columns:repeat(auto-fit,minmax(320px,1fr)); gap:1.5rem;">
      <?php foreach ($posts as $post): ?>
        <div class="card h-100 shadow-sm !rounded-xl !border-none position-relative overflow-hidden px-0 hover:!scale-105 transition-transform duration-300">
          <?php if (!empty($post->image)): ?>
            <img src="<?= $post->image ?>" class="w-100 h-100 object-fit-cover position-absolute top-0 start-0" alt="Imagem do post" style="z-index:1;">
          <?php endif; ?>
          <div class="card-body position-relative p-2" style="z-index:2; background: linear-gradient(180deg, rgba(0,0,0,0.6) 0%, rgba(0,0,0,0.2) 100%);">
            <h5 class="card-title text-white position-relative m-2" style="z-index:2; margin-bottom:0; font-size:1.1rem; font-weight:bold; text-shadow:0 1px 4px #000;"><?= $post->title ?></h5>
            <div class="mx-2 text-white">
              <p class="card-text position-relative" style="z-index:2; margin-bottom:0; font-size:0.95rem; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;"><?= $post->description ?></p>
            </div>
            <div class="dropdown position-absolute end-0 top-0 m-2" style="z-index:3;">
              <button class="btn btn-sm btn-light !size-8 d-flex align-items-center justify-content-center !bg-zinc-200/10 !border-none !backdrop-blur-2xl" type="button hover:!bg-zinc-300" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius:50%; padding:0.3rem 0.5rem;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path fill="white" d="M8 5.25a1.25 1.25 0 1 1 0-2.5a1.25 1.25 0 0 1 0 2.5m0 4a1.25 1.25 0 1 1 0-2.5a1.25 1.25 0 0 1 0 2.5M6.75 12a1.25 1.25 0 1 0 2.5 0a1.25 1.25 0 0 0-2.5 0"/></svg>
              </button>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="/posts/show/<?= $post->id ?>">Ver</a></li>
                <li><a class="dropdown-item" href="/posts/edit/<?= $post->id ?>">Editar</a></li>
                <li><a class="dropdown-item text-danger" href="/posts/delete/<?= $post->id ?>">Excluir</a></li>
              </ul>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      
    </div>
  <?php endif; ?>
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
            </div>
            <link href="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/theme-lark.css" rel="stylesheet">
            <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
            <script>
              let ckeditorInstance = null;
              $('#modalNovoPost').on('shown.bs.modal', function () {
                setTimeout(function() {
                  if (!ckeditorInstance && document.querySelector('#description')) {
                    ClassicEditor.create(document.querySelector('#description'))
                      .then(editor => {
                        ckeditorInstance = editor;
                      })
                      .catch(error => {
                        console.error('Erro ao inicializar CKEditor:', error);
                      });
                  }
                }, 200);
              });
              $('#modalNovoPost').on('hidden.bs.modal', function () {
                if (ckeditorInstance) {
                  ckeditorInstance.destroy();
                  ckeditorInstance = null;
                }
              });
            </script>
            <div class="mb-3">
              <label for="image" class="form-label">Imagem</label>
              <input class="form-control" type="file" name="image" id="image" accept="image/*">
              <img id="preview" src="#" alt="Preview" class="img-fluid mt-2" style="display:none;max-height:200px;">

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
<?= $this->endSection() ?>