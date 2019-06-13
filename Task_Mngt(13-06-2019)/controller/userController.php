	<?php

	Class userController Extends baseController
	{

		public function index() 
		{
			if(isset($_SESSION['user_feature_info']['user_id'])){
				
			}
			else

			{
				
				$this->registry->template->show('view');
			}
		}

		
		public function fManageUserDetails()
		{
			//alert($_SESSION['user_feature_info']['user_id']);
			if(isset($_SESSION['user_feature_info']['user_id']))
			{
				echo("HELLO");
				//$id = $_POST['id'];
				$user_obj = new user();
				$roleDetails = $user_obj->getUserRoleDetails($this->registry->db);
				$roleDetails = json_decode($roleDetails,true);
				$this->registry->template->roleDetails = $roleDetails;	

				$this->registry->template->show('userdetails');
			}
			else
			{
				$this->registry->template->show('view');
			}
		}

		public function fCreateNewUser(){
			if(isset($_SESSION['user_feature_info']['user_id'])){
				$login_id=$_POST['empname_id'];
				$username = $_POST['empname'];
				$password=$_POST['empname_pass'];
				$Email=$_POST['empname_email'];
				$Creationdate=$_POST['empname_date'];
				$Creationdate_time=$_POST['empname_time'];
				$emp_role=$_POST['employee_role'];
				$user_obj = new user();
				$data = array('username'=>$username);
				$result = $user_obj->fCreateNewUser($this->registry->db,$login_id,$username,$password,$Email,$Creationdate,$Creationdate_time,$emp_role);
				echo $result;
			}
			else
			{
				$this->registry->template->show('view');
			}	
		}

		//here is the functionaslity offetching details of database
		public function getDetails() 
		{
			if(isset($_POST['ajaxcall']) && isset($_SESSION['user_feature_info']['user_id']))
			{
				$user_obj = new user();
				$flag = $_POST['flag'];
				$result = $user_obj->getDetails($this->registry->db,$flag);
				echo $result;
			}
			else
			{
				$this->registry->template->show('view');
			}
		}

		// here is the functionality of delete 
		public function delete()
		{
			if(isset($_SESSION['user_feature_info']['user_id'])){
				$user_obj = new user();
				$id = $_POST['id'];
				$result = $user_obj->fDeleteUserDetails($this->registry->db,$id);
				echo $result;
			}
			else
			{
				$this->registry->template->show('view');
			}

		}
		//FUNCTIONALITY OF GEETING DETAILS INTO UPDATE FORM
		public function getUserUPDATEDetails() 
		{
			if(isset($_POST['ajaxcall']) && isset($_SESSION['user_feature_info']['user_id']))
			{
				$user_obj = new user();
				/*$flag = $_POST['flag'];*/
				$id = $_POST['id'];
				$result = $user_obj->getUserUPDATEDetails($this->registry->db,$id);
				echo $result;
			}
			else
			{
				$this->registry->template->show('view');
			}
			
		}

		//FUNCTIONALITY OF INSERT UPDATED DATA HERE
		public function updateinsert()
		{
			if(isset($_SESSION['user_feature_info']['user_id']))
			{
				$id = $_POST['ids'];
				$login_id = $_POST['edit_empname_id'];
				$username = $_POST['edit_empname'];
				$password=$_POST['edit_empname_pass']; 
				$Email=$_POST['edit_empname_email'];
				$edit_employerole=$_POST['edit_employee_role'];
				//$e_running_id=$_POST['edit_id']; 
				$Creationdate=$_POST['edit_empname_date'];
				$Creationdate_time=$_POST['edit_empname_time'];

				$user_obj = new user();
				$result = $user_obj->fInsertUserUpdatedDetails($this->registry->db,$id,$login_id,$username,$password,$Email,$edit_employerole,$e_running_id,$Creationdate,$Creationdate_time);
				echo $result;
			}
			else
			{
				$this->registry->template->show('view');
			}	
			
		}

		public function fViewUserDetails()
		{
			if(isset($_SESSION['user_feature_info']['user_id']))
			{
				$user_obj = new user();
				$roleDetails = $user_obj->getUserRoleDetails($this->registry->db);
				$roleDetails = json_decode($roleDetails,true);
				$this->registry->template->roleDetails = $roleDetails;
				$this->registry->template->show('viewreport');
			}
			else
			{
				$this->registry->template->show('view');
			}
		}

		public function mngSmpage()
		{
			if(isset($_SESSION['user_feature_info']['user_id']))
			{
				$this->registry->template->show('manageroles');
			}
			else
			{
				$this->registry->template->show('view');
			}
		}

		public function fusermenu()
		{
			if(isset($_SESSION['user_feature_info']['user_id']))
			{
				$this->registry->template->show('userview');
			}
			else
			{
				$this->registry->template->show('view');
			}
		}

		public function homepage()
		{
			if(isset($_SESSION['user_feature_info']['user_id']))
			{
				$this->registry->template->show('usermenu');
			}
			else
			{
				$this->registry->template->show('view');
			}
		}

		public function fViewRoleDetails()
		{
			if(isset($_SESSION['user_feature_info']['user_id']))
			{
				
				$user_obj = new user();
				$result = $user_obj->fViewRoleDetails($this->registry->db,$edit_roleid);
				echo $result;
			}
			else
			{
				$this->registry->template->show('view');
			}
		}


		public function fViewRolepage()
		{
			if(isset($_SESSION['user_feature_info']['user_id']))
			{
				$user_obj = new user();
				$result = $user_obj->getRoleDetails($this->registry->db);
				$result = json_decode($result,true);
				$result = $result['task_mngt']['roles_list'];
				//echo '<pre>';print_r($result);exit;
				$this->registry->template->roles_list = $result;
				$this->registry->template->show('viewrole');
			}
			else
			{
				$this->registry->template->show('view');
			}
		}

		public function getFeatureDetailsByRole(){
			if(isset($_SESSION['user_feature_info']['user_id']))
			{
				$role_id = $_POST['role_id'];
				$user_obj = new user();
				$result = $user_obj->getFeatureDetailsByRole($this->registry->db,$role_id);
				echo($result);
				/*$result = json_decode($result,true);
				$result = $result['task_mngt']['roles_feature_list'];
				//	echo '<pre>';print_r($result);exit;
				$this->registry->template->roles_feature_list = $result;
				$this->registry->template->show('viewrole');*/
				//echo $result;
			}
		}

		public function fupdatedroleDetails()
		{
			if(isset($_SESSION['user_feature_info']['user_id']))
			{
				$editid=$_POST['editid'];
				//echo($editid);exit();
				$user_obj = new user();
				$result = $user_obj->fupdatedroleDetails($this->registry->db,$editid);
				echo $result;
			}
			else
			{
				$this->registry->template->show('view');
			}
		}
		public function fCreateNewRole()
		{
			if(isset($_SESSION['user_feature_info']['user_id']))
			{
				
				$rolename=$_POST['rolename'];
				$roledesc=$_POST['roledesc'];
				$user_obj = new user();
				$result = $user_obj->fCreateNewRole($this->registry->db,$rolename,$roledesc);
				echo $result;
			}
			else
			{
				$this->registry->template->show('view');
			}
		}

		public function getFeatureDetailslist(){
			if(isset($_SESSION['user_feature_info']['user_id']))
			{
				$user_obj = new user();
				$result = $user_obj->getFeatureDetailslist($this->registry->db);
				echo($result);
			}
			else
			{
				$this->registry->template->show('view');
			}
		}

		public function fRoledelete()
		{
			if(isset($_SESSION['user_feature_info']['user_id'])){
				$user_obj = new user();
				$id = $_POST['id'];
				$result = $user_obj->fRoledelete($this->registry->db,$id);
				echo $result;
			}
			else
			{
				$this->registry->template->show('view');
			}

		}

	}


	?>
