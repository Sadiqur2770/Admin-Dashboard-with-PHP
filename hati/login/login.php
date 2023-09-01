<?php
    session_start();

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>

    <section>
        <div class="container">
            <div class="row">

                <div class="col-lg-5 pt-5 m-auto">
                    <h1 class=" head text-center text-bg-success pt-3 pb-3">Login Form</h1>
                    <form action="login_post.php" method="POST" class="p-3" style="background:#ddd">



                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="text" class="form-control" name="email">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password">

                        </div>

                        <?php if(isset($_SESSION["login_err"] )){ ?>
                                <div class="alert alert-warning alert-dismissible fade show " role="alert">
                                    <?php echo $_SESSION["login_err"]; ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                                <?php } session_unset(); ?>

                        <div class="">
                            <a href="forget_password.php" type="submit" style="color:#198754" class=" mt-2 mb-3">Forgot Password? Click Here!</a>

                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success mt-2 mb-3">Login</button>

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