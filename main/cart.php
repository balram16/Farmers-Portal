<?php
    session_start();
    include_once "functions.php";
    if(isset($_SESSION["email"])) {
        include_once "head.php";
?>
        <!-- Shopping Cart Section Begin -->
        <section class="shopping-cart spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cart-table">
                            <table>
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th class="p-name">Product Name</th>
                                    <th>Price</th>
                                    <th><i class="ti-close"></i></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                    $email = $_SESSION["email"];
                                    $sql = "SELECT * FROM cart WHERE uid = '$email'";
                                    $result = mysqli_query($conn, $sql);
                                    $total = 0;
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $cid = $row["id"];
                                            $pid = $row["pid"];

                                            $sql2 = "SELECT * FROM products WHERE id = $pid";
                                            $result2 = mysqli_query($conn, $sql2);


                                            if (mysqli_num_rows($result2) > 0) {
                                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                                    $total = $total + $row2["price"];
                                ?>

                                                    <tr>
                                                        <td class="cart-pic first-row"><img src="productimg/<?php echo $row2['img']; ?>" alt=""></td>
                                                        <td class="cart-title first-row">
                                                            <h5><?php echo $row2['title']; ?></h5>
                                                        </td>
                                                        <td class="p-price first-row"><?php echo $row2['price']; ?></td>
                                                        <td class="close-td first-row"><a href="cartfn.php?remove=1&id=<?php echo $row['id']; ?>"><i class="ti-close"></i></a></td>
                                                    </tr>
                                <?php
                                                }
                                            }
                                        }
                                    }else{
                                        alert("Cart is empty");
                                        redirectTo("index.php");
                                    }

                                ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">

                            </div>
                            <div class="col-lg-4 offset-lg-4">
                                <div class="proceed-checkout">
                                    <ul>
                                        <li class="cart-total">Total <span><?php echo $total; ?></span></li>
                                    </ul>
                                    <a href="checkout.php" class="proceed-btn">PROCEED TO CHECK OUT</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Shopping Cart Section End -->
<?php
        include_once "foot.php";
    }else{
        alert("You need to Login");
        redirectTo("Login.php");
    }
?>