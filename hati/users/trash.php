<?php

    require ('../db.php');
    require ('../session_check.php');

    $select = "SELECT * FROM users WHERE status=1";
    $select_result = mysqli_query($db_connection, $select);

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
                <div class="col-lg-12 m-auto">
                    <div class="alert alert-info text-center">
                        <h2>Trash</h2>
                    </div>
                    	
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Birthday</th>
                            <th scope="col">Country</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Photo</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($select_result as $users_info){ ?>
                            <tr>
                                <td ><?php echo $users_info["id"]; ?></td>
                                <td><?php echo $users_info["name"]; ?></td>
                                <td><?php echo $users_info["email"]; ?></td>
                                <td><?php echo $users_info["phone"]; ?></td>
                                <td><?php echo $users_info["birthday"]; ?></td>
                                <td><?php echo $users_info["country"]; ?></td>
                                <td><?php echo $users_info["gender"]; ?></td>
                                <td>
                                <img width="100" src="../uploads/users/<?php echo $users_info["user_photo"]; ?>" alt="">
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        
                                        <a href="/hati/users/soft_delete.php?id=<?php echo $users_info["id"]; ?>" class="btn btn-success">Undo</a>
                                        <a href="/hati/users/delete_user.php?id=<?php echo $users_info["id"]; ?>" class="btn btn-danger">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                        </table>

                </div>
            </div>
        </div>
    </section>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>