<?php

include 'init.php';


if (empty($_GET['inputLink']))
{
  header('Location: /');
  exit; 
} 