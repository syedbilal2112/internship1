<?php include 'header.php';?>
<body>
<table id="Table" class="table table-hover">
	<tr>
		<th>Id</th>
		<th>Profile Pic</th>
		<th>Name</th>
		<th>Email</th>
		<th>Address</th>
		<th>Branch</th>
		<th>Action</th>
	</tr>
</table>
<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Details</h4>
        </div>
        <div class="modal-body">
          <label> Name</label>
          <input  class="form-control" disabled type="text" id="name1" name="name"><br>
	<label> Email</label>
	<input  class="form-control" disabled type="email" id="email1" name="email"><br>
	<label> Address</label><textarea  class="form-control" disabled  id="address1" name="address1"></textarea><br>
	<label> Branch</label><input  class="form-control" disabled type="text" id="branch1" name="branch1"><br>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>



<script type="text/javascript">
	function dele(id){
		alert(id)
		$.ajax({
			url:'delete.php',
			type:'get',
			data:{
				id:id
			},
			success:function(){
				alert("successfully deleted")
				call()
			},
			error:function(){
				alert("failed to delete")
			}
		})
	}
	function studentView(id){
		alert(id)
		$.ajax({
			url:'viewById.php',
			type:'get',
			data:{
				id:id
			},
			success:function(res){
				var obj = JSON.parse(res);
				$('#name1').val(obj[0].student_name);
				$('#email1').val(obj[0].student_email);
				$('#address1').val(obj[0].student_address);
				$('#branch1').val(obj[0].student_branch);
				$('#myModal').modal('show');
			},
			error:function(){
				alert("failed to delete")
			}
		})
	}
	function call(){
		$.ajax({
			url:'view.php',
			type:'get',
			data:{

			},
			success:function(res){
				var obj = JSON.parse(res)
				var table_content = '';
				$('#Table').find( 'tr:not(:first)' ).remove();
                        $.each(obj,function(index,value){
                            table_content+="<tr>";
                            table_content+="<td>"+value.id+"</td>";
                            table_content+="<td><img src='"+value.student_profile_pic+"' width='70px' height='70px' style='border-radius:50%'></td>";
                            table_content+="<td>"+value.student_name+"</td>";
                            table_content+="<td>"+value.student_email+"</td>";
                            table_content+="<td>"+value.student_address+"</td>";
                            table_content+="<td>"+value.student_branch+"</td>";
  table_content+="<td><a class='btn btn-primary' href='studentEdit.php?id="+value.id+"'>Edit</a><button class='btn btn-danger' onclick='dele("+value.id+")'>Delete</button><button class='btn btn-info' onclick='studentView("+value.id+")'>View</button></td>";
                            table_content+="</tr>";
                        });
                        $("#Table").append(table_content);
 			}
		})
	}
	call()
</script>
</body>
</html>