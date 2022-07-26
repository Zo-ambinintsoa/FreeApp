<?php 

if (!isset($_GET['id'])) {
    header('location: index.php');
}

$id = $_GET['id'];