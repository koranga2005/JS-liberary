<?php
include "conection.php"?>

<?php
if(isset($_POST['save'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $sql = mysqli_query($conn, "INSERT INTO rahul (`name`,`email`,`password`) VALUE ('$name','$email','$pass')" );


    if($sql) {
        echo "Successful";
        header("location: read.php");
    }else {
        echo "Failed";
    }
    

    
// if(isset($_POST['save'])){
//     // $id = $_POST['id'];
//     $name = $_POST['name'];
//     $email = $_POST['email'];
//     $pass = $_POST['password'];
//     // $hashPass = password_hash($Password, PASSWORD_DEFAULT);

//     $sql = "INSERT INTO rahul ('id','name','email','password') VALUE ('$id','$name','$email','$pass')";
//     $query =  mysqli_query($conn, $sql);

//     if($query) {
//         echo  'data inserted sucesfull';
//     }else {
//         echo  'Failed';
//     }
// }
}
?>

<form method="POST">
    Name: <input type="text" name="name" required><br>
    Email: <input type="email" name="email" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit" name="save">Save</button>
</form>

