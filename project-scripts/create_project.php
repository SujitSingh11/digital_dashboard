<?php

 include '../assets/db/connect_db.php';
session_start();

$result = $conn->query("INSERT INTO fl_project (manager_id) VALUES ($_SESSION['manager_id'])");
?>
