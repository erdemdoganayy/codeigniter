<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Albums extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("Settings_m");
		if (!$this->session->userdata("admin")) {
			redirect(base_url("Login"));
		}
	}

	### Genel Ayarlar (albums_v) Veri Gönderimi ###
	public function index() { 
		$data['settings'] 		= $this->Settings_m->getSettings("tblSettings", array("siteID" => 1)); 
		$data['social'] 			= $this->Settings_m->getAllSettings("tblSocial",array("socialStatus" =>1), "socialID ASC");
		$data["aboutUs"] 		= $this->sm->getAllSettings("tblAboutUs", array("aboutUsStatus" =>1), "aboutUsRank ASC");
		$data["project"] 		= $this->sm->getAllSettings("tblProject", array("projectStatus" =>1), "projectRank ASC");
		$data["page"]  			= $this->sm->getAllSettings("tblPages", array("pagesStatus" =>1), "pagesRank ASC");
		$data['albums']			= $this->Settings_m->getAllSettings("tblAlbums",array("albumsStatus" => 1),"albumsRank ASC");
		$data['url']					= "albums";
		$this->load->view('Albums_v',$data);

	}// END Genel Ayarlar (albums_v) Veri Gönderimi //

	public function albumDetail($albumsID) { 
		$data['settings'] 				= $this->Settings_m->getSettings("tblSettings", array("siteID" => 1)); 
		$data['social'] 					= $this->Settings_m->getAllSettings("tblSocial",array("socialStatus" =>1), "socialID ASC");
		$data["aboutUs"]  			= $this->sm->getAllSettings("tblAboutUs", array("aboutUsStatus" =>1), "aboutUsRank ASC");
		$data["project"]  				= $this->sm->getAllSettings("tblProject", array("projectStatus" =>1), "projectRank ASC");
		$data["page"]  					= $this->sm->getAllSettings("tblPages", array("pagesStatus" =>1), "pagesRank ASC");
		$data['albums']					= $this->Settings_m->getSettings("tblAlbums",array("albumsID" => $albumsID,"albumsStatus" => 1));
		$data['albumsPhotos']		= $this->Settings_m->getAllSettings("tblAlbumsPhotos",array("albumsPhotosStatus" => 1, "albumsID" => $albumsID),"albumsPhotosRank ASC");
		$data['url']							= "albumsPhotos";
		$this->load->view('AlbumsPhotos_v',$data);

	}

}
