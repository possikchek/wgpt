<?php 
class Main extends CI_Controller {
		
	public function index() {
		$data['title'] = "Wow Guild Progress Tracker";
		$data['header'] = "Wow Guild Progress Tracker";
		$data['action'] = $this->session->userdata('action');
		$data['combo'] = array(
						array('value'=>"sortContent", 'name'=>"Sort by Content Level"),
						array('value'=>"sortFraction", 'name'=>"Sort by Fraction"),
						array('value'=>"sortRace", 'name'=>"Sort by Race"),
						array('value'=>"sortLevel", 'name'=>"Sort by Level"));
		$this->load->view("header/header", $data);
		$this->load->view('main/main', $data);
	}
}

?>