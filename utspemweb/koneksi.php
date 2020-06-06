<?php

class koneksi 
{
    
    var $host = 'localhost';
    var $user = 'root';
    var $pass = '';
    var $name = 'utspemweb';
    var $con;

    function __construct()
    {
        $this->con = mysqli_connect(
            $this->host, 
            $this->user, 
            $this->pass, 
            $this->name);
    }

    function insertdata($n, $e, $s){
        $get_id = mysqli_query($this->con, 'select max(id) as maks from utsgame');
        $id = mysqli_fetch_array($get_id);
        $new_id = $id['maks'] + 1;

        $sql = "insert into utsgame values('$new_id', '$n', '$e', '$s')";
        mysqli_query($this->con, $sql);
    }
}