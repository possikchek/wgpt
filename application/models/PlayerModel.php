<?php
class PlayerModel extends CI_Model {

	private $nickname;
	private $level;
	private $raceId;
	private $classId;
	private $orgId;
	
	private function loadFromPost() {
		$this->nickname = $this->input->post('nickname');
		$this->level = $this->input->post('level');
		$this->raceId = $this->input->post('race');
		$this->classId = $this->input->post('class');
		$this->orgId = $this->input->post('org');
	}
	
	private function validate() {
	
	}
	
	public function getPlayersList() {
		$query = $this->db->query("SELECT organisations.name as org,classes.name as class, races.name as race, player_level as level, players.nickname as nickname
					FROM classes, races, players,organisations WHERE classes.id = players.class_id AND races.id = players.race_id
					AND org_id = organisations.id ORDER BY players.nickname");
		return $query->result();
	}
	
	public function getPlayer($name) {
		$query = $this->db->query("SELECT players.id, organisations.name as org,nickname,fractions.logo as logo,classes.name as class, races.name as race, player_level as level, fractions.name as fraction
					FROM classes, races, players,fractions,organisations WHERE classes.id = players.class_id AND races.id = players.race_id
					AND org_id = organisations.id AND fractions.id = players.fraction_id AND players.nickname = '".$name."' ORDER BY players.nickname");
		return $query->result();
	}
	
	public function getPlayerId($name) {
		$query = $this->db->query("SELECT id FROM players WHERE nickname = '".$name."'");
		return $query->result();
	}	
	
	public function insertPlayer() {
		loadFromPost();
		validate();
		$query = ("INSERT INTO players(id, nickname, level, race_id, class_id, org_id)
					VALUES(null, '".$this->nickname."', '".$this->level."','".$this->raceName."',
					'".$this->className."', '".$this->orgName."'");
		$this->db->query($query);
		return $this->db->affected_rows();
	}
	
	public function updatePlayer($id) {
		loadFromPost();
		validate();
		$query = ("UPDATE players SET name = '".$this->name."', logo = '".$this->logo."', 
				   fraction_id = '".$this->fractionName."' WHERE id = '".$id."'");
		$this->db->query($query);
		return $this->db->affected_rows();
	}
	
	public function deletePlayer($id) {
		$query = ("DELETE FROM players WHERE id = '".$id."'");
		$this->db->query($query);
		return $this->db->affected_rows();
	}
	
	public function getOrgPlayers($id) {
		$query = $this->db->query("SELECT classes.name as class, races.name as race, player_level as level, players.nickname as nickname
					FROM classes, races, players WHERE classes.id = players.class_id AND races.id = players.race_id
					AND players.org_id = '".$id."' ORDER BY players.nickname");
		return $query->result();
	}
	
	public function findOrgByFractionAndClass($fraction, $playerClass) {
		$query = $this->db->query("SELECT organisations.name as org,nickname,fractions.logo as logo,classes.name as class, races.name as race, player_level as level, fractions.name as fraction
					FROM classes, races, players,fractions,organisations WHERE classes.id = players.class_id AND races.id = players.race_id
					AND org_id = organisations.id AND fractions.id = players.fraction_id AND fractions.name = '".$fraction."' AND classes.name = '".$playerClass."' ORDER BY players.nickname");
		return $query->result();	
	}
	
	public function findPlayerByFraction($fraction) {
		$query = $this->db->query("SELECT organisations.name as org,nickname,fractions.logo as logo,classes.name as class, races.name as race, player_level as level, fractions.name as fraction
					FROM classes, races, players,fractions,organisations WHERE classes.id = players.class_id AND races.id = players.race_id
					AND org_id = organisations.id AND fractions.id = players.fraction_id AND fractions.name = '".$fraction."' ORDER BY players.nickname");
		return $query->result();	
	}
	
	public function findPlayerByName($playerName) {
		$query = $this->db->query("SELECT organisations.name as org,nickname,fractions.logo as logo,classes.name as class, races.name as race, player_level as level, fractions.name as fraction
					FROM classes, races, players,fractions,organisations WHERE classes.id = players.class_id AND races.id = players.race_id
					AND org_id = organisations.id AND fractions.id = players.fraction_id AND players.nickname LIKE '".$playerName."%' ORDER BY players.nickname");
		return $query->result();	
	}
	
	public function findPlayerByFractionAndName($fraction,$playerName) {
		$query = $this->db->query("SELECT organisations.name as org,nickname,fractions.logo as logo,classes.name as class, races.name as race, player_level as level, fractions.name as fraction
					FROM classes, races, players,fractions,organisations WHERE classes.id = players.class_id AND races.id = players.race_id
					AND org_id = organisations.id AND fractions.id = players.fraction_id AND players.nickname LIKE '".$playerName."%' AND fractions.name = '".$fraction."' ORDER BY players.nickname");
		return $query->result();	
	}
	
	public function findOrgByFractionAndClassAndName($fraction, $playerClass,$playerName) {
		$query = $this->db->query("SELECT organisations.name as org,nickname,fractions.logo as logo,classes.name as class, races.name as race, player_level as level, fractions.name as fraction
					FROM classes, races, players,fractions,organisations WHERE classes.id = players.class_id AND races.id = players.race_id
					AND org_id = organisations.id AND fractions.id = players.fraction_id AND classes.name = '".$playerClass."' AND players.nickname LIKE '".$playerName."%' AND fractions.name = '".$fraction."' ORDER BY players.nickname");
		return $query->result();	
	}
	
	public function findPlayerByClass($playerClass) {
		$query = $this->db->query("SELECT organisations.name as org,nickname,fractions.logo as logo,classes.name as class, races.name as race, player_level as level, fractions.name as fraction
					FROM classes, races, players,fractions,organisations WHERE classes.id = players.class_id AND races.id = players.race_id
					AND org_id = organisations.id AND fractions.id = players.fraction_id AND classes.name = '".$playerClass."'  ORDER BY players.nickname");
		return $query->result();	
	}
	
	public function findPlayerByClassAndName($playerName,$playerClass) {
		$query = $this->db->query("SELECT organisations.name as org,nickname,fractions.logo as logo,classes.name as class, races.name as race, player_level as level, fractions.name as fraction
					FROM classes, races, players,fractions,organisations WHERE classes.id = players.class_id AND races.id = players.race_id
					AND org_id = organisations.id AND fractions.id = players.fraction_id AND classes.name = '".$playerClass."' AND players.nickname LIKE '".$playerName."%' ORDER BY players.nickname");
		return $query->result();	
	}
	
}
	
?>