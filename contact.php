<?php
if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone_number'];
	$message = $_POST['message'];

	$form_message = "Mail could not be sent.";

	$msg = "Message was received!\nName: " . $name . "\nEmail: " . $email . "\nPhone: " . $phone . "\nMessage: " . $message;
	$myemail = "email@gmail.com";
	if(mail($myemail,"New Form Submission",$msg) && mail($email,"Thank you for your form submission",$msg)){
		$form_message = "Mail successfully sent.";
	}
}
include('page_head.php');
?>

<div class="container">

	<div class="row">
		<div class="box">
			<div class="col-lg-12">
				<hr>
				<h2 class="intro-text text-center">Contact <strong>form</strong> </h2>
				<hr>
				<p>Contact us using the form below.</p>
				<?php
				if(isset($form_message)){
					?>
					<div class="alert alert-info">
						<p><?php echo $form_message; ?></p>
					</div>
					<?php
				}
				?>
				<form action="contact.php" method="post" role="form">
					<div class="row">
						<div class="form-group col-lg-4">
							<label>Name</label>
							<input type="text" name="name" class="form-control" minlength="3" required>
						</div>
						<div class="form-group col-lg-4">
							<label>Email Address</label>
							<input type="email"  name="email" class="form-control" minlength="6" required>
						</div>
						<div class="form-group col-lg-4">
							<label>Phone Number</label>
							<input type="tel" name="phone_number" class="form-control" minlength="10" required>
						</div>
						<div class="clearfix"></div>
						<div class="form-group col-lg-12">
							<label>Message</label>
							<textarea class="form-control" name="message" rows="6" minlength="20" required></textarea>
						</div>
						<div class="form-group col-lg-12">
							<input type="submit" name="submit" class="btn btn-default" value="Submit">
						</div>
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