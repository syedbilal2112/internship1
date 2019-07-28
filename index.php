<?php include 'header.php';?>
<body>
<table id="Table" class="table table-hover">
	<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Email</th>
		<th>Address</th>
		<th>Branch</th>
		<th>Action</th>
	</tr>
</table>


<script type="text/javascript">
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