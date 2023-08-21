<?php
$showError="false";
 if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    include "dbConnect.php";

    $user = $_POST['signupuser'];
    $email = $_POST['signupemail'];
    $pass = $_POST['signuppassword'];
    $cpass = $_POST['signupcpassword'];

    $existSql = "select * from users where email = '$email'";
    $result = mysqli_query($conn,$existSql);

    $numRow = mysqli_num_rows($result);

    if($numRow>0)
    {
        $showError = "Email already in use";
        header("Location:index.php?error=$showError");
    }
    else{
        if($pass == $cpass)
        {
            $has = password_hash($pass,PASSWORD_DEFAULT);
            $result2 = mysqli_query($conn,"insert into users (user,email,password)values('$user','$email','$pass')");
            if($result)
            {
                
                header("Location:index.php?signupSuccess=true");
            }
        }
        else{
            $showError = "Passwords do not match";
            header("Location:index.php?error=$showError");
        }
    }
    
}




?>