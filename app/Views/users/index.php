<?= $this->extend('template'); ?>
<?= $this->section('content'); ?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/home" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/about" class="nav-link">Contact</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="/assets/adminlte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">My Blog</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/assets/adminlte/dist/img/user4-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Ummu Qaltsum</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/admin" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/posts" class="nav-link">
              <i class="nav-icon fas fa-book-open"></i>
              <p>My Post</p>
           </a>
          </li>
          <li class="nav-item menu-open">
            <a href="/admin/users" class="nav-link">
              <i class="nav-icon fas fa-user-graduate"></i>
              <p>Data User</p>
           </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Home</a></li>
              <li class="breadcrumb-item active">Data User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- /.content -->
    <section class="content">
      <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
          <?= session()->getFlashdata('pesan'); ?>
        </div>
      <?php endif; ?>
      <div class="container-fluid">
          <a href="/admin/users/create" class="btn btn-primary"> <i class="fas fa-plus"></i> Tambah Data</a>
          <div class="card mt-3">
            <div class="card-header">
              Data Registrasi User
            </div>
            <div class="table-responsive">
              <table class="table table-striped text-center">
                <thead>
                  <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Biodata</th>
                    <th scope="col">Email</th>
                    <th scope="col">Pasword</th>
                    <th scope="col">Foto Profil</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($users as $i => $user) : ?>
                  <tr>
                    <th scope="row"><?= $i +1; ?></th>
                    <td><?= $user['fullname']; ?></td>
                    <td><?= $user['biodata']; ?></td>
                    <td><?= $user['email']; ?></td>
                    <td><?= $user['password']; ?></td>
                    <td><?= $user['foto']; ?></td>
                    <td>
                      <a href="users/edit/<?= $user['id']; ?>" class="btn btn-sm btn-warning me-1"><i class="fas fa-edit"></i> Edit</a>

                      <form action="users/<?= $user['id']; ?>" method="post" class="d-inline">
                      <?= csrf_field(); ?>
                      <input type="hidden" name="_method" value="delete">
                      <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ?');"><i class="fas fa-trash"></i> Hapus</button>
                      </form>
                      
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </section>
    
  </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?= $this->endSection(); ?>