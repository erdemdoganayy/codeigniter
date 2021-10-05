<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pages extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("Settings_m");
		if (!$this->session->userdata("admin")) {
			redirect(base_url("Login"));
		}
	}

	### pages (pages_v) Veri Gönderimi ###
	public function index() { 
		$data['settings'] 		= $this->Settings_m->getSettings("tblSettings", array("siteID" => 1)); 
		$data['social'] 			= $this->Settings_m->getAllSettings("tblSocial",array("socialStatus" =>1), "socialID ASC");
		$data["aboutUs"] 		= $this->sm->getAllSettings("tblAboutUs", array("aboutUsStatus" =>1), "aboutUsRank ASC");
		$data["project"] 		= $this->sm->getAllSettings("tblProject", array("projectStatus" =>1), "projectRank ASC");
		$data["page"]  			= $this->sm->getAllSettings("tblPages", array("pagesStatus" =>1), "pagesRank ASC");
		$data['albums']			= $this->Settings_m->getAllSettings("tblAlbums",array("albumsStatus" => 1),"albumsRank ASC");
		$data['pagesAll']			= $this->Settings_m->getAllSettings("tblpages",array(),"pagesRank ASC");
		$data['url']					= "pages";
		$this->load->view('Pages_v',$data);

	}// END pages (pages_v) Veri Gönderimi //


		public function PagesDetail($pagesID) { 
		$data['settings'] 				= $this->Settings_m->getSettings("tblSettings", array("siteID" => 1)); 
		$data['social'] 					= $this->Settings_m->getAllSettings("tblSocial",array("socialStatus" =>1), "socialID ASC");
		$data["aboutUs"] 				= $this->sm->getAllSettings("tblAboutUs", array("aboutUsStatus" =>1), "aboutUsRank ASC");
		$data["project"] 				= $this->sm->getAllSettings("tblProject", array("projectStatus" =>1), "projectRank ASC");
		$data["page"]  					= $this->sm->getAllSettings("tblPages", array("pagesStatus" =>1), "pagesRank ASC");
		$data['albums']					= $this->Settings_m->getAllSettings("tblAlbums",array("albumsStatus" => 1),"albumsRank ASC");
		$data['pagesDetail']			= $this->Settings_m->getSettings("tblpages",array("pagesStatus" => 1));
		$data['url']							= "pages";
		$this->load->view('PagesDetail_v',$data);

	}













}
