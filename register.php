<?php
include('page_head.php');
?>

<div class="container">

	<div class="row">
		<div class="box">
			<div class="col-lg-12">
				<hr>
				<h2 class="intro-text text-center">Register </h2>
				<hr>
				<p>Register using the form below.</p>
				<?php
				if(isset($_SESSION['register_message'])){
					?>
					<div class="alert alert-info">
						<p><?php echo $_SESSION['register_message']; unset($_SESSION['register_message']) ?></p>
					</div>
					<?php
				}
				?>
				<form action="register_action.php" method="post" role="form">
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="name" class="form-control" minlength="3" required>
					</div>
					<div class="form-group">
						<label>Email Address</label>
						<input type="email"  name="email" class="form-control" minlength="6" required>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" class="form-control" minlength="6" required>
					</div>
					<div class="form-group col-lg-12">
						<input type="submit" name="submit" class="btn btn-default" value="Submit">
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