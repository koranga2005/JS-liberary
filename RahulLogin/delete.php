<?php
include 'conection.php';

$id="";
$id = $_GET['id'];
// echo $id;    

$sql = mysqli_query($conn, "DELETE FROM rahul WHERE id='$id'");
if($sql){
    echo "<script>alert('record delete succesfull');</script>";
    header("location: read.php");
}else{
    echo "error in code";
}
?>