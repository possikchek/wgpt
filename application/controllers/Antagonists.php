<?php
class Antagonists extends CI_Controller {

	public function index() {
		$this->load->model("AntagonistModel");
		$data['antagonists'] = $this->AntagonistModel->getAntagonistList();
		$data['action'] = $this->session->userdata('action');
		$data['title'] = "WowGuildProgressTracker - Antagonists";
		$data['header'] = "Antagonists";
		$data['combo'] = array(
						array('value'=>"sortLevel", 'name'=>"Sort by Level"),
						array('value'=>"sortHitpoints", 'name'=>"Sort by Hitpoints"),
						array('value'=>"sortContent", 'name'=>"Sort by Content Level"));
		$this->load->view("header/header", $data);
		$this->load->view("Antagonist/index", $data);
	}
	
	public function showAntagonist($name) {
		$name = str_replace("_"," ",$name);
		$this->load->model("AntagonistModel");
		$data['antagonist'] = $this->AntagonistModel->getAntagonist($name);
		if(empty($data['antagonist'])) {
			$data['error'] = "There is no player with such name";
			$this->load->view("Error/index.php", $data);
		} else {
			$this->load->model('CommentModel');
			$data['comments'] = $this->CommentModel->getAntComments($data['antagonist'][0]->id);
			$data['action'] = $this->session->userdata('action');
			$data['title'] = "WowGuildProgressTracker - Antagonists - ".$name;
			$data['header'] = $name;
			$this->load->view("header/header", $data);
			$this->load->view("Antagonist/antagonist", $data);
		}
	}
	
	public function addComment($name) {
		$name = str_replace("_"," ",$name);
		$comment = $this->input->post('comment');
		if(empty($comment)) {
			$data['error'] = "There is no player with such name";
			$this->load->view("Error/index.php", $data);
		} else {
			$comment = mysql_real_escape_string($comment);
			$this->load->model("CommentModel");
			$this->load->model("AntagonistModel");
			$antagonist = $this->AntagonistModel->getAntId($name);
			$id =$antagonist[0]->id;
			$this->CommentModel->addAntComment($id,$comment);
			$name = str_replace(" ","_",$name);
			header("location: ".base_url()."Antagonists/showAntagonist/".$name);
		}
	}	
}
?>