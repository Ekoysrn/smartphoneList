<?php
    session_start();
    require 'backend.php';
    
    if(!isset($_SESSION["login"])){
        header("location: login.php");
        exit;
    }

    // menangkap id  dari link yang di click
    $id= $_GET["id"];

    // jika function delete lebih besar dari 0 do this
    if(dell($id) > 0 ){
        echo "<script>
                alert('do you want to sell/delete?');
                window.location.href = 'index.php'
            </script>
        ";
    }else{
        echo "<script>
            alert('error');
            window.location.href = 'index.php'
            </script>";
    }
?>