<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brands extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("Settings_m");
		if (!$this->session->userdata("admin")) {
			redirect(base_url("Login"));
		}
	}

	### Genel Ayarlar (brands_v) Veri Gönderimi ###
	public function index() { 
		$data['settings'] = $this->Settings_m->getSettings("tblSettings", array("siteID" => 1)); // TOP HEADER SİTE AYARLARI SORGUSU
		$data['count'] = $this->sm->countMes("tblMessages", array("messagesStatus" => 0)); // TOP HEADER MESAJ SAYISI SORGUSU 
		$data['messages'] = $this->sm->countMessages("tblMessages", array("messagesStatus" => 0)); // TOP HEADER MESAJ SORGUSU 
		$data['countSubs'] = $this->sm->countSubs("tblSubscribers", array("SubscribersStatus" => 0)); // TOP HEADER ABONE SAYISI SORGUSU 
		$data['subcribes'] = $this->sm->countSubscribers("tblSubscribers", array("SubscribersStatus" => 0)); // TOP HEADER ABONELER SORGUSU 
		$data['admin'] = $this->Settings_m->getSettings("tblAdmin", array("adminID" => 1)); // TOP HEADER ADMİN BİLGİLERİ SORGUSU 
		$data['brandsAll']		= $this->Settings_m->getAllSettings("tblBrands",array(),"brandsRank ASC");
		$data['url']					= "brands";
		$this->load->view('Brands_v',$data);

	}// END Genel Ayarlar (brands_v) Veri Gönderimi //

	### brands Ekleme ###
	public function insertBrands() {
		$brandsTitle 			= $this->input->post("brandsTitle");
		$brandsLink 			= $this->input->post("brandsLink");


		if (!$brandsTitle || !$brandsLink) {
			$alert	= array(
				"title" 	=> "Dikkat !",
				"subtitle" 	=> "Lütfen Formda Boş Alan Bırakmayınız !",
				"type" 		=> "warning"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Brands"));
		}else {

			if (!empty($_FILES["brandsImage"]["name"])) {

				$config['upload_path']		= 'uploads/brands/';
				$config['allowed_types']	= 'png|jpg|jpeg|svg|gif';
				$config['file_name']		=  uniqid();
				$this->load->library("upload",$config);

				$upload 	= $this->upload->do_upload("brandsImage");
				if ($upload) {
					$uploaded_filename 	= $this->upload->data("file_name");
					$config['image_library']	= "gd2";
					$config['source_image']	= "uploads/brands/".$uploaded_filename;
					$config['create_thumb']	=  FALSE;
					$config['maintain_ratio']	=  FALSE;
					$config['quality']				=  "100%";
					$config['width']					=  170;
					$config['height']				=  50;
					$this->load->library("image_lib",$config);
					$this->image_lib->resize();

					$insert = $this->Settings_m->insertSettings("tblBrands" ,array(
						"brandsImage" 		=> "brands/".$uploaded_filename,
						"brandsTitle" 		=> $brandsTitle,
						"brandsLink" 		=> $brandsLink,
						"brandsStatus"		=> 1,
						"brandsCreatedAt"	=> date("Y-m-d")
					));

					if ($insert) {
						$alert	= array(
							"title" 	=> "Tebrikler !",
							"subtitle" 	=> "Referans Ekleme İşlemi Tamamlandı !",
							"type" 		=> "success"
						);
					}else {
						$alert	= array(
							"title" 	=> "Hata !",
							"subtitle" 	=> "Referans Ekleme İşlemi Gerçekleştirilemedi !",
							"type" 		=> "error"
						);
					}
					$this->session->set_flashdata("alert", $alert);
					redirect(base_url("Brands"));
				}else {
					$alert	= array(
						"title" 	=> "Hata !",
						"subtitle" 	=> "Resim Yüklenirken Bir Hata Oluştu !",
						"type" 		=> "error"
					);
					$this->session->set_flashdata("alert", $alert);
					redirect(base_url("Brands"));
				}
			}else {
				$alert	= array(
					"title" 	=> "Dikkat !",
					"subtitle" 	=> "Lütfen Resim Alanını Boş Bırakmayınız !",
					"type" 		=> "warning"
				);
				$this->session->set_flashdata("alert", $alert);
				redirect(base_url("Brands"));
			}

		}
	}// END brands Ekleme //	


	### brands Güncelleme ###
	public function updateBrands($brandsID) {

		$brandsTitle 		= $this->input->post("brandsTitle");
		$brandsLink 		= $this->input->post("brandsLink");
		if (!$brandsTitle || !$brandsLink) {
			$alert	= array(
				"title" 	=> "Dikkat !",
				"subtitle" 	=> "Lütfen Formda Boş Alan Bırakmayınız !",
				"type" 		=> "warning"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("brands"));
		}else {

			if (!empty($_FILES["brandsImage"]["name"])) {

				$ImageData = $this->Settings_m->getSettings("tblbrands",array(
					"brandsID" => $brandsID
				));
				unlink("uploads/".$ImageData->brandsImage);

				$config['upload_path']		= 'uploads/brands/';
				$config['allowed_types']	= 'png|jpg|jpeg|svg|gif';
				$config['file_name']		=  uniqid();
				$this->load->library("upload",$config);

				$upload 	= $this->upload->do_upload("brandsImage");
				if ($upload) {
					$uploaded_filename 	= $this->upload->data("file_name");
					$config['image_library']		= "gd2";
					$config['source_image']		= "uploads/brands/".$uploaded_filename;
					$config['create_thumb']		=  FALSE;
					$config['maintain_ratio']		=  FALSE;
					$config['quality']					=  "100%";
					$config['width']						=  170;
					$config['height']					=  50;
					$this->load->library("image_lib",$config);
					$this->image_lib->resize();

					$update = $this->Settings_m->updateSettings("tblbrands" ,array(
						"brandsID" => $brandsID
					),array(
						"brandsImage" 		=> "brands/".$uploaded_filename,
						"brandsTitle" 		=> $brandsTitle,
						"brandsLink" 		=> $brandsLink
					));

					if ($update) {
						$alert	= array(
							"title" 	=> "Tebrikler !",
							"subtitle" 	=> "Referans Güncelleme İşlemi Tamamlandı !",
							"type" 		=> "success"
						);
					}else {
						$alert	= array(
							"title" 	=> "Hata !",
							"subtitle" 	=> "Referans Güncelleme İşlemi Gerçekleştirilemedi !",
							"type" 		=> "error"
						);
					}
					$this->session->set_flashdata("alert", $alert);
					redirect(base_url("Brands"));
				}else {
					$alert	= array(
						"title" 	=> "Hata !",
						"subtitle" 	=> "Resim Güncellenirken Bir Hata Oluştu !",
						"type" 		=> "error"
					);
					$this->session->set_flashdata("alert", $alert);
					redirect(base_url("Brands"));
				}
			}else {
				$update = $this->Settings_m->updateSettings("tblbrands" ,array(
					"brandsID" => $brandsID
				),array(
					"brandsTitle" 		=> $brandsTitle,
					"brandsLink" 		=> $brandsLink
				));

				if ($update) {
					$alert	= array(
						"title" 	=> "Tebrikler !",
						"subtitle" 	=> "Referans Güncelleme İşlemi Tamamlandı !",
						"type" 		=> "success"
					);
				}else {
					$alert	= array(
						"title" 	=> "Hata !",
						"subtitle" 	=> "Referans Güncelleme İşlemi Gerçekleştirilemedi !",
						"type" 		=> "error"
					);
				}
				$this->session->set_flashdata("alert", $alert);
				redirect(base_url("Brands"));
			}

		}

	}// END brands Güncelleme //



	### brands Silme Methodu ###
	public function deleteBrands($brandsID) {

		$ImageData = $this->Settings_m->getSettings("tblBrands",array(
			"brandsID" => $brandsID
		));
		unlink("uploads/".$ImageData->brandsImage);

		$delete 	= $this->Settings_m->deleteSettings("tblBrands",array(
			"brandsID" => $brandsID
		));

		if ($delete) {
			$alert	= array(
				"title" 	=> "Tebrikler !",
				"subtitle" 	=> "Silme İşlemi Tamamlandı !",
				"type" 		=> "success"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Brands"));
		} else {
			$alert	= array(
				"title" 	=> "Hata !",
				"subtitle" 	=> "Silme İşlemi Gerçekleştirilemedi !",
				"type" 		=> "error"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Brands"));
		}
	}// END brands Silme Methodu //

	### brands Status Güncelleme Methodu ###
	public function updateIsActiveBrands() {

		$dataID  = $this->input->post("dataID");
		$status  = ($this->input->post("status")=="true") ? 1 : 0 ;

		$update  = $this->Settings_m->updateSettings("tblbrands",array(
			"brandsID" => $dataID
		),array(
			"brandsStatus" => $status
		));
		
		if ($update>0) {
			echo json_encode(array("success"=>1));
		}else{
			echo json_encode(array("success"=>0));
		}
	}// END brands Status Güncelleme Methodu //

	public function updateRankBrands() {

		$data = $this->input->post("data");
		parse_str($data,$rank);
		$value = $rank["rank"];

		foreach ($value as $rank => $id) {
			
			$this->Settings_m->updateSettings("tblbrands",array(
				"brandsID" 	 => $id
			),array(
				"brandsRank" => $rank
			));
			
		}
		
	}


}
