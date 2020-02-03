<?php
session_start();
if (isset($_SESSION['id'])){
    header('Location:dashboard.php');
}
require_once "../vendor/autoload.php";

use App\classes\User;
$message = '';

$user = new User();
if (isset($_POST['btn'])){
 $message = $user->adminLoginCheck();
}
?>

<html>
<head>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="offset-3  col-md-6 mt-5" >
        <div class="card">
            <div class="card-header text-center">
                Admin Login Panel
            </div>
            <div class="card-body">
                <small class="text-danger "><?php echo $message;?></small>

                <form action="" method="post">
                    <div class="form-group">
                        <label>Email address</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter email">

                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <button type="submit" name="btn" class="btn btn-primary">Login</button>
                </form>

            </div>
        </div>
    </div>
</div></div>
</body>
</html>
