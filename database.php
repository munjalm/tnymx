<?php

$db['host'] = 'localhost'; // host of database
$db['username'] = 'username'; // username of database
$db['password'] = 'password'; // password of database
$db['database'] = 'gittnymx'; // name of database, make sure you create a database first

$conn = new mysqli($db['host'], $db['username'], $db['password'],$db['database']);

function db_select($query){
  global $conn;
  global $db;   
  if ($conn->connect_error) {
      die("Cannot connect to  " .$db['host'].' using the username '.$db['username']);
  } 
    return $conn->query($query);
}    

function db_insert($query){
  global $conn;
  global $db;   
  if ($conn->connect_error) {
      die("Cannot connect to  " .$db['host'].' using the username '.$db['username']);
  }

        if ($conn->query($query) === TRUE) {
          return true;
        } else {
            return false; 
          }
  
}

function db_create(){
	
  global $db;   
  global $conn;
  
  
  if ($conn->connect_error) {
      die("Cannot connect to  " .$db['host'].' using the username '.$db['username']);
  }

  $sql = "CREATE TABLE conversions (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, shortner varchar(10) NOT NULL, referer_url varchar(100) DEFAULT NULL, time timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP, request_ip varchar(20) DEFAULT NULL)";
 
  $sql_2 = "CREATE TABLE IF NOT EXISTS url_mapping (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, shortner varchar(6) NOT NULL UNIQUE KEY, client_url varchar(500) NOT NULL, last_modified timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP, status int(1) NOT NULL)";  

if ($conn->query($sql) === TRUE) {
	if ($conn->query($sql_2) === TRUE) {
	} 
}else {
    echo "Error creating table: " . $conn->error;





 
}

 
}


?>
