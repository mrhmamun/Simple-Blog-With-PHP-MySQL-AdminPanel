<?php
session_start();
require "../vendor/autoload.php";
use App\classes\Category;
$message="";

$category = new Category();
if (isset($_POST['btn'])){
   $message = $category->addCategory();
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
        <div class="offset-3 col-md-6 mt-5">
            <h4 class="text-success"><?php echo $message ?></h4>

            <div class="card">
                <div class="card-header h4 text-center">
                   Add Category
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" name="cat_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Category Description</label>
                            <textarea name="cat_desc" class="form-control"></textarea>
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
                            <button type="submit" name="btn" class="btn btn-primary btn-block">Add Category</button>
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
