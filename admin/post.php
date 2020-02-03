<?php
session_start();
require "../vendor/autoload.php";
use App\classes\Post;
$post= new Post();
$queryResult = $post->viewPostInfo();
if (isset($_GET['delete'])){
    $post->deletePostInfo($_GET['id']);
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
        <div class="offset-2 col-md-10 mt-5">

            <div class="card">
                <div class="card-header h4">
                    Posts
                    <span class="float-right"><a href="add-post.php" class="btn btn-primary">Add Posts</a></span>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Sl.</th>
                            <th>Category Name</th>
                            <th>Post Title</th>
                            <th>Post Short Description</th>
                            <th>Post Image</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        $i=1;
                        while($posts= mysqli_fetch_assoc($queryResult)){?>
                        <tr>
                            <td><?php echo $i++ ;?></td>
                            <td><?php echo $posts['cat_name']; ?></td>
                            <td><?php echo $posts['post_title'];?></td>
                            <td><?php echo $posts['short_desc'];?></td>
                            <td><img src="<?php echo $posts['post_image'];?>" width="200" height="150"></td>
                            <td><?php echo $posts['status']== 1?'Published':'Unpublished';?></td>
                            <td>
                                <a href="edit-post.php?id=<?php echo $posts['id'];?>">Edit ||</a>
                                <a href="?delete&id=<?php echo $posts['id'];?>">Delete</a>
                            </td>
                        </tr>
                        <?php }?>

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
