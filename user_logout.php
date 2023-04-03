<?php
    session_start();
    unset($_SESSION["user_email"]);
    echo"<script>window.location.assign('user_login.php?msg=Logout succussfullly')</script>"
?>