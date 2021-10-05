<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sliders extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("Settings_m");
		if (!$this->session->userdata("admin")) {
			redirect(base_url("Login"));
		}
	}

	### Genel Ayarlar (Sliders_v) Veri Gönderimi ###
	public function index() { 
		$data['admin'] = $this->Settings_m->getSettings("tblAdmin", array("adminID" => 1)); // TOP HEADER ADMİN BİLGİLERİ SORGUSU 
		$data['settings'] = $this->Settings_m->getSettings("tblSettings", array("siteID" => 1)); // TOP HEADER SİTE AYARLARI SORGUSU
		$data['count'] = $this->sm->countMes("tblMessages", array("messagesStatus" => 0)); // TOP HEADER MESAJ SAYISI SORGUSU 
		$data['messages'] = $this->sm->countMessages("tblMessages", array("messagesStatus" => 0)); // TOP HEADER MESAJ SORGUSU 
		$data['countSubs'] = $this->sm->countSubs("tblSubscribers", array("SubscribersStatus" => 0)); // TOP HEADER ABONE SAYISI SORGUSU 
		$data['subcribes'] = $this->sm->countSubscribers("tblSubscribers", array("SubscribersStatus" => 0)); // TOP HEADER ABONELER SORGUSU 
		$data['slidersAll']		= $this->Settings_m->getAllSettings("tblSlider",array(),"sliderRank ASC");
		$data['url']			= "sliders";
		$this->load->view('Sliders_v',$data);

	}// END Genel Ayarlar (Sliders_v) Veri Gönderimi //

	### Slider Ekleme ###
	public function insertSlider () {
		$sliderTitle 		= $this->input->post("sliderTitle");
		$sliderContent 		= $this->input->post("sliderContent");
		$sliderBtnLeft 		= $this->input->post("sliderBtnLeft");
		$sliderBtnRight 	= $this->input->post("sliderBtnRight");
		$sliderBtnLeftLink 	= $this->input->post("sliderBtnLeftLink");
		$sliderBtnRightLink = $this->input->post("sliderBtnRightLink");
		if (!$sliderTitle || !$sliderContent || !$sliderBtnLeft || !$sliderBtnRight  || !$sliderBtnLeftLink || !$sliderBtnRightLink) {
			$alert	= array(
				"title" 	=> "Dikkat !",
				"subtitle" 	=> "Lütfen Formda Boş Alan Bırakmayınız !",
				"type" 		=> "warning"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Sliders"));
		}else {

			if (!empty($_FILES["sliderImage"]["name"])) {

				$config['upload_path']		= 'uploads/sliders/';
				$config['allowed_types']	= 'png|jpg|jpeg|svg|gif';
				$config['file_name']		=  uniqid();
				$this->load->library("upload",$config);

				$upload 	= $this->upload->do_upload("sliderImage");
				if ($upload) {
					$uploaded_filename 	= $this->upload->data("file_name");
					$config['image_library']	= "gd2";
					$config['source_image']		= "uploads/sliders/".$uploaded_filename;
					$config['create_thumb']		=  FALSE;
					$config['maintain_ratio']	=  FALSE;
					$config['quality']			=  "100%";
					$config['width']			=  1200;
					$config['height']			=  560;
					$this->load->library("image_lib",$config);
					$this->image_lib->resize();

					$insert = $this->Settings_m->insertSettings("tblSlider" ,array(
						"sliderImage" 		=> "sliders/".$uploaded_filename,
						"sliderTitle" 	=> $sliderTitle,
						"sliderContent" 	=> $sliderContent,
						"sliderBtnLeft" 	=> $sliderBtnLeft,
						"sliderBtnRight" 	=> $sliderBtnRight,
						"sliderBtnLeftLink" => $sliderBtnLeftLink,
						"sliderBtnRightLink"=> $sliderBtnRightLink,
						"sliderStatus"		=> 1,
						"sliderCreatedAt"	=> date("Y-m-d")
					));

					if ($insert) {
						$alert	= array(
							"title" 	=> "Tebrikler !",
							"subtitle" 	=> "Slider Ekleme İşlemi Tamamlandı !",
							"type" 		=> "success"
						);
					}else {
						$alert	= array(
							"title" 	=> "Hata !",
							"subtitle" 	=> "Slider Ekleme İşlemi Gerçekleştirilemedi !",
							"type" 		=> "error"
						);
					}
					$this->session->set_flashdata("alert", $alert);
					redirect(base_url("Sliders"));
				}else {
					$alert	= array(
						"title" 	=> "Hata !",
						"subtitle" 	=> "Logo Yüklenirken Bir Hata Oluştu !",
						"type" 		=> "error"
					);
					$this->session->set_flashdata("alert", $alert);
					redirect(base_url("Sliders"));
				}
			}else {
				$alert	= array(
					"title" 	=> "Dikkat !",
					"subtitle" 	=> "Lütfen Boş Alan Bırakmayınız !",
					"type" 		=> "warning"
				);
				$this->session->set_flashdata("alert", $alert);
				redirect(base_url("Sliders"));
			}

		}
	}// END Slider Ekleme //	


	### Slider Güncelleme ###
	public function updateSlider($sliderID) {

		$sliderTitle 		= $this->input->post("sliderTitle");
		$sliderContent 		= $this->input->post("sliderContent");
		$sliderBtnLeft 		= $this->input->post("sliderBtnLeft");
		$sliderBtnRight 	= $this->input->post("sliderBtnRight");
		$sliderBtnLeftLink 	= $this->input->post("sliderBtnLeftLink");
		$sliderBtnRightLink = $this->input->post("sliderBtnRightLink");
		if (!$sliderContent || !$sliderBtnLeft || !$sliderBtnRight  || !$sliderBtnLeftLink || !$sliderBtnRightLink) {
			$alert	= array(
				"title" 	=> "Dikkat !",
				"subtitle" 	=> "Lütfen Formda Boş Alan Bırakmayınız !",
				"type" 		=> "warning"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Sliders"));
		}else {

			if (!empty($_FILES["sliderImage"]["name"])) {

				$ImageData = $this->Settings_m->getSettings("tblSlider",array(
					"sliderID" => $sliderID
				));
				unlink("uploads/".$ImageData->sliderImage);

				$config['upload_path']		= 'uploads/sliders/';
				$config['allowed_types']	= 'png|jpg|jpeg|svg|gif';
				$config['file_name']		=  uniqid();
				$this->load->library("upload",$config);

				$upload 	= $this->upload->do_upload("sliderImage");
				if ($upload) {
					$uploaded_filename 	= $this->upload->data("file_name");
					$config['image_library']	= "gd2";
					$config['source_image']		= "uploads/sliders/".$uploaded_filename;
					$config['create_thumb']		=  FALSE;
					$config['maintain_ratio']	=  FALSE;
					$config['quality']			=  "100%";
					$config['width']			=  1200;
					$config['height']			=  560;
					$this->load->library("image_lib",$config);
					$this->image_lib->resize();

					$update = $this->Settings_m->updateSettings("tblSlider" ,array(
						"sliderID" => $sliderID
					),array(
						"sliderImage" 		=> "sliders/".$uploaded_filename,
						"sliderTitle" 	=> $sliderTitle,
						"sliderContent" 	=> $sliderContent,
						"sliderBtnLeft" 	=> $sliderBtnLeft,
						"sliderBtnRight" 	=> $sliderBtnRight,
						"sliderBtnLeftLink" => $sliderBtnLeftLink,
						"sliderBtnRightLink"=> $sliderBtnRightLink
					));

					if ($update) {
						$alert	= array(
							"title" 	=> "Tebrikler !",
							"subtitle" 	=> "Slider Güncelleme İşlemi Tamamlandı !",
							"type" 		=> "success"
						);
					}else {
						$alert	= array(
							"title" 	=> "Hata !",
							"subtitle" 	=> "Slider Güncelleme İşlemi Gerçekleştirilemedi !",
							"type" 		=> "error"
						);
					}
					$this->session->set_flashdata("alert", $alert);
					redirect(base_url("Sliders"));
				}else {
					$alert	= array(
						"title" 	=> "Hata !",
						"subtitle" 	=> "Slider Güncellenirken Bir Hata Oluştu !",
						"type" 		=> "error"
					);
					$this->session->set_flashdata("alert", $alert);
					redirect(base_url("Sliders"));
				}
			}else {
				$update = $this->Settings_m->updateSettings("tblSlider" ,array(
					"sliderID" => $sliderID
				),array(
					"sliderTitle" 			=> $sliderTitle,
					"sliderContent" 			=> $sliderContent,
					"sliderBtnLeft" 			=> $sliderBtnLeft,
					"sliderBtnRight" 			=> $sliderBtnRight,
					"sliderBtnLeftLink" 	=> $sliderBtnLeftLink,
					"sliderBtnRightLink"	=> $sliderBtnRightLink
				));

				if ($update) {
					$alert	= array(
						"title" 	=> "Tebrikler !",
						"subtitle" 	=> "Slider Güncelleme İşlemi Tamamlandı !",
						"type" 		=> "success"
					);
				}else {
					$alert	= array(
						"title" 	=> "Hata !",
						"subtitle" 	=> "Slider Güncelleme İşlemi Gerçekleştirilemedi !",
						"type" 		=> "error"
					);
				}
				$this->session->set_flashdata("alert", $alert);
				redirect(base_url("Sliders"));
			}

		}

	}// END Slider Güncelleme //


	### Slider Silme Methodu ###
	public function deleteSlider($sliderID) {
		
		$ImageData = $this->Settings_m->getSettings("tblSlider",array(
			"sliderID" => $sliderID
		));
		unlink("uploads/".$ImageData->sliderImage);
		
		$delete 	= $this->Settings_m->deleteSettings("tblSlider",array(
			"sliderID" => $sliderID
		));

		if ($delete) {
			$alert	= array(
				"title" 	=> "Tebrikler !",
				"subtitle" 	=> "Silme İşlemi Tamamlandı !",
				"type" 		=> "success"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Sliders"));
		} else {
			$alert	= array(
				"title" 	=> "Hata !",
				"subtitle" 	=> "Silme İşlemi Gerçekleştirilemedi !",
				"type" 		=> "error"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Sliders"));
		}
	}// END Slider Silme Methodu //

	### Genel Ayarlar Status Güncelleme Methodu ###
	public function updateIsActiveSlider() {

		$dataID  = $this->input->post("dataID");
		$status  = ($this->input->post("status")=="true") ? 1 : 0 ;


		$update  = $this->Settings_m->updateSettings("tblSlider",array(
			"sliderID" => $dataID
		),array(
			"sliderStatus" => $status
		));
		
		if ($update>0) {
			echo json_encode(array("success"=>1));
		}else{
			echo json_encode(array("success"=>0));
		}
	}// END Genel Ayarlar Status Güncelleme Methodu //

	public function updateRankSlider() {

		$data = $this->input->post("data");
		parse_str($data,$rank);
		$value = $rank["rank"];

		foreach ($value as $rank => $id) {
			
			$this->Settings_m->updateSettings("tblSlider",array(
				"sliderID" 	 => $id
			),array(
				"sliderRank" => $rank
			));
			
		}
		
	}


}
