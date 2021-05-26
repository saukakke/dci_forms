<?php
    if(isset($_POST['btnSignUp'])){
        $c_p = $_POST['password'];
        $e = $_POST['email'];
        $p = $_POST['c_password'];

        $con = mysqli_connect('localhost', 'root', '', 'dci_forms') or die("Can't connect to databae");
        if(!empty($e) && !empty($p) && !empty($c_p)){
            $email = mysqli_real_escape_string($con, $e);
            $valid_email = filter_var($email, FILTER_SANITIZE_EMAIL);
            $password = mysqli_real_escape_string($con, md5(strtolower($p)));
            $cpassword = mysqli_real_escape_string($con, md5(strtolower($c_p)));

            if($password == $cpassword){
                $sql = "INSERT into tbl_register (email, password) VALUES ('$valid_email', '$password')";
                if(mysqli_query($con, $sql)){
                    echo "<script>alert('Registration Successful!')</script>";
                }else{
                    echo "<script>alert('Registration Unsuccessful!')</script>";;
                }
            }else{
                echo "<script>alert('Password did not match!')</script>";
            }
        }else{
            echo "All fields a required!";
        }
        mysqli_close($con);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Digital Connect Institute | Online Form Registration</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="font/css/all.css">
</head>
<body>
    
    <div class="container bg-success">
            <?php include_once 'inc/header.html'; ?>

            <nav class="navbar navbar-expand-lg navbar-dark">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php"><i class="fa fa-home"></i> Home</a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link"><i class="fa fa-user"></i> About</a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link"><i class="fa fa-phone"></i> Contact</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="body mb-3">
                <div class="content mr-auto ml-auto">
                    <form action="<?php $_PHP_SELF; ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-12 col-lg-6 col-md-12">
                                <div class="row">
                                    <div class="col">
                                        <div class="col-12">
                                            <label class="col-form-label"><i class="fa fa-mail-bulk"></i> E-mail</label>
                                        </div>
                                        <div class="col-sm-12 col-sm-12 col-lg-12">
                                            <input type="email" name="email" required class="form-control" placeholder="Enter your Email">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="col-12">
                                            <label class="col-form-label"><i class="fa fa-lock"> </i> Password</label>
                                        </div>
                                        <div class="col-sm-12 col-sm-12 col-lg-12">
                                            <input type="password" name="password" required class="form-control" placeholder="Enter your password">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="col-12">
                                            <label class="col-form-label"><i class="fa fa-lock"> </i> Confirm Password</label>
                                        </div>
                                        <div class="col-sm-12 col-sm-12 col-lg-12">
                                            <input type="password" name="c_password" required class="form-control" placeholder="Re-enter password">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mr-auto ml-2">
                                <div class="col-sm-9 col-lg-9 col-md-9 mr-5">
                                    <div class="col-12 mr-5">
                                        <div class="mr-5 mt-2">
                                            <label class="col-form-label mr-5">Already have an account?
                                                <a href="index.php" class="btn btn-secondary">Login</a>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="col-12 mb-3 mt-3" align="center">
                                    <button class="btn btn-secondary" name="btnSignUp" type="submit">Sign Up</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>                    
            </div>
        <?php include_once 'inc/footer.php'; ?>
    </div>
    
    <script src="js/bootstrap.min.js"></script>
    <script src="font/js/all.js"></script>
</body>
</html>