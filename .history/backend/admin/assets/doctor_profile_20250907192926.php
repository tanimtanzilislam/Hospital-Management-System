<?php

session_start();
include('assets/inc/config.php');

if(isset($_POST['doctor_sup'])) {
    $doc_fname = $_POST['doc_fname'];
    $doc_lname = $_POST['doc_lname'];
    $doc_email = $_POST['doc_email'];
    $doc_pwd = sha1(md5($_POST['doc_pwd'])); 
    $doc_dept = $_POST['doc_dept'];
    $doc_number = $_POST['doc_number'];

    
    if(isset($_FILES['doc_dpic']) && $_FILES['doc_dpic']['error'] == 0) {
        $upload_dir = 'assets/images/doctors/';
        $filename = time() . '_' . basename($_FILES['doc_dpic']['name']);
        $target_file = $upload_dir . $filename;
        move_uploaded_file($_FILES['doc_dpic']['tmp_name'], $target_file);
    } else {
        $filename = 'defaultimg.jpg'; // default image
    }

   
    $query = "INSERT INTO his_docs (doc_fname, doc_lname, doc_email, doc_pwd, doc_dept, doc_number, doc_dpic) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('sssssss', $doc_fname, $doc_lname, $doc_email, $doc_pwd, $doc_dept, $doc_number, $filename);
    $stmt->execute();

    if($stmt){
        $success = "Doctor Account Created. Proceed to Log In";
    } else {
        $err = "Error: " . $mysqli->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Doctor Registration - Hospital Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

    <!-- SweetAlert -->
    <script src="assets/js/swal.js"></script>
    <?php if(isset($success)) { ?>
    <script>
        setTimeout(function() {
            swal("Success","<?php echo $success;?>","success");
        }, 100);
    </script>
    <?php } ?>
    <?php if(isset($err)) { ?>
    <script>
        setTimeout(function() {
            swal("Failed","<?php echo $err;?>","error");
        }, 100);
    </script>
    <?php } ?>
</head>
<body class="authentication-bg authentication-bg-pattern">

<div class="account-pages mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-pattern">
                    <div class="card-body p-4">

                        <div class="text-center w-75 m-auto">
                            <a href="doctor_register.php">
                                <span><img src="assets/images/logo-dark.png" alt="" height="22"></span>
                            </a>
                            <p class="text-muted mb-4 mt-3">Create your doctor account, it takes less than a minute</p>
                        </div>

                        <form method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>First Name</label>
                                <input class="form-control" type="text" name="doc_fname" placeholder="Enter First Name" required>
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input class="form-control" type="text" name="doc_lname" placeholder="Enter Last Name" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="email" name="doc_email" placeholder="Enter Email" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" type="password" name="doc_pwd" placeholder="Enter Password" required>
                            </div>
                            <div class="form-group">
                                <label>Department</label>
                                <input class="form-control" type="text" name="doc_dept" placeholder="Enter Department" required>
                            </div>
                            <div class="form-group">
                                <label>Contact Number</label>
                                <input class="form-control" type="text" name="doc_number" placeholder="Enter Contact Number" required>
                            </div>
                            <div class="form-group">
                                <label>Profile Picture</label>
                                <input class="form-control" type="file" name="doc_dpic" accept="image/*">
                            </div>
                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-primary btn-block" name="doctor_sup" type="submit">Sign Up</button>
                            </div>
                        </form>

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-white-50">Already have an account?  
                                    <a href="index.php" class="text-white ml-1"><b>Sign In</b></a>
                                </p>
                            </div>
                        </div>

                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- end container -->
</div> <!-- end page -->

<?php include("assets/inc/footer1.php"); ?>

<!-- Vendor js -->
<script src="assets/js/vendor.min.js"></script>
<!-- App js -->
<script src="assets/js/app.min.js"></script>

</body>
</html>
