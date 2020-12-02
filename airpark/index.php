<?php
  $db = mysqli_connect("localhost", "root", "", "airpark");

  if (isset($_POST['upload'])) {
  	// Get image name
     $image = $_FILES['image']['name'];
     
  	// Get location/address
  	$location = mysqli_real_escape_string($db, $_POST['location']);

  	// image file directory
  	$target = "images/".basename($image);

  	$sql = "INSERT INTO locations (location, image) VALUES ('$location', '$image')";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		echo"<script>alert('Image uploaded successfully')</script>";
  	}else{
        echo"<script>alert('Failed to upload image')</script>";
  	}
  }
?>
<!DOCTYPE html>
<html>
<head>
<title>location and Image Upload</title>
<style type="text/css">
   #content{
   	width: 50%;
   	margin: 120px auto;
   	border: 1px solid #cbcbcb;
      padding: 20px;
   }
</style>
</head>
<body>
<div id="content">
  <form method="POST" action="index.php" enctype="multipart/form-data">
  <textarea id="text" cols="40" rows="4" name="location" placeholder="location/address:"></textarea>
  <br><br>
  	<input type="file" name="image" multiple="false" accept="image/*" id="user-image-upload">
     <br><br>
  	<button type="submit" name="upload">Submit</button>
     <br><br>
  	</div>
  </form>
</div>
</body>
</html>