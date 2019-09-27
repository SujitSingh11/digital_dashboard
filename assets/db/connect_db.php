<?php
    /* Database connection settings */
    $conn = mysqli_connect('localhost','root','','flow');

      	if (!$conn) {
      		die("connection failed " . mysqli_connect_error());
      	}

?>
