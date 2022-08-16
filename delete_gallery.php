<?php
$id=$_REQUEST['id'];
include("configlearn.php");
$q="DELETE FROM `gallery`WHERE id='$id'";
$result=mysqli_query($conn,$q);
if($result>0){
 echo "<script>window.location.assign('manage_gallery.php?msg=Record Deleted')</script>";
}
else{
 echo "<script>window.location.assign('manage_gallery.php?msg=Try Again')</script>";

}
?>



