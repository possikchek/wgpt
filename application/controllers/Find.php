<?php
class Find extends CI_Controller {
		
	public function index() {
		$data['action'] = $this->session->userdata('action');
		$data['title'] = "WowGuildProgressTracker - Find";
		$data['header'] = "Find";
		$this->load->view("header/header", $data);
		$this->load->view("Find/index", $data);
	}
	
	public function Organisations() {
		$data['action'] = $this->session->userdata('action');
		$data['title'] = "WowGuildProgressTracker - Find - Organisations";
		$data['header'] = "Find - Organisations";
		$this->load->view("header/header", $data);
		$this->load->view("Find/formOrg", $data);
	}
	
	public function Players() {
		$this->load->model("ClassModel");
		$data['classes'] = $this->ClassModel->getClassList();
		$data['action'] = $this->session->userdata('action');
		$data['title'] = "WowGuildProgressTracker - Find - Players";
		$data['header'] = "Find - Players";
		$this->load->view("header/header", $data);
		$this->load->view("Find/formPl", $data);		
	}
	
	public function Contents() {
		$data['action'] = $this->session->userdata('action');
		$data['title'] = "WowGuildProgressTracker - Find - Content Levels";
		$data['header'] = "Find - Content Levels";
		$this->load->view("header/header", $data);
		$this->load->view("Find/formCont", $data);		
	}
	
	public function Antagonists() {
		$data['action'] = $this->session->userdata('action');
		$data['title'] = "WowGuildProgressTracker - Find - Antagonists";
		$data['header'] = "Find - Antagonists";
		$this->load->view("header/header", $data);
		$this->load->view("Find/formAnt", $data);		
	}
	
	public function FindOrganisationsResults() {
		$fraction = $this->input->post('fraction');
		$this->load->model("OrganisationModel");
		$orgName = $this->input->post('orgName');
		if(empty($orgName)) {
			if($fraction == 'Both') {
				$data['org'] = $this->OrganisationModel->getOrgList();
			} else {
				$data['org'] = $this->OrganisationModel->findOrgByFraction($fraction);
			}
		} else {
			$orgName = mysql_real_escape_string($orgName);
			if($fraction == 'Both') {
				$data['org'] = $this->OrganisationModel->findOrgByName($orgName);
			} else {
				$data['org'] = $this->OrganisationModel->findOrgByFractionAndName($fraction, $orgName);
			}
		}
		$data['combo'] = array(
						array('value'=>"sortFraction", 'name'=>"Sort by Fraction"));
		$data['action'] = $this->session->userdata('action');
		$data['title'] = "WowGuildProgressTracker - Find - Organisations - Results";
		$data['header'] = "Find - Organisations - Results";
		$this->load->view("header/header", $data);
		$this->load->view("Find/FindOrganisationResults", $data);	
	}
	
