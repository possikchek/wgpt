<?php
class AntagonistModel extends CI_Model {

	private $name;
	private $hitpoints;
	
	private function loadFromPost() {
		$this->name = $this->input->post('name');
		$this->hitpoints = $this->input->post('hitpoints');
	}
	
	private function validate() {
	
	}
	
	public function getAntagonistList() {
		$query = $this->db->query("SELECT antagonists.*,content_levels.name AS content FROM antagonists,content_levels WHERE content_levels.id = content_id ORDER BY antagonists.name");
		return $query->result();
	}
	
	public function getAntagonist($id) {
		$query = $this->db->query("SELECT antagonists.*,content_levels.name as content FROM antagonists,content_levels
								   WHERE antagonists.name = '".$id."' AND content_levels.id = content_id");
		return $query->result();
	}
	
	public function insertAntagonist() {
		loadFromPost();
		validate();
		$query = ("INSERT INTO antagonists(id, name, hitpoints)
					VALUES(null, '".$this->name."', '".$this->hitpoints."'");
		$this->db->query($query);
		return $this->db->affected_rows();
	}
	
	public function getAntId($name) {
		$query = $this->db->query("SELECT id FROM antagonists
								   WHERE name = '".$name."'");
		return $query->result();		
	}	
	
	public function updateAntagonist($id) {
		loadFromPost();
		validate();
		$query = ("UPDATE antagonists SET name = '".$this->name."', hitpoints = '".$this->hitpoints."' WHERE id = '".$id."'");
		$this->db->query($query);
		return $this->db->affected_rows();
	}
	
	public function deleteAntagonist($id) {
		$query = ("DELETE FROM antagonists WHERE id = '".$id."'");
		$this->db->query($query);
		return $this->db->affected_rows();
	}
	
	public function getAntagonistsForContent($name) {
		$query = $this->db->query("SELECT antagonists.* FROM antagonists WHERE content_id = '".$name."' ORDER BY name");
		return $query->result();
	}
	
	public function findAntagonistByContent($antContent) {
		$query = $this->db->query("SELECT antagonists.*, content_levels.name AS content 
									FROM antagonists, content_levels WHERE content_levels.name LIKE '".$antContent."%' 
									AND content_levels.id = content_id ORDER BY antagonists.name");
		return $query->result();		
	}
	
	public function findAntagonistByName($antName) {
		$query = $this->db->query("SELECT antagonists.*,content_levels.name as content FROM antagonists,content_levels
								   WHERE antagonists.name LIKE '".$antName."%' AND content_levels.id = content_id ORDER BY antagonists.name");
		return $query->result();
	}
	
	public function findAntagonistByContentAndName($antContent, $antName) {
				$query = $this->db->query("SELECT antagonists.*,content_levels.name as content FROM antagonists,content_levels
								   WHERE antagonists.name LIKE '".$antName."%' AND content_levels.name LIKE '".$antContent."%' AND content_levels.id = content_id ORDER BY antagonists.name");
		return $query->result();
	}
}
?>