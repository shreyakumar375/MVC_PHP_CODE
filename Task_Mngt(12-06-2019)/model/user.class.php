               
<?php

class user
{
    public function getUserDetails($db,$login_id,$user_name,$password,$c_password,$Email)
    {

        /*$sql = "SELECT TM_info_user_name,TM_info_user_emailid,TM_info_user_rollid,TM_role_name,if(TM_feature_name is null,'',TM_feature_name) AS featureName FROM TM_map_role roleMap LEFT JOIN TM_user_info AS userInfo ON userInfo.TM_info_user_id =roleMap.TM_info_user_id LEFT JOIN TM_roll_info AS roleInfo ON roleInfo.TM_role_id = roleMap.TM_role_id LEFT JOIN TM_map_feature AS featMap ON featMap.Tm_Role_id = roleMap.TM_role_id LEFT JOIN TM_feature_info AS featInfo ON featInfo.TM_feature_id = featMap.TM_feature_id WHERE TM_info_user_name ='$user_name' AND TM_info_user_pass='$password' AND featInfo.isActive = 1 GROUP BY TM_info_user_name";*/
        /*$sql="SELECT TM_info_user_id,TM_info_user_name,TM_info_user_rollid,TM_info_user_emailid,TM_role_name,TM_info_user_pass,TM_role_id,TM_role_name FROM TM_user_info AS userinfo LEFT JOIN TM_role_info AS roleinfo ON userinfo.TM_info_user_rollid=roleinfo.TM_role_id WHERE  TM_info_user_name ='$user_name' AND TM_info_user_pass='$password' AND userinfo.TM_info_user_isActive = 1 GROUP BY TM_info_user_name";*/ 
        $sql=" SELECT 
            userinfo.TM_info_user_id,
            userinfo.TM_info_user_emailid,
            userinfo.TM_info_user_name,
            roleinfo.TM_role_name,
            roleinfo.TM_role_tag_name,
            roleinfo.TM_role_admin_type,
            GROUP_CONCAT(feainfo.TM_feature_id) AS fea_id,
            GROUP_CONCAT(feainfo.TM_feature_name) AS fea_name,
            GROUP_CONCAT(feainfo.TM_feature_tag_name) AS fea_tag_name,
            GROUP_CONCAT(feainfo.TM_feature_parent_id) AS fea_parent_id
        FROM 
            TM_user_info AS userinfo 
        LEFT JOIN 
            TM_role_info AS roleinfo ON userinfo.TM_info_user_rollid=roleinfo.TM_role_id 
        LEFT JOIN 
            TM_role_map_feature AS fea_map_info ON roleinfo.TM_role_id=fea_map_info.Tm_Role_id AND fea_map_info.TM_role_map_feature_isActive = 1
        LEFT JOIN 
            TM_feature_info AS feainfo ON fea_map_info.TM_feature_id=feainfo.TM_feature_id

        WHERE
            TM_info_user_name ='$user_name' AND
            feainfo.TM_feature_menu_flag=1 AND
            TM_info_user_pass='$password' AND
            userinfo.TM_info_user_isActive = 1 GROUP BY TM_info_user_name";
        $featurearray = array(); 
        $result=$db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
       //print_r($result);exit();
        //print_r($result[0]['TM_info_user_id']);exit();
        $featurearray['user_id'] = $result[0]['TM_info_user_id'];
        $featurearray['email_id'] = $result[0]['TM_info_user_emailid'];
        $featurearray['user_name'] = $result[0]['TM_info_user_name'];
        $featurearray['role_name'] = $result[0]['TM_role_name'];
        $featurearray['role_tag_name'] = $result[0]['TM_role_tag_name'];
        $featurearray['admin_type'] = $result[0]['TM_role_admin_type'];
        $fea_arr = explode(',', $result[0]['fea_id']);
        $fea_name_arr = explode(',', $result[0]['fea_name']);
        $fea_parent_arr = explode(',', $result[0]['fea_parent_id']);
        for($i=0;$i<count($fea_arr);$i++)
        {
            $featurearray['feature_list'][$i] = $fea_name_arr[$i];
            $featurearray['parent_list'][$i] = $fea_parent_arr[$i];

        }
        //print_r($featurearray);exit();
        //print_r($featurearray);exit();
        return json_encode(array('MVC'=>array('valid'=>1,'user_result'=>$featurearray)));
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
    $sql = "SELECT * from TM_role_info  ";
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

    $sql="SELECT t1.TM_feature_id, t1.TM_feature_name, t3.Tm_Role_id FROM TM_feature_info as t1,TM_role_map_feature as t2,TM_role_info as t3 WHERE t1.TM_feature_id = t2.TM_role_map_feature_id AND t3.TM_role_id = $role_id AND t2.TM_role_map_feature_isActive = 1 AND t1.TM_feature_menu_flag = 1 ";
    $result = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
                //print_r( $result); exit();
    foreach ($result as $key => $value) {

       $sql1 = "SELECT t1.TM_feature_id, t1.TM_feature_name, t3.Tm_Role_id FROM TM_feature_info as t1,TM_role_map_feature as t2,TM_role_info as t3 WHERE t1.TM_feature_id = t2.TM_feature_id AND t2.TM_role_id = t3.TM_role_id AND t2.TM_role_id = $role_id AND t2.TM_role_map_feature_isActive = 1 AND t1.TM_feature_menu_flag = 0 and t1.TM_feature_parent_id ='".$value['TM_feature_id']."'";
        $result1 = $db->query($sql1)->fetchAll(PDO::FETCH_ASSOC);
        $result[$key]['subfeature']= $result1;
    }
                //print_r( $result); exit();
    return json_encode(array('task_mngt'=>array('valid'=>1,'session'=>1,'roles_feature_list'=>$result)));
}

public function fupdatedroleDetails($db,$editid)
{
    $sql = "SELECT TM_role_id,TM_role_name,TM_role_description from TM_role_info
    WHERE TM_role_id='$editid' ";
    $result = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        //print_r($result); exit();
    return json_encode(array('MVC'=>array('valid'=>1,'session'=>1,'role_details'=> $result)));
        //echo(json_encode($result));
}

public function fCreateNewRole($db,$rolename,$roledesc)
{
    $sql ="INSERT INTO TM_role_info SET TM_role_name='$rolename',TM_role_description='$roledesc' ";
    $db->query($sql);
    return json_encode(array('task_management'=>array('exists'=>0,'valid'=>1,'user_inserted'=>1)));
}

public function getFeatureDetailslist($db)
{

    $sql="SELECT t1.TM_feature_id, t1.TM_feature_name FROM TM_feature_info as t1 WHERE t1.TM_feature_isActive=1 AND t1.TM_feature_display_flag = 1 AND t1.TM_feature_menu_flag = 1 AND t1.TM_feature_parent_id = 0";
    $result = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
                //print_r( $result); exit();
    foreach ($result as $key => $value) {

        $sql1="SELECT t1.TM_feature_id, t1.TM_feature_name FROM TM_feature_info as t1 WHERE t1.TM_feature_isActive=1 AND t1.TM_feature_display_flag = 1 AND t1.TM_feature_menu_flag = 0 AND t1.TM_feature_parent_id ='".$value['TM_feature_id']."' ";
        $result1 = $db->query($sql1)->fetchAll(PDO::FETCH_ASSOC);
        $result[$key]['subfeature']= $result1;
    
    }
                //print_r( $result); exit();
    return json_encode(array('task_mngt'=>array('valid'=>1,'session'=>1,'roles_feature_list'=>$result)));
}

public function fRoledelete($db,$id)
{ 
    $stmt = "DELETE FROM TM_role_info WHERE TM_role_id='$id'"; 
    $db->query($stmt);                                                 
    return json_encode(array('MVC'=>array('valid'=>1,'session'=>1,'user_deleted'=>1)));
}
}

?>