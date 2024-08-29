<?php
session_start();
require 'backend.php';

if(!isset($_SESSION["login"])){
    header("location: login.php");
    exit;

}



// jika isset include from post submit name
if (isset($_POST["submit"])) {
    // if function from add data more than 0 = 1
    if (addData($_POST) > 0) {
        echo "<script>
                alert('successfull updated the data');
                window.location.href = 'index.php';
            </script>";
        // else 
    } else {
        echo "<script>
                alert('please input the valid data');
                window.location.href ='add.php';
            </script>";
    }
}

?>











<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="shortcut icon" href="smartphone/exophonelogo.webp" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styless.css">
</head>

<body>
    <h1 class="text-center m-3">Add List Smartphone</h1>
    <div class="contform">
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label d-block">image smartphone</label>
                <label for="image"><img src="smartphone/phone.jpg" alt="" style="width:160px;height:212px;display:inline-block;" class="imagepreview"></label>
                <input class="form-control imagevalue" name="image" type="file" id="image" onchange="previewImage()">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name">
            </div>
            <div class="mb-3">
                <label for="launch" class="form-label">launch date</label>
                <input type="text" name="launch" class="form-control" id="launch">
            </div>
            <div class="mb-3">
                <label for="display" class="form-label">display</label>
                <input type="text" name="display" class="form-control" id="display">
            </div>
            <div class="mb-3">
                <label for="chipset" class="form-label">chipset</label>
                <input type="text" name="chipset" class="form-control" id="chipset">
            </div>
            <div class="mb-3">
                <label for="os" class="form-label">os</label>
                <input type="text" name="os" class="form-control" id="os">
            </div>
            <div class="mb-3">
                <label for="ram" class="form-label">Ram</label>
                <input type="text" name="ram" class="form-control" id="ram">
            </div>
            <div class="mb-3">
                <label for="camera" class="form-label">camera</label>
                <input type="text" name="camera" class="form-control" id="camera">
            </div>
            <div class="mb-3">
                <label for="battery" class="form-label">battery</label>
                <input type="text" name="battery" class="form-control" id="battery">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">price</label>
                <input type="text" name="price" class="form-control" id="price">
            </div>
            <button type="submit" class="btn btn-secondary w-100" name="submit">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="add.js"></script>
</body>

</html>