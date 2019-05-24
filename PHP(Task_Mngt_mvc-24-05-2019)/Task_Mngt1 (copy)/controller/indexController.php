	<?php

	Class indexController Extends baseController
	{

		public function index() 
		{
			$this->registry->template->show('view');
		}
			public function getUserDetails()
        {
            
            $login_id=$_POST['TM_info_user_id '];
            $user_name = $_POST['username'];
            $password=$_POST['password']; 
            $c_password=$_POST['cpassword'];
            $Email=$_POST['email']; 
            $user_obj = new user();
            $result = $user_obj->getUserDetails($this->registry->db,$login_id,$user_name,$password,$c_password,$Email);
           
            if(count($result)!='')
			{
				echo json_encode(array('MVC'=>array('valid'=>1,'session'=>1,'user_result'=>1)));
			}
			else
			{
				echo json_encode(array('MVC'=>array('valid'=>1,'session'=>1,'user_result'=>0)));
			}
        }
		
	}


	?>
