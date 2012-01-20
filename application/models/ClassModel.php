<?php
class ClassModel extends CI_Model {

	private $name;
	
	private function loadFromPost() {
		$this->name = $this->input->post('name');
	}
	
	private function validate() {
	
	}
	
	public function getClassList() {
		$query = $this->db->query("SELECT * FROM classes");
		return $query->result();
	}
	
	public function getClass($id) {
		$query = $this->db->query("SELECT * FROM classes 
								   WHERE id = '".$id."'");
		return $query->result();
	}
	
	public function insertClass() {
		loadFromPost();
		validate();
		$query = ("INSERT INTO classes(id, name,)
					VALUES(null, '".$this->name."'");
		$this->db->query($query);
		return $this->db->affected_rows();
	}
	
	public function updateClass($id) {
		loadFromPost();
		validate();
		$query = ("UPDATE classes SET name = '".$this->name."' WHERE id = '".$id."'");
		$this->db->query($query);
		return $this->db->affected_rows();
	}
	
	public function deleteClass($id) {
		$query = ("DELETE FROM classes WHERE id = '".$id."'");
		$this->db->query($query);
		return $this->db->affected_rows();
	}
}
	
?>