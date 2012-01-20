<?php
class ContentModel extends CI_Model {

	private $name;
	private $quantity;
	
	private function loadFromPost() {
		$this->name = $this->input->post('name');
		$this->quantity = $this->input->post('quantity');
	}
	
	private function validate() {
	
	}
	
	public function getContentList() {
		$query = $this->db->query("SELECT * FROM content_levels ORDER BY name");
		return $query->result();
	}
	
	public function getContent($id) {
		$query = $this->db->query("SELECT * FROM content_levels 
								   WHERE name = '".$id."'");
		return $query->result();
	}
	
	public function getContentId($name) {
		$query = $this->db->query("SELECT id FROM content_levels
								   WHERE name = '".$name."'");
		return $query->result();		
	}	
	
	public function insertContent() {
		loadFromPost();
		validate();
		$query = ("INSERT INTO content_levels(id, name, quantity)
					VALUES(null, '".$this->name."', '".$this->quantity."'");
		$this->db->query($query);
		return $this->db->affected_rows();
	}
	
	public function updateContent($id) {
		loadFromPost();
		validate();
		$query = ("UPDATE content_levels SET name = '".$this->name."', quantity = '".$this->qiantity."' WHERE id = '".$id."'");
		$this->db->query($query);
		return $this->db->affected_rows();
	}
	
	public function deleteContent($id) {
		$query = ("DELETE FROM content_levels WHERE id = '".$id."'");
		$this->db->query($query);
		return $this->db->affected_rows();
	}
	
	public function findContentByName($contentName) {
		$query = $this->db->query("SELECT * FROM content_levels WHERE name LIKE '".$contentName."%' ORDER BY name");
		return $query->result();
	}
	
	public function findContentByLocation($contentLocation) {
		$query = $this->db->query("SELECT * FROM content_levels WHERE location LIKE '".$contentLocation."%' ORDER BY name");
		return $query->result();		
	}
	
	public function findContentByLocationAndName($contentLocation, $contentName) {
		$query = $this->db->query("SELECT * FROM content_levels WHERE location LIKE '".$contentLocation."%' AND name LIKE '".$contentName."%' ORDER BY name");
		return $query->result();	
	}
	
}
	
?>