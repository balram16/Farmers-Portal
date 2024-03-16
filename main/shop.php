<?php
session_start();
include_once "head.php";
?>

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="../index.html"><i class="fa fa-home"></i> Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 order-1 order-lg-2">
                    <div class="product-list">
                        <div class="row">

                            <?php

                            $sql = "SELECT * FROM products ORDER BY id ASC ";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_assoc($result)){
                            ?>
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="product-item">
                                            <div class="pi-pic">
                                                <img src="productimg/<?php echo $row['img']; ?>" alt="">
                                                <ul>
                                                    <li class="quick-view"><a href="cartfn.php?add=1&id=<?php echo $row['id']; ?>">+ Add to cart</a></li>
                                                </ul>
                                            </div>
                                            <div class="pi-text">
                                                <a href="#">
                                                    <h5><?php echo $row['title']; ?></h5>
                                                </a>
                                                <div class="product-price">
                                                    &#8377;<?php echo $row['price']; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            }

                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->
<?php include_once "foot.php"; ?>