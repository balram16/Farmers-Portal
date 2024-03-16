<?php
session_start();
include_once "functions.php";
if(checkLogin()){
include_once "head.php";
?>

    <!-- Register Section Begin -->
    <div class="register-Login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="register-form">
                        <h2>Change Password</h2>
                        <form action="<?php secureSelf(); ?>" method="post">
                            <div class="group-input">
                                <label for="pass">Old Password *</label>
                                <input type="password" id="pass" name="opass">
                            </div>
                            <div class="group-input">
                                <label for="pass">Password *</label>
                                <input type="password" id="pass" name="pass">
                            </div>
                            <div class="group-input">
                                <label for="con-pass">Confirm Password *</label>
                                <input type="password" id="con-pass" name="cpass">
                            </div>
                            <button type="submit" class="site-btn register-btn" name="changepass">Change Password</button>
                        </form>
                        <br>
                        <hr>
                        <br>
                        <h2>Change Address</h2>
                        <form action="<?php secureSelf(); ?>" method="post">
                            <div class="group-input">
                                <label for="address">Default Address *</label>
                                <input type="text" id="address" name="address" value="<?php getCurrentAddress(); ?>">
                            </div>
                            <button type="submit" class="site-btn register-btn" name="changeaddress">Change Address</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form Section End -->
<?php
    include_once "foot.php";
}
?>

<?php
    if(isPost()){
        if(isset($_POST["changepass"])){
            $opass = secureVar($_POST["opass"]);
            $pass = secureVar($_POST["pass"]);
            $cpass = secureVar($_POST["cpass"]);

            if($pass == $cpass){
                changePass($opass, $pass);
            }else{
                alert("Password do not match");
            }
        }
    }
?>
