<!-- <h2>Click to Search Again</h2> -->

<?php
session_start();
unset($_SESSION['check']);
header("Location:Search.php");
?> 	
