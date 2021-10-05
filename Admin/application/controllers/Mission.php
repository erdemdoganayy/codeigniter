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
		$data['admin'] = $this->Settings_m->getSettings("tblAdmin", array("adminID" => 1)); // TOP HEADER ADMİN BİLGİLERİ SORGUSU 
		$data['settings'] = $this->Settings_m->getSettings("tblSettings", array("siteID" => 1)); // TOP HEADER SİTE AYARLARI SORGUSU
		$data['count'] = $this->sm->countMes("tblMessages", array("messagesStatus" => 0)); // TOP HEADER MESAJ SAYISI SORGUSU 
		$data['messages'] = $this->sm->countMessages("tblMessages", array("messagesStatus" => 0)); // TOP HEADER MESAJ SORGUSU 
		$data['countSubs'] = $this->sm->countSubs("tblSubscribers", array("SubscribersStatus" => 0)); // TOP HEADER ABONE SAYISI SORGUSU 
		$data['subcribes'] = $this->sm->countSubscribers("tblSubscribers", array("SubscribersStatus" => 0)); // TOP HEADER ABONELER SORGUSU 
		$data['data']		= $this->Settings_m->getSettings("tblMission",array(
			"missionID" => "1"
		));
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