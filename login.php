<?php
session_start();
require 'backend.php';

if(isset($_COOKIE["id"]) && isset($_COOKIE["key"])){

    $id = $_COOKIE["id"];
    $key = $_COOKIE["key"];

    $result = mysqli_query($conn, "SELECT username FROM user WHERE id = '$id'");

    $r = mysqli_fetch_assoc($result);

    if($key == hash('sha256',$r["username"])){
        $_SESSION["login"] = true;
    }
}

if(isset($_SESSION["login"])) {
    header("location: index.php");
    exit;
}

if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    if (mysqli_num_rows($result) == 1) { //megembalikan baris baru

        $r = mysqli_fetch_assoc($result);

        if (password_verify($password, $r["password"])) {

            if(isset($_POST["check"])){
                setcookie("id",$r["id"],time()+60);
                setcookie("key",hash('sha256',$r["username"]),time()+60);
            }

            $_SESSION["login"] = true;

            echo "<script>
                    window.location.href = 'index.php';
                </script>";
        }
    }
    $error = true;
}




?>


















<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign up</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" href="smartphone/exophonelogo.webp" type="image/x-icon">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #080710;
            color: #fff;
        }

        .container {
            width: 430px;
            height: 520px;
            background-color: rgba(255, 255, 255, 0.13);
            display: flex;
            justify-content: center;
            align-items: center;
            backdrop-filter: blur(10px);
            border-radius: 10px;

        }

        h1 {
            margin: 10px;
            text-align: center;
            margin-bottom: 20px;
        }

        .input label {
            margin: 10px;
            display: block;
        }

        .input input {
            display: block;
            margin: 10px;
            width: 100%;
            height: 30px;
            background-color: rgba(255, 255, 255, 0.7);
            border-radius: 5px;
            padding: 10px;
        }

        .check input{
            margin:10px;
            vertical-align:middle;
        }

        button {
            margin: 20px 10px 10px;
            width: 100%;
            background-color: #fff;
            color: #080710;
            height: 30px;
            border: none;
            border-radius: 5px;
        }

        .background {
            width: 430px;
            height: 520px;
            position: absolute;
            transform: translate(-50%, -50%);
            left: 50%;
            top: 50%;
        }

        .background .shape {
            width: 200px;
            height: 200px;
            position: absolute;
            border-radius: 50%;
        }

        .shape:first-child {
            background: linear-gradient(to right, #ff512f, #f09819);
            left: -80px;
            top: -80px;
        }

        .shape:last-child {
            background: linear-gradient(#1845ad, #23a2f6);
            right: -30px;
            bottom: -80px;
        }

        a {
            text-decoration: none;
            color: #fff;
        }

        a:hover {
            color: #f09819;
        }

        .eye {
            position: relative;
        }

        .ico {
            position: absolute;
            top: 4px;
            right: 0;
            color: #080710;
        }

        p{
            text-align:center;
        }

    </style>
</head>

<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <div class="container">
        <form action="" method="post">
            <h1>Login Here</h1>
            <div class="input">
                <label for="username">username</label>
                <input type="text" name="username" id="username">
                <label for="password">password</label>
                <div class="eye">
                    <input type="password" name="password" id="password"><span class="ico"><i class="bi bi-eye"></i></span>
                </div>
            </div>
            <div class="check">
                <input type="checkbox" name="check" class="check">
                <label for="check" class="check">remember me if I login again</label>
            </div>
            <button type="submit" name="login">login</button>
            <?php if (isset($error)) : ?>
                <p style="color:red;text-align:center;font-weight:500;">Sorry, your</p>
                <p style="color:red;text-align:center;font-weight:500;">password was incorrect.</p>
            <?php endif ?>

            <p>Don't have an account <a href="signup.php">sign up</a> </p>
        </form>
    </div>
    <script>
        const pass = document.querySelector('#password');
        const eye = document.querySelector('.ico');

        pass.type = 'password';
        eye.innerHTML = `<i class="bi bi-eye"></i>`;

        eye.addEventListener('click', function() {
            if (pass.type === 'password') {
                pass.type = 'text';
                eye.innerHTML = `<i class="bi bi-eye-slash"></i>`
            } else {
                pass.type = 'password';
                eye.innerHTML = `<i class="bi bi-eye"></i>`
            }
        })
    </script>
</body>

</html>