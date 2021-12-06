<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link <?= (empty($_GET['page'])) ? 'active' : '' ?>" href="/pages">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($_GET['page']) == 'karyawan' ? 'active' : '' ?>" href="/pages/karyawan">
              <span data-feather="users"></span>
              Data Karyawan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($_GET['page']) == 'jabatan' ? 'active' : '' ?>" href="/pages/jabatan">
              <span data-feather="file"></span>
              Data Jabatan
            </a>
          </li>
        </ul>
      </div>
    </nav>