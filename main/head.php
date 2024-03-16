<?php
include_once "functions.php";
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ecomm">
    <meta name="keywords" content="ecomm, rpcreations">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title; ?></title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Header Section Begin -->
<header class="header-section">
    <div class="header-top">
        <div class="container">
            <div class="ht-left">
                <div class="mail-service">
                    <i class=" fa fa-envelope"></i>
                    farmersportal.gov@gmail.com
                </div>
                <div class="phone-service">
                    <i class=" fa fa-phone"></i>
                    +91 9987259006
                </div>
            </div>
            <div class="ht-right">
                <?php
                    if(!checkLogin()){
                ?>
                        <a href="Login.php" class="Login-panel"><i class="fa fa-user"></i>Login</a>
                        <a href="register.php" class="Login-panel"><i class="fa fa-user"></i>Sign Up &nbsp;&nbsp;</a>
                <?php
                    }else{
                ?>
                        <a href="myaccount.php" class="Login-panel"><i class="fa fa-user"></i>My Account</a>
                        <a href="logout.php" class="Login-panel"><i class="fa fa-user"></i>Logout &nbsp;&nbsp;</a>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="inner-header">
            <div class="row">
                <div class="col-lg-2 col-md-2">
                    <div class="logo">
                        <a href="./index.php">
                            <img src="img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-7 col-lg-7">
                    <div class="advanced-search">
                        <form action="search.php" class="input-group" method="get">
                            <input type="text" placeholder="What do you need?" name="sid">
                            <button type="submit"><i class="ti-search"></i></button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 text-right col-lg-3">
                    <ul class="nav-right">

                        <li>
                            <a href="cart.php"><button class="btn btn-warning">View Cart</button></a>
                        </li>
                        <li>
                        </li>
                        <li class="cart-price"></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="nav-item">
        <div class="container">
            <nav class="nav-menu mobile-menu">
                <ul>
                    <li><a href="./shop.php">Shop</a></li>
                    <li><a href="./Login.php">Login</a></li>
                    <li><a href="./register.php">Sign Up</a></li>
                    
                </ul>
            </nav>
            <div id="mobile-menu-wrap"></div>
        </div>
    </div>
</header>
<!-- Header End -->