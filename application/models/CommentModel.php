<?php
class CommentModel extends CI_Model {

	public function getPlayerComments($id) {
		$query = $this->db->query("SELECT * FROM player_comments WHERE player_id = '".$id."'");
		return $query->result();	
	}
	
	public function getOrgComments($id) {
		$query = $this->db->query("SELECT * FROM org_comments WHERE org_id = '".$id."'");
		return $query->result();	
	}

	public function getAntComments($id) {
		$query = $this->db->query("SELECT * FROM antagonist_comments WHERE ant_id = '".$id."'");
		return $query->result();	
	}

	public function getContentComments($id) {
		$query = $this->db->query("SELECT * FROM content_comments WHERE content_id = '".$id."'");
		return $query->result();	
	}	
	
	public function addPlayerComment($id,$comment) {
		$query = ("INSERT INTO player_comments(id, player_id, commentary)
					VALUES(null,'".$id."', '".$comment."')");
		$this->db->query($query);
		return $this->db->affected_rows();		
	}
	
	public function addOrgComment($id,$comment) {
		$query = ("INSERT INTO org_comments(id, org_id, commentary)
					VALUES(null,'".$id."', '".$comment."')");
		$this->db->query($query);
		return $this->db->affected_rows();		
	}
	
		public function addContentComment($id,$comment) {
		$query = ("INSERT INTO content_comments(id, content_id, commentary)
					VALUES(null,'".$id."', '".$comment."')");
		$this->db->query($query);
		return $this->db->affected_rows();		
	}
	
		public function addAntComment($id,$comment) {
		$query = ("INSERT INTO antagonist_comments(id, ant_id, commentary)
					VALUES(null,'".$id."', '".$comment."')");
		$this->db->query($query);
		return $this->db->affected_rows();		
	}
	
}

?>