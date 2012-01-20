<?php
class FractionModel extends CI_Model {

	private $name;
	
	private function loadFromPost() {
		$this->name = $this->input->post('name');
	}
	
	private function validate() {
	
	}
	
	public function getFractionList() {
		$query = $this->db->query("SELECT * FROM fractions");
		return $query->result();
	}
	
	public function getFraction($id) {
		$query = $this->db->query("SELECT * FROM fractions 
								   WHERE id = '".$id."'");
		return $query->result();
	}
	
	public function insertFraction() {
		loadFromPost();
		validate();
		$query = ("INSERT INTO fractions(id, name,)
					VALUES(null, '".$this->name."'");
		$this->db->query($query);
		return $this->db->affected_rows();
	}
	
	public function updateFraction($id) {
		loadFromPost();
		validate();
		$query = ("UPDATE fractions SET name = '".$this->name."' WHERE id = '".$id."'");
		$this->db->query($query);
		return $this->db->affected_rows();
	}
	
	public function deleteFraction($id) {
		$query = ("DELETE FROM fractions WHERE id = '".$id."'");
		$this->db->query($query);
		return $this->db->affected_rows();
	}
	
?>