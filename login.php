<?php
include('page_head.php');
?>

<div class="container">

	<div class="row">
		<div class="box">
			<div class="col-lg-12">
				<hr>
				<h2 class="intro-text text-center">Login</h2>
				<hr>
				<p>Login using the form below.</p>
				<?php
				if(isset($_SESSION['login_message'])){
					?>
					<div class="alert alert-info">
						<p><?php echo $_SESSION['login_message']; unset($_SESSION['login_message']) ?></p>
					</div>
					<?php
				}
				?>
				<form action="login_action.php" method="post" role="form">
					<div class="form-group">
						<label>Email Address</label>
						<input type="email"  name="email" class="form-control" minlength="6" required>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" class="form-control" minlength="6" required>
					</div>
					<div class="form-group col-lg-12">
						<input type="submit" name="submit" class="btn btn-default" value="Login">
					</div>
				</form>
			</div>
		</div>
	</div>

</div>
<!-- /.container -->

<?php
include('page_foot.php');
?>