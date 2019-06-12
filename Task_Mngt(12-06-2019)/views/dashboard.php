<!DOCTYPE html>
<html>
<head>
	<?php include("Header.php");?>
	<title></title>
	
	<link rel="stylesheet" href="http://localhost/phpfiles/Task_Mngt/css/bootstrap.min.css">
  <link rel="stylesheet" href="../Task_Mngt/css/Mystyle.css">
  <link rel="stylesheet" href="../Task_Mngt/css/Testcase1.css">
  <title>Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<br><br><br><br><br>
<body>
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;margin:15px;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:none;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:12px 21px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black; margin-top: 32px;margin-left: 120px;}
.tg .tg-0lax{text-align:left;vertical-align:top}
</style>
<div>
<!-- <table class="tg">
 --><?php
		/*
		$user_arr = $result["MVC"]["user_result"][0];
		$fea_info = $result["MVC"]["feature_list"];
*/
		//print_r($_SESSION);
		/*for($i=0; $i < count($user_arr); $i++)
		{*/
		/*echo'<div>';
		foreach ($fea_info as $key => $value) {
			echo'<td class="tg">'.$value['TM_feature_name'].'</td>';
		}
		echo'</div>';*/
?>
<!-- </table>
 -->
<?php 
		/*echo "<ul>";
		foreach ($fea_info as $key => $value) {
			echo "<li>".$value['TM_feature_name'];
				echo "<ul>";
				foreach ($value['sub_feature'] as $skey => $svalue) {
					echo "<li>".$svalue['TM_feature_name']."</li>";
				}
			echo "</li></ul>";
		}
		echo "</ul>";*/

		 ?>



		<table class="tg">
<?php
		
		
		$fea_name = $_SESSION['user_feature_info']['feature_list'];
		$parent_fea=$_SESSION['user_feature_info']['parent_list'];
	   	//$fea_name_arr = explode(',', $fea_name);
		//print_r($_SESSION['user_feature_info']['feature_list']);
		for($i=0; $i<= count($fea_name); $i++)
		{
			$id='feature_'.$i;	
			echo'<div>';
			echo'<td class="tg-0lax cursor-pointer-class" id='.$id.'>'.$fea_name[$i].'</td>';
			echo'</div>';
		}
		include("Footer.php");
?>
		</div>
</body>
</html>	
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">
	/*$("body").on("click","#feature_0",function(e)
		{
			e.preventDefault();
			window.location="?rt=user/fManageUserDetails";
		});*/
		 $("#feature_0").click(function(){
		 	//alert("11");
	  	window.location="?rt=user/fManageUserDetails";
		}); 
		 $("#feature_1").click(function(){
		 	//alert("11");
	  	window.location="?rt=user/fViewUserDetails";
		}); 
</script>