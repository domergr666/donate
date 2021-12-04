<?php

function getServerInfo($type){
	// Edit this ->
	define( 'MQ_SERVER_ADDR', 'stealas.ru' );
	define( 'MQ_SERVER_PORT', 19132 );
	define( 'MQ_TIMEOUT', 1 );
	// Edit this <-
	// Display everything in browser, because some people can't look in logs for errors
	Error_Reporting( E_ALL | E_STRICT );
	Ini_Set( 'display_errors', true );
	require __DIR__ . '/libs/MinecraftQuery.php';
	require __DIR__ . '/libs/MinecraftQueryException.php';
	$Timer = MicroTime( true );
	$Query = new MinecraftQuery( );
	try
	{
		$Query->Connect( MQ_SERVER_ADDR, MQ_SERVER_PORT, MQ_TIMEOUT );
	}
	catch( MinecraftQueryException $e )
	{
		$Exception = $e;
	}
	$Timer = Number_Format( MicroTime( true ) - $Timer, 4, '.', '' );
	
	print_r($Query->InfoValue());
}

getServerInfo();
?>