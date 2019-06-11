<!DOCTYPE html>
<html>
<head>
	<?php include("Header.php");?>
	<title></title>
	<style type="text/css">
		.table-dash{
			border: 0px;
			padding: 5px;
		}
		.tddash{
			margin-left: 10px;
			margin-top: -32px;
			margin-left: 122px;

		}
	</style>
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
<table class="tg">
<?php
		
		$user_arr = $result["MVC"]["user_result"][0];
		$fea_info = $result["MVC"]["feature_list"];

		//print_r($_SESSION);
		/*for($i=0; $i < count($user_arr); $i++)
		{*/
		echo'<div>';
		foreach ($fea_info as $key => $value) {
			echo'<td class="tg">'.$value['TM_feature_name'].'</td>';
		}
		echo'</div>';
?>
</table>

<?php 
	/*	echo "<ul>";
		foreach ($fea_info as $key => $value) {
			echo "<li>".$value['TM_feature_name'];
				echo "<ul>";
				foreach ($value['sub_feature'] as $skey => $svalue) {
					echo "<li>".$svalue['TM_feature_name']."</li>";
				}
			echo "</li></ul>";
		}
		echo "</ul>";
*/
		include("Footer.php"); ?>
		</div>
</body>
</html>	