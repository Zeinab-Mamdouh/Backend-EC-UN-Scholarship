<?php
include_once("includes/logged.php");
include_once("includes/conn.php");
$status = false;

if(isset($_GET["id"])){
	$id = $_GET["id"];
	$status = true;
}	
if($_SERVER["REQUEST_METHOD"] === "POST"){
	$name = $_POST["name"];
	$position = $_POST["position"];
	$content = $_POST["content"];
    $oldImage = $_POST["oldImage"];

	include_once("includes/updateImage.php");

	try{
		$data = "UPDATE `testimonials` SET `Name`=? ,`Position`=?,`Content`=?, `Image`=? WHERE id=?";
		$result = $conn->prepare($data);
		$result->execute([$name, $position, $content, $image_name, $id]);
		echo "Updated Successfully";
	}catch(PDOException $e){
		echo "Connection failed: " . $e->getMessage();
		}
} 
if($status){
try{
	$data = "SELECT * FROM `testimonials` WHERE id = ?";
	$result = $conn->prepare($data);
	$result->execute([$id]);

	$state = $result->fetch();
	$name = $state["Name"];
	$position = $state["Position"];
	$content = $state["Content"];
	$image = $state["Image"];

}catch(PDOException $e){
echo "Connection failed: " . $e->getMessage();
}
}
?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Edit / Update Testimonials</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
	</head>

	<body>

		<div class="container">
			<form method="POST" action= "" class="m-auto" style="max-width:600px" enctype="multipart/form-data">
				<h3 class="my-4">Edit / Update Testimonials</h3>
				<hr class="my-4" />
				<div class="form-group mb-3 row"><label for="title2" class="col-md-5 col-form-label">Name</label>
					<div class="col-md-7"><input type="text" class="form-control form-control-lg" id="title2" name="name" value="<?php echo $name ?>" required></div>
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="price6" class="col-md-5 col-form-label">Position</label>
					<div class="col-md-7"><input type="text" class="form-control form-control-lg" id="price6" name="position" value="<?php echo $position ?>"></div>
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="content4" class="col-md-5 col-form-label">Content</label>
					<div class="col-md-7"><textarea class="form-control form-control-lg" id="content4" name="content"  required><?php echo $content ?></textarea></div>
				</div>
				<hr class="my-4" />
				<div>
					<label for="image" class="col-md-5 col-form-label">Select Image</label>
					<input type="file" id="image" name="image" accept="image/*">
					<img src="../img/<?php echo $image ?>" alt="<?php echo $name ?>" style="width=300px;">
				</div>

				<input type="hidden" value= "<?php echo $image ?>" name= "oldImage">
				
				<hr class="my-4" />
				<div class="form-group mb-3 row"><label for="insert10" class="col-md-5 col-form-label"></label>
					<div class="col-md-7"><button class="btn btn-primary btn-lg" type="submit">Update</button></div>
				</div>
			</form>
		</div>
	</body>

</html>