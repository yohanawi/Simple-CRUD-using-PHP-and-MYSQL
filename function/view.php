<?php
    include '../components/connection.php' ;
?>

<!doctype html>
<html lang="en">
    <head>
        <!--Meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>View</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <!--Font-awesome CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" rel="stylesheet">  
    </head>
    <body>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>View Details 
                                <a href="../index.php" class="btn btn-danger float-end"><i class="fa-solid fa-circle-arrow-left"> Back</i></a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <?php
                                if(isset($_GET['id']))
                                {
                                    $id = mysqli_real_escape_string($con, $_GET['id']);
                                    $query = "SELECT * FROM users WHERE id='$id' ";
                                    $query_run = mysqli_query($con, $query);
                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        $row = mysqli_fetch_array($query_run);
                                        ?>
                                            <div class="mb-3">
                                                <label>Name</label>
                                                <p class="form-control"><?=$row['name'];?></p>
                                            </div>
                                            <div class="mb-3">
                                                <label>NIC</label>
                                                <p class="form-control"><?=$row['nic'];?></p>
                                            </div>
                                            <div class="mb-3">
                                                <label>Email</label>
                                                <p class="form-control"><?=$row['email'];?></p>
                                            </div>
                                            <div class="mb-3">
                                                <label>Phone</label>
                                                <p class="form-control"><?=$row['phone'];?></p>
                                            </div>
                                            <div class="mb-3">
                                                <label>Birthday</label>
                                                <p class="form-control"><?=$row['birthday'];?></p>
                                            </div>
                                            <div class="mb-3">
                                                <label>Gender</label>
                                                <p class="form-control"><?=$row['gender'];?></p>
                                            </div>
                                        <?php
                                    }
                                    else
                                    {
                                        echo "<h4>No Such Id Found</h4>";
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>