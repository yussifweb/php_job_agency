<?php 
require 'connect.php'; 
// session_start();

$id = $_GET['id'];

$sql = "DELETE FROM jobs WHERE id = '$id' ";


if (mysqli_query($connect, $sql)) {
    header('Location: jobs.php');
    // echo "<script>alert('Record Updated');</script>";
} else {
    echo 'Error deleting record' . $sql . '<br/>' . mysqli_error($connect);
}            

?>