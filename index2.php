<?php
    session_start();
    if($_SESSION['user'] == null || $_SESSION['user'] == ""){
        header("Location: admin.php");
    }
    
    if(isset($_POST['btnLogin'])){
        $con = mysqli_connect('localhost', 'root', '', 'dci_forms') or die("Can't connect to databae");
        
        $e = mysqli_real_escape_string($con, $_POST['email']);

        if(!empty($e)){
            $sql = 'SELECT * from tbl_applicants where transaction_id = "'.$e."'";

            if(mysqli_query($con, $sql)){
                if(mysql_num_rows(mysqli_query($con, $sql) > 0)){
                    $row = mysqli_fetch_assoc(mysqli_query($con, $sql));
                    if(strtolower($row['transaction_id']) == $e){
                        $sql1 = 'UPDATE tbl_participants set status = "Paid" where transaction_id = "'.$e."'";
                        if(mysqli_query($con, $sql1)){
                            echo "<script>alert('Successfully Activated!');</script>";
                        }else{
                            echo "<script>alert('Unable to Activate. Please contact the ICT Manager!');</script>";
                        }
                    }
                }
            }else{
                echo "<script>alert('There is no user with ".$e." transaction ID!');</script>";
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
            <div class="body mb-3">
                <div class="content mr-auto ml-auto">
                    <form action="<?php $_PHP_SELF; ?>" method="post" enctype="multipart/form-data">
                        <div class="form-row" >
                            <div class="col col-xs-2 col-sm-2 col-md-2 col-lg-1 mt-2 ml-auto mr-2">
                                <a href="logout.php" class="btn btn-secondary">Logout</a>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-lg-12 col-md-12">
                                <div class="row">
                                    <div class="col">
                                        <div class="col-12">
                                            <label class="col-form-label"><i class="fa fa-paste"></i> Transaction ID</label>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-sm-12 col-lg-12">
                                            <input type="text" name="email" class="form-control" placeholder="Enter Paricipant Transaction ID">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="col-12 mt-3 mb-3" align="center">
                                            <button class="btn btn-secondary" name="btnLogin" type="submit">Activate Payment</button>-
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php include_once 'inc/footer.php'; ?>
    </div>
    
    <script src="js/bootstrap.js"></script>
    <script src="font/js/all.js"></script>
</body>
</html>