<?php include_once "head.php"; ?>

    <!-- Register Section Begin -->
    <div class="register-Login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="register-form">
                        <h2>Register</h2>
                        <form action="<?php secureSelf(); ?>" method="post">
                            <div class="group-input">
                                <label for="username">Name *</label>
                                <input type="text" id="name" name="name">
                            </div>
                            <div class="group-input">
                                <label for="username">Phone *</label>
                                <input type="number" id="phone" name="phone">
                            </div>
                            <div class="group-input">
                                <label for="username">Email address *</label>
                                <input type="text" id="email" name="email">
                            </div>
                            <div class="group-input">
                                <label for="pass">Password *</label>
                                <input type="password" id="pass" name="pass">
                            </div>
                            <div class="group-input">
                                <label for="con-pass">Confirm Password *</label>
                                <input type="password" id="con-pass" name="cpass">
                            </div>
                            <div class="group-input">
                                <label for="address">Default Address *</label>
                                <input type="text" id="address" name="address">
                            </div>
                            <button type="submit" class="site-btn register-btn" name="register">REGISTER</button>
                        </form>
                        <div class="switch-Login">
                            <a href="./Login.php" class="or-Login">Or Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form Section End -->
    <?php include_once "foot.php"; ?>

<?php
    if(isPost()){
        if(isset($_POST["register"])){
            $name = secureVar($_POST["name"]);
            $phone = secureVar($_POST["phone"]);
            $email = secureVar($_POST["email"]);
            $pass = secureVar($_POST["pass"]);
            $cpass = secureVar($_POST["cpass"]);
            $address = secureVar($_POST["address"]);

            if($pass == $cpass){
                $sql = "INSERT INTO user(email, pass, address, name, phone) VALUES('$email', '$pass', '$address', '$name', '$phone')";
                if(mysqli_query($conn, $sql)){
                    alert("Done");
                    redirectTo("Login.php");
                }else{
                    alert("error");
                }
            }else{
                alert("Password do not match");
            }
        }
    }
?>
