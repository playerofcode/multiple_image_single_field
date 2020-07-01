<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Multiple Images in Single Colomn from Multiple Input Field</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-6">
					<div class="card">
						<div class="card-header  text-center bg-primary text-white text-uppercase">
							Multiple Images in Single Colomn from Multiple Input Field
						</div>
						<div class="card-body">
							<form action="" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label>Name</label>
								<input type="text" name="name" class="form-control">
								</div>
								<div class="form-group">
									<label>Upload Image 1</label>
								<input type="file" name="img1" class="form-control">
								</div>
								<div class="form-group">
									<label>Upload Image 2</label>
								<input type="file" name="img2" class="form-control">
								</div>
								<div class="form-group">
									<label>Upload Image 3</label>
								<input type="file" name="img3" class="form-control">
								</div>
								<div class="form-group">
									<label>Upload Image 4</label>
								<input type="file" name="img4" class="form-control">
								</div>
								<div class="form-group">
									<input type="submit" name="submit" class="btn btn-primary
									">
								</div>
								
							</form>
						</div>
					</div>
				</div>
				<div class="col-sm-3"></div>
			</div>
		</div>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script></body>
</html>
<?php 
if(isset($_POST['submit']))
{
	include 'config.php';
	$name=$_POST['name'];
	$location="upload/";
	$file1=$_FILES['img1']['name'];
	$file_tmp1=$_FILES['img1']['tmp_name'];
	$file2=$_FILES['img2']['name'];
	$file_tmp2=$_FILES['img2']['tmp_name'];
	$file3=$_FILES['img3']['name'];
	$file_tmp3=$_FILES['img3']['tmp_name'];
	$file4=$_FILES['img4']['name'];
	$file_tmp4=$_FILES['img4']['tmp_name'];
	$data=[];
	$data=[$file1,$file2,$file3,$file4];
	$images=implode(' ',$data);
	$query="insert into test (car_name,images) values('$name','$images')";
	$fire=mysqli_query($con,$query);
	if($fire)
	{
		move_uploaded_file($file_tmp1, $location.$file1);
		move_uploaded_file($file_tmp2, $location.$file2);
		move_uploaded_file($file_tmp3, $location.$file3);
		move_uploaded_file($file_tmp4, $location.$file4);
		echo "success";
	}
	else
	{
		echo "failed";
	}
}

?>















