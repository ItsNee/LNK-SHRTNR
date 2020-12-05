<?php
$host = '127.0.0.1';  
$user = 'nee';
$password = 'sikeYouThought';
$db = 'lnkshrtnr';
$conn = new mysqli($host,$user,$password,$db);


if($conn->connect_error){
  echo 'connection failed'. $conn->connect_error;
}
?>
