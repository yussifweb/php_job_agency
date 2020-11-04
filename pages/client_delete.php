<?php 
require '../config/connect.php'; 
// session_start();

$id = $_GET['id'];

$sql = "DELETE FROM clients WHERE id = '$id' ";


if (mysqli_query($conn, $sql)) {
    header('Location: clients.php');
    // echo "<script>alert('Record Updated');</script>";
} else {
    echo 'Error deleting record' . $sql . '<br/>' . mysqli_error($conn);
}            

?>