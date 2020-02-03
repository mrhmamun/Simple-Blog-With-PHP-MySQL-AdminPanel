<?php


namespace App\classes;


class Post
{
public function getPublishedCategory(){
    $sql = "SELECT * FROM categories WHERE status = 1";
    if ($queryResult= mysqli_query(Database::dbCon(),$sql)){
        return $queryResult;
    }else{
        die('Query Problem'.mysqli_error(Database::dbCon()));
    }
}

public function addPostInfo(){
    $directory = 'images/';
    $imageUrl = $directory.$_FILES['post_image']['name'];
    $fileType = pathinfo($_FILES['post_image']['name'],PATHINFO_EXTENSION);
    $check = getimagesize($_FILES['post_image']['tmp_name']);
    if($check){
        if($fileType != "jpg" && $fileType!="png"){
            die('File type is not supported. Please upload a jpg or png file');
        } else {
            if(file_exists($imageUrl)){
                die('This image already exists. Please select another one.');
            } else {
                if($_FILES['post_image']['size'] > 2000000){
                    die('Image file size too large');
                } else {
                    move_uploaded_file($_FILES['post_image']['tmp_name'],$imageUrl);
                    $sql = "INSERT INTO posts (cat_id,post_title,short_desc,long_desc,post_image,status) VALUES ('$_POST[cat_id]','$_POST[post_title]','$_POST[short_desc]','$_POST[long_desc]','$imageUrl','$_POST[status]')";

                    if(mysqli_query(Database::dbCon(),$sql)){
                        return "Post Added Successfully";
                    } else {
                        die("Query Problem".mysqli_error(Database::dbCon()));
                    }
                }
            }
        }
    } else {
        die('Please choose a image file.');
    }


}
    public function viewPostInfo(){
        $sql = "SELECT p.*,c.cat_name FROM posts as p, categories as c WHERE p.cat_id = c.id";
        if ($queryResult=  mysqli_query(Database::dbCon(),$sql)){
            return $queryResult;
        }else{
            die('Query Problem'.mysqli_error(Database::dbCon()));
        }

    }

    public function getPostInfoId($id){
    $sql= "SELECT * FROM posts where id='$id'";
        if ($queryResult=  mysqli_query(Database::dbCon(),$sql)){
            return $queryResult;
        }else{
            die('Query Problem'.mysqli_error(Database::dbCon()));
        }
    }

    public function updatePostInfo(){
    $postImage = $_FILES['post_image']['name'];
    if($postImage){
        $sql = "SELECT * FROM posts WHERE id = '$_POST[id]'";
        $queryResult = mysqli_query(Database::dbCon(),$sql);
        $postInfo = mysqli_fetch_assoc($queryResult);
        unlink($postInfo['post_image']);
        $directory = 'images/';
        $imageUrl = $directory.$_FILES['post_image']['name'];
        $fileType = pathinfo($_FILES['post_image']['name'],PATHINFO_EXTENSION);
        $check = getimagesize($_FILES['post_image']['tmp_name']);
        if($check){
            if($fileType != "jpg" && $fileType!="png"){
                die('File type is not supported. Please upload a jpg or png file');
            } else {
                if(file_exists($imageUrl)){
                    die('This image already exists. Please select another one.');
                } else {
                    if($_FILES['post_image']['size'] > 2000000){
                        die('Image file size too large');
                    } else {
                        move_uploaded_file($_FILES['post_image']['tmp_name'],$imageUrl);
                        $sql = "UPDATE posts SET cat_id = '$_POST[cat_id]', post_title='$_POST[post_title]',short_desc='$_POST[short_desc]',long_desc='$_POST[long_desc]',post_image='$imageUrl', status='$_POST[status]' WHERE id = '$_POST[id]'";

                        if(mysqli_query(Database::dbCon(),$sql)){
                            header('Location:post.php');
                        } else {
                            die("Query Problem".mysqli_error(Database::dbCon()));
                        }
                    }
                }
            }
        } else {
            die('Please choose a image file.');
        }
    }else{
        $sql = "UPDATE posts SET cat_id = '$_POST[cat_id]', post_title='$_POST[post_title]',short_desc='$_POST[short_desc]',long_desc='$_POST[long_desc]', status='$_POST[status]' WHERE id = '$_POST[id]'";

        if(mysqli_query(Database::dbCon(),$sql)){
            header('Location:post.php');
        } else {
            die("Query Problem".mysqli_error(Database::dbCon()));
        }
    }



    }

    public function deletePostInfo($id){
        $sql = "DELETE FROM posts WHERE id = '$id'";

        if (mysqli_query(Database::dbCon(),$sql)){
            header('Location:post.php');
        }else{
            die("Query Problem".mysqli_error(Database::dbCon()));
        }
    }
}