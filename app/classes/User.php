<?php

namespace App\classes;

class User
{
    public function adminLoginCheck(){
        $password = md5($_POST['password']);
        $sql = "SELECT * FROM users WHERE email = '$_POST[email]' AND password='$password'";
        if($queryResult = mysqli_query(Database::dbCon(),$sql)){
            $user = mysqli_fetch_assoc($queryResult);
            if($user){
                session_start();
                $_SESSION['id'] = $user['id'];
                $_SESSION['name'] = $user['name'];
                header('Location:dashboard.php');
            } else {
                $message = "* Invalid Email or Password";
                return $message;
            }
        } else {
            die('Query Problem'.mysqli_error(Database::dbCon()));
        }
    }

    public function adminLogout(){
        unset($_SESSION['id']);
        unset($_SESSION['name']);

        header('Location:index.php');
    }
}