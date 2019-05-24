
<?php

class user
{
	public function getUserDetails($db,$login_id,$user_name,$password,$c_password,$Email)
	{

		$sql =  "SELECT TM_info_user_pass 
				 FROM 
				 	TM_user_info 
				 WHERE 
				 	TM_info_user_name ='$user_name' AND TM_info_user_pass ='$password'";


                 //  $db->exec($sql);

	$result=$db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
	
	return $result;
	
	}

}

?>