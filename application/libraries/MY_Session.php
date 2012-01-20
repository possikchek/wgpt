<?php 
class MY_Session extends CI_Session {
	
		function __construct()
	    {
	        parent::__construct();
			$this->set_userdata('action','Login');
			$this->set_userdata('loggedIn',FALSE);
	    }
}
		
?>
		