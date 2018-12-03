<?php
include('page_head.php');
$search_term = '';
if(isset($_GET['search_term'])){
	$search_term = $_GET['search_term'];
}
?>

<div class="container">

	<div class="row">

		<?php
		$db->where('room_title',"%$search_term%",'LIKE');
		$db->where('room_description',"%$search_term%",'LIKE');
		$rooms = $db->get('tbl_rooms');
		if($db->count>0){
			foreach($rooms as $room){
				?>
				<div class="col-lg-4">
					<div class="box">
						<hr>
						<h2 class="intro-text text-center"><?php echo $room['room_title']; ?></h2>
						<hr>
						<img class="img-responsive" src="images/<?php echo $room['room_image']; ?>">
						<hr>
						<div class="text-center">
							<?php echo nl2br($room['room_description']); ?>
						</div>
						<?php
						if(isset($_SESSION['admin_user'])){
							?>
							<br>
							<div class="text-center">
								<a href="admin_panel_delete_room.php?room_id=<?php echo $room['room_id']; ?>" class="btn btn-danger">Delete</a>
							</div>
							<?php
						}
						?>
					</div>
				</div>
				<?php
			}
		}
		else{
			?>
			<div class="box text-center">
				<p>No Rooms Found.</p>
			</div>
			<?php
		}
		?>
	</div>

</div>

<?php
include('page_foot.php');
?>