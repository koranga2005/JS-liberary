<?php
session_start();
include "conection.php";
if(isset($_SESSION['name']));
echo $_SESSION['name'];
?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>
<body class= "bg-light"> 
<table border = "2px solid">
<tbody>
    <tr>
        <th>id</th>
        <th>name</th>
        <th>email</th>
        <th>pass</th>
        <th>action</th>
    </tr>
<?php 
$result = mysqli_query($conn,("SELECT *  FROM rahul"));
while ($row = mysqli_fetch_assoc($result)) {
    ?>
<tr>
    <td><?=$row['id']?></td>
    <td><?=$row['name']?></td>
    <td><?=$row['email']?></td>
    <td><?=$row['password']?></td>
    <td>
        <div>
            <a href="edit.php?id=<?=$row['id']?>" target="_blank"><i class="fa fa-edit"></i></a>
            <a href="delete.php?id=<?=$row['id']?>"><i class="fa fa-trash"></i></a>
        </div>   
    </td>
</tr>


<?php
}
?>
</tbody>
</table>
<a href="insert.php">add</a>
    
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/js/bootstrap.min.js" integrity="sha512-zKeerWHHuP3ar7kX2WKBSENzb+GJytFSBL6HrR2nPSR1kOX1qjm+oHooQtbDpDBSITgyl7QXZApvDfDWvKjkUw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</html>