<?php 
    session_start();
    require 'backend.php';

    if(!isset($_SESSION["login"])){
        header("location: login.php");
        exit;
    }

    $id = $_GET["id"];

    
    $data = query("SELECT * FROM allsmartphone WHERE id = $id")[0];

?>











<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info smartphone</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12">
            <h1 class="text-center fw-bold"><?= $data["name"]; ?></h1>
            </div>
            <div class="col-2">
                <img src="smartphone/<?= $data["image"]; ?>" alt="" style="width: 160px;height:212px;">
            </div>
            <div class="col-3 mt-5">
                <p><strong>Name : </strong><?= $data["name"]; ?></p>
                <p><strong>Launch date : </strong><?= $data["launch"]; ?></p>
                <p><strong>Display : </strong><?= $data["display"]; ?></p>
                <p><strong>Chipset : </strong><?= $data["chipset"]; ?></p>
                <p><strong>OS : </strong><?= $data["os"]; ?></p>
                <p><strong>Memory Ram : </strong><?= $data["ram"]; ?></p>
                <p><strong>Camera : </strong><?= $data["camera"]; ?></p>
                <p><strong>Battery : </strong><?= $data["battery"]; ?></p>
                <p><strong>Price : </strong><?= $data["price"]; ?></p>
            </div>
            
            <div class="col-10 text-center">
                <button class="btn btn-success">buy</button>
                <button class="btn btn-danger"><a href="delete.php?id=<?= $data["id"]; ?>" onclick="return confirm('you want to sell?')">sell</a></button>
                <button class="btn btn-warning">like</button>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>