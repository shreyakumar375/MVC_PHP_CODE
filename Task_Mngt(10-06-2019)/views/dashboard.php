<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;margin:15px;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg .tg-0lax{text-align:left;vertical-align:top}
</style>
<table class="tg">
<?php
		
		$fea_id = $_SESSION['user_feature_info']['fea_id'];
		$fea_arr = explode(',', $fea_id);
		$fea_name = $_SESSION['user_feature_info']['fea_name'];
		$fea_name_arr = explode(',', $fea_name);

		//print_r($_SESSION);
		for($i=0; $i < count($fea_arr); $i++)
		{
echo'<tr>';
			echo'<th class="tg-0lax">'.$fea_name_arr[$i].'</th>';
			echo'</tr>';

			echo'<tr>';
			echo'<th class="tg-0lax">'.$fea_name_arr[$i].'</th>';
			echo'</tr>';

		}
?>
</table>
<?php include("Footer.php"); ?>
</body>
</html>	