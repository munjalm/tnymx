<?php
$config = array();
$config['base_url'] = 'tny.mx/';// base url of the hosting eg. mysite.com/

$request_array = $_SERVER;
$config['request_path'] = $request_array['REQUEST_URI'];
$config['url_key'] = ltrim($config['request_path'],'/');

$config['key_length'] = 5;  // length of the url key that will be generated eg. tny.mx/Qd1s9 ----- length of Qd1s9 is 5 

?> 

 