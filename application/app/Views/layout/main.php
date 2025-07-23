<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $this->renderSection('title') ?></title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
  <?= $this->renderSection('css_extras') ?>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light m-4">
    <div class="container-fluid">
      <a class="navbar-brand fw-bold" href="/">Central de Notícias</a>
      <form class="d-flex mx-auto" id="searchForm" action="<?= base_url('posts/all') ?>" method="get">
        <input class="form-control !rounded-r-none !rounded-l-full" type="search"
          placeholder="Digite o título da notícia" aria-label="Buscar" id="searchInput" name="search"
          value="<?= isset($_GET['search']) ? esc($_GET['search']) : '' ?>">
        <button
          class="btn btn-primary !bg-zinc-950 !border-none hover:!bg-zinc-700 fw-bold !rounded-l-none !rounded-r-full !pr-4"
          type="submit">Buscar</button>
      </form>
      <div id="userArea" class="ms-3 d-flex align-items-center">
        <?php if ((session()->get('user_id'))): ?>
          <?php
          $fullName = session()->get('name');
          $nameParts = explode(' ', $fullName);
          $firstName = $nameParts[0];
          $lastName = count($nameParts) > 1 ? end($nameParts) : '';
          ?>
          <a class="text-decoration-none !text-zinc-950" href="<?= base_url('users/profile') ?>" class="fw-bold">Olá,
            <b><?= esc($firstName) . ' ' . esc($lastName) ?></b></a>
          <a href="users/logout" class="btn btn-sm ms-2 !text-red-600">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
              <path fill="currentColor"
                d="M4.5 2A2.5 2.5 0 0 0 2 4.5v7A2.5 2.5 0 0 0 4.5 14h6a.5.5 0 0 0 0-1h-6A1.5 1.5 0 0 1 3 11.5v-7A1.5 1.5 0 0 1 4.5 3h6a.5.5 0 0 0 0-1zm7.354 2.646a.5.5 0 0 0-.708.708L13.293 7.5H6.5a.5.5 0 0 0 0 1h6.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708z" />
            </svg>
          </a>
        <?php else: ?>
          <div class="d-flex align-items-center">
            <a href="users/register" class="btn btn-tertiary">Cadastre-se</a>
            <a href="users/login" class="btn btn-primary !rounded-full !bg-zinc-950 !border-none">Entre já</a>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </nav>

  <div class="container-fluid my-4">
    <?= $this->renderSection('content') ?>
  </div>

  <script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/script.js') ?>"></script>
  <?= $this->renderSection('js_extras') ?>
</body>

</html>