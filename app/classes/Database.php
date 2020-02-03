<?php

namespace App\classes;

class Database
{
    public function dbCon(){
        $hostname = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'newBlog';
        $link = mysqli_connect($hostname,$username,$password,$dbname);
        return $link;
    }
}