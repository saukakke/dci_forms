';ooooooooooooooooooooooooo
<?php
    $con = mysqli_connect('localhost', 'root', '', 'dci_forms') or die('Can\'t connect to database');

    if(isset($_POST['btnLogin'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        if(empty($email)){
            echo 'field is empty';
        }else{
            $sql = "Select username from tbl_users where username = '$email'";
            $result = mysqli_query($con, $sql);

            if(mysqli_num_rows($result) > 0){
                header("Location: change_password.php");
            }else{
                echo 'no user with that email';
            }

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
                                            <label class="col-form-label"><i class="fa fa-mail-bulk"></i> E-mail</label>
                                        </div>
                                        <div class="col-12">
                                            <input type="email" name="email" required placeholder="Enter your E-mail you used when registering" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col" align="center">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-3 ml-auto mb-3" align="center">
                                    <button class="btn btn-secondary" name="btnLogin" type="submit">Check E-mail</button>
                                </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php include_once 'inc/footer.php'; ?>
    </div>
</body>
</html>