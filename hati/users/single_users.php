<?php
    require ('../db.php');
    require ('../session_check.php');

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
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
    

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="alert alert-info text-center">
                        <h2>Individual User Informations</h2>
                    </div>
                    	
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>ID:</td>
                                <td><?php echo $after_assoc["id"]; ?></td>
                            </tr>
                            <tr>
                                <td>Name:</td>
                                <td><?php echo $after_assoc["name"]; ?></td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td><?php echo $after_assoc["email"]; ?></td>
                            </tr>
                            <tr>
                                <td>Phone:</td>
                                <td><?php echo $after_assoc["phone"]; ?></td>
                            </tr>
                            <tr>
                                <td>Birthday:</td>
                                <td><?php echo $after_assoc["birthday"]; ?></td>
                            </tr>
                            <tr>
                                <td>Country:</td>
                                <td><?php echo $after_assoc["country"]; ?></td>
                            </tr>
                            <tr>
                                <td>Gender:</td>
                                <td><?php echo $after_assoc["gender"]; ?></td>
                            </tr>
                            <tr>
                                <td>Photo:</td>
                                <td>
                                    <img width="100" src="../uploads/users/<?php echo $after_assoc["user_photo"]; ?>" alt="">
                                </td>
                            </tr>
                        </thead>
                        </table>

                </div>
            </div>
        </div>
    </section>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>