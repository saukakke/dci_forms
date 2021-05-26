<?php
    session_start();
    if($_SESSION['user'] == null || $_SESSION['user'] == ""){
        header("Location: index.php");
    }

    $con = mysqli_connect('localhost', 'root', '', 'dci_forms')
        or die('Unable to connect');
    
    $sql = 'SELECT email from tbl_register where email = "'. $_SESSION['user'].'"';
    $row = mysqli_fetch_assoc(mysqli_query($con, $sql));

    if(isset($_POST['btnSubmit'])){
        //Input fields
        $sname = mysqli_real_escape_string($con, $_POST['sname']);
        $fname = mysqli_real_escape_string($con, $_POST['fname']);
        $mname = mysqli_real_escape_string($con, $_POST['mname']);
        $nationality = mysqli_real_escape_string($con, $_POST['nationality']);
        $state = mysqli_real_escape_string($con, $_POST['state']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $lga = mysqli_real_escape_string($con, $_POST['lga']);
        $birth = mysqli_real_escape_string($con, $_POST['birth']);
        $dob = mysqli_real_escape_string($con, $_POST['dob']);
        $gender = mysqli_real_escape_string($con, $_POST['gender']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);
        $m_status = mysqli_real_escape_string($con, $_POST['marital_status']);
        $contact = mysqli_real_escape_string($con, $_POST['contact_address']);
        $home = mysqli_real_escape_string($con, $_POST['home_address']);
        $nkin_name = mysqli_real_escape_string($con, $_POST['nkin_fullname']);
        $nkin_relationship = mysqli_real_escape_string($con, $_POST['nkin_relationship']);
        $nkin_phone = mysqli_real_escape_string($con, $_POST['nkin_phone']);
        $nkin_c_add = mysqli_real_escape_string($con, $_POST['nkin_contact_address']);
        $programme = mysqli_real_escape_string($con, $_POST['program']);
        $time_option = mysqli_real_escape_string($con, $_POST['time_option']);

        $sql = "INSERT into tbl_applicants (unique_id, surname, firstname, middlename, nationality, state, lga, pob, dob, gender, phone, marital_status, email, c_address, p_address, passport, nkin_name, nkin_relationship, nkin_phone, nkin_c_address, desired_programme, duration, o_level, a_level, status, transaction_id)
        values('','$sname', '$fname', '$mname', '$nationality', '$state', '$lga', '$birth', '$dob', '$gender', '$phone', '$m_status', '$email', '$contact', '$home', '', '$nkin_name', '$nkin_relationship', '$nkin_phone', '$nkin_c_add', '$programme', '$time_option', '', '', 'Not Paid', '$transaction_id')";

        $result = mysqli_query($con, $sql);
        if($result){
            echo "<script>alert('Saved!')</script>";
            header("Location: file_upload.php");
        }else{
            echo "<script>alert('Not Saved!')</script>";
        }
    }
    mysqli_close($con);
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
                                    <label  class="header">Personal Dtails</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="col">
                                <div class="col-12" >
                                    <label for="sname" class="col-form-label">Surname<sup>*</sup></label>
                                </div>
                                <div class="col-sm-12 col-sm-12 col-lg-12">
                                    <input type="text" class="form-control" name="sname" placeholder="Enter your Surname" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="col-12" >
                                    <label for="fname" class="col-form-label">First Name<sup>*</sup></label>
                                </div>
                                <div class="col-sm-12 col-sm-12 col-lg-12">
                                    <input type="text" class="form-control" name="fname" placeholder="Enter your First Name" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="col-12" >
                                    <label for="mname" class="col-form-label">Middle Name<sup></sup></label>
                                </div>
                                <div class="col-sm-12 col-sm-12 col-lg-12">
                                    <input type="text" class="form-control" name="mname" placeholder="Enter your Middle Name">
                                </div>
                            </div>    
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="col-12" >
                                    <label for="nationality" class="col-form-label">Nationality<sup>*</sup></label>
                                </div>
                                <div class="col-sm-12 col-sm-12 col-lg-12">
                                    <input type="text" class="form-control" name="nationality" placeholder="Enter your Nationality" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="col-12" >
                                    <label for="state" class="col-form-label">State of Origin<sup>*</sup></label>
                                </div>
                                <div class="col-sm-12 col-sm-12 col-lg-12">
                                    <input type="text" class="form-control" name="state" placeholder="Enter your State of Origin" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="col-12" >
                                    <label for="lga" class="col-form-label">Local Government Area of Origin<sup>*</sup></label>
                                </div>
                                <div class="col-sm-12 col-sm-12 col-lg-12">
                                    <input type="text" class="form-control" name="lga" placeholder="Enter your Local Government Area" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col">
                                <div class="col-12" >
                                    <label for="birth" class="col-form-label">Place of Birth<sup>*</sup></label>
                                </div>
                                <div class="col-sm-12 col-sm-12 col-lg-12" >
                                    <input type="text" class="form-control" name="birth" placeholder="Enter your Place of Birth" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="col-12" >
                                    <label for="dob" class="col-form-label">Date of Birth<sup>*</sup></label>
                                </div>
                                <div class="col-sm-12 col-sm-12 col-lg-12">
                                    <input type="date" class="form-control" name="dob" placeholder="Enter your Date of Birth" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="col-12">
                                    <label for="gender" class="col-form-label" >Gender<sup>*</sup></label>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12" >
                                    <select name="gender" class="form-control" required>
                                        <option value="">--Select Gender--</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="col-12" >
                                    <label for="phone" class="col-form-label">Phone Number<sup>*</sup></label>
                                </div>
                                <div class="col-sm-12 col-sm-12 col-lg-12" >
                                    <input type="phone"  class="form-control" maxlength="11" name="phone" placeholder="Phone Number" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="col-12">
                                    <label for="marital_status" class="col-form-label">Marital Status<sup>*</sup></label>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12" >
                                    <select name="marital_status"  class="form-control" required>
                                        <option>--Select Marital Status--</option>
                                        <option value="Married">Married</option>
                                        <option value="Single">Single</option>
                                        <option value="Divorced">Divorced</option>
                                        <option value="Widow">Widow</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="col-12" >
                                    <label for="email" class="col-form-label">Email Address<sup>*</sup></label>
                                </div>
                                <div class="col-sm-12 col-sm-12 col-lg-12">
                                    <input type="email" class="form-control" readonly value="<?php echo $row['email']?>" name="email" placeholder="Enter your Email Address" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="col-12" >
                                    <label for="contact_address"  class="col-form-label">Contact Address<sup>*</sup></label>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12" >
                                    <textarea name="contact_address" class="form-control" placeholder="Please type your contact address"
                                cols="30" rows="10" required></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="col-12" >
                                    <label for="home_address"  class="col-form-label">Permanent Home Address<sup>*</sup></label>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12" >
                                    <textarea name="home_address" class="form-control" placeholder="Please type your permanent home address"
                                cols="30" rows="10" required></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row col-sm-12 col-md-12">
                            <div class="col">
                                <div class="col-12" align="center">
                                    <label class="header col-form-label">Next of Kin Details</label> 
                                </div>
                            </div>     
                        </div>
                        
                        <div class="row">
                            <div class="col">
                                <div class="col-12" >
                                    <label for="nkin_fullname" class="col-form-label">Next of Kin Full Name<sup>*</sup></label>
                                </div>
                                <div class="col-sm-12 col-sm-12 col-lg-12">
                                    <input type="phone" name="nkin_fullname" class="form-control" placeholder="Enter your next of kin Full Name" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="col-12" >
                                    <label for="nkin_relationship" class="col-form-label">Relationship with Next of Kin<sup>*</sup></label>
                                </div>
                                <div class="col-sm-12 col-sm-12 col-lg-12">
                                    <input type="phone" name="nkin_relationship" class="form-control" placeholder="Enter your nkin_relationship with next of kin" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="col-12" >
                                    <label for="nkin_phone" class="col-form-label">Next of Kin Phone Number<sup>*</sup></label>
                                </div>
                                <div class="col-sm-12 col-sm-12 col-lg-12">
                                    <input type="phone" name="nkin_phone" class="form-control" placeholder="Enter your next of kin Phone Number" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="col-12" >
                                    <label for="nkin_contact_address"  class="col-form-label">Next of Kin Contact Address<sup>*</sup></label>
                                </div>
                                <div class="col-sm-12 col-md-12" >
                                    <textarea name="nkin_contact_address" class="form-control" placeholder="Please type your next of kin contact address"
                                cols="30" rows="10" required></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="col-12" >
                                    <label for="program"  class="col-form-label">Desired Programme<sup>*</sup></label>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <select name="program" class="form-control" required>
                                        <option>--Select Desired Programme--</option>
                                        <option value="graphics">Graphics Design</option>
                                        <option value="video and photo">Videograpgy & Photography</option>
                                        <option value="robotics">Robotics Engineering</option>
                                        <option value="programming">Programming</option>
                                        <option value="digital literacy">Digital Literacy</option>
                                        <option value="anim and game">Animation & Game Development</option>
                                        <option value="mobile">Mobile Development</option>
                                        <option value="computer packages">Computer Application Packages</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="col-12" >
                                    <label for="time_option"  class="col-form-label">Desired Programme Option<sup>*</sup></label>
                                </div>
                                <div class="col-ms-12 col-md-12 col-lg-12 mb-3" >
                                    <select name="time_option" class="form-control" required>
                                        <option>--Select Programme Option--</option>
                                        <option value="full">Full Time</option>
                                        <option value="part">Part Time</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row" align="center">
                            <div class="col">
                                <div class="col-sm-12 col-sm-12 col-lg-12 mb-4" >
                                    <button type="submit" class="btn btn-secondary mr-4" name="btnSubmit" align="center">Save & Continue</button>
                                    <button type="reset" class="btn btn-secondary" name="btnReset" align="center">Clear All</button>
                                </div>
                            </div>
                        </div>
                    </div>
        </form>
                        <?php include_once 'inc/footer.php'; ?>

    </div>
</body>
</html>