<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mission extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model("Settings_m");
		if (!$this->session->userdata("admin")) {
			redirect(base_url("Login"));
		}
	}
	public function index() {
		$data['settings'] = $this->Settings_m->getSettings("tblSettings", array("siteID" => 1)); 
		$data['social'] = $this->Settings_m->getAllSettings("tblSocial",array("socialStatus" =>1), "socialID ASC");
		$data["vision"]  = $this->sm->getAllSettings("tblVision", array("visionStatus" =>1), "visionRank ASC");
		$data["mission"]  = $this->sm->getAllSettings("tblmission", array("missionStatus" =>1), "missionRank ASC");
		$data["aboutUs"]  = $this->sm->getAllSettings("tblAboutUs", array("aboutUsStatus" =>1), "aboutUsRank ASC");
		$data["project"]  = $this->sm->getAllSettings("tblProject", array("projectStatus" =>1), "projectRank ASC");
		$data["page"]  = $this->sm->getAllSettings("tblPages", array("pagesStatus" =>1), "pagesRank ASC");
		$data['url']	= "mission";
		$this->load->view('Mission_v',$data);
	}

	public function updateMission () {
		$missionTitle 				= $this->input->post("missionTitle");
		$missionContent 		= $this->input->post("missionContent");
		if (!$missionTitle || !$missionContent ) {
			$alert	= array(
				"title" 			=> "Dikkat !",
				"subtitle" 	=> "Lütfen Formda Boş Alan Bırakmayınız !",
				"type" 			=> "warning"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Mission"));
		}else {

			if (!empty($_FILES["missionImage"]["name"])) {

				$ImageData = $this->Settings_m->getSettings("tblmission",array(
					"missionID" => "1"
				));
				unlink("uploads/".$ImageData->missionImage);

				$config['upload_path']		= 'uploads/mission/';
				$config['allowed_types']	= 'png|jpg|jpeg|svg|gif';
				$config['file_name']		=  uniqid();
				$this->load->library("upload",$config);

				$upload 	= $this->upload->do_upload("missionImage");
				if ($upload) {
					$uploaded_filename 			= $this->upload->data("file_name");
					$config['image_library']	= "gd2";
					$config['source_image']	= "uploads/mission/".$uploaded_filename;
					$config['create_thumb']	=  FALSE;
					$config['maintain_ratio']	=  FALSE;
					$config['quality']				=  "100%";
					$config['width']					=  1200;
					$config['height']				=  560;
					$this->load->library("image_lib",$config);
					$this->image_lib->resize();

					$update = $this->Settings_m->updateSettings("tblmission" ,array(
						"missionID" => "1"
					),array(
						"missionImage" 		=> "mission/".$uploaded_filename,
						"missionTitle" 			=> $missionTitle,
						"missionContent" 	=> $missionContent
					));

					if ($update) {
						$alert	= array(
							"title" 	=> "Tebrikler !",
							"subtitle" 	=> "Misyon Güncelleme İşlemi Tamamlandı !",
							"type" 		=> "success"
						);
					}else {
						$alert	= array(
							"title" 	=> "Hata !",
							"subtitle" 	=> "Misyon Güncelleme İşlemi Gerçekleştirilemedi !",
							"type" 		=> "error"
						);
					}
					$this->session->set_flashdata("alert", $alert);
					redirect(base_url("Mission"));
				}else {
					$alert	= array(
						"title" 	=> "Hata !",
						"subtitle" 	=> "Misyon Güncellenirken Bir Hata Oluştu !",
						"type" 		=> "error"
					);
					$this->session->set_flashdata("alert", $alert);
					redirect(base_url("Mission"));
				}
			}else {
				$update = $this->Settings_m->updateSettings("tblmission" ,array(
					"missionID" => "1"
				),array(
					"missionTitle" 			=> $missionTitle,
					"missionContent" 	=> $missionContent
				));

				if ($update) {
					$alert	= array(
						"title" 	=> "Tebrikler !",
						"subtitle" 	=> "Misyon Güncelleme İşlemi Tamamlandı !",
						"type" 		=> "success"
					);
				}else {
					$alert	= array(
						"title" 	=> "Hata !",
						"subtitle" 	=> "Misyon Güncelleme İşlemi Gerçekleştirilemedi !",
						"type" 		=> "error"
					);
				}
				$this->session->set_flashdata("alert", $alert);
				redirect(base_url("Mission"));
			}

		}
	}

}