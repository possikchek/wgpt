<?php
class OrganisationModel extends CI_Model {

	private $name;
	private $fractionId;
	private $logo;
	
	private function loadFromPost() {
		$this->name = $this->input->post('orgName');
		$this->fractionId = $this->input->post('orgFraction');
		$this->logo = $this->input->post('orgLogo');
	}
	
	private function validate() {
	
	}
	
	public function getOrgList() {
		$query = $this->db->query("SELECT organisations.name as name,fractions.name as fraction FROM organisations,fractions 
									WHERE organisations.fraction_id = fractions.id ORDER BY organisations.name");
		return $query->result();
	}
	
	public function getOrg($name) {
		$query = $this->db->query("SELECT organisations.*, fractions.name as fraction FROM organisations, fractions
								   WHERE organisations.name = '".$name."' AND organisations.fraction_id = fractions.id");
		return $query->result();
	}
	
	public function getOrgId($name) {
		$query = $this->db->query("SELECT id FROM organisations
								   WHERE name = '".$name."'");
		return $query->result();		
	}
	
	public function insertOrg() {
		loadFromPost();
		validate();
		$query = ("INSERT INTO organisations(id, name, logo, fraction_id)
					VALUES(null, '".$this->name."', '".$this->logo."', '".$this->fractionId."'");
		$this->db->query($query);
		return $this->db->affected_rows();
	}
	
	public function updateOrg($id) {
		loadFromPost();
		validate();
		$query = ("UPDATE organisations SET id = null, name = '".$this->name."', logo = '".$this->logo."', 
				   fraction_id = '".$this->fractionName."' WHERE id = '".$id."'");
		$this->db->query($query);
		return $this->db->affected_rows();
	}
	
	public function deleteOrg($id) {
		$query = ("DELETE FROM organisations WHERE id = '".$id."'");
		$this->db->query($query);
		return $this->db->affected_rows();
	}
	
	public function getOrgByUser($user) {
		$query = $this->db->query("SELECT organisations.name FROM organisations, users
								   WHERE users.name = '".$user."' AND org.id = users.id");
		return $query->result();
	}
	
	public function findOrgByFraction($fraction) {
		$query = $this->db->query("SELECT organisations.*, fractions.name AS fraction FROM organisations, fractions
								   WHERE fractions.name = '".$fraction."' AND fraction_id = fractions.id ORDER BY organisations.name");
		return $query->result();
	}
	
	public function findOrgByFractionAndName($fraction, $orgName) {
		$query = $this->db->query("SELECT organisations.*, fractions.name AS fraction FROM organisations, fractions
								   WHERE organisations.name LIKE '".$orgName."%' AND fraction_id = fractions.id AND fractions.name = '".$fraction."' ORDER BY organisations.name");
		return $query->result();	
	}
	
	public function findOrgByName($orgName) {
		$query = $this->db->query("SELECT organisations.*, fractions.name AS fraction FROM organisations, fractions
								   WHERE organisations.name LIKE '".$orgName."%' AND fraction_id = fractions.id ORDER BY organisations.name");
		return $query->result();	
	}
}
	
?>