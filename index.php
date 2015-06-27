<?php
	include ('functions.php'); 
	$url_key = $config['url_key'];
	$redirect_url = get_redirect_url($url_key);
	record_conversion($url_key);
	header( 'Location: '. $redirect_url);
?>