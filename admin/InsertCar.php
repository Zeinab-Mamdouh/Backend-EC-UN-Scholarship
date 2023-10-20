<?php
    if($_SERVER["REQUEST_METHOD"] === "POST"){
		include_once("includes/conn.php");
		$Title = $_POST["title"];
		$Description = $_POST["content"];
		$Price = $_POST["price"];
		$Model  = $_POST["model"];
		$Auto = $_POST["auto"];
		$Properties = $_POST["properties"]; 
        include_once("includes/addimage.php");

		try{
			$data = "INSERT INTO `cars`(`Title`, `Image`, `Description`, `Model`, `Auto`, `Properties`, `Price`) VALUES (?, ?, ?, ?, ?, ?, ?)";
			$result = $conn->prepare($data);
			$result->execute([$Title, $image_name, $Description, $Model, $Auto, $Properties, $Price]);
			echo "Insertd Successfully";

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
		<title>Insert Car</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
	</head>

	<body>
		<div class="container">
			<form method="POST" action="" class="m-auto" style="max-width:600px" enctype="multipart/form-data">
				<h3 class="my-4">Insert Car</h3>
				<hr class="my-4" />
				<div class="form-group mb-3 row"><label for="title2" class="col-md-5 col-form-label">Car Title</label>
					<div class="col-md-7"><input type="text" class="form-control form-control-lg" id="title2" name="title" required></div>
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="content4" class="col-md-5 col-form-label">Content</label>
					<div class="col-md-7"><textarea class="form-control form-control-lg" id="content4" name="content" required></textarea></div>
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="price6" class="col-md-5 col-form-label">Price</label>
					<div class="col-md-7"><input type="text" class="form-control form-control-lg" id="price6" name="price"></div>
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="model6" class="col-md-5 col-form-label">Model</label>
					<div class="col-md-7"><input type="text" class="form-control form-control-lg" id="model6" name="model"></div>
				</div>
				
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="select-option1" class="col-md-5 col-form-label">Auto / Manual</label>
					<div class="col-md-7"><select class="form-select custom-select custom-select-lg" id="select-option1" name= "auto">
							<option value="1">Auto</option>
							<option value="0">Manual</option>

						</select></div>
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="properties6" class="col-md-5 col-form-label">Properties</label>
					<div class="col-md-7"><input type="text" class="form-control form-control-lg" id="properties6" name="properties"></div>
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row">
					<label for="select-option1" class="col-md-5 col-form-label">Category</label>
					<div class="col-md-7">
                        <select class="form-select custom-select custom-select-lg" name="category" id="select-option1">
							<option value="">Select Category</option>
							<option value="">Category 1</option>
							<option value="">Category 2</option>
						</select></div>
				</div>
				
				<hr class="my-4" />
				<div>
					<label for="image" class="col-md-5 col-form-label">Select Image</label>
					<input type="file" id="image" name="image" accept="image/*">
				</div>
				
				<hr class="my-4" />
				<div class="form-group mb-3 row"><label for="insert10" class="col-md-5 col-form-label"></label>
					<div class="col-md-7"><button class="btn btn-primary btn-lg" type="submit">Insert</button></div>
				</div>
			</form>
		</div>
	</body>

</html>