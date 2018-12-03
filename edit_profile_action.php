<?php
include('inc/init.php');
if(isset($_POST['submit'])){
	$user_id = $_POST['user_id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	$form_message = "Could not update.";

	$db->where('email_address',$email);
	$db->where('user_id', $user_id, '!=');
	$user = $db->getOne('tbl_user');

	if(!count($user)){
		$data = Array(
			'user_name' => $name,
			'email_address' => $email,
			'user_password' => md5($password)
		);
		$db->where('user_id',$user_id);
		if($db->update('tbl_user',$data)){
			$form_message = "User details updated.";
		}
		else{
			$form_message = "Database error.";
		}
		$_SESSION['user_message'] = $form_message;
		header('location: edit_profile.php');
		die;
	}
	else{
		$form_message = "Email  already in use.";
		$_SESSION['user_message'] = $form_message;
		header('location: edit_profile.php');
		die;
	}
	header('location: edit_profile.php');
}
?>