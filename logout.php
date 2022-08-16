<?php
    session_start();
    unset($_SESSION["email"]);
    echo"<script>window.location.assign('login.php?msg=Logout succussfullly')</script>"
?>