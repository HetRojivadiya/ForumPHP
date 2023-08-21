<?php

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    include "dbConnect.php";
    $user=$_POST['user'];
    $pass=$_POST['pass'];

    $result = mysqli_query($conn,"select * from users where (user='$user' or email='$user') and password='$pass'");
    $rowNum = mysqli_num_rows($result);
    if($rowNum>0)
    {
        $row = mysqli_fetch_assoc($result);
        session_start();
        $_SESSION['loggedIn'] = true;
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['username'] = $row['user'];
        header("Location:index.php?signIn=Strue");
    }
    else{
        header("Location:index.php?ErrorSignin=Sfalse");
    }
}





?>