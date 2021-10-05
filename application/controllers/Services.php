<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("Settings_m");
		if (!$this->session->userdata("admin")) {
			redirect(base_url("Login"));
		}
	}

	### Genel Ayarlar (Settings_v) Veri Gönderimi ###
	public function index() { 
		$data['settings'] = $this->Settings_m->getSettings("tblSettings", array("siteID" => 1)); 
		$data['social'] = $this->Settings_m->getAllSettings("tblSocial",array("socialStatus" =>1), "socialID ASC");
		$data["aboutUs"]  = $this->sm->getAllSettings("tblAboutUs", array("aboutUsStatus" =>1), "aboutUsRank ASC");
		$data["project"]  = $this->sm->getAllSettings("tblProject", array("projectStatus" =>1), "projectRank ASC");
		$data["page"]  = $this->sm->getAllSettings("tblPages", array("pagesStatus" =>1), "pagesRank ASC");
		$data["services"]  = $this->sm->getAllSettings("tblServices", array("servicesStatus" =>1), "servicesRank ASC");
		$data['url']					= "services";
		$this->load->view('Services_v',$data);

	}// END Genel Ayarlar (Settings_v) Veri Gönderimi //

















}
