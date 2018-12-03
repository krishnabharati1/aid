<?php
include('page_head.php');
$user_id = $_SESSION['login'];
$db->where('user_id',$user_id);
$user = $db->getOne('tbl_user');
$name = $user['user_name'];
$email = $user['email_address'];;
?>

<div class="container">

	<div class="box">
		<hr>
		<h2 class="intro-text text-center">Edit Profile</h2>
		<hr>
		<?php
		if(isset($_SESSION['user_message'])){
			?>
			<div class="alert alert-info">
				<p><?php echo $_SESSION['user_message']; unset($_SESSION['user_message']) ?></p>
			</div>
			<?php
		}
		?>
		<form action="edit_profile_action.php" method="post">
			<input type="hidden" name="user_id" value="<?php echo  $user_id; ?>">
			<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" minlength="3" class="form-control" value="<?php echo  $name; ?>" required>
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="email" name="email" minlength="5" class="form-control"  value="<?php echo  $email; ?>" required>
			</div>
			<div class="form-group">
				<label>New Password</label>
				<input type="password" minlength="6" name="password" class="form-control" required>
			</div>
			<input type="submit" name="submit" value="Edit Details" class="btn btn-success">
		</form>
	</div>

</div>

<?php
include('page_foot.php');
?>