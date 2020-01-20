<?php

session_start();
include_once "config.php";

$sql = "SELECT * FROM `user`";
//echo $sql;
echo "<tr>
<th>Name</th>
<th>User Name</th>
<th>Password</th>
</tr>";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    
    while($row = $result->fetch_assoc()) {
        //$cid= $row["cid"];
        $name= $row["name"];
        $uname= $row["uname"];
        $pass= $row["pass"];
        echo"<tr>
        <td> $name</td>
        <td>$uname</td>
        <td>$pass</td>
      </tr>";
    }
} else {
   echo"<tr>
   <td> </td>
   <td></td>
   <td></td>
 </tr>";

}


$conn->close();

?>