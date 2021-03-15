<?php
include 'header.php';
include 'data.php';
include 'database.php';
?>

<?php
$db = new DataBase();

if (isset($_POST['submit'])) {
	//exit($_FILES);
	$name = mysqli_real_escape_string($db->link,$_POST['name']);
	$roll= mysqli_real_escape_string($db->link,$_POST['roll']);
	$phone = mysqli_real_escape_string($db->link,$_POST['phone']);
	$image = mysqli_real_escape_string($db->link,$_FILES['image']['name']);
	if ($name == ''|| $roll == '' ||  $phone == '' || $image == '' ) {
		
		$error= "Field not must";
	}

else{
		$permitted = array('jpg','png','jpeg');
		$image = rand().$_FILES['image']['name'];
		
		$image_size = $_FILES['image']['size'];
		//$image_temp = $_FILES['image']['temp'];
		$folder = "../uploads/".$image;
		//die($_FILES['image'][0]);z
	move_uploaded_file($_FILES['image']['tmp_name'],$folder);
		$query = "INSERT INTO information (name,roll,phone,image) VALUES ('$name ','$roll','$phone','$image')";
		$insert_Data = $db->insert($query);
		if ($insert_Data) {
			echo "<span class = 'success'> Image Uploaded successfully.</span>";
		}
		echo  "<span class = 'success'> Image Not Uploaded successfully.</span>";;

	}
}
?>


<form action="" method="POST" enctype="multipart/form-data">
	<table class="col-md-6 text-center">
		<tr>
			<td>Name</td>
			<td class="py-2 my-2"><input type="text" name="name" placeholder="Enter your name" class="form-control"></td>
		</tr>
		<tr>
			<td>Roll</td>
			<td class="py-2 my-2"><input type="text" name="roll" placeholder="Enter your ID" class="form-control"></td>
		</tr>
		<tr>
			<td>Phone</td>
			<td class="py-2 my-2"><input type="tel" name="phone" placeholder="Enter your Phone" class="form-control"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="file" name="image" value="image"></td>
		</tr>

			</tr>
		<tr>
			<td></td>
			<td class="my-2 py-2">
				<input type="submit" name="submit" value="Submit" class="btn btn-primary">
				<input type="reset" name="cancel" value="Cancel" class="btn btn-danger">
			</td>
		</tr>

		
	</table>
	</form>





















<?php
include 'footer.php';

?>
<a href="index.php" class="btn btn-light ml">Back</a>
