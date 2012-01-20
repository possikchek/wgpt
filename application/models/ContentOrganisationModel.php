<?php
class ContentOrganisationModel extends CI_Model {

	private $content_id;
	private $org_id;
	
	private function loadFromPost() {
		$this->content_id = $this->input->post('content');
		$this->org_id = $this->input->post('org');
	}
	
	private function validate() {
	
	}
	
	public function getContentOrgList() {
		$query = $this->db->query("SELECT * FROM contents_organisations");
		return $query->result();
	}
	
	public function getContentOrg($id) {
		$query = $this->db->query("SELECT * FROM contents_organisations 
								   WHERE id = '".$id."'");
		return $query->result();
	}
	
	public function insertContentOrg() {
		loadFromPost();
		validate();
		$query = ("INSERT INTO contents_organisations(id, content_id, org_id)
					VALUES(null, '".$this->content_id."', '".$this->org_id."'");
		$this->db->query($query);
		return $this->db->affected_rows();
	}
	
	public function updateContentOrg($id) {
		loadFromPost();
		validate();
		$query = ("UPDATE contents_organisations SET content_id = '".$this->content_id."',
				   org_id = '".$this->org_id."' WHERE id = '".$id."'");
		$this->db->query($query);
		return $this->db->affected_rows();
	}
	
	public function deleteContentOrg($id) {
		$query = ("DELETE FROM contents_organisations WHERE id = '".$id."'");
		$this->db->query($query);
		return $this->db->affected_rows();
	}
	
?>