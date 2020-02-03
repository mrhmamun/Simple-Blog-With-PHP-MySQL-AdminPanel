<?php


namespace App\classes;


class Frontend
{

    public function getAllPublishedCategory(){
        $sql = "SELECT * FROM categories WHERE status =1";
        if ($queryResult= mysqli_query(Database::dbCon(),$sql)){
            return $queryResult;
        }else{
            die('Query Problem'.mysqli_error(Database::dbCon()));
        }
    }
    public function getAllPublishedPost(){
        $sql = "SELECT * FROM posts WHERE status =1";
        if ($queryResult1= mysqli_query(Database::dbCon(),$sql)){
            return $queryResult1;
        }else{
            die('Query Problem'.mysqli_error(Database::dbCon()));
        }
    }

public function getPostById($id){
        $sql = "SELECT * FROM posts WHERE id='$id'";
    if ($queryResult3= mysqli_query(Database::dbCon(),$sql)){
        return $queryResult3;
    }else{
        die('Query Problem'.mysqli_error(Database::dbCon()));
    }
}

}