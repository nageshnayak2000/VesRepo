<!-- <h2>Click to Search Again</h2> -->

<?php
session_start();
unset($_SESSION['fname']);
header("Location:Search.php");
?> 	
