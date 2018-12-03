<?php
include('inc/init.php');
if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	$form_message = "Could not register.";

	$db->where('email_address',$email);
	$user = $db->getOne('tbl_user');

	if(!count($user)){
		$data = Array(
			'user_name' => $name,
			'email_address' => $email,
			'user_password' => md5($password)
		);
		$id = $db->insert('tbl_user',$data);;
		if($id){
			$form_message = "Registration complete.";
		}
		else{
			$form_message = "Database error";
		}
	}
	else{
		$form_message = $email." Email already used.";
	}
	$_SESSION['register_message'] = $form_message;
	header('location: register.php');
}
?>