<?php
require 'backend.php';
$dt = search($_GET["keyword"]);

$keyword = isset($_GET["keyword"]) ? $_GET["keyword"] : "";

$awal_page = 8;
$page = isset($_GET["page"]) ? $_GET["page"] : 1;
$active_page = ($awal_page * $page) - $awal_page;

if (!empty($keyword)) {
    $jumlah_page = count(query("SELECT * FROM allsmartphone WHERE name LIKE '%$keyword%' OR price LIKE '%$keyword%'"));
    $dt = query("SELECT * FROM allsmartphone WHERE name LIKE '%$keyword%' OR price LIKE '%$keyword%' LIMIT $active_page, $awal_page");
} else {
    $jumlah_page = count(query("SELECT * FROM allsmartphone"));
    $dt = query("SELECT * FROM allsmartphone LIMIT $active_page, $awal_page");
};

$hasil_page = ceil($jumlah_page / $awal_page);

?>

<div class="container ">
    
        <?php if (!empty($dt)) : ?>
            <div class="row">
                <?php foreach ($dt as $data) : ?>
                    <div class="col-3 mt-5">
                        <a href="info.php?id=<?= $data["id"]; ?>" class="phone text-center link-offset-2 link-underline link-underline-opacity-0">
                            <figure>
                                <img src="smartphone/<?= $data["image"]; ?>" alt="" style="width:160px;height:212px;">
                                <figcaption><?= $data["name"]; ?></figcaption>
                            </figure>
                        </a>
                    </div>
                <?php endforeach ?>
            </div>
        <?php else : ?>
            <p style="color:red; text-align:center;">data not found!</p>
        <?php endif ?>

    <!-- main content end -->
</div>
<div class="container d-flex align-items-center justify-content-center mt-5">
    <nav aria-label="Page navigation example">
        <ul class="pagination">

            <!-- previous pagination start -->
            <?php if ($active_page > 1) : ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?= $page - 1; ?>&keyword=<?= htmlspecialchars($keyword); ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
            <?php else : ?>
                <li class="page-item">
                    <a class="page-link disabled" href="?page=<?= $page; ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
            <?php endif; ?>
            <!-- previous pagination end -->


            <!-- pagination start -->
            <?php for ($i = 1; $i <= $hasil_page; $i++) : ?>
                <?php if ($i == $page) : ?>
                    <li class="page-item active"><a class="page-link" href="?page=<?= $i; ?>&keyword=<?= htmlspecialchars($keyword); ?>"><?= $i; ?></a></li>
                <?php else : ?>
                    <li class="page-item"><a class="page-link" href="?page=<?= $i; ?>&keyword=<?= htmlspecialchars($keyword); ?>"><?= $i; ?></a></li>
                <?php endif; ?>
            <?php endfor; ?>
            <!-- pagination end -->

            <!-- next pagination start -->
            <?php if ($page < $hasil_page) : ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?= $page + 1; ?>&keyword=<?= htmlspecialchars($keyword); ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            <?php else : ?>
                <li class="page-item">
                    <a class="page-link disabled" href="?page=<?= $page; ?>" aria-label="next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            <?php endif; ?>
            <!-- next pagination end -->

        </ul>
    </nav>
</div>
</div>