<?php
    session_start();
    if($_SESSION['user'] == null || $_SESSION['user'] == ""){
        header("Location: index.php");
    }

    $l = "img/";
    $ex = array('jpg', 'jpeg', 'png');
    $u_id = rand(time(), 50000000);
    $transaction_id = "DCI".$u_id;

    if(isset($_POST['submit'])){
        if(isset($_FILES['passport'])){
            $p = $_FILES['passport']['name'];
            $p_t = $_FILES['passport']['tmp_name'];
            $p_e = explode(".", $p);
            $p_e_v = end($p_e);

            if(in_array($p_e_v, $ex)){
                move_uploaded_file($p_t, $l.$u_id.$p);
            }
        }else{
            echo "<script>alert('File not selected')</script>";
        }
        if(isset($_FILES['o_level'])){
            $ol = $_FILES['o_level']['name'];
            $ol_t = $_FILES['o_level']['tmp_name'];
            $ol_e = explode(".", $ol);
            $ol_e_v = end($ol_e);

            if(in_array($p_e_v, $ex)){
                move_uploaded_file($ol_t, $l.$u_id.$ol);
            }
        }
        if(isset($_FILES['a_level'])){
            $al = $_FILES['a_level']['name'];
            $al_t = $_FILES['a_level']['tmp_name'];
            $al_e = explode(".", $al);
            $al_e_v = end($al_e);

            if(in_array($p_e_v, $ex)){
                move_uploaded_file($al_t, $l.$u_id.$al);
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
    <!--link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css"-->
</head>
<body>
    <div class="container bg-success">
        <form action="<?php $_PHP_SELF; ?>" method="post" enctpe="multipart/form-data">
            <div class="row">
                <div class="col">
                    <div class="col-sm-12 col-md-12 col-lg-12" >
                        <?php include_once 'inc/header.html'; ?>
                    </div>
                </div>
            </div>
                <div class="body">
                    <div class="content">
                        <div class="form-row" >
                            <div class="col col-sm-3 col-md-3 col-lg-1 mt-2 ml-auto mr-2">
                                <a href="logout.php" class="btn btn-secondary">Logout</a>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="col">
                                <div class="col-12" >
                                    <p align="center"><b>All fields with <sup>*</sup> are required.</b></p>
                                    <div align="center">
                                        <label class="error-txt"></label> 
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row col-12">
                            <div class="col">
                                <div class="col-12" align="center">
                                    <label  class="header">File Upload</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="col">
                                <div class="col-12" >
                                    <label for="sname" class="col-form-label">Passport<sup>*</sup></label>
                                </div>
                                <div class="col-sm-12 col-sm-12 col-lg-12">
                                    <input type="file" name="passport" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="col-12" >
                                    <label for="fname" class="col-form-label">O Level<sup></sup></label>
                                </div>
                                <div class="col-sm-12 col-sm-12 col-lg-12">
                                    <input type="file" name="o_level">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="col-12" >
                                    <label for="mname" class="col-form-label">A Level<sup></sup></label>
                                </div>
                                <div class="col-sm-12 col-sm-12 col-lg-12">
                                    <input type="file" name="a_level">
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
                                    <ul class="pagination">
                                        <li><a href="apply.php">1</a></li>
                                        <li class="active"><a href="file.php">2</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="row" align="center">
                            <div class="col">
                                <div class="col-sm-12 col-sm-12 col-lg-12 mb-4" >
                                    <button type="submit" class="btn btn-secondary mr-4" name="submit" align="center">Register</button>
                                </div>
                            </div>
                        </div>
                    </div>
        </form>
                        <?php include_once 'inc/footer.php'; ?>

    </div>
</body>
</html>