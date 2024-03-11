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
        #ques{
            min-height:444px;
        }
    </style>
    <title>Welcome to iDiscuss - Coding Discuss</title>
</head>

<body>

    <?php
        include('partials/_dbconnection.php');

        $id=$_GET['threadid'];
        $sql="select * from threads where thread_id='$id'";
        $result=mysqli_query($conn,$sql);

        while($data=mysqli_fetch_assoc($result))
        {
            $title=$data['thread_title'];
            $desc=$data['thread_desc'];
            $thread_user_id=$data['thread_user_id'];
        }

        $sql2="select user_email from users where sno='$thread_user_id'";
        $result2=mysqli_query($conn,$sql2);

        $data=mysqli_fetch_assoc($result2);

        $browseEmail=$data['user_email'];
    
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
    
    $cmmnt=$_SERVER['REQUEST_METHOD'];
    if($cmmnt=='POST')
    {
        $comment=$_POST['comment'];
        
        $comment=str_replace("<","&lt","$comment");
        $comment=str_replace(">","&gt","$comment");

        $comment_by=$_SESSION['useremail'];

        $sql="insert into comments(comment_content,thread_id,comment_by,comment_time) values('$comment','$id','$comment_by',current_timestamp())";
        $res=mysqli_query($conn,$sql);

        if($res>0)
        {
            echo '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sended!!..</strong> Your Query has been submitted into the threads.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            
            ';
        }
    }


?>
    <div class="container my-4">

        <div class="jumbotron bg-light">
            <!-- jumbotron of bootstrap used here -->
            <h3 class="display-4"><?php echo $title ?></h3>
            <p class="lead"><?php echo $desc ?></p>
            <hr class="my-4">
            <p class="text-end">postby: <b><?php echo $browseEmail; ?></b></p>
            <p class="fw-bold text-danger my-4">Be civil. Don't post anything that a reasonable person would consider
                offensive, abusive, or hate speech.
                Keep it clean. Don't post anything obscene or sexually explicit.
                Respect each other. Don't harass or grief anyone, impersonate people, or expose their private
                information.
                Respect our forum.</p>
                
        </div>
    </div>

   

    <div class="container my-4">
        <h3>Post a Comment</h3>
        <?php

          if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
          {
            echo
                ' <form action="" method="POST">
                    <div class="mb-3">
                        <label for="comment" class="form-label">Type Your Comment</label>
                        <textarea class="form-control" id="comment" name="comment" rows="5"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Post Comment</button>
                </form>';
          } 
          else
          {
            echo '<p class="text-warning"><b>You are not logged in. Please login to be able to post a comment</b></p>';
          }
        
        
        ?>
        
    </div>

    <div class="container" id="ques">
        <h3>Discussion</h3>
        
        <?php
        
            $sql="select * from comments where thread_id='$id'";
            $res=mysqli_query($conn,$sql);
            $avlcomments=true;
            while($data=mysqli_fetch_assoc($res))
            {
                $avlcomments=false;
                $content=$data['comment_content'];
                $content_time=$data['comment_time'];
                $content_person=$data['comment_by'];
                
                echo'
                    <div class="d-flex my-4">
                        <div>
                            <img src="images/person.png" width="30">
                        </div>
                        <div class="mx-3">
                            <b>'.$content_person.'  at '.$content_time.'</b>
                              <p> '.$content.' </p>
                        </div>
                    </div>  ';
                
                
            }
            
            if($avlcomments)
            {
                echo'<div class="jumbotron jumbotron-fluid bg-light">
                <div class="container my-4">
                  <h1 class="display-4">No Comments Found</h1>
                  <p class="lead">Be the first person you can give your comments.</p>
                </div>
              </div>';
            }
        
        ?>

    </div>
    <?php include('partials/_footer.php')?>
</body>

</html>