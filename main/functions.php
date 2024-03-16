<?php
    include_once "credentials.php";

    function secureVar($var){
        global $conn;
        return mysqli_real_escape_string($conn, $var);
    }

    function secureSelf(){
        echo htmlentities($_SERVER['PHP_SELF']);
    }

    function redirectTo($url){
        echo "<script>document.location='$url';</script>";
    }

    function isPost(){
        return $_SERVER['REQUEST_METHOD'] == "POST";
    }

    function alert($msg){
        echo "<script>alert('$msg');</script>";
    }

    function breakln(){
        echo "<br>";
    }

    function doLogin($email, $pass){
        global $conn;
        $sql = "SELECT * FROM user WHERE email = '$email' AND pass = '$pass'";
        $res = mysqli_query($conn, $sql);

        if(mysqli_num_rows($res) > 0){
            while($row = mysqli_fetch_assoc($res)){
                $_SESSION["id"] = $row["id"];
            }
            return true;
        }else{
            return false;
        }
    }

    function checkLogin(){
        if(isset($_SESSION["email"])){
            return true;
        }else{
            return false;
        }
    }

    function changePass($opass, $pass){
        global $conn;
        $sql = "SELECT * FROM user WHERE pass = '$opass'";
        $res = mysqli_query($conn, $sql);

        if(mysqli_num_rows($res) > 0){
            $sqlup = "UPDATE user SET pass = '$pass' WHERE pass = '$opass'";
            if(mysqli_query($conn, $sqlup)){
                alert("Done");
            }else{
                alert("Error");
            }
        }else{
            alert("Something went wrong");
        }
    }

    function getCurrentAddress(){
        global $conn;
        $email = $_SESSION["email"];
        $sql = "SELECT * FROM user WHERE email = '$email'";

        $res = mysqli_query($conn, $sql);

        if(mysqli_num_rows($res) > 0){
            while ($row = mysqli_fetch_assoc($res)){
                $address = $row["address"];
            }
        }

        echo $address;
    }

    function checkAdminLogin(){
        if(isset($_SESSION["adminemail"])){
            return true;
        }else{
            return false;
        }
    }
?>