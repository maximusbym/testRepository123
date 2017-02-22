<?php
// var_dump($_POST);
// exit();

define( 'DB_PATH', 'db.txt' );

$newMessage = $_POST;
$newMessage['time'] = time();
	
	// echo json_encode(['result' => 0]);
	// exit();
	
if( $newMessage['name'] != '' && $newMessage['email'] != '' && $newMessage['message'] != '' ) {
	
	if( file_exists( DB_PATH ) && file_get_contents( DB_PATH ) != '' ) {	
		$allMessages = json_decode ( file_get_contents( DB_PATH ), true );
		array_unshift( $allMessages, $newMessage );
	}
	else {
		$allMessages = [$newMessage];
	}
	
	$res = file_put_contents( DB_PATH, json_encode( $allMessages ) );
	
}
	
if(
	isset($_SERVER['HTTP_X_REQUESTED_WITH']) 
	&& !empty($_SERVER['HTTP_X_REQUESTED_WITH']) 
	&& strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'
) {
	// Если к нам идёт Ajax запрос, то ловим его
	$newMessage['time'] = date('d.m.Y H:i', $newMessage['time']);
	echo json_encode( [ 'message' => $newMessage ] );
	exit;
}
	
include "GuestBookView.php";