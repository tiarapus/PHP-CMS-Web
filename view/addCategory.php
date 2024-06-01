<?php
    include '../layout/adminBar.php';

    if(!isset($_SESSION["login"])){
        echo "<script>
        alert('Login untuk mengakses halaman');
        document.location.href = 'login.php'
        </script>";
        exit;
    }
    if (isset($_POST['tambah'])){
        if(addCategory($_POST)>0){
            echo "<script>
                alert('Berhasil membuat kategori konten');
                document.location.href = 'adminDashboard.php'
                </script>";
        }  else {
            echo "<script>
                alert('Gagal membuat kategori konten');
                document.location.href = 'adminDashboard.php'
                </script>";
        }
    }

  $user_id = $_SESSION['userId'] ;
?>
<div class="col-lg-10 mx-auto">
    <div class="card-body">

        <!-- <form>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form> -->
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3 row">
                <label for="category" class="col-sm-3 col-form-label">Judul Kategori</label>
                <div class="col-sm-9">
                    <input type="text" name="category" id="category" class="fs-4 form-control form-control-sm" id="nama_brg" name="nama_brg" placeholder="Judul Kategori..">
                </div>
            </div>

            <button type="submit" name="tambah" class="btn btn-success float-end mx-2">Tambah</button>
            <a type="submit" href="../view/adminDashboard.php" class="btn btn-danger float-end mx-2">Cancel</a>
            
        </form>
    </div>
</div>
<?php
    include '../layout/adminFooter.php';
?>