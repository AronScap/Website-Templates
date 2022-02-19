<?php 
	define( 'DB_HOST', 'localhost' );
    define( 'DB_USER', 'root' );
    define( 'DB_PASS', '' );
    define( 'DB_NAME', 'mevamcha_mevam');
    define( 'DISPLAY_DEBUG', false );


	$conn = mysqli_connect(DB_HOST, DB_USER,DB_PASS,DB_NAME) or trigger_error(mysqli_error());	
	mysqli_query($conn , "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
	date_default_timezone_set('America/Sao_Paulo');

?>