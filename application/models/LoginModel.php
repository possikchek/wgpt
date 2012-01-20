<?php
class LoginModel extends CI_Model {
	
	public function checkUser($name, $password) {
		$query = $this->db->query("SELECT organisations.name AS org, isadmin FROM organisations,users
								   WHERE users.id = organisations.id AND users.login = '".$name."' AND users.password = '".$password."'");
		return $query->result();
	}

}
?>