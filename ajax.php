<?php
	include('functions.php');
	
	$post = $_POST;
	
	$key = random_string($config['key_length']);
	
	if(check_string($key)){
 
			if(create_redirect($key,$post['tny_mx_url'])){
				echo "<a href='".addhttp($config['base_url'].$key)."' target='_blank'>".$config['base_url'].$key."</a>";
			}
	} 
?>
