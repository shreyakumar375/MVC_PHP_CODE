
<?php

class user
{
	public function getUserDetails($db,$login_id,$user_name,$password,$c_password,$Email)
	{

		$sql = "SELECT TM_info_user_name,TM_info_user_emailid,TM_info_user_rollid,TM_role_name,if(TM_feature_name is null,'',TM_feature_name) AS featureName FROM TM_map_role roleMap LEFT JOIN TM_user_info AS userInfo ON userInfo.TM_info_user_id =roleMap.TM_info_user_id LEFT JOIN TM_roll_info AS roleInfo ON roleInfo.TM_role_id = roleMap.TM_role_id LEFT JOIN TM_map_feature AS featMap ON featMap.Tm_Role_id = roleMap.TM_role_id LEFT JOIN TM_feature_info AS featInfo ON featInfo.TM_feature_id = featMap.TM_feature_id WHERE TM_info_user_name ='$user_name' AND TM_info_user_pass='$password' AND featInfo.isActive = 1";

                

	$result=$db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
	//Sprint_r($result); exit();
	
	//return $result;
	echo json_encode(array('MVC'=>array('valid'=>1,'user_result'=>$result)));
	
	
	
	}

	public function fCreateNewUser($db,$username){
		$sql ="SELECT TM_info_user_name FROM TM_user_info WHERE TM_info_user_name ='$username' ";
		$result=$db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
		if(count($result)>0){
			return json_encode(array('task_management'=>array('exists'=>1,'session'=>1,'user_inserted'=>0)));
			exit;

		}else{
			$sql1 ="INSERT INTO  TM_user_info SET TM_info_user_name ='$username' ";
			//echo $sql; exit;
			$db->query($sql1);
			return json_encode(array('task_management'=>array('exists'=>0,'valid'=>1,'user_inserted'=>1)));
			exit;
		}
	}
	// from here add remove delete functionality code
	

}

?>