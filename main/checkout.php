<?php
session_start();
include_once "functions.php";
include_once "head.php";
if(checkLogin()){
    $id = $_SESSION["id"];
    $sql = "SELECT * FROM user WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $name = $row["name"];
            $email = $row["email"];
            $address = $row["address"];
            $phone = $row["phone"];
        }
    }
}
?>
    <!-- Register Section Begin -->
    <div class="register-Login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="Login-form">
                        <h2>Checkout</h2>
                        <form action="<?php secureSelf(); ?>" method="post">
                            <div class="group-input">
                                <label for="username">Name *</label>
                                <input type="text" id="name" name="name" value="<?php echo $name; ?>">
                            </div>
                            <div class="group-input">
                                <label for="username">Email address *</label>
                                <input type="text" id="email" name="email" value="<?php echo $email; ?>">
                            </div>
                            <div class="group-input">
                                <label for="username">Phone *</label>
                                <input type="text" id="phone" name="phone" value="<?php echo $phone; ?>">
                            </div>
                            <div class="group-input">
                                <label for="address">Address *</label>
                                <input type="text" id="address" name="address" value="<?php echo $address; ?>">
                            </div>
                            <button type="submit" class="site-btn register-btn" name="placeorder">PLACE ORDER</button>
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
        if(isset($_POST["placeorder"])){
            $oid = md5(date("d-m-y:H:i:s"));
            $uid = $_SESSION["id"];
            $email = $_SESSION["email"];
            $name = secureVar($_POST["name"]);
            $phone = secureVar($_POST["phone"]);
            $address = secureVar($_POST["address"]);

            $ok =0;

            $sql = "SELECT * FROM cart WHERE uid = '$email'";
            $res = mysqli_query($conn, $sql);

            if(mysqli_num_rows($res) > 0){
                while($row = mysqli_fetch_assoc($res)){
                    $id = $row["id"];
                    $pid = $row["pid"];
                    $sql2 = "INSERT INTO orders(uid, oid, pid) VALUES($uid, '$oid', $pid)";
                    if(mysqli_query($conn, $sql2)){
                        $sqldel = "DELETE FROM cart WHERE id = '$id'";
                        mysqli_query($conn, $sqldel);
                        $ok = 1;
                    }
                }
            }

            $sqlins = "UPDATE user SET name = '$name', phone = '$phone', address = '$address' WHERE email = '$email'";

            mysqli_query($conn, $sqlins);

            if($ok == 1){
                alert("Order placed successfully");
                redirectTo("confirmorder.php");
            }else{
                alert("Error occured");
                echo mysqli_error($conn);
            }

        }
    }
?>