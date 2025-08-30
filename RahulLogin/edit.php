<?php
include 'conection.php';
?>
<?php
$id="";
$id = $_GET['id'];
$query = mysqli_query($conn,"SELECT * FROM rahul WHERE id='$id' ");
$row = mysqli_fetch_assoc($query);
if(isset($_POST["update"])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $sql = mysqli_query($conn, "UPDATE rahul SET name = '$name',email = '$email', password = '$pass' WHERE id= '$id'");
    if($sql){
        echo 'SUCCESSFULL';
        header('location: read.php');
    }else {
        echo 'failed';
    }
}
?>
<form method="POST">
    Name: <input type="text" name="name" value="<?= $row['name'] ?>" required><br>
    Email: <input type="email" name="email" value="<?= $row['email'] ?>" required><br>
    Password: <input type="password" name="password" value="<?= $row['password'] ?>" required><br>
    <button type="submit" name="update">Update</button>
</form>

