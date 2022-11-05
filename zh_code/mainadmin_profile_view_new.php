<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Search Profile</title>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>Search my profile details </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Function</th>
                                    <th>Describe</th>

                                    <?php
                                    include('constants.php');

                                    

                                    

                                    $sqlCommand3 = "SELECT * FROM profile";

                                    $res3 = mysqli_query($conn, $sqlCommand3);
                                    if($res3==TRUE)
                                    {
                                      $count = mysqli_num_rows($res3); //get all rows

                                      $sn=1;

                                        if($count>0)
                                        {
                                          while($rows= mysqli_fetch_assoc($res3))
                                          {
                                            $table_id = $rows['profile_id'];
                                            $table_name = $rows['profile_name'];
                                            $table_function = $rows['profile_function'];
                                            $table_describe = $rows['profile_describe'];

                                            ?>
                                            <html>
                                            <tr>
                                                <td> <?php echo $table_id; ?> </td>
                                                <td> <?php echo $table_name; ?> </td>
                                                <td> <?php echo $table_function; ?> </td>
                                                <td> <?php echo $table_describe; ?> </td>
                                            </tr>
                                            </html>

                                            <?php

                                          }
                                        }
                                      } else
                                      {
                                        //do not have anything in database
                                      }

                                    

                                    ?>

                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    include('constants.php');
                                 

                                    if(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];
                                        $query = "SELECT * FROM profile WHERE CONCAT(profile_name,profile_function, profile_describe) LIKE '%$filtervalues%' ";
                                        $query_run = mysqli_query($conn, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                                                <tr>
                                                    <td><?= $items['profile_id']; ?></td>
                                                    <td><?= $items['profile_name']; ?></td>
                                                    <td><?= $items['profile_function']; ?></td>
                                                    <td><?= $items['profile_describe']; ?></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="4">No Record Found</td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>