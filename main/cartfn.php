<?php
    session_start();
    include_once "functions.php";

    if(isset($_SESSION["email"])){
        if(isset($_GET["add"]) and isset($_GET["id"])){
            $id = secureVar($_GET["id"]);
            $email = $_SESSION["email"];
            $sql = "INSERT INTO cart(pid, uid) VALUES($id, '$email')";
            if(mysqli_query($conn, $sql)){
                alert("Added to cart");
            }else{
                alert("Error occured");
            }
            redirectTo("index.php");
        }

        if(isset($_GET["remove"]) and isset($_GET["id"])){
            $id = secureVar($_GET["id"]);
            $email = $_SESSION["email"];
            $sql = "DELETE FROM cart WHERE id = $id AND uid = '$email'";
            if(mysqli_query($conn, $sql)){
                alert("Removed from cart");
            }else{
                alert("Error occured");
            }
            redirectTo("cart.php");
        }
    }else{
        redirectTo("Login.php");
    }

?>