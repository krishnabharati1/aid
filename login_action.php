<?php
include('inc/init.php');
if(isset($_POST['submit'])){
	$email = $_POST['email'];
	$password = $_POST['password'];

	$form_message = "Could not login.";

	$db->where('email_address',$email);
	$db->where('user_password',md5($password));
	$user = $db->getOne('tbl_user');

	if(!count($user)){
		$form_message = "Invalid username or password";
		$_SESSION['login_message'] = $form_message;
		header('location: login.php');
		die;
	}
	else{
		$_SESSION['login'] = $user['user_id'];
		if($user['user_is_admin'] == true){
			$_SESSION['admin_user'] = $user['user_id'];
		}
		header('location: index.php');
		die;
	}
	header('location: login.php');
}
?>