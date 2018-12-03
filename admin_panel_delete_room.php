<?php
include('inc/init.php');
if(isset($_GET['room_id'])){
	$room_id = $_GET['room_id'];

	$form_message = "Could not delete.";

	$db->where('room_id',$room_id);
	$room = $db->getOne('tbl_rooms');

	if(!count($room)){
		$form_message = "Room not found.";
	}
	else{
		$db->where('room_id',$room_id);
		if($db->delete('tbl_rooms')){
			$form_message = "Room deleted.";
		}
		else{
			$form_message = "Database Error.";
		}
	}

	$_SESSION['admin_message'] = $form_message;
	header('location: index.php');
}
?>