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
  $articles = select('SELECT articles.*, categories.category
                    FROM articles 
                    JOIN categories ON articles.categoryId = categories.categoryId and isDraft = 0');

?>

<div class="row">
    <?php foreach ($articles as $item) : 
        contentCard($item, $showButton = true,  $showContent = false)
    ?>
    <?php endforeach;?>
</div>

<?php
    include '../layout/adminFooter.php';
?>