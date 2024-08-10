<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blood_bank_new";
$conn = new mysqli($servername, $username, $password, $dbname);
if(!$conn){
 die('Could not Connect MySql:' .mysql_error());
}
?>