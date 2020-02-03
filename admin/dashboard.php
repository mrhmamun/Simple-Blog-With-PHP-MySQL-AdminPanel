<?php
session_start();
if($_SESSION['id']==null){
   header('Location:index.php');
}
require "../vendor/autoload.php";
use App\classes\User;

$user =new User();


if (isset($_GET['logout'])){
    $user->adminLogout();
}
?>
<html>
<head>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
<?php include 'includes/navbar.php';?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>