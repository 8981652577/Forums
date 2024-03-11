<?php
$loginerror="false";
if($_SERVER['REQUEST_METHOD']=="POST")
{
   $email=$_POST['loginEmail'];
   $pass=$_POST['loginPass'];

   include('partials/_dbconnection.php');

   $sql="select * from users where user_email='$email'";
   $res=mysqli_query($conn,$sql);
   $numb=mysqli_num_rows($res);


    if($numb>0)
    {
        $data=mysqli_fetch_assoc($res);
        $rpass=$data['user_pass'];
        $user_sno=$data['sno'];

        $cpass=password_verify($pass,$rpass);
        if($cpass)
        {
            session_start();
            $_SESSION['loggedin']=true;
            $_SESSION['usersno']=$user_sno;
            $_SESSION['useremail']=$email;
            header('location:/phpclassesyt/forums/index.php');
            exit();
        }
        else
        {
            $loginerror="Wrong password";
        }
    }
    else
    {
        $loginerror="email-id not register please sign up first";
        
    }

    header('location:/phpclassesyt/forums/index.php?problem=false&error='.$loginerror.'');
    

}

?>