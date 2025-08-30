<?php
include('connection.php');
date_default_timezone_set("Asia/Kolkata");
$dated = date('Y-m-d');
$time = date('H:i:s');
// Insert Code
if(isset($_POST['user'])) {
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $role = $_POST['role'];
    $status = $_POST['status'];
    $department = $_POST['department'];

    $unique_id = generateUniqueId();
    $created_at = $dated.$time;

    $query = mysqli_query($conn, "INSERT INTO users (`unique_id`, `fullName`, `email`, `phone`, `role`, `status`, `department`, `created_at`) VALUES ('$unique_id', '$fullName', '$email', '$phone', '$role', '$status', '$department', '$created_at')");

    if($query) {
        echo "Successfully Inserted";
    }else {
        echo "<script>alert('Tumse Na ho Payega');</script>";
    }
}




// Read Code
if(isset($_POST['chutiya'])) {
    $data = array();
    $query = mysqli_query($conn, "SELECT * FROM users");

    if(mysqli_num_rows($query)>0) {
        while($rows = mysqli_fetch_assoc($query)) {
            $data[] = array(
                "Uid" => $rows['unique_id'],
                "Name" => $rows['fullName'],
                "Email" => $rows['email'],
                "Phone" => $rows['phone'],
                "Role" => $rows['role'],
                "status" => $rows['status'],
                "Department" => $rows['department'],
            );
        }
    }else {
        $data[] = array("No Data Found");
    }

    echo json_encode($data);
}



//EDIT CODE
if(isset($_POST['editbhai'])) {
    $data = array();
    $editId = $_POST['editId'];
    
    $query = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = '$editId'");
    
    if(mysqli_num_rows($query)>0) {
        $row = mysqli_fetch_assoc($query);

        $data[] =array(
            "Uid" => $row['unique_id'],
            "Name" => $row['fullName'],
            "Email" => $row['email'],
            "Phone" => $row['phone'],
            "Pass" => $row['pass'],
            "Role" => $row['role'],
            "Status" => $row['status'],
            "Department" => $row['department']
        );
        
    }else {
        $data[] = array("No Data Found");
    }

    echo json_encode($data);
}

if(isset($_POST['updateUserData'])) {
    $Uid = $_POST['Uid'];
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $role = $_POST['role'];
    $status = $_POST['status'];
    $department = $_POST['department'];

    $query = mysqli_query($conn, "UPDATE users SET fullname = '$fullName', email = '$email', phone = '$phone', role = '$role', status = '$status', department = '$department' WHERE unique_id = '$Uid' ");
    
    if($query) {
        echo "Data Updated Successfully";
    }else {
        echo "Data Updated Failed";
    }
}


// Delete Code
if(isset($_POST['ganduChutiya'])) {
    $deleteId = $_POST['deleteId'];

    $query = mysqli_query($conn, "DELETE FROM users WHERE unique_id = '$deleteId'");
    if($query){
        echo 'successfull deleted';
    }else{
        echo 'failed';
    }
}



// Register Code
if(isset($_POST['register'])){
    $fullName = $_POST['fullName']; 
    $registerEmail = $_POST['registerEmail']; 
    $registerPhone = $_POST['registerPhone']; 
    $registerPassword = $_POST['registerPassword']; 

    $hashPass = password_hash($registerPassword, PASSWORD_DEFAULT);
    $unique_id = generateUniqueId();
    
    $query = mysqli_query($conn, "INSERT INTO users (`unique_id`, `fullName`, `email`, `phone`, `pass`) VALUES ('$unique_id','$fullName', '$registerEmail', '$registerPhone', '$hashPass')");

    if($query){
        echo 'successfully registered';
    }else{
        echo 'something failed';
    }
}

// login code

if(isset($_POST['login'])){
    $loginEmail = $_POST['loginEmail'];
    $loginPassword = $_POST['loginPassword'];

    $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '$loginEmail'");

    if(mysqli_num_rows($sql)>0){
        $row = mysqli_fetch_assoc($sql);

        $pass = $row['pass'];

        if(password_verify($loginPassword, $pass)){
            echo "Login SuccessFully";
        }else {
            echo "Tum Logo Ki MKC";
        }
    }
}

//UNIQUE_ID

function generateUniqueId($length = 10) {
    $character = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $characterLength = strlen($character);
    $uniqueId = "";
    
    for ($i = 0; $i < $length; $i++) {
        $uniqueId .= $character[rand(0, $characterLength - 1)];
    }
    $timestamp = date('ymdHis');
    return $uniqueId.$timestamp;
}
?>