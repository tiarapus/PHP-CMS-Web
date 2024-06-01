

<?php
function contentCard($item, $showButton = false, $showContent = false) {
    ?>
    <div class="col-sm-6 col-xl-3">
        <a href="../view/detailContent.php?articleId=<?= $item['articleId'] ?>" class="card-link">
            <div class="card overflow-hidden rounded-2">
                <div class="position-relative">
                    <img src="../assets/img/<?= $item['foto'] ?>" class="card-img-top rounded-0" style="height: 150px; object-fit:cover" alt="...">
                </div>
                <div class="card-body pt-3 p-4">
                    <a href="../view/content.php?categoryId=<?= $item['categoryId']?>"><?= $item['category'] ?></a>

                    <h6 class="fw-semibold fs-4"><?= truncateText($item['judul'], 30) ?></h6>

                    <?php if ($showContent) : ?>
                        <p class="card-text"><?= truncateText($item['content'], 100) ?></p>
                    <?php endif; ?>
                    <?php if (isset($item['createdAt'])) : ?>
                    <p class="card-text">
                        <small class="text-muted">Diunggah pada <?= date('Y-m-d H:i:s', strtotime($item['createdAt'])) ?></small>
                    </p>
                    <?php endif; ?>

                    <?php if (isset($item['full_name'])) : ?>
                        <p class="card-text">
                            <small class="text-muted"> oleh <?= $item['full_name'] ?></small>
                        </p>
                    <?php endif; ?> 

                    <?php if ($showButton) : ?>
                        <div class="d-flex mt-3">
                            <a type="submit" href="../view/editContent.php?articleId=<?= $item['articleId'] ?>" class="fs-2 btn btn-success float-end">Ubah</a>
                            <a type="submit" href="../view/deleteContent.php?articleId=<?= $item['articleId'] ?>" class="fs-2 btn btn-danger float-end mx-1">Hapus</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </a>
    </div>
<?php } ?>
