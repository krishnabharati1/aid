<?php
include('page_head.php');
?>

<div class="container">

	<div class="box">
		<hr>
		<h2 class="intro-text text-center">Add Room</h2>
		<hr>
		<?php
		if(isset($_SESSION['admin_message'])){
			?>
			<div class="alert alert-info">
				<p><?php echo $_SESSION['admin_message']; unset($_SESSION['admin_message']) ?></p>
			</div>
			<?php
		}
		?>
		<form action="admin_panel_add_room.php" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label>Room Title</label>
				<input type="text" name="room_title" minlength="5" maxlength="50" class="form-control" required>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
						<label>Number of beds</label>
						<input type="number" name="room_beds" min="1" value="1" class="form-control" required>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<label>Attached Bathroom?</label>
						<br>
						<input type="radio" name="room_bathroom" value="1">Yes &nbsp; &nbsp; &nbsp; &nbsp; <input type="radio" name="room_bathroom" value="0" checked>No
					</div>
				</div>
			</div>
			<div class="form-group">
				<label>Description</label>
				<textarea name="room_description" minlength="10" class="form-control" required></textarea>
			</div>

			<div class="form-group">
				<label>Room Image</label>
				<input type="file" name="room_image" class="btn btn-default" accept="image/*" required>
			</div>

			<input type="submit" name="submit" value="Add Room" class="btn btn-success">
		</form>
	</div>

</div>

<?php
include('page_foot.php');
?>