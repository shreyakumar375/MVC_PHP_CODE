<?php

Class indexController Extends baseController {

				public function index() 
				{
						//$user_obj = new user();
						/*$result = $user_obj->fPopulateUserDetails($this->registry->db);
						$result = json_decode($result,true);

						$result = $result['MVC']['user_result'];
						//echo '<pre>';print_r($result);die();
						$this->registry->template->result = $result;*/
						
				        $this->registry->template->show('view');
				}

				public function getUserDetails() 
				{
					if(isset($_POST['ajaxcall'])){
						$user_obj = new user();
						$result = $user_obj->getUserDetails($this->registry->db);
						echo $result;
					}
				}
				public function delete()
				{
					//print_r($_POST);exit;
						$user_obj = new user();
						$id = $_POST['id'];
						$result = $user_obj->fDeleteUserDetails($this->registry->db,$id);
						echo $result;
				}
					public function getUserUPDATEDetails() 
				{
					if(isset($_POST['ajaxcall'])){
						$user_obj = new user();
						$id = $_POST['eid'];
						$result = $user_obj->getUserUPDATEDetails($this->registry->db,$id);
						echo $result;
					}
				}
				public function insert()
				{
						//print_r($_POST);exit;
						
					 $Name = $_POST['name'];

		            $Address=$_POST['addr']; 
		            
		            $Email=$_POST['textEmail'];
		             
		            $MobNo=$_POST['mobno'];
		             
		            $City=$_POST['city'];
		           
		            $State=$_POST['ste'];
		         
						$user_obj = new user();
						$result = $user_obj->fInsertUserDetails($this->registry->db,$Name,$Address,$Email,$MobNo,$City,$State);
							//echo $result;
						//$result = json_decode($result,true);
						/*$result = $result['MVC']['user_result'];
						//echo '<pre>';print_r($result);die();
						$this->registry->template->result = $result;
*/

				}

				public function fGetUserInfomation(){
					$user_obj = new user();
					$user_id = $_POST['user_id'];
					$result = $user_obj->fGetUserInfomation($this->registry->db,$user_id);
				// 	print_r($result);exit;
					echo $result;
				}

					public function updatedinsert()
				{
						//print_r($_POST);exit;
						$id = $_POST['ids'];
					 $name = $_POST['edit_name'];

		            $address=$_POST['edit_addr']; 
		            
		            $email=$_POST['edit_textEmail'];
		             
		            $mobno=$_POST['edit_mobno'];
		             
		            $city=$_POST['edit_city'];
		           
		            $state=$_POST['edit_ste'];
		         
						$user_obj = new user();

						$result = $user_obj->fInsertUserUpdateDetails($this->registry->db,$id,$name,$address,$email,$mobno,$city,$state);
							

				}
}


?>
