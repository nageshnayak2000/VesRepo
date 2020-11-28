<?php
    session_start();
    unset($_session['loggedin']);
    header("Location:login.php");
?>