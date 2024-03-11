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


    <!-- About 4 - Bootstrap Brain Component -->
    <section class="py-3 py-md-5 py-xl-8">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-10 col-lg-8">
                    <h3 class="fs-5 mb-2 text-secondary text-uppercase">About</h3>
                    <h2 class="display-8 mb-4">iDiscuss forums is an online discussion board where people can ask questions, share their experiences, and discuss topics of mutual interest.

Forums are an excellent way to create social connections and a sense of community. They can also help you to cultivate an interest group about a particular subject..</h2>
                    <a href="index.php" class="btn btn-lg btn-primary mb-3 mb-md-4 mb-xl-5">Connect Now</a>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row gy-3 gy-md-4 gy-lg-0">
                <div class="col-12 col-lg-6">
                    <div class="card bg-light p-3 m-0">
                        <div class="row gy-3 gy-md-0 align-items-md-center">
                            <div class="col-md-5">
                                <img src="images/about-img-2.jpg" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-7">
                                <div class="card-body p-0">
                                    <h2 class="card-title h4 mb-3">Why Choose Us?</h2>
                                    <p class="card-text lead">With years of experience and deep industry knowledge, we
                                        have a proven track record of success and are pushing ourselves to stay ahead of
                                        the curve.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="card bg-light p-3 m-0">
                        <div class="row gy-3 gy-md-0 align-items-md-center">
                            <div class="col-md-5">
                                <img src="images/about-img-1.jpg" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-7">
                                <div class="card-body p-0">
                                    <h2 class="card-title h4 mb-3">Visionary Team</h2>
                                    <p class="card-text lead">With a team of visionary engineers, developers, and
                                        creative minds, we embark on a journey to transform complex challenges into
                                        ingenious technological solutions.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php include('partials/_footer.php')?>
</body>

</html>