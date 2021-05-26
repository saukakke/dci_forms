<?php
    session_start();
    if($_SESSION['user'] == null || $_SESSION['user'] == ""){
        header("Location: index.php");
    }
    
    $con = mysqli_connect('localhost', 'root', '', 'dci_forms');
    if(isset($_POST['submit'])){
        if(isset($_FILES['photo'])){
            //Size of images
            $passport_size = $_FILES['photo']['size'];
            $olevel_size = $_FILES['olevel']['size'];
            $alevel_size = $_FILES['alevel']['size'];

            //Image temp locations
            $passport_tmp = $_FILES['photo']['tmp_name'];
            $olevel_tmp = $_FILES['olevel']['tmp_name'];
            $alevel_tmp = $_FILES['alevel']['tmp_name'];

            //Generating random integer and appending it to image names.
            $random_id = rand(time(), 5000000);
            $new_passport_name = $random_id.$_FILES['photo']['name'];
            $new_olevel_name = $random_id.$_FILES['olevel']['name'];
            $new_alevel_name = $random_id.$_FILES['alevel']['name'];
            $transaction_id = "DCI".$random_id;

            //Location to be uploaded
            $location = "img/";
            $x = $_SESSION['user'];
            //Checking if image size is greater than 2MB
            if(($passport_size < 20480) && ($olevel_size < 20480) && ($alevel_size < 20480)){
                if(move_uploaded_file($passport_tmp, $location.$new_passport_name))
                {
                    @move_uploaded_file($olevel_tmp, $location.$new_olevel_name);
                    @move_uploaded_file($alevel_tmp, $location.$new_alevel_name);
                    
                    $sql = "UPDATE tbl_applicants set unique_id = '$random_id', 
                    passport = '.$new_passport_name.',
                    o_level = '.$new_olevel_name.', 
                    a_level = '.$new_alevel_name.',
                    transaction_id = '$transaction_id'  where email = '$x'";

                    $result = mysqli_query($con, $sql);
                    if($result){
                        echo "<script>alert('Registration completed successfully')</script>";
                    }else{
                        echo "<script>alert('Registration not completed')</script>";
                    }
                    
                }
            }else{
                echo "<script>alert('Image size grater than 2MB')</script>";
            }
        }else{
            echo "<script>alert('Image not selected')</script>";
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
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <div class="container bg-success">
        <?php include_once "inc/header.html"; ?>
        <div class="body">
            <div class="content">
                <form action="<?php $_PHP_SELF; ?>" method="post" enctype="multipart/form-data">
                    <div class="form-row" >
                        <div class="col col-sm-3 col-md-3 col-lg-1 mt-2 ml-auto mr-2">
                            <a href="logout.php" class="btn btn-secondary">Logout</a>
                        </div>
                    </div>
                        
                    <div class="form-row">
                        <div class="col">
                            <div class="col-12" align="center">
                                <p align="center"><b>All fields with <sup>*</sup> are required.</b></p>
                                <label class="header">File Upload</label>
                            </div>
                        </div>
                    </div>
                        
                    <div class="row">
                        <div class="col">
                            <div class="col-12" >               
                                <label for="passport">Passport<sup>*</sup></label>
                            </div>
                            <div class="col-sm-12 col-sm-12 col-lg-12">
                                <input type="file" name="photo" class="form-control-file">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="col-12" >
                                <label for="olevel">O Level<sup></sup></label>
                            </div>
                            <div class="col-sm-12 col-sm-12 col-lg-12">
                                <input type="file" name="olevel" class="form-control-file">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="col-12" >
                                <label for="alevel">A Level<sup></sup></label>
                            </div>
                            <div class="col-sm-12 col-sm-12 col-lg-12">
                                <input type="file" name="alevel" class="form-control-file">
                            </div>
                        </div>
                    </div>

                    <div class="row col-sm-12 col-md-12">
                        <div class="col">
                            <div class="col-12" align="center">
                                <label class="header">Declaration by Applicant</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div >
                                <div class="decleare-sm decleare-md decleare-lg">
                                    <p class="mr-4"><input type="checkbox" name="accpet" required><sup> * </sup> I hereby declare that the particulars which I have supplied above are tru to the best of my knowledge and belief. I am aware that withholding any information and/or giving false information automatically disqualifies me from gaining admission. If amitted, I shall regard myself bound by Status, Ordinances and Regulations of the programme in so as they affect me.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" align="center">
                        <div class="col">
                            <div class="col-sm-12 col-sm-12 col-lg-12 mb-4" >
                                <input type="submit" class="btn btn-secondary" value="Register" name="submit">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php include_once 'inc/footer.php'; ?>
    </div>
</body>
</html>