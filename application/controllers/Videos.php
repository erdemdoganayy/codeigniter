<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Videos extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("Settings_m");
		if (!$this->session->userdata("admin")) {
			redirect(base_url("Login"));
		}
	}

	### Genel Ayarlar (videos_v) Veri Gönderimi ###
	public function index() { 
		$data['settings'] 		= $this->Settings_m->getSettings("tblSettings", array("siteID" => 1)); 
		$data['social'] 			= $this->Settings_m->getAllSettings("tblSocial",array("socialStatus" =>1), "socialID ASC");
		$data["aboutUs"] 		= $this->sm->getAllSettings("tblAboutUs", array("aboutUsStatus" =>1), "aboutUsRank ASC");
		$data["project"] 		= $this->sm->getAllSettings("tblProject", array("projectStatus" =>1), "projectRank ASC");
		$data["page"]  			= $this->sm->getAllSettings("tblPages", array("pagesStatus" =>1), "pagesRank ASC");
		$data['albums']			= $this->Settings_m->getAllSettings("tblAlbums",array("albumsStatus" => 1),"albumsRank ASC");
		$data['videos']			= $this->Settings_m->getAllSettings("tblvideos",array("videosStatus" => 1),"videosRank ASC");
		$data['url']						= "videos";
		$this->load->view('Videos_v',$data);

	}// END Genel Ayarlar (videos_v) Veri Gönderimi //

	### videos Ekleme ###
	public function insertVideos () {
		$videosLink 		= $this->input->post("videosLink");
		$videosTitle 		= $this->input->post("videosTitle");

		if (!$videosLink || !$videosTitle) {
			$alert	= array(
				"title" 	=> "Dikkat !",
				"subtitle" 	=> "Lütfen Formda Boş Alan Bırakmayınız !",
				"type" 		=> "warning"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Videos"));
		}else {
			$insert = $this->Settings_m->insertSettings("tblVideos" ,array(
				"videosLink" 		=> $videosLink,
				"videosTitle" 		=> $videosTitle,
				"videosRank"			=> 0,
				"videosStatus"		=> 1,
				"videosCreatedAt"	=> date("Y-m-d")
			));

			if ($insert) {
				$alert	= array(
					"title" 	=> "Tebrikler !",
					"subtitle" 	=> "Video Ekleme İşlemi Tamamlandı !",
					"type" 		=> "success"
				);
			}else {
				$alert	= array(
					"title" 	=> "Hata !",
					"subtitle" 	=> "Video Ekleme İşlemi Gerçekleştirilemedi !",
					"type" 		=> "error"
				);
			}
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Videos"));
		}

	}// END videos Ekleme //	


	### videos Güncelleme ###
	public function updateVideos($videosID) {

		$videosLink 		= $this->input->post("videosLink");
		$videosTitle 		= $this->input->post("videosTitle");

		if (!$videosLink || !$videosTitle) {
			$alert	= array(
				"title" 	=> "Dikkat !",
				"subtitle" 	=> "Lütfen Formda Boş Alan Bırakmayınız !",
				"type" 		=> "warning"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Videos"));
		}else {

			$update = $this->Settings_m->updateSettings("tblvideos" ,array(
				"videosID" => $videosID
			),array(
				"videosLink" 		=> $videosLink,
				"videosTitle" 		=> $videosTitle
			));

			if ($update) {
				$alert	= array(
					"title" 	=> "Tebrikler !",
					"subtitle" 	=> "Video Güncelleme İşlemi Tamamlandı !",
					"type" 		=> "success"
				);
			}else {
				$alert	= array(
					"title" 	=> "Hata !",
					"subtitle" 	=> "Video Güncelleme İşlemi Gerçekleştirilemedi !",
					"type" 		=> "error"
				);
			}
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Videos"));

		}

	}// END videos Güncelleme //



	### videos Silme Methodu ###
	public function deleteVideos($videosID) {

		$delete 	= $this->Settings_m->deleteSettings("tblvideos",array(
			"videosID" => $videosID
		));

		if ($delete) {
			$alert	= array(
				"title" 	=> "Tebrikler !",
				"subtitle" 	=> "Silme İşlemi Tamamlandı !",
				"type" 		=> "success"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Videos"));
		} else {
			$alert	= array(
				"title" 	=> "Hata !",
				"subtitle" 	=> "Silme İşlemi Gerçekleştirilemedi !",
				"type" 		=> "error"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Videos"));
		}
	}// END videos Silme Methodu //

	### videos Status Güncelleme Methodu ###
	public function updateIsActiveVideos() {

		$dataID  = $this->input->post("dataID");
		$status  = ($this->input->post("status")=="true") ? 1 : 0 ;

		$update  = $this->Settings_m->updateSettings("tblvideos",array(
			"videosID" => $dataID
		),array(
			"videosStatus" => $status
		));
		
		if ($update>0) {
			echo json_encode(array("success"=>1));
		}else{
			echo json_encode(array("success"=>0));
		}
	}// END videos Status Güncelleme Methodu //

	### videos Sıralama
	public function updateRankVideos() {

		$data = $this->input->post("data");
		parse_str($data,$rank);
		$value = $rank["rank"];

		foreach ($value as $rank => $id) {
			
			$this->Settings_m->updateSettings("tblvideos",array(
				"videosID" 	 => $id
			),array(
				"videosRank" => $rank
			));
			
		}
		
	} // END videos Sıralama

	

}
