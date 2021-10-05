<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model("Settings_m");
	}

	public function index() {
		$data['settings'] = $this->Settings_m->getSettings("tblSettings", array("siteID" => 1)); 
		$data['social'] = $this->Settings_m->getAllSettings("tblSocial",array("socialStatus" =>1), "socialID ASC");
		$data["slider"] 		= $this->sm->getAllSettings("tblSlider", array("sliderStatus" =>1), "sliderRank ASC");
		$data["aboutUs"]  = $this->sm->getAllSettings("tblAboutUs", array("aboutUsStatus" =>1), "aboutUsRank ASC");
		$data["services"]  = $this->sm->getAllSettings("tblServices", array("servicesStatus" =>1), "servicesRank ASC");
		$data["team"]  = $this->sm->getAllSettings("tblTeam", array("teamStatus" =>1), "teamRank ASC");
		$data["counter"]  = $this->sm->getAllSettings("tblCounter", array("counterStatus" =>1), "counterRank ASC");
		$data["project"]  = $this->sm->getAllSettings("tblProject", array("projectStatus" =>1), "projectRank ASC");
		$data["page"]  = $this->sm->getAllSettings("tblPages", array("pagesStatus" =>1), "pagesRank ASC");
		$data['brandsAll']	= $this->Settings_m->getAllSettings("tblBrands", array("brandsStatus" =>1), "brandsRank ASC");
		$this->load->view('Home_v',$data);
	}
}
