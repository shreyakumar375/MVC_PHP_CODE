<!DOCTYPE>
<html>
<head>
	<title>View Report</title>
	<style type="text/css">
		.tables{
      border-style: solid;
      text-align: center;
    }
    th{
      text-align: center;
    }
    .color{
			color: white;
			width: 100%;
			background: #363D63;
		}	
	</style>
</head>
<body>
	 
	 <form>
	 	<div class="color" align="center" ><h1>Details of all users</h1></div>
      <table border="0px" width="100%" class="tables">
        <thead>
          <tr>
            <th width="10%">Serial Id</th>
            <th width="10%">Employee Name</th>
            <th width="10%">Employee Password</th>
            <th width="20%">Employee Emai-ID</th>
            <th width="20%">Employee Creation Date</th>
            <th width="20%">Employee Creation Date&Time</th>
            <th width="10%">Action</th>
          </tr>
        </thead>
        <tbody id="userTBody"></tbody>
      </table>
    </form>

</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
	
	
//fetching user details from database
$(document).ready(function(){
	displayRecords();
});

function displayRecords()
{
	var flag = ($('#show_inactive').is(':checked')) ? 0 : 1;
	$('#tBody').html('');
	$.ajax({
		cache:false,
		datatype:"json",
		type: "POST",
		url: '?rt=user/getDetails',
		data:{ajaxcall:true,flag:flag}
	}).done(function(data){
		if(JSON.parse(data)){
			var data = JSON.parse(data);
			//alert(data);
			console.log(data);
			var html="";
			var count = data.MVC.user_result.length;
			if(count>0){
				for (var i = 0; i < count; i++) {
					html +='<tr>';

					html +='<td>';
					html += i+1;
					html +='</td>';
					html +='<td>';
					html += data.MVC.user_result[i].TM_info_user_name;
					html +='</td>';
					html +='<td>';
					html += data.MVC.user_result[i].TM_info_user_pass;
					html +='</td>';
					html +='<td>';
					html += data.MVC.user_result[i].TM_info_user_emailid;
					html +='</td>';
					html +='<td>';
					html += data.MVC.user_result[i].TM_info_user_created_date;
					html +='</td>';
					html +='<td>';
					html += data.MVC.user_result[i].TM_info_user_created_date_time;
					html +='</td>';
					html +='<td>';
					html += '<img title="Edit" src="../Task_Mngt/images/Edit_icon.png" id="edit" editid="'+data.MVC.user_result[i].id+'">&nbsp;&nbsp;&nbsp;<img title="Delete" src="../Task_Mngt/images/delete.png" id="del" deleteid="'+data.MVC.user_result[i].id+'">';
					html +='</td>';

					html +='</tr>';

				}

				$('#userTBody').append(html);
			}
		}
	}).fail(function(){

	})
}


</script>