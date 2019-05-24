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
			$username = $_POST['empname'];
			$user_obj = new user();
			$data = array('username'=>$username);
			$result = $user_obj->fCreateNewUser($this->registry->db,$username);
			echo $result;
		}
}
//here is the functionaslity of add delete and remove user

	

	?>
