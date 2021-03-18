<?php

class DataBase{
	
public static $conn;

public function __construct(){
	
$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=ppegsb", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  self::$conn=$conn;
  
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
	
}
 
}


new DataBase();


?>