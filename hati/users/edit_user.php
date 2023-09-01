<?php
    require("../db.php");
    session_start();

    $id = $_GET["id"];
    $select = "SELECT * FROM users WHERE id=$id";
    $select_result = mysqli_query($db_connection, $select);
    $after_assoc = mysqli_fetch_assoc($select_result);


?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="alert alert-info text-center">
                        <h2>Edit User Information</h2>
                    </div>
                    <form action="/hati/users/edit_post.php" method="POST" class="p-3" style="background:#ddd;"
                        enctype="multipart/form-data">
                        <input name="id" type="hidden" value="<?php echo $after_assoc["id"]; ?>">
                        <div class="form-group mb-2">
                            <label class="form-lebel mb-1">Name</label>
                            <input name="name" type="text" class="form-control"
                                value="<?php echo $after_assoc["name"]; ?>">
                        </div>
                        <div class="form-group mb-2">
                            <label class="form-lebel mb-1">Email</label>
                            <input name="email" type="email" class="form-control"
                                value="<?php echo $after_assoc["email"]; ?>">
                        </div>
                        <div class="form-group mb-2">
                            <label class="form-lebel mb-1">password</label>
                            <input name="password" type="password" class="form-control"
                                value="<?php echo $after_assoc["password"]; ?>">
                        </div>
                        <div class="form-group mb-2">
                            <label class="form-lebel mb-1">Phone</label>
                            <input name="phone" type="text" class="form-control"
                                value="<?php echo $after_assoc["phone"]; ?>">
                        </div>
                        <div class="form-group mb-2">
                            <label class="form-lebel mb-1">Birthday</label>
                            <input name="birthday" type="date" class="form-control"
                                value="<?php echo $after_assoc["birthday"]; ?>">
                        </div>
                        <div class="form-group mb-2">
                            <label class="form-lebel mb-1">Country</label>
                            <select class="form-select" name="country" id="">
                                <option value="">----</option>
                                <option
                                    <?php if($after_assoc["country"] == "Bangladesh"){echo "selected";}else{echo "";} ?>
                                    value="Bangladesh">Bangladesh</option>
                                <option <?= ($after_assoc["country"] == "India")? "selected" : "" ?> value="India">India
                                </option>
                                <option <?php if($after_assoc["country"] == "USA"){echo "selected";}else{echo "";} ?>
                                    value="USA">USA</option>
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label class="form-lebel mb-1">Gender</label><br>
                            <input <?php if($after_assoc["gender"] == "Male"){echo "checked";}else{echo "";} ?>
                                type="radio" class="form-check-input me-2" name="gender" value="Male">Male
                            <input <?= ($after_assoc["gender"] == "Female")? "checked" : "" ?> type="radio"
                                class="form-check-input me-2" name="gender" value="Female">Female
                            <input <?php if($after_assoc["gender"] == "Others"){echo "checked";}else{echo "";} ?>
                                type="radio" class="form-check-input me-2" name="gender" value="Others">Others
                        </div>
                        <div class="form-group mb-2">
                            <p>Current Photo</p>
                            <img width="100" src="../uploads/users/<?php echo $after_assoc["user_photo"]; ?>" alt="">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Upload Your Photo for Update</label>
                            <input class="form-control" name="user_photo" type="file" id="formFile">
                            <?php if(isset( $_SESSION["image_size"])){ ?>
                            <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                                <?php echo  $_SESSION["image_size"]; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            <?php } unset($_SESSION["image_size"]); ?>

                            <?php if(isset( $_SESSION["image_extention"])){ ?>
                            <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                                <?php echo  $_SESSION["image_extention"]; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            <?php } unset($_SESSION["image_extention"]); ?>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success mt-2 mb-2">Update</button>

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