	public function FindPlayersResults() {
		$fraction = $this->input->post('fraction');
		$playerName = $this->input->post('playerName');
		$playerClass = $this->input->post('playerClass');
		$this->load->model('PlayerModel');
		if(empty($playerName)) {
			if($fraction == 'Both' &&  $playerClass == 'All') {
				$data['players'] = $this->PlayerModel->getPlayersList();
			} else if ($fraction != 'Both' &&  $playerClass == 'All') {
				$data['players'] = $this->PlayerModel->findPlayerByFraction($fraction);
			} else if ($fraction != 'Both' &&  $playerClass != 'All') {
				$data['players'] = $this->PlayerModel->findOrgByFractionAndClass($fraction, $playerClass);
			} else if ($fraction == 'Both' &&  $playerClass != 'All') {
				$data['players'] = $this->PlayerModel->findPlayerByClass($playerClass);
			}
		} else {
			$playerName = mysql_real_escape_string($playerName);
			if($fraction == 'Both' &&  $playerClass == 'All') {
				$data['players'] = $this->PlayerModel->findPlayerByName($playerName);
			} else if ($fraction != 'Both' &&  $playerClass == 'All') {
				$data['players'] = $this->PlayerModel->findPlayerByFractionAndName($fraction,$playerName);
			} else if ($fraction != 'Both' &&  $playerClass != 'All') {
				$data['players'] = $this->PlayerModel->findOrgByFractionAndClassAndName($fraction, $playerClass,$playerName);
			} else if ($fraction == 'Both' &&  $playerClass != 'All') {
				$data['players'] = $this->PlayerModel->findPlayerByClassAndName($playerName,$playerClass);
			}
		}
		$data['combo'] = array(
						array('value'=>"sortRace", 'name'=>"Sort by Race"),
						array('value'=>"sortClass", 'name'=>"Sort by Class"),
						array('value'=>"sortLevel", 'name'=>"Sort by Level"),
						array('value'=>"sortOrg", 'name'=>"Sort by Organisation"));		
		$data['action'] = $this->session->userdata('action');
		$data['title'] = "WowGuildProgressTracker - Find - Players - Results";
		$data['header'] = "Find - Players - Results";
		$this->load->view("header/header", $data);
		$this->load->view("Find/FindPlayerResults", $data);		
	}
	
	public function FindContentsResults() {
		$contentLocation = $this->input->post('contentLocation');
		$contentName = $this->input->post('contentName');
		$this->load->model('ContentModel');	
		if(empty($contentLocation)) {
			if(empty($contentName)) {
				$data['contents'] = $this->ContentModel->getContentList();
			} else {
				$contentName = mysql_real_escape_string($contentName);
				$data['contents'] = $this->ContentModel->findContentByName($contentName);
			}
		} else {
			$contentLocation = mysql_real_escape_string($contentLocation);
			if(empty($contentName)) {
				$data['contents'] = $this->ContentModel->findContentByLocation($contentLocation);
			} else {
				$contentName = mysql_real_escape_string($contentName);
				$data['contents'] = $this->ContentModel->findContentByLocationAndName($contentLocation, $contentName);
			}
		}
		$data['combo'] = array(
						array('value'=>"sortQuantity", 'name'=>"Sort by Antagonists Quantity"));		
		$data['action'] = $this->session->userdata('action');
		$data['title'] = "WowGuildProgressTracker - Find - Content Levels - Results";
		$data['header'] = "Find - Content Levels - Results";
		$this->load->view("header/header", $data);
		$this->load->view("Find/FindContentResults", $data);			
	}
	
		public function FindAntagonistResults() {
		$antName = $this->input->post('antName');
		$antContent = $this->input->post('antContent');
		$this->load->model('AntagonistModel');	
		if(empty($antName)) {
			if(empty($antContent)) {
				$data['antagonists'] = $this->AntagonistModel->getAntagonistList();
			} else {
				$antContent = mysql_real_escape_string($antContent);
				$data['antagonists'] = $this->AntagonistModel->findAntagonistByContent($antContent);
			}
		} else {
			$antName = mysql_real_escape_string($antName);
			if(empty($antContent)) {
				$data['antagonists'] = $this->AntagonistModel->findAntagonistByName($antName);
			} else {
				$antContent = mysql_real_escape_string($antContent);
				$data['antagonists'] = $this->AntagonistModel->findAntagonistByContentAndName($antContent, $antName);
			}
		}
		$data['combo'] = array(
						array('value'=>"sortLevel", 'name'=>"Sort by Level"),
						array('value'=>"sortHitpoints", 'name'=>"Sort by Hitpoints"),
						array('value'=>"sortContent", 'name'=>"Sort by Content Level"));		
		$data['action'] = $this->session->userdata('action');
		$data['title'] = "WowGuildProgressTracker - Find - Antagonists - Results";
		$data['header'] = "Find - Antagonists - Results";
		$this->load->view("header/header", $data);
		$this->load->view("Find/FindAntagonistResults", $data);			
	}
}
?>