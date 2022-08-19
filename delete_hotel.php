<?php
$id=$_REQUEST['id'];
include("config.php");
$q="DELETE FROM `hotel`WHERE id='$id'";
$result=mysqli_query($conn,$q);
if($result>0){
 echo "<script>window.location.assign('manage_hotel.php?msg=Record Deleted')</script>";
}
else{
 echo "<script>window.location.assign('manage_hotel.php?msg=Try Again')</script>";

}
?>



