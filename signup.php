<?php 
    require 'backend.php';

    if(isset($_POST["signup"])){
        if(register($_POST) > 0){
            echo "<script>
                alert('register berhasil!');
            </script>";
        }else{
            echo "<script>
                alert('silahkan masukan data dengan benar!')
            </script>";
        }
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

        label {
            margin: 10px;
            display: block;
        }

        input {
            display: block;
            margin: 10px;
            width: 100%;
            height: 30px;
            background-color: rgba(255, 255, 255, 0.7);
            border-radius: 5px;
            padding: 10px;
        }

        button {
            margin: 30px 10px;
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
            background: linear-gradient(#1845ad, #23a2f6);
            left: -80px;
            top: -80px;
        }

        .shape:last-child {
            background: linear-gradient(to right,
                    #ff512f, #f09819);
            right: -30px;
            bottom: -80px;
        }

        a {
            text-decoration: none;
            color: #fff;
        }

        a:hover {
            text-decoration: none;
            color: #23a2f6;
        }

        .input{
            position:relative;
        }

        .ico{
            position:absolute;
            top:4px;
            right:0;
            color:#080710;
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
            <h1>Sign Up</h1>
            <label for="username">username</label>
            <input type="text" name="username" id="username">
            <label for="password">password</label>
            <div class="input">
                <input type="password" name="password" id="password" class="pass" minlength="6">
                <label for="password2">confirm password</label>
                <span class="ico"><i class="bi bi-eye"></i></span>
            </div>
            <div class="input">
                <input type="password" name="password2" id="password2" class="pass" minlength="6">
                <button type="submit" name="signup">sign up</button>
                <span class="ico"><i class="bi bi-eye"></i></span>
            </div>
            <p>you have an account? <a href="login.php">login here</a> </p>
        </form>
    </div>
    <script>
        const pass = document.querySelectorAll('.pass');
        const eye = document.querySelectorAll('.ico');

        eye.forEach((e,index) => e.addEventListener('click',function(){
            if(pass[index].type === 'password'){
                pass[index].type = 'text';
                e.innerHTML = `<i class="bi bi-eye-slash"></i>`
            }else{
                pass[index].type = 'password';
                e.innerHTML = `<i class="bi bi-eye"></i>`
            }
        }))


    </script>
</body>

</html>