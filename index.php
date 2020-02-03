<?php
require "vendor/autoload.php";
use App\classes\Frontend;
$front=new Frontend();
$queryResult =  $front->getAllPublishedCategory();
$queryResult1 =  $front->getAllPublishedPost();
$posts = mysqli_fetch_assoc($queryResult1);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>My Blog</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/heroic-features.css" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">My Blog</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <?php while($categories = mysqli_fetch_assoc($queryResult)){?>
                <li class="nav-item">
                    <a class="nav-link" href="#"><?php echo $categories['cat_name']?></a>
                </li>
                <?php }?>

            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container">

    <!-- Jumbotron Header -->
    <header class="jumbotron my-4">
        <img class="card-img-top" src="admin/<?php echo $posts['post_image']; ?> " alt="" ">
        <h1 class="display-3"><?php echo $posts['post_title']; ?></h1>
        <p class="lead"><?php echo $posts['short_desc']; ?></p>
        <a href="blog-post.php?id=<?php echo $posts['id']; ?>" class="btn btn-primary btn-lg">Read More</a>
    </header>

    <!-- Page Features -->
    <div class="row text-center">
        <?php while($posts = mysqli_fetch_assoc($queryResult1)){?>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card h-100">
                <img class="card-img-top" src="admin/<?php echo $posts['post_image']; ?> " alt="" width="200" height="200">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $posts['post_title']; ?></h4>
                    <p class="card-text"><?php echo $posts['short_desc']; ?></p>
                </div>
                <div class="card-footer">
                    <a href="blog-post.php?id=<?php echo $posts['id']; ?>" class="btn btn-primary">Read More!</a>
                </div>
            </div>
        </div>
        <?php }?>



    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
