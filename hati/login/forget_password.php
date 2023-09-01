<?php
    session_start();

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reset Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>

    <section>
        <div class="container">
            <div class="row">

                <div class="col-lg-5 pt-5 m-auto">
                    <h1 class=" head text-center text-bg-success pt-3 pb-3">Reset Password</h1>
                    <form action="forget_password_post.php" method="POST" class="p-3" style="background:#ddd">



                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="text" class="form-control" name="email">
                            <?php if(isset($_SESSION["email_err"] )){ ?>
                                <div class="alert alert-warning alert-dismissible fade show mt-2 " role="alert">
                                    <?php echo $_SESSION["email_err"]; ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                                <?php }?>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">New Password</label>
                            <input type="password" class="form-control" name="password">
                            <?php if(isset($_SESSION["password_err"] )){ ?>
                                <div class="alert alert-warning alert-dismissible fade show mt-2 " role="alert">
                                    <?php echo $_SESSION["password_err"]; ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                                <?php }?>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="conf_password">

                            <?php if(isset($_SESSION["conf_password_err"] )){ ?>
                                <div class="alert alert-warning alert-dismissible fade show mt-2 " role="alert">
                                    <?php echo $_SESSION["conf_password_err"]; ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                                <?php } session_unset(); ?>
                        </div>

                       

                        <div class="text-center">
                            <button type="submit" class="btn btn-success mt-2 mb-3">Submit</button>

                        </div>

                        
                    </form>
                </div>
            </div>

        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>

</body>

</html>