<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Welcome to iDiscuss - Coding Discuss</title>

    <style>
        #ques
        {
            min-height:888px;
        }
    </style>
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



    
    <?php

        include('partials/_dbconnection.php');

        if($_SERVER['REQUEST_METHOD']=="POST")
        {
                $name=$_POST['name'];
                $email=$_POST['email'];
                $subject=$_POST['subject'];
                $comment=$_POST['comment'];

            $sql="insert into contact_us(name,email,subject,comments) values('$name','$email','$subject','$comment')";

            $result=mysqli_query($conn,$sql);

            if($result==1)
            {
               echo
                ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!!..</strong> Your problem has been submitted please wait sometime while we will contact you.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
            }
            else
            {
                echo
                    '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> Something have a problem please check it once.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
                

        }
        
    ?>


    <div class="container" id="ques">
        <h1 class="text-center">Contact Us</h1>
        <p class="text-center my-4">Do you have any questions? Please do not hesitate to contact us directly. Our team
            will come back to you within a matter of hours to help you.</p>

        <form action="" method="post">
            <div class="row my-3">
                <div class="col-md-6">
                    <label class="form-label">name</label>
                    <input type="text" placeholder="Your Name" name="name" id="name" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email" placeholder="Your Email" name="email" id="email" class="form-control">
                </div>
            </div>
            <div class="row my-3">
                <div class="col-md-12">
                    <label class="form-label">Subject</label>
                    <input type="text" name="subject" id="subject" class="form-control">
                </div>
            </div>

            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                    style="height: 100px" name="comment"></textarea>
                <label for="floatingTextarea2">Comments</label>
            </div>

            <input type="submit" class="btn btn-success my-4" name="submit">
        </form>



    </div>



    <?php include('partials/_footer.php')?>
</body>

</html>