<?php
session_start();
require "../vendor/autoload.php";
use App\classes\Category;
$message="";

$post = new \App\classes\Post();
$category= $post->getPublishedCategory();

if (isset($_POST['btn'])){
    $message = $post->addPostInfo();
}

?>


<html>
<head>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
<?php include 'includes/navbar.php';?>
<div class="container">
    <div class="row">
        <div class="offset-2 col-md-8 mt-5">
            <h4 class="text-success"><?php echo $message ?></h4>
            <div class="card">
                <div class="card-header h4 text-center">
                    Add Post
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Category Name</label>
                            <select name="cat_id" class="form-control">
                                <option>--Select Category Name--</option>
                                <?php while ($catName = mysqli_fetch_assoc($category)){?>
                                <option value="<?php echo $catName['id'] ?>">
                                    <?php echo $catName['cat_name'] ?></option>
                                <?php }?>
                                 ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Post Title</label>
                            <input type="text" name="post_title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Post Short Description</label>
                            <textarea name="short_desc" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Post Long Description</label>
                            <textarea name="long_desc" class="form-control" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Post Image</label>
                            <input type="file" name="post_image" class="form-control-file"></input>
                        </div>
                        <div class="form-group">
                            <label>Publication Status</label>
                            <select class="form-control" name="status">
                                <option>--Select Publication Status--</option>
                                <option value="1">Published</option>
                                <option value="0">Unpublished</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="btn" class="btn btn-primary btn-block">Add Post</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>


    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>
