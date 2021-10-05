<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class faq extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("Settings_m");
		if (!$this->session->userdata("admin")) {
			redirect(base_url("Login"));
		}
	}

	### Faq (Faq_v) Veri Gönderimi ###
	public function index() { 
		$data['settings'] = $this->Settings_m->getSettings("tblSettings", array("siteID" => 1)); 
		$data['social'] = $this->Settings_m->getAllSettings("tblSocial",array("socialStatus" =>1), "socialID ASC");
		$data["aboutUs"]  = $this->sm->getAllSettings("tblAboutUs", array("aboutUsStatus" =>1), "aboutUsRank ASC");
		$data["project"]  = $this->sm->getAllSettings("tblProject", array("projectStatus" =>1), "projectRank ASC");
		$data["page"]  = $this->sm->getAllSettings("tblPages", array("pagesStatus" =>1), "pagesRank ASC");
		$data['faq']			= $this->Settings_m->getAllSettings("tblfaq",array("faqStatus" =>1),"faqRank ASC");
		$data['url']					= "faq";
		$this->load->view('Faq_v',$data);

			}// END Faq (Faq_v) Veri Gönderimi //






		}
