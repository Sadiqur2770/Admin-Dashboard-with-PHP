<?php 
session_start();

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>

    <section>
        <div class="container">
            <div class="row">

                <div class="col-lg-6 m-auto">
                    <h1 class=" head text-center text-bg-success pt-3 pb-3">Registration Form</h1>
                    <form action="/hati/users/registration_post.php" method="post" class="" style="background:#ddd"
                        enctype="multipart/form-data">
                        <div class="row p-4">
                            <div class="mb-3 col-lg-6">
                                <label for="exampleInputEmail1" class="form-label">Your Name</label>
                                <input type="text" class="form-control" name="fname">
                                <?php if(isset($_SESSION["name_err"])){ ?>
                                <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                                    <?php echo $_SESSION["name_err"]; ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                                <?php }  ?>
                            </div>

                            <div class="mb-3 col-lg-6">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="text" class="form-control" name="email">
                                <?php if(isset( $_SESSION["email_err"])){ ?>
                                <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                                    <?php echo  $_SESSION["email_err"]; ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                                <?php } ?>

                                <?php if(isset($_SESSION["email_exist"] )){ ?>
                                <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                                    <?php echo $_SESSION["email_exist"] ; ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                                <?php } ?>
                            </div>

                            <div class="mb-3 col-lg-6 position-relative">
                                <label for="exampleInputEmail1" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="pass">
                                <a onclick="showpass()"
                                    class="btn btn-success position-absolute bottom-0 end-0">Show</a>
                                <?php if(isset($_SESSION["password_err"])){ ?>
                                <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                                    <?php echo $_SESSION["password_err"]; ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                                <?php } ?>
                            </div>

                            <div class="mb-3 col-lg-6">
                                <label for="exampleInputEmail1" class="form-label">Retype Password</label>
                                <input type="password" class="form-control" name="repassword">
                                <?php if(isset($_SESSION["repassword_err"])){ ?>
                                <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                                    <?php echo $_SESSION["repassword_err"]; ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                                <?php } ?>
                            </div>

                            <div class="mb-3 col-lg-6">
                                <label for="exampleInputEmail1" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" name="phone">
                                <?php if(isset($_SESSION["phone_err"])){ ?>
                                <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                                    <?php echo $_SESSION["phone_err"]; ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                                <?php } ?>
                            </div>

                            <div class="mb-3 col-lg-6">
                                <label for="exampleInputEmail1" class="form-label">Date of Birth</label>
                                <input type="date" class="form-control" name="birth">
                                <?php if(isset($_SESSION["phone_err"])){ ?>
                                <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                                    <?php echo $_SESSION["phone_err"]; ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="exampleInputEmail1" class="form-label me-2">Country</label>
                                <select class="form-select" name="country">
                                    <option value="">----</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="India">India</option>
                                    <option value="USA">USA</option>
                                </select>
                                <?php if(isset($_SESSION["country_err"])){ ?>
                                <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                                    <?php echo $_SESSION["country_err"]; ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="exampleInputEmail1" class="form-label me-2">Gender</label> <br>
                                <input class="form-check-input" type="radio" name="gender" value="Male"> Male
                                <input class="form-check-input" type="radio" name="gender" value="Female"> Female
                                <input class="form-check-input" type="radio" name="gender" value="Others"> Others
                                <?php if(isset($_SESSION["gender_err"])){ ?>
                                <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                                    <?php echo $_SESSION["gender_err"]; ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                                <?php }  ?>
                            </div>
                            <div class=" mb-3 col-lg-12">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Upload Your Image</label>
                                    <input class="form-control" name="user_photo" type="file" id="formFile">
                                </div>
                                <?php if(isset($_SESSION["file_size"])){ ?>
                                <div class="alert alert-warning alert-dismissible fade show " role="alert">
                                    <?php echo $_SESSION["file_size"]; ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                                <?php }?>
                                <?php if(isset($_SESSION["file_format"])){ ?>
                                <div class="alert alert-warning alert-dismissible fade show " role="alert">
                                    <?php echo $_SESSION["file_format"]; ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                                <?php }?>
                            </div>



                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4 mb-3">Register</button>
                                <?php if(isset($_SESSION["success_err"] )){ ?>
                                <div class="alert alert-success alert-dismissible fade show " role="alert">
                                    <?php echo $_SESSION["success_err"] ; ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                                <?php } session_unset(); ?>
                            </div>
                    </form>
                </div>
            </div>

        </div>
    </section>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script>
    function showpass() {
        var pass = document.getElementById("pass");
        if (pass.type == "password") {
            pass.type = "text";
        } else {
            pass.type = "password";
        }
    }
    </script>
</body>

</html>