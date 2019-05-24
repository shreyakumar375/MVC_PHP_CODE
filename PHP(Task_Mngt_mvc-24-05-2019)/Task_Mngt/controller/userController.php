	<?php

	Class userController Extends baseController
	{

		public function index() 
		{
			
		}

		
		public function fManageUserDetails(){

            $this->registry->template->show('userdetails');
		}

		public function fCreateNewUser(){
			$login_id=$_POST['empname_id'];
			$username = $_POST['empname'];
			$password=$_POST['empname_pass'];
			$Email=$_POST['empname_email'];
			$Creationdate=$_POST['empname_date'];
			$Creationdate_time=$_POST['empname_time'];
			$user_obj = new user();
			$data = array('username'=>$username);
			$result = $user_obj->fCreateNewUser($this->registry->db,$login_id,$username,$password,$Email,$Creationdate,$Creationdate_time);
			echo $result;
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
			$user_obj = new user();
			$id = $_POST['id'];
			//echo ($id);
			$result = $user_obj->fDeleteUserDetails($this->registry->db,$id);
			echo $result;
		}

	}

	?>
