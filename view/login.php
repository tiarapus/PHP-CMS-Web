<?php
    session_start();
    include '../layout/header.php';

    if (isset($_POST['login'])){
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            
            $res = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

            if (mysqli_num_rows($res) == 1) {
                $result = mysqli_fetch_assoc($res);
                if (password_verify($password, $result['password'])) {
                    $_SESSION['login'] = true;
                    $_SESSION['userId'] = $result['userId'];
                    $_SESSION['full_name'] = $result['full_name'];
                    $_SESSION['username'] = $result['username'];

                    header("Location: adminDashboard.php");
                    exit;
                }   
             
            }
            $error = true;
    }
?>

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
                   Login Admin
                </h1>
                <?php if (isset($error)) : ?>
                    <div class="text-danger text-center pt-3 ">
                        <b>
                            Username/Password SALAH
                        </b>
                    </div>
                <?php endif;?>
                <form action="" method="post">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="text"  id="usernane" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input id="password" name="password" type="password" class="form-control" id="exampleInputPassword1">
                  </div>
                  <button type="submit" name="login" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Masuk</button>
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">Belum punya akun?</p>
                    <a class="text-primary fw-bold ms-2" href="../view/register.php">Daftar disini!</a>
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