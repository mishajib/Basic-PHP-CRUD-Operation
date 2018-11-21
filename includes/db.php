<?php
//Database Connection
$hostname   = 'localhost';
$username   = 'root';
$password   = '';
$db_name    = 'mishajib';

$db_connection = new mysqli($hostname,$username,$password,$db_name);

if($db_connection->connect_error)
{
    die("Can't Connect to the Database.".$db_connection->connect_error);
}


