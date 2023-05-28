<?php 
$coon = mysqli_connect('localhost','root','','cardion');

function query($query){
    global $coon;
    $result = mysqli_query($coon,$query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $row[] = $row;
    }
    return $row;
}

function find_name($keyword){
    $query = "SELECT * FROM sport 
    WHERE
    name LIKE '%$keyword%'";
    return query($query);
}

function find_address($keyword){
    $query = "SELECT * FROM sport 
    WHERE
    address LIKE '%$keyword%'";
    return query($query);
}





?>