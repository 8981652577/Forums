<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
    #ques {
        min-height: 423px;
    }
    </style>
    <title>Welcome to iDiscuss - Coding Discuss</title>
</head>

<body>

    

    <?php
        
        include('partials/_dbconnection.php');  
        // Single category fetch from database.

        $id=$_GET['catid'];  
        $sql="select * from categories where category_id='$id'";
        $result=mysqli_query($conn,$sql);
        $numb=mysqli_num_rows($result);

        if($numb>0)
        {
            while($data=mysqli_fetch_assoc($result))
            {
                $catname=$data['category_name'];
                $catdes=$data['category_description'];
            }
        }
        
    
    ?>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->



    <?php include('partials/_header.php'); ?>

    <?php

        $method=$_SERVER['REQUEST_METHOD'];
        
        if($method=="POST")
        {
            $thtitle=$_POST['problem'];
            $thdesc=$_POST['desc'];
            $thtitle=str_replace("<","&lt","$thtitle");
            $thtitle=str_replace(">","&gt","$thtitle");
            $thdesc=str_replace("<","&lt","$thdesc");
            $thdesc=str_replace(">","&gt","$thdesc");

            $usersno=$_SESSION['usersno'];

            $sql="insert into threads(thread_title,thread_desc,thread_cat_id,thread_user_id,timestamp) values('$thtitle','$thdesc','$id','$usersno',current_timestamp())";

            $result=mysqli_query($conn,$sql);

            if($result==1)
            {
                echo '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!!..</strong> Your Query has been submitted into the threads wait some time for while someone answer your question.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                
                ';
            }
            else
            {
                echo'
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> Something have a problem please check it once.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                
                ';
            }
        }
    
    
    ?>

    <!----  using jumbotron for showing single categories  start--->

    <div class="container my-4">

        <div class="jumbotron bg-light  text-center">
            <!-- jumbotron of bootstrap used here -->
            <h3 class="display-4">Welcome To <?php echo $catname ?> forums</h3>
            <p class="lead"><?php echo $catdes ?></p>
            <hr class="my-4">
            <p class="fw-bold text-danger">Be civil. Don't post anything that a reasonable person would consider
                offensive, abusive, or hate speech.
                Keep it clean. Don't post anything obscene or sexually explicit.
                Respect each other. Don't harass or grief anyone, impersonate people, or expose their private
                information.
                Respect our forum.</p>
            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
        </div>
    </div>

     <!----  using jumbotron for showing single categories  End--->


    <!---  Discussion --->

    <div class="container my-4">
        <h3 class="my-4">Start a Discussion</h3>
        <?php

        // checking someone has logged in or not...

        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
        {
            echo 
                '<form action="" method="POST">
                    <div class="mb-3">
                        <label for="problem" class="form-label">Problem Title</label>
                        <input type="text" class="form-control" id="problem" name="problem" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">Keep Your title as short and crisp as possible</div>
                    </div>
                    <div class="mb-3">
                        <label for="desc" class="form-label">Elaborate your concern</label>
                        <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>';
        }

        else
        {
            echo '<p class="text-warning"><b>You are not logged in. Please login to be able to post a comment</b></p>';
        }
           
        ?>
    </div>

    <div class="container" id="ques">
        <h3>Browse Questions</h3>
        <?php
            $limit=5;
            $page=$_GET['page'];
            $offset=($page-1)*$limit;

            $sql="select * from threads where thread_cat_id='$id'";
            $result=mysqli_query($conn,$sql);
            $threadbool=true;

            $total_number=mysqli_num_rows($result);
            $total_page=ceil($total_number/$limit); 
                    
                $sql2="select * from threads where thread_cat_id='$id' limit {$offset}, {$limit}";
                $result2=mysqli_query($conn,$sql2);
                while($data=mysqli_fetch_assoc($result2))
                {
                    $threadbool=false;
                    $threadid=$data['thread_id'];
                    $thtitle=$data['thread_title'];
                    $thdesc=$data['thread_desc'];
                    $thtime=$data['timestamp'];
                    $user=$data['thread_user_id'];

                    $sql3="select user_email from users where sno='$user'";
                    $result3=mysqli_query($conn,$sql3);
                    $data=mysqli_fetch_assoc($result3);
                    $userEmail=$data['user_email'];

                
                    echo       // Media object used of bootstrap
                        '<div class="d-flex my-4">  
                                <div>
                                    <img src="images/person.png" width="30">
                                </div>
                                <div class="mx-3">
                                        <p class="my-0"><b>'.$userEmail.' ['.$thtime.']</b></p>
                                    <h5> <a class="text-decoration-none" href="thread.php?threadid='.$threadid.'">'. $thtitle .'</a></h5>
                                    '.  $thdesc .'
                                </div>
                            </div>';
                }
                   

            
            
            ?>
            
            <div class="row my-4">
               
                <div class="col-md-4"></div>
                <div class="col-md-4">   
                    
                <?php

                    if($page>1)
                    {
                        $prev=($page-1);
                        echo '<a href="threadlist.php?catid='.$id .'&page='.$prev.'" class="btn btn-success">Previous</a>';
                    }
                ?>
                
                    
                    <?php

                    for($i=1; $i<=$total_page; $i++)
                    {
                            if($i==$page)
                            {
                                $active="dark";
                            }
                            else
                            {
                                $active="";
                            }
                        echo '<a href="threadlist.php?catid='.$id.'&page='.$i.'" class="btn btn-success mx-1 btn btn-'.$active.'">'.$i.'</a>';
                    }
                    ?>
                      <?php 
                      
                        if($page<$total_page)
                        {
                            $next=$page+1;
                            echo '<a href="threadlist.php?catid='.$id.'&page='.$next.'" class="btn btn-success">Next</a>';
                        }
                      ?>  
                           
                </div>
                <div class="col-md-4"></div>
            </div>

        <?php

            if($threadbool)
            {
                echo '<div class="jumbotron jumbotron-fluid bg-light">
                <div class="container my-4">
                  <h1 class="display-4">No Threads Found</h1>
                  <p class="lead">Be the first person to ask a question.</p>
                </div>
              </div>';
            }
        ?>

    </div>
    <?php include('partials/_footer.php')?>

    
</body>

</html>