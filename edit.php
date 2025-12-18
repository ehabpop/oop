
<?php
    include_once 'classes/register.php';
    $re = new Register();

    if (isset($_GET['id']) && !empty($_GET['id'])) {
        // $studentId = intval($_GET['id']);
        // Fetch existing student data here if needed
        $id = base64_decode($_GET['id']);
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $register = $re->updateStudent($_POST, $_FILES, $id);
        if ($register) {
            $msg = 'Update successful.';
        } else {
            $msg = 'Update failed. Check server error log.';
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
  
    <title>Registration Form</title>

    </head>
  <body>
    
    <div class="container">
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-md-7">
                <div class="card shadow">

                    <div>
                        <?php
                            if (isset($msg)) {
                                echo '<div class="alert alert-info alert-dismissible fade show m-3" role="alert">'
                                    . htmlspecialchars($msg) .
                                    '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                            }
                        ?>

                    </div>


                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h2>Update Student</h2>
                            </div>
                            <div class="col-md-6 text-end">
                                <a href="index.php" class="btn btn-primary">Show Student info</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                    <?php
                        $student = $re->getStudentById($id);
                        if ($student) {
                            while($row = mysqli_fetch_assoc($student)){
                    ?>
                            <form method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name" value="<?php echo htmlspecialchars($row['name']); ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter Your Email" value="<?php echo htmlspecialchars($row['email']); ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="age" class="form-label">Phone</label>
                                    <input type="number" class="form-control" id="phone" name="phone" placeholder="Enter Your Phone" value="<?php echo htmlspecialchars($row['phone']); ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="age" class="form-label">Photo</label>
                                    <input type="file" class="form-control" id="photo" name="photo" placeholder="Upload Your Photo">
                                    <img src="uploads/<?php echo htmlspecialchars($row['photo']); ?>" alt="photo" style="max-width:80px; margin-top:10px;">
                                </div>
                                <div class="mb-3">
                                    <label for="age" class="form-label">Address</label>
                                    <textarea class="form-control" id="address" name="address" placeholder="Enter Your Address" required><?php echo htmlspecialchars($row['address']); ?></textarea>
                                </div>
                                <button type="submit" class="btn btn-success form-control" value="Register">Update</button>
                            </form>
                            <?php
                        }
                        }
                    ?>
                        
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