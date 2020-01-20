<?php
session_start();
$userName=$_REQUEST['userName'];
$pass=$_REQUEST['pass'];

if ($userName=="admin"&& $pass=="123"){
    header("Location:../adminHome.html"); 
        exit;
}
 else {
 header("Location:../AdminLoginError.html"); 
 exit;
}
$conn->close()

?>