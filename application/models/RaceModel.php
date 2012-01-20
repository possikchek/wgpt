<?php
class RaceModel extends CI_Model {

	private $name;
	
	private function loadFromPost() {
		$this->name = $this->input->post('name');
	}
	
	private function validate() {
	
	}
	
	public function getRaceList() {
		$query = $this->db->query("SELECT * FROM races");
		return $query->result();
	}
	
	public function getRace($id) {
		$query = $this->db->query("SELECT * FROM races 
								   WHERE id = '".$id."'");
		return $query->result();
	}
	
	public function insertRace() {
		loadFromPost();
		validate();
		$query = ("INSERT INTO races(id, name,)
					VALUES(null, '".$this->name."'");
		$this->db->query($query);
		return $this->db->affected_rows();
	}
	
	public function updateRace($id) {
		loadFromPost();
		validate();
		$query = ("UPDATE races SET name = '".$this->name."' WHERE id = '".$id."'");
		$this->db->query($query);
		return $this->db->affected_rows();
	}
	
	public function deleteRace($id) {
		$query = ("DELETE FROM races WHERE id = '".$id."'");
		$this->db->query($query);
		return $this->db->affected_rows();
	}
}
	
?>