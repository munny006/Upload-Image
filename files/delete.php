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
<?php
if (isset($_GET['delete'])) {
	$id =$_GET['delete'];
	$query= "DELETE FROM information WHERE id = $id";
	$delImage = $db->delete($query);
		if ($delImage) {
			echo "<span class = 'success'> Image Deleted successfully.</span>";
		}
		echo  "<span class = 'success'> Image Not Deleted  successfully.</span>";;

	} 
}

?>
<?php
$sem = "SELECT * FROM information";
$getImage = $db->select($sem);
if ($getImage) {
	$i=0;
	while($result = $getImage->fetch_assoc()){
		$i++;
	}
}

?>

<form action="delete.php?id=<?php echo $id ;?>" method="POST">
		<table class="col-md-10 text-center">
		<tr>
			<td>Name</td>
             <td><input type="text" name="name"  value="<?php echo   $result['name'];?>" class="form-control"></td>

		</tr>
			<tr>
			<td>Department</td>
			<td><input type="text" name="roll"  value="<?php echo   $result['roll'];?>" class="form-control"></td>

		</tr>
			<tr>
			<td>Email</td>
			<td><input type="text" name="phone"  value="<?php echo   $result['phone'];?>" class="form-control"></td>

		</tr>
			<tr>
			<td></td>
		<td><img src="../uploads/<?php echo $result['image'];?>" height = "40px" width = "50px">
			</td>

		</tr>
			<tr>
			<td></td>
			<td class="py-4">
				<input type="submit" name="submit" value="submit"  class="btn btn-info">
				<input type="reset" name="cancel"  class="btn btn-danger">
				<input type="submit" name="delete" value="Delete"  class="btn btn-dark">

			</td>

		</tr>
		
		


</table>
	</form>

<?php
include 'footer.php';

?>
<a href="index.php" class="btn btn-light ml">Back</a>


