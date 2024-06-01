<?php
    include '../layout/adminBar.php';

    if(!isset($_SESSION["login"])){
        echo "<script>
        alert('Login untuk mengakses halaman');
        document.location.href = 'login.php'
        </script>";
        exit;
    }
    $articleId = (int)$_GET['articleId'];
        if (isset($_POST['edit'])){
            $result = update($_POST);
            echo "<script>
            alert('Berhasil mengubah konten');
            document.location.href = 'adminDashboard.php'
            </script>";
            exit;
        }
        
        $artikel = select("SELECT articles.*, categories.category
        FROM articles 
        JOIN categories ON articles.categoryId = categories.categoryId 
        and articles.articleId = $articleId")[0];
        
  $user_id = $_SESSION['userId'] ;
?>
<div class="col-lg-10 mx-auto">
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="articleId" value="<?=$artikel['articleId'];?>">
            
                <div class="mb-3 row">
                    <label for="judul" class="col-sm-3 col-form-label">Judul</label>
                    <div class="col-sm-9">
                        <input type="text" class="fs-4 form-control form-control-sm" id="judul" name="judul" value=<?=$artikel['judul']?> placeholder="Judul..">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="category" class="col-sm-3 col-form-label">Kategori</label>
                    <div class="col-sm-9">
                        <input type="text" class="fs-4 form-control form-control-sm" id="judul" name="judul" value=<?=$artikel['category']?> disabled>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="content" class="col-sm-3 col-form-label">Konten</label>
                    <div class="col-sm-9">
                        <textarea class="fs-4 form-control form-control-sm" id="content" name="content" rows="3">
                        <?=$artikel['content']?>
                        </textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="sampul" class="col-sm-3 col-form-label">Sampul</label>
                    <div class="col-sm-9">
                        <input type="file" class="fs-4 form-control form-control-sm" id="sampul" name="sampul" placeholder="Foto barang..">
                    </div>
                </div>

                <button type="submit" name="edit" class="btn btn-success float-end mx-2">Ubah</button>
                <a type="submit" href="../view/adminDashboard.php" class="btn btn-danger float-end mx-2">Cancel</a>
            </form>
    </div>
</div>
<?php
    include '../layout/adminFooter.php';
?>