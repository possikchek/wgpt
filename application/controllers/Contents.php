<?php
class Contents extends CI_Controller {
		
	public function index() {
		$this->load->model("ContentModel");
		$data['contents'] = $this->ContentModel->getContentList();
		$data['action'] = $this->session->userdata('action');
		$data['title'] = "WowGuildProgressTracker - Content Levels";
		$data['header'] = "Content Levels";
		$data['combo'] = array(
						array('value'=>"sortQuantity", 'name'=>"Sort by Antagonists Quantity"));
		$this->load->view("header/header", $data);
		$this->load->view("content/index", $data);
	}
	
	public function showContent($name) {
		$name = str_replace("_"," ",$name);
		$this->load->model("ContentModel");
		$this->load->model("AntagonistModel");
		$data['content'] = $this->ContentModel->getContent($name);
		$data['antagonists'] = $this->AntagonistModel->getAntagonistsForContent($data['content'][0]->id);
		if(empty($data['content'])) {
			$data['error'] = "There is no organisation with such name";
			$this->load->view("Error/index.php", $data);
		} else {
			$this->load->model('CommentModel');
			$data['comments'] = $this->CommentModel->getContentComments($data['content'][0]->id);		
			$data['action'] = $this->session->userdata('action');
			$data['title'] = "WowGuildProgressTracker - Organisation - ".$name;
			$data['header'] = $name;
			$data['combo'] = array(
						array('value'=>"sortLevel", 'name'=>"Sort by Level"),
						array('value'=>"sortHitpoints", 'name'=>"Sort by Hitpoints"));
			$this->load->view("header/header", $data);
			$this->load->view("Content/content", $data);
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
			$this->load->model("ContentModel");
			$content = $this->ContentModel->getContentId($name);
			$id =$content[0]->id;
			$this->CommentModel->addContentComment($id,$comment);
			$name = str_replace(" ","_",$name);
			header("location: ".base_url()."Contents/showContent/".$name);
		}
	}	
}
?>