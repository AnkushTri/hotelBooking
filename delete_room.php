<?php
$id=$_REQUEST['id'];
include("config.php");
$q="DELETE FROM `room`WHERE id='$id'";
$result=mysqli_query($conn,$q);
if($result>0){
 echo "<script>window.location.assign('manage_room.php?msg=Record Deleted')</script>";
}
else{
 echo "<script>window.location.assign('manage_room.php?msg=Try Again')</script>";

}
?>