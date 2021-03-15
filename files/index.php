<?php
include 'header.php';
include 'data.php';
include 'database.php';

?>
<?php
$db = new DataBase();
$query = "SELECT * FROM information ";
$read = $db->select($query);
?>
<?php
if (isset($_GET['msg'])) {
	echo $_GET['msg'];
}

?>
<?php
if (isset($_GET['error'])) {
	echo $_GET['error'];
}

?>

<form action="" method="POST" enctype="multipart/form-data">
	<table class="table table-bordered col-md-10 table-striped text-center">
		<tr>
			<th width="15%">No</th>
			<th width="25%">Name</th>
			<th width="20%">Roll</th>
			<th width="20%">Phone</th>
			<th width="40%">Image</th>
		</tr>
			<?php if ($read) {?>
				<?php while ($row = $read->fetch_assoc()){?>

		<tr>
			<td><?php echo $row['id'];?></td>
			<td><?php echo $row['name'];?></td>
			<td><?php echo $row['roll'];?></td>
			<td><?php echo $row['phone'];?></td>
			<td><img src="../uploads/<?php echo $row['image'];?>" height = "40px" width = "50px">
			</td>
		</tr>
			
	<?php }?>
<?php }else{?>
	<p>Data not available</p>
		<?php }?>
	</table>
	</form>











<?php
include 'footer.php';

?>
<a href="create.php" class="btn btn-light ml">NEXT</a>
