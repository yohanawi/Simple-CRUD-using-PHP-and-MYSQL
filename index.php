<?php 
    session_start();
    include './components/connection.php';
?>

<!doctype html>
<html lang="en">
    <head>
        <!--Meta tags-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Simple CRUD App</title>
        <!--Bootstrap CSS-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <!--Font-awesome CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" rel="stylesheet">
        <!--table-->
        <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
  
    </head>
    <body>
        <div class="container mt-4">
            <?php include('./components/message.php'); ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Details
                                <a href="./function/insert.php" class="btn btn-primary float-end"><i class="fa-solid fa-plus"> ADD</i></a>
                            </h3>
                        </div>
                        <div class="card-body">
                            <table id="example" class="table table-bordered table-striped" >
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>NIC</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Birthday</th>
                                        <th>Gender</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $query = "SELECT * FROM users";
                                        $query_run = mysqli_query($con, $query);
                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $row)
                                            {
                                                ?>
                                                <tr>
                                                    <td><?= $row['id']?></td>
                                                    <td><?= $row['name']?></td>
                                                    <td><?= $row['nic']?></td>
                                                    <td><?= $row['email']?></td>
                                                    <td><?= $row['phone']?></td>
                                                    <td><?= $row['birthday']?></td>
                                                    <td><?= $row['gender']?></td>
                                                    <td>
                                                        <a href="./function/view.php?id=<?= $row['id']; ?>" class="btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></a>
                                                        <a href="./function/edit.php?id=<?= $row['id']; ?>" class="btn btn-success btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                                        <form action="./function/code.php" method="POST" class="d-inline">
                                                            <button type="submit" name="delete" value="<?= $row['id']; ?>" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            echo "<h5>No Record Found</h5>";
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#example').DataTable();
            });
        </script>
    </body>
</html>