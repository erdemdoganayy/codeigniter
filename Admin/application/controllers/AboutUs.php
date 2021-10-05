<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AboutUs extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model("Settings_m");
		if (!$this->session->userdata("admin")) {
			redirect(base_url("Login"));
		}
	}
	public function index() {
		$data['settings'] = $this->Settings_m->getSettings("tblSettings", array("siteID" => 1)); // TOP HEADER SİTE AYARLARI SORGUSU
		$data['count'] = $this->sm->countMes("tblMessages", array("messagesStatus" => 0)); // TOP HEADER MESAJ SAYISI SORGUSU 
		$data['messages'] = $this->sm->countMessages("tblMessages", array("messagesStatus" => 0)); // TOP HEADER MESAJ SORGUSU 
		$data['countSubs'] = $this->sm->countSubs("tblSubscribers", array("SubscribersStatus" => 0)); // TOP HEADER ABONE SAYISI SORGUSU 
		$data['subcribes'] = $this->sm->countSubscribers("tblSubscribers", array("SubscribersStatus" => 0)); // TOP HEADER ABONELER SORGUSU 
		$data['admin'] = $this->Settings_m->getSettings("tblAdmin", array("adminID" => 1)); // TOP HEADER ADMİN BİLGİLERİ SORGUSU 
		$data['data']		= $this->Settings_m->getSettings("tblAboutUs",array(
			"aboutUsID" => "1"
		));
		$data['url']	= "aboutUs";
		$this->load->view('AboutUs_v',$data);
	}

	public function updateAboutUs () {
		$aboutUsTitle 		= $this->input->post("aboutUsTitle");
		$aboutUsContent 		= $this->input->post("aboutUsContent");
		if (!$aboutUsTitle || !$aboutUsContent ) {
			$alert	= array(
				"title" 	=> "Dikkat !",
				"subtitle" 	=> "Lütfen Formda Boş Alan Bırakmayınız !",
				"type" 		=> "warning"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("AboutUs"));
		}else {

			if (!empty($_FILES["aboutUsImage"]["name"])) {

				$ImageData = $this->Settings_m->getSettings("tblAboutUs",array(
					"aboutUsID" => "1"
				));
				unlink("uploads/".$ImageData->aboutUsImage);

				$config['upload_path']		= 'uploads/aboutUs/';
				$config['allowed_types']	= 'png|jpg|jpeg|svg|gif';
				$config['file_name']		=  uniqid();
				$this->load->library("upload",$config);

				$upload 	= $this->upload->do_upload("aboutUsImage");
				if ($upload) {
					$uploaded_filename 			= $this->upload->data("file_name");
					$config['image_library']	= "gd2";
					$config['source_image']	= "uploads/aboutUs/".$uploaded_filename;
					$config['create_thumb']	=  FALSE;
					$config['maintain_ratio']	=  FALSE;
					$config['quality']				=  "100%";
					$config['width']					=  640;
					$config['height']				=  432;
					$this->load->library("image_lib",$config);
					$this->image_lib->resize();

					$update = $this->Settings_m->updateSettings("tblAboutUs" ,array(
						"aboutUsID" => "1"
					),array(
						"aboutUsImage" 		=> "aboutUs/".$uploaded_filename,
						"aboutUsTitle" 			=> $aboutUsTitle,
						"aboutUsContent" 	=> $aboutUsContent
					));

					if ($update) {
						$alert	= array(
							"title" 	=> "Tebrikler !",
							"subtitle" 	=> "Hakkımızda Güncelleme İşlemi Tamamlandı !",
							"type" 		=> "success"
						);
					}else {
						$alert	= array(
							"title" 	=> "Hata !",
							"subtitle" 	=> "Hakkımızda Güncelleme İşlemi Gerçekleştirilemedi !",
							"type" 		=> "error"
						);
					}
					$this->session->set_flashdata("alert", $alert);
					redirect(base_url("AboutUs"));
				}else {
					$alert	= array(
						"title" 	=> "Hata !",
						"subtitle" 	=> "Hakkımızda Güncellenirken Bir Hata Oluştu !",
						"type" 		=> "error"
					);
					$this->session->set_flashdata("alert", $alert);
					redirect(base_url("AboutUs"));
				}
			}else {
				$update = $this->Settings_m->updateSettings("tblAboutUs" ,array(
					"aboutUsID" => "1"
				),array(
					"aboutUsTitle" 			=> $aboutUsTitle,
					"aboutUsContent" 	=> $aboutUsContent
				));

				if ($update) {
					$alert	= array(
						"title" 	=> "Tebrikler !",
						"subtitle" 	=> "Hakkımızda Güncelleme İşlemi Tamamlandı !",
						"type" 		=> "success"
					);
				}else {
					$alert	= array(
						"title" 	=> "Hata !",
						"subtitle" 	=> "Hakkımızda Güncelleme İşlemi Gerçekleştirilemedi !",
						"type" 		=> "error"
					);
				}
				$this->session->set_flashdata("alert", $alert);
				redirect(base_url("AboutUs"));
			}

		}
	}

}