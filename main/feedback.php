<?php include_once "head.php"; ?>

    <!-- Register Section Begin -->
    <div class="register-Login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="register-form">
                        <h2>Feedback</h2>
                        <form action="<?php secureSelf(); ?>" method="post">
                            <div class="group-input">
                                <label for="username">Name *</label>
                                <input type="text" id="name" name="name" required>
                            </div>
                            <div class="group-input">
                                <label for="username">Email address *</label>
                                <input type="email" id="email" name="email" required>
                            </div>
                            <div class="group-input">
                                <label for="feedback">Feedback *</label>
                                <textarea id="feedback" name="feedback" class="form-control" required></textarea>
                            </div>
                            <button type="submit" class="site-btn register-btn" name="register">Submit</button>
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
        if(isset($_POST["register"])){
            $name = secureVar($_POST["name"]);
            $email = secureVar($_POST["email"]);
            $feedback = secureVar($_POST["feedback"]);

            $sql = "INSERT INTO feedback(name, email, feedback) VALUES('$name', '$email', '$feedback')";
            if(mysqli_query($conn, $sql)){
                alert("Done");
                redirectTo("Login.php");
            }else{
                alert("error");
                #echo mysqli_error($conn);
            }
        }
    }
?>
