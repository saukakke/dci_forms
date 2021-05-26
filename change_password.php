<?php
    $con = mysqli_connect("localhost", "root", "", "dci_forms");
    if(isset($_POST['btnLogin'])){
        $new_password = $_POST['new_password'];
        $confirm_new_password = $_POST['confirm_new_password'];

        if($new_password != $confirm_new_password){
            echo "the two passwords are not the same";
        }else{
            $md5_password = md5($confirm_new_password);
            $sql = 'UPDATE tbl_users set password = "'.$md5_password.'" where id = "'.$_SESSION['id']."'";
            $result = mysqli_query($con, $sql);
            if($result){
                echo "password changed";
            }else{
                echo "error changing password";
            }
        }
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
                        <div class="row">
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <div class="row">
                                    <div class="col">
                                        <div class="col-12">
                                            <label class="col-form-label"><i class="fa fa-lock"> </i> New Password</label>
                                        </div>
                                        <div class="col-sm-12 col-sm-12 col-lg-12">
                                            <input type="password" name="new_password" class="form-control" placeholder="Enter a New Password to be associated with your account" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="col-12">
                                            <label class="col-form-label"><i class="fa fa-lock"> </i> Confirm New Password</label>
                                        </div>
                                        <div class="col-sm-12 col-sm-12 col-lg-12">
                                            <input type="password" name="confirm_new_password" class="form-control" placeholder="Confirm your New Password to be associated with your account" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>

                            <div class="row">
                                <div class="col" align="center">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-3 ml-auto mb-3" align="center">
                                        <button class="btn btn-secondary" name="btnLogin" type="submit">Change Password</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            
        <?php include_once 'inc/footer.php'; ?>
    </div>
</body>
</html>