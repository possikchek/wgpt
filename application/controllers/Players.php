<?php
class Players extends CI_Controller {
		
	public function index() {
		$this->load->model("PlayerModel");
		$data['players'] = $this->PlayerModel->getPlayersList();
		$data['action'] = $this->session->userdata('action');
		$data['title'] = "WowGuildProgressTracker - Players";
		$data['header'] = "Players";
		$data['combo'] = array(
						array('value'=>"sortRace", 'name'=>"Sort by Race"),
						array('value'=>"sortClass", 'name'=>"Sort by Class"),
						array('value'=>"sortLevel", 'name'=>"Sort by Level"),
						array('value'=>"sortOrg", 'name'=>"Sort by Organisation"));
		$this->load->view("header/header", $data);
		$this->load->view("Player/index.php", $data);
	}
	
	public function showPlayer($name) {
		$this->load->model("PlayerModel");
		$data['player'] = $this->PlayerModel->getPlayer($name);
		if(empty($data['player'])) {
			$data['error'] = "There is no player with such name";
			$this->load->view("Error/index.php", $data);
		} else {
			$this->load->model('CommentModel');
			$data['comments'] = $this->CommentModel->getPlayerComments($data['player'][0]->id);		
			$data['action'] = $this->session->userdata('action');
			$data['title'] = "WowGuildProgressTracker - Players - ".$name;
			$data['header'] = $name;
			$this->load->view("header/header", $data);
			$this->load->view("Player/player.php", $data);
		}
	}
	
	public function addComment($name) {
		$comment = $this->input->post('comment');
		if(empty($comment)) {
			$data['error'] = "There is no player with such name";
			$this->load->view("Error/index.php", $data);
		} else {
			$comment = mysql_real_escape_string($comment);
			$this->load->model("CommentModel");
			$this->load->model("PlayerModel");
			$player = $this->PlayerModel->getPlayerId($name);
			$id =$player[0]->id;
			$this->CommentModel->addPlayerComment($id,$comment);
			header("location: ".base_url()."Players/showPlayer/".$name);
		}
	}
}
?>