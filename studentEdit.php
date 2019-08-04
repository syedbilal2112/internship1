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
		box-shadow: 1px 1px 2px 6px #eee;
		margin:auto;
		padding: 25px
	}
</style>
</head>
<body>
	<?php
		include 'conn.php';
		$id = $_GET['id'];
		$query="SELECT * FROM `students` WHERE `id`=$id";
		$result=mysqli_query($con,$query);
		$row=mysqli_fetch_row($result);	
		$name = $row[1];
		$email = $row[2];
		$address = $row[3];
		$branch = $row[4];
		$profile = $row[5];
	?>
<div id="container-div">
	<center><img src="<?php echo $profile;?>" id="profile_pic" width="150px" height="150px" style="border-radius: 50%">
		<input type="file" name="files[]" id="file" accept="*">
		<input type="button" id="upload_profile_pic" name="button" value="Upload" class="btn btn-info">
	</center>
	<form action="updateStudent.php" method="post">
		<input type="hidden" name="id" id="id" value="<?php echo $id;?>">
		<input type="text" name="name" value="<?php echo $name;?>" id="name" class="form-control" placeholder="Enter your name">
		<br>
		<input type="email" name="email" value="<?php echo $email;?>" id="email" class="form-control" placeholder="Enter yout Email">
		<br>
		<textarea name="address" id="address" class="form-control" placeholder="Enter yout address"><?php echo $address;?></textarea>
		<br>
		<select name="branch" id="branch" class="form-control" value="<?php echo $branch;?>">
			<option>Select Branch</option>
			<option>CSE</option>
			<option>ISE</option>
			<option>ECE</option>
			<option>ME</option>
		</select>
		<input type="submit" id="btn" name="submit" value="Register" class="btn btn-primary">
	</form>
</div>

<script type="text/javascript">
	$(function(){
		$('#file').on('change', function () {
                    var file_data = $('#file').prop('files')[0];
                    var form_data = new FormData();
                    form_data.append('file', file_data);
                    $.ajax({
                        url: 'upload.php', // point to server-side PHP script 
                        dataType: 'text', // what to expect back from the PHP script
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function (response) {
                        
                            alert(response)
                            document.getElementById("profile_pic").src=response;
                            x=response;

                           
                        },
                        error: function (response) {
                          
                           alert(response);
                        }
                    });
               });
		$('#upload_profile_pic').on('click', function () {

                  var id=$("#id").val();
                  var profile=x;
                   
                        $.ajax({
                            url:"update_profile_pic.php",
                            type:"post",
                            data:{
                                "id":id,
                                "profile":profile
                            },
                            success:function(data){
                              alert(data);
                             // window.reload();   
                              },
                              error:function(){
                                alert(';hi');
                              }
                });
                    })
	})
</script>
</body>
</html>