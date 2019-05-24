<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/Testcase1.css">
<style type="text/css">
table{
	border-style: solid;
	text-align: center;
}
th{
	text-align: center;
}
#myBtn{
	margin-top: 50px;
	float:right;
	margin-bottom: 25px;
}
</style>
</head>
<body>		 
<!--creating input field for ionsertion -->	
<!-- Modal content -->
<button id="myBtn" class="btn btn-success" >CREATEPROFILE</button>
      <!-- The Register Modal -->
    	<div id="myModal" class="modal">
        <!-- Modal content -->
      	 <div class="modal-content" align="center">
			<!--creating input field for ionsertion -->	
			<span class="close">&times;</span>
			<div>
				<h2 align="center">Fill up the Details</h2>
				<form name="insertForm" method="post" action="" id="insertForm">
					<table border=0px" align="center" cellspacing="5px" class="table">
						<tr><td>Name:<td><input type="text" name="Name" id="name"></td></tr>
						<tr><td>Address:<td><input type="text" name="addr" id="addr"></td></tr>
						<tr><td>E_mail:<td><input type="text" name="textEmail" id="textEmail"></td></tr>
						<tr><td>Mob No:<td><input type="text" name="mobno" id="mobno"></td></tr>
						<tr><td>City:<td><input type="text" name="city" id="city"></td></tr>
						<tr><td>State:<td><input type="text" name="ste" id="ste"></td></tr>
						<tr><td><input type="submit" name="submitbtn" id="submitbtn" value="Submit" class="btn btn-primary">
						<td><input type="button" name="resetbttn" id="resetbttn" value="Reset" class="btn btn-primary"></td></tr>
					</table>
       		 </div>
				</form>
	</div>
 </div>

 <div id="myModal1" class="modal1">
    <!-- Modal content -->
     <div class="modal-content1">
		<span class="close1">&times;</span>
			<h2 align="center">Update Your Details</h2>
			    <form action=" " method="post" name="updateForm" id="updateForm">
			         <table border=0px" align="center" cellspacing="5px" class="table">
						<tr><td>Name:<td><input type="text" name="edit_name" id="edit_name" placeholder="Enter Your Name"></td></tr>
						<tr><td>Address:<td><input type="text" name="edit_addr" id="edit_addr"></td></tr>
						<tr><td>E_mail:<td><input type="text" name="edit_textEmail" id="edit_textEmail"></td></tr>
						<tr><td>Mob No:<td><input type="text" name="edit_mobno" id="edit_mobno"></td></tr>
						<tr><td>City:<td><input type="text" name="edit_city" id="edit_city"></td></tr>
						<tr><td>State:<td><input type="text" name="edit_ste" id="edit_ste"></td></tr>
						<input type="hidden" name="edit_id" id="edit_id">
						<tr><td><input type="submit" name="edit_submitbtn" id="edit_submitbtn" value="Submit" class="btn btn-primary" >
						</tr>
					</table>
       			 </div>
    		</div>
    	</div>
			</form>



<form>
	<table border="1px"  width="100%" class="table">
				<!-- <th width="5%" class="th">S.No</th> -->
				<th width="15%">Name</th>
				<th width="15%">Address</th>
				<th width="20%">Emai-ID</th>
				<th width="10%">Con.No</th>
				<th width="10%">City</th>
				<th width="10%">State</th>
				<th width="10%">Action</th>
				<tbody id="tBody">
				<?php 
					
				?>
				</tbody>
			</table>
	</form>
