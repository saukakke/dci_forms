<?php
    session_start();
    
    if(isset($_POST['btnLogin'])){
        $e = $_POST['email'];
        $p = $_POST['password'];

        $con = mysqli_connect('localhost', 'root', '', 'dci_forms') or die("Can't connect to databae");
        if(!empty($e) && !empty($p)){
            $email = mysqli_real_escape_string($con, $e);
            $password = mysqli_real_escape_string($con, md5(strtolower($p)));

            $slq = "SELECT * from tbl_admin where email = '$email' and password = '$password'";
            $result = mysqli_query($con, $slq);
            if($result){
                if(mysqli_num_rows($result) > 0){
                    $row = mysqli_fetch_assoc($result);
                    if($row['email'] == $email && $row['password'] == $password){
                        $_SESSION['user'] = $row['id'];
                        header("Location: index2.php");
                    }
                }else{
                    //echo "<script>alert('');</script>";
                    echo '<script>
                            var x = document.getElementByClassName("alert-info");
                            x.innerHTML = "No user with this credentials";
                        </script>';
                }
            }else{
                echo "<script>alert('Error in retrieving the data');</script>";
            }
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
                            <a href="admin.php" class="nav-link"><i class="fa fa-key"></i> Admin Login</a>
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
                            <div class="col-xs-12 col-sm-12 col-lg-12 col-md-12">
                                <div class="row">
                                    <div class="col">
                                        <div class="col-12">
                                            <label class="col-form-label"><i class="fa fa-mail-bulk"></i> Admin E-mail</label>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-sm-12 col-lg-12">
                                            <input type="email" name="email" required class="form-control" placeholder="Enter the Email associated with this account">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="col-12">
                                            <label class="col-form-label"><i class="fa fa-lock"> </i> Admin Password</label>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-sm-12 col-lg-12">
                                            <input type="password" name="password" required class="form-control" placeholder="Enter the Password associated with this account">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="col-12 mt-3 mb-3" align="center">
                                    <button class="btn btn-secondary" name="btnLogin" type="submit">Login</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        <?php include_once 'inc/footer.php'; ?>
    </div>
    
    <script src="js/bootstrap.js"></script>
    <script src="font/js/all.js"></script>
</body>
</html>