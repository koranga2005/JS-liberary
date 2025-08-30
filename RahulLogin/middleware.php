<?php
if(isset($_SESSION['login'])!= true){
     echo "<script>alert('you not an Authourised Person ? Login First ');window.location.href='index.php'</script>";
}
?>