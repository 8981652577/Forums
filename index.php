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

            min-height:423px;
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

    <div class="row">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/coding.jpg" style="height:500px;" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="images/lappy.jpg" style="height:500px" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="images/laptop_mobile.jpg" style="height:500px" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </div>

    <!----- categories fetch from database --->

        <div class="container" id="ques">
            <h2 class="text-center my-3">iDiscuss-Browse Categories</h2>
            <div class="row">
    <?php

        include('partials/_dbconnection.php');
        $sql="select * from categories";

        $result=mysqli_query($conn,$sql);

        $numb=mysqli_num_rows($result);
        
        if($numb>0)
        {
            while($data = mysqli_fetch_assoc($result))
            {
                $catid=$data['category_id'];
                $name= $data['category_name'];
                $img= $data['images'];
                $description=$data['category_description'];
                
                echo ' 
                
                    <!--Use a while loop to iterate through categories -->
                    
                    <div class="col-md-4 my-3">
                        <div class="card" style="width: 18rem;">
                            <img src="images/'.$img.'" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><a class="text-decoration-none" href="threadlist.php?catid='.$catid.'&page=1" >'.$name.'</a></h5>
                                <p class="card-text">'. substr($description,0,50).'...</p>
                                <a href="threadlist.php?catid='.$catid.'&page=1" class="btn btn-primary">View Threads</a>
                            </div>
                        </div>
                    </div>';
            }
        }

    ?>

    </div>
    </div>
    <?php include('partials/_footer.php')?>
</body>

</html>