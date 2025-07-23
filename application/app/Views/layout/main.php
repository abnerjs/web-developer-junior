<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= (isset($title) ? $title : 'BLOG MVP') ?></title>
  <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
  <?= $this->renderSection('css_extras') ?>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light m-4">
    <div class="container-fluid">
      <a class="navbar-brand fw-bold" href="/">Teste Vaga</a>
      <form class="d-flex" id="searchForm" action="<?= base_url('posts/all') ?>" method="get">
        <input class="form-control me-2" type="search" placeholder="Buscar posts" aria-label="Buscar" id="searchInput"
          name="search" value="<?= isset($_GET['search']) ? esc($_GET['search']) : '' ?>">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
      </form>
      <div id="userArea" class="ms-3">
        <?php if ((session()->get('user_id'))): ?>
          <span class="fw-bold">Olá, <?= session()->get('name') ?></span>
          <a href="users/logout" class="btn btn-outline-danger btn-sm ms-2">Sair</a>
        <?php else: ?>
          <a href="users/login" class="btn btn-primary">Efetuar login</a>
        <?php endif; ?>
      </div>
    </div>
  </nav>

  <div class="container-fluid mt-4">
    <?= $this->renderSection('content') ?>
  </div>

  <script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/script.js') ?>"></script>
  <?= $this->renderSection('js_extras') ?>
</body>

</html>