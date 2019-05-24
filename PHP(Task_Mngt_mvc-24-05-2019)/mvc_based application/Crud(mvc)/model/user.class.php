<?php

class user{
        	public function getUserDetails($db)
            {
                 
            
                $stmt = "SELECT id, name, addr,textEmail,mobno,city,ste FROM shreyas where name!='' AND isActive = '1'"; 
                $result=$db->query($stmt)->fetchAll(PDO::FETCH_ASSOC);                                                                                                                                  
                
                return json_encode(array('MVC'=>array('valid'=>1,'session'=>1,'user_result'=> $result)));		
        	}
            public function fDeleteUserDetails($db,$id)
                {
                    
                    $stmt = "UPDATE shreyas SET isActive = '0' WHERE id = '$id' "; 
                    $db->query($stmt);                                                                                                                  
                    return json_encode(array('MVC'=>array('valid'=>1,'session'=>1,'user_deleted'=>1)));
                }
            public function fUpdatetUserDetails($db,$id,$Name,$Address,$Email,$MobNo,$City,$State){
                         $sql = "UPDATE shreyas SET name='$Name',addr='$Address',textEmail='$Email',mobno='$MobNo',city='$City',ste='$State' WHERE id='$id'";
                         $db->exec($sql);
                    return json_encode(array('MVC'=>array('valid'=>1,'session'=>1,'details_updated'=>1)));
                 }
            public function fInsertUserDetails($db,$Name,$Address,$Email,$MobNo,$City,$State)
                {
                   
                
                    $sql = "INSERT INTO shreyas (name,addr, textEmail,mobno,city,ste)
                    VALUES ('$Name','$Address','$Email','$MobNo','$City','$State')";
                    $db->exec($sql);
                    return json_encode(array('MVC'=>array('valid'=>1,'session'=>1,'user_inserted'=>1)));
                 }


            public function fGetUserInfomation($db,$user_id)
                {
                   
                
                    $sql = "SELECT name,addr, textEmail,mobno,city,ste FROM shreyas WHERE id='$user_id'";
                    $result=$db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
                    return json_encode(array('MVC'=>array('valid'=>1,'session'=>1,'user_result'=>$result)));
                 }


                 public function getUserUPDATEDetails($db,$id)
            {
                 
            
                $stmt = "SELECT id, name, addr,textEmail,mobno,city,ste FROM shreyas where id='".$id."'"; 
                $result=$db->query($stmt)->fetchAll(PDO::FETCH_ASSOC);                                                                                                                                  
                
                return json_encode(array('MVC'=>array('valid'=>1,'session'=>1,'user_result'=> $result)));       
            }

            public function fInsertUserUpdateDetails($db,$id,$name,$address,$email,$mobno,$city,$state)
                {
                   
                
                   // $sql = "INSERT INTO shreyas (name,addr, textEmail,mobno,city,ste)
                    //VALUES ('$name','$address','$email','$mobno','$city','$state')";
                    $sql="UPDATE shreyas SET  name = '$name', addr = '$address',textEmail = '$email',mobno = '$mobno',city = '$city',ste = '$state' WHERE id = '$id'";
                    $db->exec($sql);
                    return json_encode(array('MVC'=>array('valid'=>1,'session'=>1,'user_inserted'=>1)));
                 }

   

}

?>