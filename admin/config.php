<?php
$server="localhost";
$username="root";
$password="";
$db="hotelbooking";
$conn = mysqli_connect($server,$username,$password,$db);
//if connection not established
if(!$conn)
{
    //error msg print
    echo mysqli_error($conn);
}
?>