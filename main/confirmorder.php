<?php
session_start();
include_once "functions.php";
include_once "head.php";
?>
    <!-- Register Section Begin -->
    <div class="register-Login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="Login-form">
                        <h2>Done</h2>
                        <h3>Your order is placed successfully. We will start processing now.</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form Section End -->
<?php include_once "foot.php"; ?>

<?php
    if(isPost()){
        if(isset($_POST["signin"])){
            $email = secureVar($_POST["email"]);
            $pass = secureVar($_POST["pass"]);

            if(doLogin($email, $pass)){
                $_SESSION["email"] = $email;
                redirectTo("myaccount.php");
            }else{
                echo mysqli_error($conn);
            }
        }
    }
?>