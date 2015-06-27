<?php

include('config.php');
include('database.php');
db_create();

function random_string($length = 5) {
    $alphabets = range('A','Z');
    $numbers = range('0','9');
    $final_array = array_merge($alphabets,$numbers);
       while($length--) {
      $key = array_rand($final_array);

      $password .= $final_array[$key];
                        }
  if (preg_match('/[A-Za-z]/', $password) && preg_match('/[0-9]/', $password))
    {
     return strtolower($password);
    }else{
    return  strtolower(random_string()); 
    }	
 }

 
 function addhttp($url) {
    if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
        $url = "http://" . $url;
    }
    return $url;
}

function check_string($string){
  	
  $check_string_sql = "SELECT shortner FROM url_mapping where shortner = '".$string."'";
  $result = db_select($check_string_sql);
  if ($result->num_rows == 0){
    return true;
  }else{
    return false;
  }

}


function create_redirect($shortner,$url){
  $sql = "INSERT INTO `url_mapping` (`shortner`, `client_url`, `status`) VALUES ('".$shortner."', '".$url."', '1')";
  return db_insert($sql);
}



  function get_redirect_url($shortner){
    $sql = "SELECT client_url FROM url_mapping where shortner = '".$shortner."'";
    $result = db_select($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          return addhttp($row['client_url']);
      }
  } else {	
      return addhttp($config['base_url']."404.php");
  }
  }


  function record_conversion($shortner){

      $referer_url = mysql_real_escape_string($_SERVER["HTTP_REFERER"]);
      $ip = "";

      if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
         $ip = $_SERVER['HTTP_CLIENT_IP'];  
      } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
         $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
      } else {
         $ip = $_SERVER['REMOTE_ADDR'];
      }

      $sql = "INSERT INTO `conversions` (`shortner`, `referer_url`, `request_ip`)  VALUES ('".$shortner."', '".$referer_url."', '".$ip."' )";
		
	  return db_insert($sql);	
  }
    
?>
