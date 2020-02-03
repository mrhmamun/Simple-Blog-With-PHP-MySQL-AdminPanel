<?php
session_start();
require "../vendor/autoload.php";
use App\classes\Category;

$category = new Category();
$queryResult = $category->viewCategory();
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

           <div class="card">
              <div class="card-header h4">
                  Category
                <span class="float-right"><a href="add-category.php" class="btn btn-primary">Add Category</a></span>
              </div>
           <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Sl.</th>
                        <th>Category Name</th>
                        <th>Category Description</th>
                        <th>Publication Status</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $i=1;
                    while($categories= mysqli_fetch_assoc($queryResult)){?>
                    <tr>
                        <td><?php echo $i++ ?></td>
                        <td><?php echo $categories['cat_name']?></td>
                        <td><?php echo $categories['cat_desc']?></td>
                        <td><?php echo $categories['status'] == 1?'Published':'Unpublished'?></td>
                        <td>
                            <a href="">Edit ||</a>
                            <a href="">Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                </div>
           </div>
       </div>


   </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>
