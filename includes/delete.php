<?php
require_once ("db.php");

$userId = $_GET['userId'] ?? "";

$sql = "DELETE FROM profilesystemwithemailconfirmation WHERE id = '$userId'";

$userInfo = $db_connection->query($sql);

if ($userInfo){
    echo 'Data Deleted Successfully';
    header( "refresh:3;url=../backend/user-list.php" );
}else{
    echo "Data couldn't Delete";
}