</body>
</html>
					<script type="text/javascript" src="js/jquery.min.js">
					</script>
					<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript">
		
			// Function to delete the record


			var modal = document.getElementById('myModal');
			var modal1 = document.getElementById('myModal1');
    		
    		$(document).ready(function(){
    			displayRecords();
    		});

	function displayRecords()
	{
		$('#tBody').html('');
		$.ajax({
		   cache:false,
	       type: "POST",
	       url: '?rt=index/getUserDetails',
	       data:{ajaxcall:true}
	       }).done(function(data){
	       	if(JSON.parse(data)){
	       		var data = JSON.parse(data);
	       		var html="";
	       		var count = data.MVC.user_result.length;
	       		if(count>0){
	       			for (var i = 0; i < count; i++) {
	       				html +='<tr>';
	       				
	       					html +='<td>';
	       						html += data.MVC.user_result[i].name;
	       					html +='</td>';
	       					html +='<td>';
	       						html += data.MVC.user_result[i].addr;
	       					html +='</td>';
	       					html +='<td>';
	       						html += data.MVC.user_result[i].textEmail;
	       					html +='</td>';
	       					html +='<td>';
	       						html += data.MVC.user_result[i].mobno;
	       					html +='</td>';
	       					html +='<td>';
	       						html += data.MVC.user_result[i].city;
	       					html +='</td>';
	       					html +='<td>';
	       						html += data.MVC.user_result[i].ste;
	       					html +='</td>';
	       					 html +='<td>';
	       						html += '<img title="Edit" src="images/Edit_icon.png" id="edit" editid="'+data.MVC.user_result[i].id+'">&nbsp;&nbsp;&nbsp;<img title="Delete" src="images/delete.png" id="del" deleteid="'+data.MVC.user_result[i].id+'">';
	       					html +='</td>';
	       					 
	       				html +='</tr>';

	       			}

	       			$('#tBody').append(html);
	       		}
	       	}
	       }).fail(function(){

	       })
	}

     $('#myBtn').click(function()
     {
		modal.style.display = "block";  
     });
      $("body").on("click","#edit", function()
 	{
 		var user_id = $(this).attr('editid');
 		$('#edit_id').val(user_id);
      	modal1.style.display = "block"; 
      	$.ajax({
	    cache:false,
        type: "POST",
        url: '?rt=index/getUserUPDATEDetails',
        data:{ajaxcall:true,eid: user_id}
        }).done(function(data){
       	if(JSON.parse(data)){
       		var data = JSON.parse(data);
       		var html="";
       		var count = data.MVC.user_result.length;
       		if(count>0){
       			for (var i = 0; i < count; i++) {
       				var ename  = data.MVC.user_result[i].name;
       				var address  = data.MVC.user_result[i].addr;
       				var email  = data.MVC.user_result[i].textEmail;
       				var mobileno  = data.MVC.user_result[i].mobno;
       				var city  = data.MVC.user_result[i].city;
       				var state  = data.MVC.user_result[i].ste;
       				$('#edit_name').val(ename);
       				$('#edit_addr').val(address);
       				$('#edit_textEmail').val(email);
       				$('#edit_mobno').val(mobileno);
       				$('#edit_city').val(city);
       				$('#edit_ste').val(state);
       			}

       			$('#tBody').append(html);
       		}
       	}
		 }).fail(function(){

		}) ; 
     });
    
	     $(".close").click(function(){
	      modal.style.display = "none"; 
	     });
	      $(".close1").click(function(){
	     
	      modal1.style.display = "none"; 
	     });
	  
	    window.onclick = function(event) {
	      if (event.target == modal) 
	      {
	        modal.style.display = "none";
	      }
	     else if(event.target == modal1)
	      {
	        modal1.style.display = "none";
	      }
	   
	     
	    }
	
	$("body").on("click","#del", function()
	{
		var x = confirm("Are you sure you want to delete?");
		if (x){
		var id = $(this).attr('deleteid');
		$.ajax({
		cache:false,
		type: "POST",
		url: '?rt=index/delete',
		data:{id:id}
		}).done(function(data){
		if(JSON.parse(data)){
		var data = JSON.parse(data); 
		if(data.MVC.user_deleted == 1){
			displayRecords();
			alert("User deleted");
			}else{
			alert("failed");
			}
			}
		}).fail(function(){

		}) ;
		} else
        return false;
    });

  //GETTTING INPUT FROM HTML TO PHP
   
    		 $('#insertForm').on('submit',function(e){
    		 		e.preventDefault();

	    		 	var Name = $('#name').val();
	    		 	var Address=$('#addr').val();
	    		 	var Email=$('#textEmail').val();
	    		 	var MobNo=$('#mobno').val();
	    		 	var City=$('#city').val();
	    		 	var State=$('#ste').val();
	    		 	//alert(State);

				       		$.ajax({
					       	   cache:false,
					           type: "POST",
					           url: '?rt=index/insert',
					           data:{ajax:true,'name':Name,'addr':Address,'textEmail':Email,'mobno':MobNo,'city':City,'ste':State},
					   
					           }).done(function(data){
					           	if(JSON.parse(data)){
					           		var data = JSON.parse(data); 
					           		if(data.MVC.user_inserted == 1){
					           			modal.style.display = "none";
					           			alert("User inserted");
					           			displayRecords();
					           			//$('#insertForm').trigger('click');
					           		}else{
					           			alert("failed");
					           		}
					           	}
					           }).fail(function(){
					           }) ;
                
          	 });

          	 $(document).ready(function(){
					$("#resetbttn").click(function(){
					$("#insertForm")[0].reset();
					});}); 

    		 $("#edit_submitbtn").on("click",function()
    		 		{
		    		 	$('#updateForm').on('submit',function(e){
		    		 		e.preventDefault();

			    		 	var name = $('#edit_name').val();
			    		 	var address=$('#edit_addr').val();
			    		 	var email=$('#edit_textEmail').val();
			    		 	var mobno=$('#edit_mobno').val();
			    		 	var city=$('#edit_city').val();
			    		 	var state=$('#edit_ste').val();
			    		 	var ids=$('#edit_id').val();
			    		 	//alert(State);

						       		$.ajax({
							       	   cache:false,
							           type: "POST",
							           url: '?rt=index/updatedinsert',
							           data:{ajax:true,'edit_name':name,'edit_addr':address,'edit_textEmail':email,'edit_mobno':mobno,'edit_city':city,'edit_ste':state,'ids':ids},					   
							           }).done(function(data){
							           	if(JSON.parse(data)){
							           		var data = JSON.parse(data); 
							           		console.log(data);
							           		if(data.MVC.user_inserted == 1){
							           			
							           			modal1.style.display = "none";

							           			alert("User updated");
							           			displayRecords();
							           			}else{
							           			alert("failed");
							           		}
							           	}
							           });
		                
		          	 		});   
					});

    		$("#myBtn").on("click",function clearInputFields()
    		 {
    		  
    		  	$('#name').val('');
    		  	$('#addr').val('');
    		  	$('#textEmail').val('');
    		  	$('#mobno').val('');
    		  	$('#city').val('');
    		  	$('#ste').val('');
    		  });
    		  
    		$("#submitbtn").on("click",function validate()
    		{
    		     	  var val=1;
				      var idd=$('#id').val();
				      var pata=$('#addr').val();
				      var nameing=$('#name').val();
				      var mob=$('#mobno').val();
				      var sttss=$('#ste').val();
				      var City=$('#city').val();
				      var email = $("#textEmail").val();
				      var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

				        if(nameing.length==0 && nameing=="")
				        {         
				          $("#names").text("Invalid Name ->"+ nameing);
				          alert('Invalid name  ->'+nameing);
				           	val=0;
			          		return false;
				        }
			        

					    if(pata.length==0 && pata=="")
					    {
					      $("#addr").text("Invalid Address ->"+ pata);
					      alert('Invalid pata Address ->'+pata);
					     	val=0;
			          		return false; 
					    }
					
					    if (reg.test(textEmail.value) == false) 
					    {
					      $("#textEmail").text("Invalid Email ->"+email);
					      alert('Invalid Email Address ->'+email);
					     	val=0;
			          		return false;
					    }
					    
					    if( mob.length!=10 && mob !=null)
					    {
					     
					      $("#mobno").text("Invalid Mob No ->"+ mob);
					      alert("Please provide correct number");
					      	val=0;
			          		return false; 
					    }
					    
					    if(City.length==0 && City=="")
					    {
					     
					      $("#city").text("Invalid city  ->"+ City);
					      alert("Please provide correct number");
					    	val=0;
			          		return false;
					    }
					    if(sttss.length==0 && sttss=="")
					    {
					      $("#ste").text("please provide correct  state  ->"+sttss);
					      alert("Please enter your state");
					      	val=0;
			          		return false;
					    }
    		});
</script>