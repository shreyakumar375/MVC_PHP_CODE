	<?php

	Class userController Extends baseController
	{

		public function index() 
		{
			
		}

		
		public function fManageUserDetails()
		{

			if(isset($_SESSION['user_id']))
			{
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
			if(isset($_SESSION['user_id'])){
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
		}

		//here is the functionaslity offetching details of database
		public function getDetails() 
		{
			if(isset($_POST['ajaxcall']))
			{
				$user_obj = new user();
				$flag = $_POST['flag'];
				$result = $user_obj->getDetails($this->registry->db,$flag);
				echo $result;
			}
		}

		// here is the functionality of delete 
		public function delete()
		{
			if(isset($_SESSION['user_id'])){
				$user_obj = new user();
				$id = $_POST['id'];
				$result = $user_obj->fDeleteUserDetails($this->registry->db,$id);
				echo $result;
			}

		}
		//FUNCTIONALITY OF GEETING DETAILS INTO UPDATE FORM
		public function getUserUPDATEDetails() 
		{
			if(isset($_POST['ajaxcall']) && isset($_SESSION['user_id']))
			{
				$user_obj = new user();
				/*$flag = $_POST['flag'];*/
				$id = $_POST['id'];
				$result = $user_obj->getUserUPDATEDetails($this->registry->db,$id);
				echo $result;
			}
			
		}

		//FUNCTIONALITY OF INSERT UPDATED DATA HERE
		public function updateinsert()
		{
			if(isset($_SESSION['user_id']))
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
				
		}

		public function fViewUserDetails()
		{
			if(isset($_SESSION['user_id']))
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
			if(isset($_SESSION['user_id']))
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
			if(isset($_SESSION['user_id']))
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
			if(isset($_SESSION['user_id']))
			{
				$this->registry->template->show('usermenu');
			}
			else
			{
				$this->registry->template->show('view');
			}
		}

	}


	?>
