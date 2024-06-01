<?php
    include '../layout/header.php';
    include '../layout/userNav.php';
    $draft = false;
    $articles = select("SELECT
    articles.*,
    categories.*,
    users.full_name
    FROM
        articles,
        categories,
        users
    WHERE
        articles.categoryId = categories.categoryId
        and articles.userId = users.userId
        and articles.isDraft = '$draft'
    ORDER BY
        articles.articleId DESC
    LIMIT 5;
");
    $latest = isset($articles[0]) ? $articles[0] : null;
    array_shift($articles);
 
   

?>
<div class="container pt-3 pb-5">
    <a href="../view/detailContent.php?articleId=<?=$latest['articleId']?>">
        <div class="card mb-3">
                <img src="../assets/img/<?= isset($latest['foto']) ? $latest['foto'] : '' ?>" class="card-img-top" alt="..." style="max-height: 300px; object-fit:cover;">
                <div class="card-body">
                    <a href="../view/content.php?categoryId=<?=$latest['categoryId']?>" class="card-text"><?= isset($latest['category']) ? $latest['category'] : '' ?></a>
                    <h5 class="card-title"><?= isset($latest['judul']) ? $latest['judul'] : '' ?></h5>
                    <p class="card-text"><?= truncateText(isset($latest['content']) ? $latest['content'] : '', 100) ?></p>
                    <p class="card-text">
                        <small class="text-muted">Diunggah pada <?= isset($latest['createdAt']) ? date('Y-m-d H:i:s', strtotime($latest['createdAt'])) : '' ?></small>
                        <small class="text-muted"> oleh <?= isset($latest['full_name']) ? $latest['full_name'] : '' ?></small>
                    </p>
                </div>
        </div>
    </a>

    <div class="row pb-3">
    <?php foreach ($articles as $item) : 
        contentCard($item, $showButton = false, $showContent = true)    
    ?>
    <?php endforeach;?>
    </div>
    <div class="text-center">
        <a href="../view/content.php" class="fs-2 btn btn-primary px-auto">Selengkapnya</a>
    </div>


</div>
<?php
include '../layout/footer_component.php';
include '../layout/footer.php';
?>