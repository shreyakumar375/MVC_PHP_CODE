               
<?php

class user
{
	public function getUserDetails($db,$login_id,$user_name,$password,$c_password,$Email)
	{

		/*$sql = "SELECT TM_info_user_name,TM_info_user_emailid,TM_info_user_rollid,TM_role_name,if(TM_feature_name is null,'',TM_feature_name) AS featureName FROM TM_map_role roleMap LEFT JOIN TM_user_info AS userInfo ON userInfo.TM_info_user_id =roleMap.TM_info_user_id LEFT JOIN TM_roll_info AS roleInfo ON roleInfo.TM_role_id = roleMap.TM_role_id LEFT JOIN TM_map_feature AS featMap ON featMap.Tm_Role_id = roleMap.TM_role_id LEFT JOIN TM_feature_info AS featInfo ON featInfo.TM_feature_id = featMap.TM_feature_id WHERE TM_info_user_name ='$user_name' AND TM_info_user_pass='$password' AND featInfo.isActive = 1 GROUP BY TM_info_user_name";*/
        $sql="SELECT TM_info_user_id,TM_info_user_name,TM_info_user_rollid,TM_info_user_emailid,TM_role_name,TM_info_user_pass,TM_role_id,TM_role_name FROM TM_user_info AS userinfo LEFT JOIN TM_role_info AS roleinfo ON userinfo.TM_info_user_rollid=roleinfo.TM_role_id WHERE  TM_info_user_name ='$user_name' AND TM_info_user_pass='$password' AND userinfo.TM_info_user_isActive = 1 GROUP BY TM_info_user_name"; 

        $result=$db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
         //print_r($result); exit();
        return json_encode(array('MVC'=>array('valid'=>1,'user_result'=>$result)));

    }

    public function fCreateNewUser($db,$login_id,$username,$password,$Email,$Creationdate,$Creationdate_time,$emp_role)
    {
      $sql ="SELECT TM_info_user_name FROM TM_user_info WHERE TM_info_user_name ='$username' ";
      $result=$db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
      if(count($result)>0)
        {
         return json_encode(array('task_management'=>array('exists'=>1,'session'=>1,'user_inserted'=>0)));
         

        }
     else
       {
         $sql1 ="INSERT INTO  TM_user_info SET TM_info_login_id='$login_id',TM_info_user_name ='$username',TM_info_user_pass= md5('$password'),TM_info_user_emailid='$Email',TM_info_user_created_date=now(),TM_info_user_created_date_time=now(),TM_info_user_rollid='$emp_role',TM_info_user_isActive='1' ";

         $db->query($sql1);
         return json_encode(array('task_management'=>array('exists'=>0,'valid'=>1,'user_inserted'=>1)));
         exit;
        }
    }
	// from here add remove delete functionality code
     public function getDetails($db,$flag)
    {
        $stmt = "SELECT TM_info_user_id AS id,
        TM_info_login_id, 
        TM_info_user_name, 
        TM_info_user_pass,
        TM_info_user_emailid,
        DATE_FORMAT(TM_info_user_created_date,'%d/%m/%Y') AS TM_info_user_created_date,
        DATE_FORMAT(TM_info_user_created_date_time,'%d/%m/%Y %H:%m') AS TM_info_user_created_date_time

        FROM TM_user_info 
        WHERE TM_info_user_name!='' AND TM_info_user_isActive = '$flag' "; 
        $result=$db->query($stmt)->fetchAll(PDO::FETCH_ASSOC);                         
        return json_encode(array('MVC'=>array('valid'=>1,'session'=>1,'user_result'=> $result)));

    }

    public function fDeleteUserDetails($db,$id)
    { 
        $stmt = "UPDATE TM_user_info SET TM_info_user_isActive = '0' WHERE TM_info_user_id = '$id' "; 
        $db->query($stmt);                                                 
        return json_encode(array('MVC'=>array('valid'=>1,'session'=>1,'user_deleted'=>1)));
    }

    public function getUserUPDATEDetails($db,$id)
    {
        $stmt = "SELECT TM_info_user_id AS id,TM_info_login_id, TM_info_user_name, TM_info_user_pass,TM_info_user_emailid,TM_info_user_created_date,TM_info_user_created_date_time,TM_info_user_rollid FROM TM_user_info where TM_info_user_name!='' AND TM_info_user_id = '$id' "; 
        $result=$db->query($stmt)->fetchAll(PDO::FETCH_ASSOC);
            //print_r($result);exit();
        return json_encode(array('MVC'=>array('valid'=>1,'session'=>1,'user_result'=> $result)));

    }
                        // FUNCTIONALITY OF UPDATED DATA FOR INSERT INTO DATABASE
    public function fInsertUserUpdatedDetails($db,$id,$login_id,$username,$password,$Email,$edit_employerole,$Creationdate,$Creationdate_time)
    {
       $sql="UPDATE TM_user_info 
       SET  TM_info_login_id = '$login_id', 
       TM_info_user_name = '$username',
       TM_info_user_pass = md5('$password'),
       TM_info_user_emailid = '$Email',
       TM_info_user_rollid ='$edit_employerole',
       TM_info_user_created_date = now(),
       TM_info_user_created_date_time = now()
       WHERE  TM_info_user_id = '$id'";
       $db->query($sql);
             //print_r($db);exit();
       return json_encode(array('MVC'=>array('valid'=>1,'session'=>1,'user_inserted'=>1)));
    }

    public function getUserRoleDetails($db)
    {
        $sql = "SELECT * from TM_role_info ";
        $result = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        return json_encode(array('MVC'=>array('valid'=>1,'session'=>1,'role_fetched'=>$result)));
    }
    public function getupdateUserRoleDetails($db,$id)
    {
        $sql="SELECT * from TM_user_info userinfo,TM_role_info rollinfo WHERE userinfo.TM_info_user_rollid=rollinfo.TM_role_id ";
        $result = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
            //print_r($result);exit();
        return json_encode(array('MVC'=>array('valid'=>1,'session'=>1,'role_fetched'=>$result)));
    }

    public function fViewRoleDetails($db)
    {
        $sql = "SELECT * from TM_role_info ";
        $result = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        //print_r($result); exit();
        return json_encode(array('MVC'=>array('valid'=>1,'session'=>1,'role_details'=> $result)));
        //echo(json_encode($result));
    }

    public function getRoleDetails($db){

        $sql = "SELECT TM_role_id AS role_id,TM_role_name AS role_name,TM_role_isActive AS role_isActive FROM TM_role_info WHERE TM_role_isActive=1 ORDER BY TM_role_name";
        $result = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        return json_encode(array('task_mngt'=>array('valid'=>1,'session'=>1,'roles_list'=>$result)));
    }
    public function getFeatureDetailsByRole($db,$role_id)
    {
        $sql="SELECT t1.TM_feature_id, t1.TM_feature_tag_name, t3.Tm_Role_id FROM TM_feature_info as t1,TM_role_map_feature as t2,TM_role_info as t3 WHERE t1.TM_feature_id = t2.TM_role_map_feature_id AND t3.TM_role_id = t2.Tm_Role_id AND t2.TM_role_map_feature_isActive = 1 AND t1.TM_feature_menu_flag = 0  ";
                $result = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
                print_r( $result); exit();

        return json_encode(array('task_mngt'=>array('valid'=>1,'session'=>1,'roles_list'=>$result)));
    }

    
}

?>