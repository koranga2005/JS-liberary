<?php
session_start();
include("conection.php");

$defaultpage = 'dashboard.php'; 


if(isset($_SESSION['url'])){
    $defaultpage = $_SESSION['url'];
}


// if(isset($_POST['login'])){
//     $email = $_POST['email'];
//     $password = $_POST['password'];
     
//     $loginsql = mysqli_query($conn,  "SELECT * FROM login WHERE email='$email' AND password='$password' ");
//     if(mysqli_num_rows($loginsql)>0){
//         while($row = mysqli_fetch_assoc($loginsql)){
//             $_SESSION['name'] = $row['name'];
//             $_SESSION['email'] = $row['email'];
//             $_SESSION['password'] = $row['password'];
//             $_SESSION['login'] = true;
//         }
//         echo "<script>alert('Login');window.location.href='read.php'</script>";
//     }else{
//         echo "<script>alert('Not Login');window.location.href='index.php'</script>";

//     }
// }


if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
     
    $loginsql = mysqli_query($conn,  "SELECT * FROM login WHERE email='$email' ");
    if(mysqli_num_rows($loginsql)>0){
        while($row = mysqli_fetch_assoc($loginsql)){

            if(password_verify($password,$row['password'])){
            $_SESSION['name'] = $row['name'];
            $_SESSION['login'] = true;
            echo "<script>alert('Login Successfully');window.location.href='read.php'</script>";
            }else{
            echo "<script>alert('Incorrect Password');window.location.href='index.php'</script>";
            }

        }
        
    }else{
        echo "<script>alert('Not Login');window.location.href='index.php'</script>";

    }
}
?>
<?php

include "conection.php";

if(isset($_POST['submit_student'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $hashpassword = password_hash($password, PASSWORD_DEFAULT);
    
    $sql = mysqli_query($conn , "INSERT INTO  login (name ,email,password) VALUES ('$name','$email','$hashpassword')");
    if($sql){
        echo "<script>alert('ho gya'); window.location.href= 'index.php'</script>";
    }else{
        echo "<script>alert('nahi hua'); window.location.href= 'about.php'</script>";
    }
} else{
    echo "<script>alert('mila nhi')</script>";
}
?>
