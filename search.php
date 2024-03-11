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

            min-height:823px;
        }
    </style>
    <title>Welcome to iDiscuss - Coding Discuss</title>
</head>

<body>

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
    <?php include('partials/_dbconnection.php');?>
    
    
    <?php
        $question=$_GET['search'];
        $sql="select * from threads where match(thread_title,thread_desc) against('.$question.')";
        $result=mysqli_query($conn,$sql);

        $num=mysqli_num_rows($result);

        echo 
                '<div class="container" id="ques">
                <h1>Search Result for <em>"'.$question.'"</em></h1>';
        if($num>0)
        {
            while($data=mysqli_fetch_assoc($result))
            {
                $thread_title=$data['thread_title'];
                $thread_desc=$data['thread_desc'];
                $thread_id=$data['thread_id'];
    
                $url="thread.php?threadid=".$thread_id;
                echo 
                    
                    '<h5><a href="'.$url.'" class=" text-decoration-none">'.$thread_title.'</a></h5>
                    <p>'.$thread_desc.'</p>';
                    
            }
        }
        else
        {
            echo
            '<div class="jumbotron jumbotron-fluid bg-light">
            <div class="container my-4">
              <h1 class="display-4">No Threads Found</h1>
              <p class="lead">Suggestions:

              <ul>
                    <li>Make sure that all words are spelled correctly.</li>
                    <li>Try different keywords.</li>
                    <li>Try more general keywords.</li>
              </ul>
              
              </p>
            </div>
          </div>';
        }
       
    ?>
     </div>
    


    
  
    <?php include('partials/_footer.php')?>
</body>

</html>