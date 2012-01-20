<?php
class Organisations extends CI_Controller {
	
	public function index() {
		$this->load->model("OrganisationModel");
		$data['org'] = $this->OrganisationModel->getOrgList();
		$data['action'] = $this->session->userdata('action');
		$data['title'] = "WowGuildProgressTracker - Organisations";
		$data['header'] = "Organisations";
		$data['combo'] = array(
						array('value'=>"sortFraction", 'name'=>"Sort by Fraction"));
		$this->load->view("header/header", $data);
		$this->load->view("Organisation/index", $data);
	}
	
	public function showOrganisation($name) {
		$name = str_replace("_"," ",$name);
		$this->load->model("OrganisationModel");
		$this->load->model("PlayerModel");
		$data['org'] = $this->OrganisationModel->getOrg($name);
		$data['players'] = $this->PlayerModel->getOrgPlayers($data['org'][0]->id);
		if(empty($data['org'])) {
			$data['error'] = "There is no organisation with such name";
			$this->load->view("Error/index.php", $data);
		} else {
			$this->load->model('CommentModel');
			$data['comments'] = $this->CommentModel->getOrgComments($data['org'][0]->id);		
			$data['action'] = $this->session->userdata('action');
			$data['title'] = "WowGuildProgressTracker - Organisation - ".$name;
			$data['header'] = $name;
			$data['combo'] = array(
						array('value'=>"sortRace", 'name'=>"Sort by Race"),
						array('value'=>"sortClass", 'name'=>"Sort by Class"),
						array('value'=>"sortLevel", 'name'=>"Sort by Level"));
			$this->load->view("header/header", $data);
			$this->load->view("Organisation/organisation", $data);
		}
	}
	
	public function MyOrganisation() {
		if($this->session->userdata('loggedIn')) {
			$this->load->model("OrganisationModel");
			$data['org'] = $this->OrganisationModel->getOrg($this->session->userdata('org'));
			$data['action'] = $this->session->userdata('action');
			$data['title'] = "WowGuildProgressTracker - My Organisation ".$name;
			$data['header'] = $data['org']->name;
			$this->load->view("Organisation/myorganisation", $data);
		} else {
			header("location: ".base_url()."Login");
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
			$this->load->model("OrganisationModel");
			$org = $this->OrganisationModel->getOrgId($name);
			$id =$org[0]->id;
			$this->CommentModel->addOrgComment($id,$comment);
			$name = str_replace(" ","_",$name);
			header("location: ".base_url()."Organisations/showOrganisation/".$name);
		}
	}	
}
?>