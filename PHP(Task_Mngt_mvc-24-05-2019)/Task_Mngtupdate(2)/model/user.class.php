
<?php

class user
{
	public function getUserDetails($db,$login_id,$user_name,$password,$c_password,$Email)
	{

		$sql =  "SELECT TM_info_user_pass,TM_role_name
				 FROM 
				 	TM_user_info T1 JOIN TM_roll_info T2
				 ON 
				 	T1.TM_info_user_id=T2.TM_role_id
				 	AND
				 	TM_info_user_name ='$user_name' AND TM_info_user_pass ='$password'";


                 //  $db->exec($sql);

	$result=$db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

	
	//return $result;
	echo json_encode(array('MVC'=>array('valid'=>1,'user_result'=>$result)));
	
	}
	// from here add remove delete functionality code
	

}

?>