<?php

session_start();

include 'config.php';
echo" <tr class='w3-red'>
<th >Id</th>
<th >Occured  Date</th>
<th >Type</th>
<th >Description</th>
<th>Case Process</th>
<th >Close Date</th>
<th >Suspect</th>
<th >Officer</th>
</tr>";
$sql = "SELECT * FROM `case`";
//echo $sql;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $cid= $row["id"];
        $oDate= $row["odate"];
        $caseType= $row["caseType"];
        $description= $row["description"];
        $caseProcess= $row["caseProcess"];  
        $ineStDate= $row["ineStDate"];
   
              echo"
              <tr>
              <td>$cid</td>
              <td>$oDate</td>
              <td>$caseType</td>
              <td>$description</td>
              <td>$caseProcess</td>
              <td>$ineStDate</td>";
              $suspect="";
              $officer="";
              $sql1 = "SELECT `suspect`.`name` FROM `suspect` ,`case_suspeect` WHERE `case_suspeect`.`sid`=`suspect`.`sid` AND `case_suspeect`.`cid`='$cid'";
              
              $result1 = $conn->query($sql1);
              if ($result1->num_rows > 0) {
                  echo "<td>";// output data of each row
                  while($row1 = $result1->fetch_assoc()) {
                      //$cid= $row["cid"];
                      $name= $row1["name"];
                      echo $name;
                   
                  }
                  echo "</td>";
              } else {
                  echo  "<td>0 Suspects</td>";
              
              }
              
              
              $sql2 = "SELECT `officer`.`name`  FROM  `officer` , `case_officer` WHERE `case_officer`.`oid`=`officer`.`oid` AND `cid`='$cid'";
              //echo $sql;
              $result2 = $conn->query($sql2);
              if ($result->num_rows > 0) {
                echo "<td>";// output data of each row
                  while($row2= $result2->fetch_assoc()) {
                      //$cid= $row["cid"];
                      $name= $row2["name"];
                      echo $name;
                  }
                  echo "</td>";
              } else {
                echo  "<td>0 Officers</td>";
              
              }
                    
             echo" 
             
             </tr>";
             
              
       
    }
} else {

   
 
}
$conn->close();

?>