<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vision extends CI_Controller {
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
		$data['data']		= $this->Settings_m->getSettings("tblVision",array(
			"visionID" => "1"
		));
		$data['url']	= "vision";
		$this->load->view('vision_v',$data);
	}

	public function updatevision () {
		$visionTitle 				= $this->input->post("visionTitle");
		$visionContent 			= $this->input->post("visionContent");
		if (!$visionTitle || !$visionContent ) {
			$alert	= array(
				"title" 			=> "Dikkat !",
				"subtitle" 	=> "Lütfen Formda Boş Alan Bırakmayınız !",
				"type" 			=> "warning"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Vision"));
		}else {

			if (!empty($_FILES["visionImage"]["name"])) {

				$ImageData = $this->Settings_m->getSettings("tblVision",array(
					"visionID" => "1"
				));
				unlink("uploads/".$ImageData->visionImage);

				$config['upload_path']		= 'uploads/vision/';
				$config['allowed_types']	= 'png|jpg|jpeg|svg|gif';
				$config['file_name']		=  uniqid();
				$this->load->library("upload",$config);

				$upload 	= $this->upload->do_upload("visionImage");
				if ($upload) {
					$uploaded_filename 			= $this->upload->data("file_name");
					$config['image_library']	= "gd2";
					$config['source_image']	= "uploads/vision/".$uploaded_filename;
					$config['create_thumb']	=  FALSE;
					$config['maintain_ratio']	=  FALSE;
					$config['quality']				=  "100%";
					$config['width']					=  1200;
					$config['height']				=  560;
					$this->load->library("image_lib",$config);
					$this->image_lib->resize();

					$update = $this->Settings_m->updateSettings("tblVision" ,array(
						"visionID" => "1"
					),array(
						"visionImage" 		=> "vision/".$uploaded_filename,
						"visionTitle" 			=> $visionTitle,
						"visionContent"	 	=> $visionContent
					));

					if ($update) {
						$alert	= array(
							"title" 			=> "Tebrikler !",
							"subtitle" 	=> "Vizyon Güncelleme İşlemi Tamamlandı !",
							"type" 			=> "success"
						);
					}else {
						$alert	= array(
							"title" 			=> "Hata !",
							"subtitle" 	=> "Vizyon Güncelleme İşlemi Gerçekleştirilemedi !",
							"type" 			=> "error"
						);
					}
					$this->session->set_flashdata("alert", $alert);
					redirect(base_url("Vision"));
				}else {
					$alert	= array(
						"title" 	=> "Hata !",
						"subtitle" 	=> "Vizyon Güncellenirken Bir Hata Oluştu !",
						"type" 		=> "error"
					);
					$this->session->set_flashdata("alert", $alert);
					redirect(base_url("Vision"));
				}
			}else {
				$update = $this->Settings_m->updateSettings("tblvision" ,array(
					"visionID" => "1"
				),array(
					"visionTitle" 			=> $visionTitle,
					"visionContent" 	=> $visionContent
				));

				if ($update) {
					$alert	= array(
						"title" 	=> "Tebrikler !",
						"subtitle" 	=> "Vizyon Güncelleme İşlemi Tamamlandı !",
						"type" 		=> "success"
					);
				}else {
					$alert	= array(
						"title" 	=> "Hata !",
						"subtitle" 	=> "Vizyon Güncelleme İşlemi Gerçekleştirilemedi !",
						"type" 		=> "error"
					);
				}
				$this->session->set_flashdata("alert", $alert);
				redirect(base_url("Vision"));
			}

		}
	}

}