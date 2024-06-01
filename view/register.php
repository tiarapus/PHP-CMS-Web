<?php
include '../layout/header.php';


if (isset($_POST['tambah'])) {
    // Validate and sanitize user input
    $nama = strip_tags($_POST['nama']);
    $username = strip_tags($_POST['username']);

     if (isUsernameExists($username)) {
        // Username already exists, display an error message
        $error = 'Username tidak tersedia';
    } else {
        if (register($_POST) > 0) {
            echo "<script>
                alert('Akun berhasil dibuat!');
                document.location.href = 'login.php';
                </script>";
        } else {
            echo "<script>
                alert('Akun gagal dibuat.');
                document.location.href = 'register.php';
                </script>";
        }
    }
}
?>
<!-- <div class="container mt-5 pt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header text-center">
                    <h4>Daftar</h4>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="row mb-3">
                            <div class="col">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" name="nama" required placeholder="Nama Lengkap...">
                            </div>
                            
                            <div class="col">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" required name="username" placeholder="Username...">
                                <?php if (!empty($error)): ?>
                                    <small class="text-danger">
                                        <?php echo $error; ?>
                                    </small>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" required name="password" placeholder="Password...">
                        </div>
                        <button type="submit" name="tambah" class="btn btn-primary w-100">Daftar</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    Sudah punya akun? <a href="../view/login.php">Masuk</a>
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <h1 class="text-primary text-center" style="font-weight: bold;">
                   Register Admin
                </h1>
                <form action="" method="post">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                    <input type="text"  id="nama" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="text"  id="usernane" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input id="password" name="password" type="password" class="form-control" id="exampleInputPassword1">
                  </div>
                  <button type="submit" name="tambah" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Daftar</button>
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">Sudah punya akun?</p>
                    <a class="text-primary fw-bold ms-2"  href="../view/login.php">Masuk disini!</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

<?php
    include '../layout/footer.php'
?>
