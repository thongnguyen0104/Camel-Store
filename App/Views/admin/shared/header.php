  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?= PUBLIC_URL . "/admin" ?>/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= DOCUMENT_ROOT ?>/admin" class="nav-link">Trang chủ</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <!-- <a href="#" class="nav-link">Về tôi</a> -->
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= DOCUMENT_ROOT . "/admin/login/signout" ?>" class="nav-link hover">Đăng xuất</a>
      </li>
    </ul>

  </nav>
  <!-- /.navbar -->