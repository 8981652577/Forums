<?php

$showerror="false";
if($_SERVER['REQUEST_METHOD']=="POST")
{
    $user_email=$_POST['userEmail'];
    $pass=$_POST['userPassword'];
    $cpass=$_POST['usercPassword'];

    include('partials/_dbconnection.php');
    $exist_sql="select * from users where user_email='$user_email'";
    $res=mysqli_query($conn,$exist_sql);

    $rows=mysqli_num_rows($res);

    if($rows>0)
    {
        $showerror="user already exist";
    }
    else
    {
        if($pass!=$cpass)
        {
            $showerror="password mismatched";
        }
        else
        {
            $hash=password_hash($pass,PASSWORD_DEFAULT);

            $sql="insert into users(user_email,user_pass,timestamp) values('$user_email','$hash',current_timestamp())";

            $res=mysqli_query($conn,$sql);

            if($res>0)
            {
                $showAlert=true;
               
                header('location:/phpclassesyt/forums/index.php?signupsuccess=true');
                exit();
            }
        }

    }

    header('location:/phpclassesyt/forums/index.php?showerror=false&error='.$showerror.'');

}




?>