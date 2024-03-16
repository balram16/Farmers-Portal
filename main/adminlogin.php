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
                        <h2>Admin Login</h2>
                        <form action="<?php secureSelf(); ?>" method="post">
                            <div class="group-input">
                                <label for="username">Email address *</label>
                                <input type="text" id="username" name="email">
                            </div>
                            <div class="group-input">
                                <label for="pass">Password *</label>
                                <input type="password" id="pass" name="pass">
                            </div>
                            <button type="submit" class="site-btn Login-btn" name="signin">Sign In</button>
                        </form>
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

            if($email == "farmer" AND $pass == "farmer"){
                $_SESSION["adminemail"] = $email;
                redirectTo("adminpanel.php");
            }

        }
    }
?>