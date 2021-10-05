<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("Settings_m");
	}

	### Genel Ayarlar (news_v) Veri Gönderimi ###
	public function index() { 
		$data['settings'] 		= $this->Settings_m->getSettings("tblSettings", array("siteID" => 1)); 
		$data['social'] 			= $this->Settings_m->getAllSettings("tblSocial",array("socialStatus" =>1), "socialID ASC");
		$data["aboutUs"] 		= $this->sm->getAllSettings("tblAboutUs", array("aboutUsStatus" =>1), "aboutUsRank ASC");
		$data["project"] 		= $this->sm->getAllSettings("tblProject", array("projectStatus" =>1), "projectRank ASC");
		$data["page"]  			= $this->sm->getAllSettings("tblPages", array("pagesStatus" =>1), "pagesRank ASC");
		$data['albums']			= $this->Settings_m->getAllSettings("tblAlbums",array("albumsStatus" => 1),"albumsRank ASC");
		$data['news']				= $this->Settings_m->getAllSettings("tblnews",array(),"newsID ASC");
		$data['url']					= "news";
		$this->load->view('News_v',$data);

	}// END Genel Ayarlar (news_v) Veri Gönderimi //

	public function NewsDetail($newsID) { 
		$data['settings'] 		= $this->Settings_m->getSettings("tblSettings", array("siteID" => 1)); 
		$data['social'] 			= $this->Settings_m->getAllSettings("tblSocial",array("socialStatus" =>1), "socialID ASC");
		$data["aboutUs"] 		= $this->sm->getAllSettings("tblAboutUs", array("aboutUsStatus" =>1), "aboutUsRank ASC");
		$data["project"] 		= $this->sm->getAllSettings("tblProject", array("projectStatus" =>1), "projectRank ASC");
		$data["page"]  			= $this->sm->getAllSettings("tblPages", array("pagesStatus" =>1), "pagesRank ASC");
		$data['albums']			= $this->Settings_m->getAllSettings("tblAlbums",array("albumsStatus" => 1),"albumsRank ASC");
		$data['news']				= $this->Settings_m->getSettings("tblnews",array("newsID" => $newsID, "newsStatus" => 1));
		$data['newsAll']			= $this->Settings_m->getAllSettings("tblnews",array("newsStatus" => 1),"newsID DESC");
		$data['url']					= "news";
		$this->load->view('NewsDetail_v',$data);

	}


}
