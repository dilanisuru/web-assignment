<?php
include_once "config.php";
$sql = "SELECT * FROM `officer` ";
//echo $sql;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $oid= $row["oID"];
        $nic= $row["nic"];
        $name= $row["name"];
        echo "<option value='$oid'> $name $nic </option>";
    }
} else {

}
$conn->close();

?>