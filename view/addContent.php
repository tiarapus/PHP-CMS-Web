<?php
    include '../layout/adminBar.php';

    $user_id = $_SESSION['userId'];
    if(!isset($_SESSION["login"])){
        echo "<script>
        alert('Login untuk mengakses halaman');
        document.location.href = 'login.php'
        </script>";
        exit;
    }
    if (isset($_POST['tambah'])){
        $result = insert($_POST);
        echo "<script>
            alert('Berhasil mengunggah konten');
            document.location.href = 'adminDashboard.php'
            </script>";
    }
    if (isset($_POST['draft'])){
        $result = saveDraft($_POST);
        echo "<script>
            alert('Konten disimpan dalam draft');
            document.location.href = 'adminDashboard.php'
            </script>";
    }

    $categories =  select("SELECT * FROM categories");
?>
<div class="col-lg-10 mx-auto">
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="userId" value="<?=$user_id?>">
                <input type="hidden" name="isDraft" value="<?=true?>">
                <div class="mb-3 row">
                    <label for="judul" class="col-sm-3 col-form-label">Judul</label>
                    <div class="col-sm-9">
                        <input type="text" class="fs-4 form-control form-control-sm" id="judul" name="judul" placeholder="Judul..">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="category" class="col-sm-3 col-form-label">Kategori</label>
                    <div class="col-sm-9">
                        <select required name="category" id="category" class="fs-4 form-control">
                            <option value="">-- pilih --</option>
                            <?php $no = 1; ?>
                            <?php foreach ($categories as $item) : ?>
                                <option value=<?= $item['categoryId'] ?>><?= $item['category']?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="content" class="col-sm-3 col-form-label">Konten</label>
                    <div class="col-sm-9">
                        <textarea class="fs-4 form-control form-control-sm" id="content" name="content" rows="3" placeholder="Konten.."></textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="sampul" class="col-sm-3 col-form-label">Sampul</label>
                    <div class="col-sm-9">
                        <input type="file" class="fs-4 form-control form-control-sm" id="sampul" name="sampul" placeholder="Foto barang..">
                    </div>
                </div>

                <button type="submit" name="tambah" class="btn btn-success float-end mx-2">Unggah</button>
                <button type="submit" name="draft" class="btn btn-primary float-end mx-2">Draft</button>
                <a type="submit" href="../view/adminDashboard.php" class="btn btn-danger float-end mx-2">Cancel</a>

                
            </form>
    </div>
</div>
<?php
    include '../layout/adminFooter.php';
?>