<?php


namespace App\classes;


class Category
{
public function addCategory(){
    $sql = "INSERT INTO categories(cat_name,cat_desc,status) VALUES ('$_POST[cat_name]', '$_POST[cat_desc]','$_POST[status]')";
    if (mysqli_query(Database::dbCon(),$sql)){
        return "Category Added Successfully";
    }else{
        die('Query Problem'.mysqli_error(Database::dbCon()));
    }
}

public function viewCategory(){

    $sql = "SELECT * FROM categories";
    if ($queryResult=  mysqli_query(Database::dbCon(),$sql)){
        return $queryResult;
    }else{
        die('Query Problem'.mysqli_error(Database::dbCon()));
    }

}


}


