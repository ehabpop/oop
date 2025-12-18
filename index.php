
<?php

    include_once 'classes/register.php';
    $re = new Register();

    if(isset($_GET['delStd']) && !empty($_GET['delStd'])) {
        $id = base64_decode($_GET['delStd']);
        $deleteStudent = $re->deleteStudent($id);
        if ($deleteStudent) {
            $msg = 'Student deleted successfully.';
        } else {
            $msg = 'Student deletion failed. Check server error log.';
        }
    }
    

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  
    <title>Student Information</title>

    </head>
  <body>
    
    <div class="container">
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h2>All Students Information</h2>
                            </div>
                            <div class="col-md-6 text-end">
                                <a href="addstd.php" class="btn btn-primary">Add Student</a>
                            </div>
                        </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Photo</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              <!-- Table rows would go here -->

                              <?php
                                $allStd = $re->allStudents();
                                if($allStd){
                                    while($row = mysqli_fetch_assoc($allStd)){
                                       ?>
                                            <tr>
                                                <td><?=$row["id"]?></td>
                                                <td><?=$row["name"]?></td>
                                                <td><?=$row["email"]?></td>
                                                <td><?=$row["phone"]?></td>
                                                <td><img src="uploads/<?=$row["photo"]?>" alt="photo" style="max-width:80px;"></td>
                                                <td><?=$row["address"]?></td>
                                                <td>
                                                    <a href="edit.php?id=<?=base64_encode($row['id'])?>" class="btn btn-sm btn-info">Edit</a>
                                                    <a href="?delStd=<?=base64_encode($row['id'])?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</a>
                                                </td>
                                            </tr>
                                        <?php
                                    }
                                } else {
                                    echo '<tr><td colspan="7">No students found.</td></tr>';
                                }
                              ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
  </body>
</html>