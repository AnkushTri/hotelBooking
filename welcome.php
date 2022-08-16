<?php
   include_once("header.php");
   //session check
   if($_SESSION["email"])
   {
    //store
    $email = $_SESSION["email"];
   }
   else{
    echo "<script>window.location.assign('login.php?msg=Unauthorised user')</script>";
   }
?>
<?php
    require_once("footer.php");
?>