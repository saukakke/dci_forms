<?php

    function register($e, $p)
    {
        $con = mysqli_connect('localhost', 'root', '', 'dci_forms') or die("Can't connect to databae");
        if(!empty($e) && !empty($p)){
            $email = mysqli_real_escape_string($con, $e);
            $password = mysqli_real_escape_string($con, $p);

            $sql = "INSERT into tbl_register (email, password) 
                    VALUES ({$email}, {$password})";
            if(mysqli_query($con, $sql)){
                return 1;
            }else{
                return 0;
            }
        }else{
            echo "All fields a required!";
        }
        mysqli_close($con);
    }

    function validateEmail($e)
    {
        $con = mysqli_connect('localhost', 'root', '', 'dci_forms') or die("Can't connect to databae");
        $email = mysqli_real_escape_string($con, $e);
        $v_email = filter_var($email, FILTER_VALIDATE_EMAIL);
        if($v_email){
            return 1;
        }else{
            return 0;
        }
        mysqli_close($con);
    }

    function validateName($n)
    {
        $con = mysqli_connect('localhost', 'root', '', 'dci_forms') or die("Can't connect to databae");
        $name = mysqli_real_escape_string($con, $n);
        if(!preg_match("/^[a-zA-Z.]$/", $name)){
            return 0;
        }else{
            return 1;
        }
        mysqli_close($con);
    }

    function validatePhone($n)
    {
        $con = mysqli_connect('localhost', 'root', '', 'dci_forms') or die("Can't connect to databae");
        $name = mysqli_real_escape_string($con, $n);
        if(!preg_match("/^[0-9]{11}$/", $name)){
            return 0;
        }else{
            return 1;
        }
        mysqli_close($con);
    }

    function validatePassword($n, $n1)
    {
        $con = mysqli_connect('localhost', 'root', '', 'dci_forms') or die("Can't connect to databae");
        $name = mysqli_real_escape_string($con, $n);
        $name1 = mysqli_real_escape_string($con, $n1);
        if($name != $name){
            return 0;
        }else{
            return 1;
        }
        mysqli_close($con);
    }
?>