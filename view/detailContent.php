<?php
    include '../layout/header.php';
    include '../layout/userNav.php';

    $articleId = (int)$_GET['articleId'];
    $artikel = select("SELECT articles.*, categories.category, users.full_name
    FROM articles 
    JOIN categories ON articles.categoryId = categories.categoryId 
    Join users On users.userId = articles.userId
    and articles.articleId = $articleId")[0]
?>

<div class="container">
    <div class="detail" style="text-align:justify; justify-content:center">
        <div class="header">
            <div class="title">
    
            </div>
            <img src="" alt="">
        </div>
        <div class="content">
            <a href="../view/content.php" style="font-size: 16px; padding-bottom:20px">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 1024 1024">
                    <path fill="currentColor" d="M224 480h640a32 32 0 1 1 0 64H224a32 32 0 0 1 0-64"/>
                    <path fill="currentColor" d="m237.248 512l265.408 265.344a32 32 0 0 1-45.312 45.312l-288-288a32 32 0 0 1 0-45.312l288-288a32 32 0 1 1 45.312 45.312z"/>
                </svg>
            </a>
            <img src="../assets/img/<?=$artikel['foto']?>" alt="" class="mx-auto" style="width: 85vw; height:300px; object-fit:cover; display:flex; margin-top:20px">
            <p style="padding-top: 30px; color:black;">Diunggah pada <?=$artikel['createdAt']?> Oleh <?=$artikel['full_name']?></p>
            <?php
                // Check if selectedCard.content contains <br> tags
                if (strpos($artikel['content'], '<br>') !== false) {
                    echo '<p   style="font-size:16px; color:black; font-family: poppins">' . $artikel['content'] . '</p>';
                } else {
                    echo '<p   style="font-size:16px; color:black; font-family: poppins">' . str_replace("\n", '<br>', $artikel['content']) . '</p>';
                }
            ?>
        </div>
    </div>
</div>


</div>
<?php
include '../layout/footer_component.php';
include '../layout/footer.php';
?>