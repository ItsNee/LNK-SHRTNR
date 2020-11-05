<?php
$host = '127.0.0.1'; 
$user = 'lol';
$password = 'youthought';
$db = 'wew';
$conn = new mysqli($host,$user,$password,$db);


if($conn->connect_error){
  echo 'connection failed'. $conn->connect_error;
}
?>
