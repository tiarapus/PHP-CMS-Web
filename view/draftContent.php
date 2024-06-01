<?php
    include '../layout/adminBar.php';

    if(!isset($_SESSION["login"])){
        echo "<script>
        alert('Login untuk mengakses halaman');
        document.location.href = 'login.php'
        </script>";
        exit;
    }
  $user_id = $_SESSION['userId'] ;
  $draft = select('SELECT articles.*, categories.category
                    FROM articles 
                    JOIN categories ON articles.categoryId = categories.categoryId and isDraft = 1');

?>

<!--  Header End -->

<div class="row">

    <?php foreach ($draft as $item) : ?>
        <div class="col-sm-6 col-xl-3">
        <div class="card overflow-hidden rounded-2">
            <div class="position-relative">
            <img src="../assets/img/<?=$item['foto']?>" class="card-img-top rounded-0" style="max-height: 200px;" alt="...">
        </div>
            <div class="card-body pt-3 p-4">
            <span><?= $item['category']?></span>
            <h6 class="fw-semibold fs-4"><?= $item['judul']?></h6>
            <div class="d-flex mt-3">
                <a type="submit" href="../view/editContent.php?articleId=<?= $item['articleId'] ?>" class="fs-2 btn btn-success float-end">Edit Draft</a>
                <a type="submit"  href="../view/deleteContent.php?articleId=<?= $item['articleId'] ?>" class="fs-2 btn btn-danger float-end mx-1">Hapus</a>
            </div>
            </div>
        </div>
        </div>
    <?php endforeach;?>
</div>

<?php
    include '../layout/adminFooter.php';
?>