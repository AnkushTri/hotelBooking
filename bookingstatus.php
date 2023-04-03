<?php
$id=$_REQUEST['id'];
$status=$_REQUEST['status'];

include("config.php");
$q="UPDATE `booking` SET `booking_status`='$status' WHERE id='$id'";
$result=mysqli_query($conn,$q);
if($result>0){
 echo "<script>window.location.assign('view_booking.php?msg=Status Updated')</script>";
}
else{
 echo "<script>window.location.assign('view_booking.php?msg=Try Again')</script>";

}
?>