<?php
include "connection.php";
$dep_id=$_POST['dep']; 
$result=mysqli_query($conn,"SELECT * FROM `employee_reg` WHERE dep_id=$dep_id");
$list = array();
if(mysqli_num_rows($result)) {
    while($row = mysqli_fetch_assoc($result)){
        $data   = array(
            'id'                      => $row['id'],
            'name'                    => $row['name'],
            ); 
        array_push($list,$data);
    }
 }
echo json_encode($list);

