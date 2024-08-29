<?php
session_start();
// menghubungkan ke backend
require 'backend.php';

if (!isset($_SESSION["login"])) {
  header("location: login.php");
  exit;
}

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

// NAME SMARTPHONE

$phone = query("SELECT * FROM phonename");
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <!-- boostrap cdn -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="shortcut icon" href="smartphone/exophonelogo.webp" type="image/x-icon">

  <!-- google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Arimo:ital,wght@0,400..700;1,400..700&family=Oswald:wght@200..700&display=swap" rel="stylesheet">

  <!-- css -->
  <link rel="stylesheet" href="styles.css">
  <style>
    .dropdown-menu {
      display: none;
      background-color: rgba(255, 255, 255, .7);
      transition: ease-in-out 10;
      border-radius: 10px;
    }

    /* Styling untuk WebKit (Chrome, Safari) */
    .dropdown-menu::-webkit-scrollbar {
      width: 12px;
      height: 12px;
      border-radius: 10px;
    }

    .dropdown-menu::-webkit-scrollbar-track {
      background: #f1f1f1;
      border-radius: 10px;
    }

    .dropdown-menu::-webkit-scrollbar-thumb {
      background: #888;
      border-radius: 10px;
    }

    .dropdown-menu::-webkit-scrollbar-thumb:hover {
      background: #555;
    }

    .dropdown:hover .dropdown-menu {
      display: block;
      border-radius: 10px;
    }
  </style>
</head>

<body style="height: 1400px;overflow-x:hidden;">
  <!-- header navbar start -->
  <header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">

        <a class="navbar-brand" href="#">
          <img src="smartphone/exophonelogo.webp" alt="Logo" width="30" height="30" class="d-inline-block align-text-center" style="border-radius:10px ;">
          exophone
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarScroll">
          <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">News</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Reviews</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                All Brands
              </a>
              <ul class="dropdown-menu" style="height:300px;width:400px;overflow-x:hidden;">
                <?php foreach ($dt as $data) : ?>
                  <a class="dropdown-item" href="info.php?id=<?= $data["id"]; ?>">
                    <div class="row rounded-3">
                      <div class="col-2">
                        <li><img src="smartphone/<?= $data["image"]; ?>" style="height:70px;" alt=""></li>
                      </div>
                      <div class="col-7 text-center align-items-center d-flex align-items-center justify-content-center">
                        <li><?= $data["name"]; ?></li>
                      </div>
                      <div class="col-2 d-flex align-items-center">
                        <li><?= $data["price"] ?></li>
                      </div>
                    </div>
                  </a>
                <?php endforeach; ?>
              </ul>
            </li>
          </ul>

          <form class="d-flex" method="get">
            <input class="form-control me-2" type="text" placeholder="Search" name="keyword" autofocus autocomplete="off" value="<?= $keyword; ?>" id="input">
            <button class="btn btn-outline-success me-3" type="submit" name="search">Search</button>

          </form>
          <li class="nav-item dropdown" style="list-style-type:none;">
            <img src="smartphone/avatar.png" alt="" height="40px" width="40px" style="border-radius:50%;">
            <ul class="dropdown-menu" style="position:absolute;top:30px;right:0;">
              <li><a class="dropdown-item" href="#">Edit Profile</a></li>
              <li><a class="dropdown-item" href="#">Preview Profile</a></li>
              <li><button class="btn btn-secondary mx-3" name="logout" type="button" onclick="btnLogOut()">logout</button></li>
            </ul>
          </li>
        </div>

      </div>
    </nav>
  </header>
  <!-- header navbar end -->
  <div class="fluidContainer">
    <!-- Slideshow container -->
    <div class="slideshow-container">

      <!-- Full-width images with number and caption text -->
      <div class="mySlides fade">
        <img src="smartphone/The-Best-Phones-to-buy-in-2024---our-top-10-list.jpg" style="width:100%;height:521px;">
        <div class="text text-start ">All Smartphone</div>
      </div>

      <div class="mySlides fade">
        <img src="smartphone/apple-2024-2.jpg" style="width:100%">
        <div class="text text-start ">Apple Iphones</div>
      </div>

      <div class="mySlides fade">
        <img src="smartphone/samsung-2024-1.jpg" style="width:100%">
        <div class="text text-start ">Samsung</div>
      </div>

      <div class="mySlides fade">
        <img src="smartphone/google-2023-1.jpg" style="width:100%">
        <div class="text text-start ">Google pixel</div>
      </div>

      <div class="mySlides fade">
        <img src="smartphone/xiaomi-2024-1.jpg" style="width:100%">
        <div class="text text-start ">Xiaomi</div>
      </div>

      <div class="mySlides fade">
        <img src="smartphone/realme-2023-1.jpg" style="width:100%">
        <div class="text text-start ">Realme</div>
      </div>

      <!-- Next and previous buttons -->
      <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
      <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br>

    <!-- The dots/circles -->
    <div style="margin: 1px 0 20px 0;text-align:center">
      <span class="dot" onclick="currentSlide(1)"></span>
      <span class="dot" onclick="currentSlide(2)"></span>
      <span class="dot" onclick="currentSlide(3)"></span>
      <span class="dot" onclick="currentSlide(4)"></span>
      <span class="dot" onclick="currentSlide(5)"></span>
      <span class="dot" onclick="currentSlide(6)"></span>
    </div>
    <!-- carosel end -->

    <!-- list container start -->
    <div class="row">
      <div class="container-main col-2">
        <h4>List All Smartphone</h4>
        <div>
          <ul class="container-content">
            <?php foreach ($phone as $p) : ?>
              <li style="font-size: 12px;"><?= $p["name"]; ?></li>
            <?php endforeach ?>
          </ul>
        </div>
        <div class="btnadel d-flex justify-content-evenly text-center align-items-center">
          <h4><a href="add.php" class="link-offset-2 link-underline link-underline-opacity-0 text-dark">add (+)</a></h4>
          <h4><a href="table.php" class="link-offset-2 link-underline link-underline-opacity-0 text-dark">dell (-)</a></h4>
        </div>
      </div>
      <!-- list container end -->

      <!-- main content -->
      <div class="foore col">
        <?php if (!empty($dt)) : ?>
          <div class="row">
            <?php foreach ($dt as $data) : ?>
              <div class="col-3 mt-4">
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
          <p style="color:red">data not found!</p>
        <?php endif ?>
      </div>
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="main.js"></script>
</body>

</html>