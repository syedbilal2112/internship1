<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
	#container-div{
		width: 600px;
		height: 700px;
		box-shadow: 1px 1px 2px 6px #ccc;
		margin:auto;
		padding: 25px
	}
</style>
</head>
<body>
<div id="container-div">
	<div id="div1" class="alert alert-success"></div>
	<form action="mailer/index.php" method="get">
		<input type="text" name="name" id="name" class="form-control" placeholder="Enter your name">
		<br>
		<input type="email" name="email" id="email" class="form-control" placeholder="Enter yout Email">
		<br>
		<input type="number" name="phone_no" id="phone_no" class="form-control" placeholder="Enter your phone_no">
		<br>
		<textarea placeholder="Enter your comment" name="comment"></textarea>
		<input type="submit" id="btn" name="submit" value="Register" class="btn btn-primary">
	</form>
</div>
</body>
</html>