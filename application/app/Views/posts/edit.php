
<h2 class="mb-4">Editar Post</h2>
<form method="post" action="/posts/update/<?= $post->id ?>" enctype="multipart/form-data" class="p-3 border rounded bg-light">
  <div class="mb-3">
    <label for="title" class="form-label">Título</label>
    <input type="text" class="form-control" name="title" id="title" value="<?= $post->title ?>" required>
  </div>
  <div class="mb-3">
    <label for="description" class="form-label">Descrição</label>
    <textarea class="form-control" name="description" id="description" rows="3" required><?= $post->description ?></textarea>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
    <script>
      ClassicEditor.create(document.querySelector('#description'));
    </script>
  </div>
  <div class="mb-3">
    <label for="image" class="form-label">Imagem</label>
    <input class="form-control" type="file" name="image" id="image" accept="image/*">
    <div id="dropzone" class="border border-primary rounded p-3 mt-2 text-center" style="cursor:pointer;">Arraste e solte ou cole uma imagem aqui</div>
    <img id="preview" src="#" alt="Preview" class="img-fluid mt-2" style="display:none;max-height:200px;">
    <?php if (!empty($post->image)): ?>
      <img src="<?= $post->image ?>" alt="Imagem atual" class="img-fluid mt-2" style="max-height: 200px;">
    <?php endif; ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
  <button type="submit" class="btn btn-primary">Atualizar</button>
</form>
