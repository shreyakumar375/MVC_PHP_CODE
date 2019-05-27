

			 // Function to delete the record

			 $("body").on("click","#del", function() {
			
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
				           			alert("User deleted");
				           		}else{
				           			alert("failed");
				           		}
				           	}
				           }).fail(function(){

				           }) ;
				    
      });

			 $("#createprofile").on("click", function() {
			
			 		var id = $(this).attr('createprofile');
				       		$.ajax({
				       	   cache:false,
				           type: "POST",
				           url: '?rt=index/insert',
				           data:{id:id}
				           }).done(function(data){
				           	if(JSON.parse(data)){
				           		var data = JSON.parse(data); 
				           		if(data.MVC.user_inserted == 1){
				           			alert("User inserted");
				           		}else{
				           			alert("failed");
				           		}
				           	}
				           }).fail(function(){

				           }) ;
				    
      });
    
 
			  $("#edit").on("click", function(editid){
				     	alert('edit');
			});

		</script>
