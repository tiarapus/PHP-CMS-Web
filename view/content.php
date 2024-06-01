<?php
include '../layout/header.php';
include '../layout/userNav.php';
$draft = false;
if (isset($_GET['categoryId'])) {
    $categoryId = (int)$_GET['categoryId'];
    $artikel = select("SELECT articles.*, categories.*, users.full_name
        FROM articles 
        JOIN categories ON articles.categoryId = categories.categoryId 
        JOIN users ON users.userId = articles.userId
        WHERE articles.categoryId = $categoryId and articles.isDraft = '$draft' ");

    if ($artikel) {
?>
        <div class="container">
            <h3 class="text-center mb-4 mt-4">Sort berdasarkan Kategori</h3>
            <div class="row pb-3" style="margin-top: 50px;">
                <?php foreach ($artikel as $item) :
                    contentCard($item, $showButton = false, $showContent = true)
                ?>
                <?php endforeach; ?>
            </div>
        </div>
<?php
    } else {
        echo '<p>Konten tidak ditemukan</p>';
    }
} else {
    $allArtikel = select("SELECT
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
        articles.articleId DESC")

?>
    <div class="container">
        <h3 class="text-center mb-4 mt-4">Semua Artikel</h3>
        <div class="row pb-3" style="margin-top: 50px;">
            <?php foreach ($allArtikel as $item) :
                contentCard($item, $showButton = false, $showContent = true)
            ?>
            <?php endforeach; ?>
        </div>
    </div>
<?php
}
?>

<?php
include '../layout/footer_component.php';
include '../layout/footer.php';
?>