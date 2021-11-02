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
    <div class="container">
        <div class="card">
            <div class="card-header">
                Form Edit Data
            </div>
            <div class="card-body">
                <form action="/admin/users/ubah/<?=$user['id'];?>" method="POST"> <!-- enctype="multipart/form-data -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                            <div class="form-group">
                                <label for="fullname">Nama Lengkap</label>
                                <input type="text" class="form-control <?= ($validation->hasError('fullname')) ? 'is-invalid' : ''; ?>" id="fullname" name="fullname" value="<?= (old('fullname')) ? old('fullname') : $user['fullname'];?>">
                                <?php if($validation->hasError('fullname')) : ?>
                                <div class="invalid-feedback">
                                  <?= $validation->getError("fullname"); ?>
                                </div>
                                <?php endif; ?>         
                            </div>
                            <label for="biodata">Biodata</label>
                                <input type="text" class="form-control <?= ($validation->hasError('biodata')) ? 'is-invalid' : ''; ?>" id="biodata" name="biodata" value="<?= (old('biodata')) ? old('biodata') : $user['biodata'];?>">
                                <?php if($validation->hasError('biodata')) : ?>
                                <div class="invalid-feedback">
                                  <?= $validation->getError("biodata"); ?>
                                </div>
                                <?php endif; ?>  
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= (old('email')) ? old('email') : $user['email'];?>" disabled>
                                <?php if($validation->hasError('email')) : ?>
                                <div class="invalid-feedback">
                                  <?= $validation->getError("email"); ?>
                                </div>   
                                <?php endif; ?>      
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="text" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password" name="password" value="<?= (old('password')) ? old('password') : $user['password'];?>"> 
                                <?php if($validation->hasError('password')) : ?>
                                <div class="invalid-feedback">
                                  <?= $validation->getError("password"); ?>
                                </div>        
                                <?php endif; ?>
                                </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-paper-plane"></i> Edit Data
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?= $this->endSection(); ?>