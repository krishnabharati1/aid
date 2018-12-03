<?php
include('inc/init.php');
if(isset($_POST['submit'])){
	$room_title = $_POST['room_title'];
	$room_beds = $_POST['room_beds'];
	$room_bathroom = $_POST['room_bathroom'];
	$room_description = $_POST['room_description'];
	$room_image = $_POST['room_image'];

	$form_message = "Could not save room.";

	$check = getimagesize($_FILES["room_image"]["tmp_name"]);
	if($check !== false) {
	} else {
		$form_message = "Image only allowed to upload.";
		$_SESSION['admin_message'] = $form_message;
		header('location: admin_panel.php');
		die;
	}

	$target_dir = "images/";
	$target_file = basename($_FILES["room_image"]["name"]);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$name = time().'.'.$imageFileType;
	$image_name = $target_dir.$name;

	if (move_uploaded_file($_FILES["room_image"]["tmp_name"], $image_name)) {
		$data = Array(
			'room_title' => $room_title,
			'room_description' => $room_description,
			'room_beds' => $room_beds,
			'room_bathroom' => $room_bathroom,
			'room_image' => $name,
		);
		$id = $db->insert('tbl_rooms',$data);;
		if($id){
			$form_message = "Room added.";
		}
		else{
			$form_message = "Database error";
		}
		$_SESSION['admin_message'] = $form_message;
		header('location: admin_panel.php');
	} else {
		$form_message = "Image not uploaded.";
		$_SESSION['admin_message'] = $form_message;
		header('location: admin_panel.php');
		die;
	}

	$_SESSION['admin_message'] = $form_message;
	header('location: admin_panel.php');
}
?>