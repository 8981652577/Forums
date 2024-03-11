

<?php

$url=$_SERVER['REQUEST_URI'];

$last=strrpos($url, "/");

$last_index=substr($url,$last+1);

echo '
   
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">iDiscuss</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
        ';
        if($last_index =="index.php")
        {
          
          echo '<a class="nav-link active" aria-current="page" href="index.php">Home</a>';
        }
        else
        {
          echo'<a class="nav-link" aria-current="page" href="index.php">Home</a>';
        }
        echo '
        </li>
        <li class="nav-item">
        ';
        if($last_index =="about.php")
        {
           echo'<a class="nav-link active" href="about.php">About</a>';
        }
        else
        {
          echo'<a class="nav-link" href="about.php">About</a>';
        }
          
        echo
        '</li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           Top Categories
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';

          include('partials/_dbconnection.php');

          $sql="select category_name,category_id from categories limit 3";
          $result=mysqli_query($conn,$sql);
          $num=mysqli_num_rows($result);
          
          if($num>0)
          {
            while($data=mysqli_fetch_assoc($result))
            {

              echo '  <li><a class="dropdown-item" href="threadlist.php?catid='.$data['category_id'].'">'.$data["category_name"].'</a></li>';
            }
          }
           
           
        echo'  
          </ul>
        </li>
        <li class="nav-item">
          ';
          if($last_index =="contact.php")
          {
            echo'<a class="nav-link active" href="contact.php">Contact</a>';
          }
          else
            {
              echo'<a class="nav-link" href="contact.php">Contact</a>';
            }
         
          echo
            
        '</li>
      </ul>
          <form  action="search.php" method="get" class="d-flex ml-2">
            <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-danger" type="submit">Search</button>
          </form>
      
      
      
      
      
      ';
      
      session_start();
      if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
      {
        echo '
              <p class="text-white"><b>'.$_SESSION['useremail'].'</b></p><a href="logoutIdiscuss.php" class="btn btn-outline-success mx-2">Logout</a>

              </div>  
              </div>
            </nav>';
      }
      else
      {
        echo
        '
          <button class="btn btn-outline-success mx-2" data-bs-toggle="modal" data-bs-target="#LoginModal" >Login</button>
          <button class="btn btn-outline-success mx-2"  data-bs-toggle="modal" data-bs-target="#SignupModal" >SignUp</button>
      </div>  
      </div>
      </nav>';
      }
        


include 'partials/loginModal.php';
include 'partials/signupModal.php';

if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true")
{
  echo
   '
        <div class="alert alert-success alert-dismissible fade show my-0" role="alert">
          <strong>Success!</strong>Your details has been sent now you are a member of idiscuss.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      ';
}

else
{
  if(isset($_GET['showerror'])&& $_GET['showerror']=="false")
  {
    $showerror=$_GET['error'];
    echo 
    '
         <div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
             <strong>'.$showerror.'!</strong>Please check it once.
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
    '
    ;
  }
   
}


if(isset($_GET['problem']) && $_GET['problem']=="false")
{
  $loginerror=$_GET['error'];

  echo
  '
      <div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
          <strong>'.$loginerror.'!</strong>Please check it once.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
  ';
}

?>