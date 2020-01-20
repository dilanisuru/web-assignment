<?php
session_start();
$userName=$_REQUEST['userName'];
$pass=$_REQUEST['pass'];



include "config.php";
$sql = "SELECT * FROM `user` WHERE `uname` = '$userName' AND `pass` = '$pass';";
$result = $conn->query($sql);

echo $sql;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $id=$row["id"];
        //echo $id;
        //setcookie("user", $id, time() + (86400 * 30), "/");
        $_SESSION["uid"] = $id;
        header("Location:../home.html"); 
        exit;
    }
} else {
 header("Location:../userLoginError.html"); 
 exit;
}
$conn->close()

?>