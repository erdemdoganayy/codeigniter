<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClientComment extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("Settings_m");
		if (!$this->session->userdata("admin")) {
			redirect(base_url("Login"));
		}
	}

	### Genel Ayarlar (ClientComment_v) Veri Gönderimi ###
	public function index() { 
		$data['settings'] = $this->Settings_m->getSettings("tblSettings", array("siteID" => 1)); // TOP HEADER SİTE AYARLARI SORGUSU
		$data['count'] = $this->sm->countMes("tblMessages", array("messagesStatus" => 0)); // TOP HEADER MESAJ SAYISI SORGUSU 
		$data['messages'] = $this->sm->countMessages("tblMessages", array("messagesStatus" => 0)); // TOP HEADER MESAJ SORGUSU 
		$data['countSubs'] = $this->sm->countSubs("tblSubscribers", array("SubscribersStatus" => 0)); // TOP HEADER ABONE SAYISI SORGUSU 
		$data['subcribes'] = $this->sm->countSubscribers("tblSubscribers", array("SubscribersStatus" => 0)); // TOP HEADER ABONELER SORGUSU 
		$data['admin'] = $this->Settings_m->getSettings("tblAdmin", array("adminID" => 1)); // TOP HEADER ADMİN BİLGİLERİ SORGUSU 
		$data['clientCommentAll']		= $this->Settings_m->getAllSettings("tblClientComment",array(),"clientCommentRank ASC");
		$data['url']			= "comment";
		$this->load->view('ClientComment_v',$data);

	}// END Genel Ayarlar (ClientComment_v) Veri Gönderimi //

	### Müşteri Ekleme ###
	public function insertClientComment () {
		$clientCommentContent 	= $this->input->post("clientCommentContent");
		$clientCommentName 		= $this->input->post("clientCommentName");
		$clientCommentDegree 	= $this->input->post("clientCommentDegree");

		if (!$clientCommentContent || !$clientCommentName || !$clientCommentDegree) {
			$alert	= array(
				"title" 	=> "Dikkat !",
				"subtitle" 	=> "Lütfen Formda Boş Alan Bırakmayınız !",
				"type" 		=> "warning"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("clientComment"));
		}else {

			if (!empty($_FILES["clientCommentImage"]["name"])) {

				$config['upload_path']		= 'uploads/clientComment/';
				$config['allowed_types']	= 'png|jpg|jpeg|svg|gif';
				$config['file_name']		=  uniqid();
				$this->load->library("upload",$config);

				$upload 	= $this->upload->do_upload("clientCommentImage");
				if ($upload) {
					$uploaded_filename 	= $this->upload->data("file_name");
					$config['image_library']	= "gd2";
					$config['source_image']		= "uploads/clientComment/".$uploaded_filename;
					$config['create_thumb']		=  FALSE;
					$config['maintain_ratio']	=  FALSE;
					$config['quality']			=  "100%";
					$config['width']			=  400;
					$config['height']			=  400;
					$this->load->library("image_lib",$config);
					$this->image_lib->resize();

					$insert = $this->Settings_m->insertSettings("tblClientComment" ,array(
						"clientCommentImage" 	=> "clientComment/".$uploaded_filename,
						"clientCommentContent" 	=> $clientCommentContent,
						"clientCommentName" 	=> $clientCommentName,
						"clientCommentDegree" 	=> $clientCommentDegree,
						"clientCommentStatus"	=> 1,
						"clientCommentCreatedAt"=> date("Y-m-d")
					));

					if ($insert) {
						$alert	= array(
							"title" 	=> "Tebrikler !",
							"subtitle" 	=> "Müşteri Ekleme İşlemi Tamamlandı !",
							"type" 		=> "success"
						);
					}else {
						$alert	= array(
							"title" 	=> "Hata !",
							"subtitle" 	=> "Müşteri Ekleme İşlemi Gerçekleştirilemedi !",
							"type" 		=> "error"
						);
					}
					$this->session->set_flashdata("alert", $alert);
					redirect(base_url("clientComment"));
				}else {
					$alert	= array(
						"title" 	=> "Hata !",
						"subtitle" 	=> "Resim Yüklenirken Bir Hata Oluştu !",
						"type" 		=> "error"
					);
					$this->session->set_flashdata("alert", $alert);
					redirect(base_url("clientComment"));
				}
			}else {
				$alert	= array(
					"title" 	=> "Dikkat !",
					"subtitle" 	=> "Lütfen Boş Alan Bırakmayınız !",
					"type" 		=> "warning"
				);
				$this->session->set_flashdata("alert", $alert);
				redirect(base_url("clientComment"));
			}

		}
	}// END Müşteri Ekleme //	


	### Müşteri Güncelleme ###
	public function updateClientComment($clientCommentID) {

		$clientCommentContent 	= $this->input->post("clientCommentContent");
		$clientCommentName 		= $this->input->post("clientCommentName");
		$clientCommentDegree 	= $this->input->post("clientCommentDegree");

		if (!$clientCommentContent || !$clientCommentName || !$clientCommentDegree) {
			$alert	= array(
				"title" 	=> "Dikkat !",
				"subtitle" 	=> "Lütfen Formda Boş Alan Bırakmayınız !",
				"type" 		=> "warning"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("clientComment"));
		}else {

			if (!empty($_FILES["clientCommentImage"]["name"])) {

				$ImageData = $this->Settings_m->getSettings("tblClientComment",array(
					"clientCommentID" => $clientCommentID
				));
				unlink("uploads/".$ImageData->clientCommentImage);

				$config['upload_path']		= 'uploads/clientComment/';
				$config['allowed_types']	= 'png|jpg|jpeg|svg|gif';
				$config['file_name']		=  uniqid();
				$this->load->library("upload",$config);

				$upload 	= $this->upload->do_upload("clientCommentImage");
				if ($upload) {
					$uploaded_filename 	= $this->upload->data("file_name");
					$config['image_library']	= "gd2";
					$config['source_image']		= "uploads/clientComment/".$uploaded_filename;
					$config['create_thumb']		=  FALSE;
					$config['maintain_ratio']	=  FALSE;
					$config['quality']			=  "100%";
					$config['width']			=  400;
					$config['height']			=  400;
					$this->load->library("image_lib",$config);
					$this->image_lib->resize();

					$update = $this->Settings_m->updateSettings("tblClientComment" ,array(
						"clientCommentID" => $clientCommentID
					),array(
						"clientCommentImage" 	=> "clientComment/".$uploaded_filename,
						"clientCommentContent" 	=> $clientCommentContent,
						"clientCommentName" 	=> $clientCommentName,
						"clientCommentDegree" 	=> $clientCommentDegree
					));

					if ($update) {
						$alert	= array(
							"title" 	=> "Tebrikler !",
							"subtitle" 	=> "Müşteri Güncelleme İşlemi Tamamlandı !",
							"type" 		=> "success"
						);
					}else {
						$alert	= array(
							"title" 	=> "Hata !",
							"subtitle" 	=> "Müşteri Güncelleme İşlemi Gerçekleştirilemedi !",
							"type" 		=> "error"
						);
					}
					$this->session->set_flashdata("alert", $alert);
					redirect(base_url("clientComment"));
				}else {
					$alert	= array(
						"title" 	=> "Hata !",
						"subtitle" 	=> "Müşteri Güncellenirken Bir Hata Oluştu !",
						"type" 		=> "error"
					);
					$this->session->set_flashdata("alert", $alert);
					redirect(base_url("clientComment"));
				}
			}else {
				$update = $this->Settings_m->updateSettings("tblClientComment" ,array(
					"clientCommentID" => $clientCommentID
				),array(
					"clientCommentContent" 	=> $clientCommentContent,
					"clientCommentName" 	=> $clientCommentName,
					"clientCommentDegree" 	=> $clientCommentDegree
				));

				if ($update) {
					$alert	= array(
						"title" 	=> "Tebrikler !",
						"subtitle" 	=> "Müşteri Güncelleme İşlemi Tamamlandı !",
						"type" 		=> "success"
					);
				}else {
					$alert	= array(
						"title" 	=> "Hata !",
						"subtitle" 	=> "Müşteri Güncelleme İşlemi Gerçekleştirilemedi !",
						"type" 		=> "error"
					);
				}
				$this->session->set_flashdata("alert", $alert);
				redirect(base_url("clientComment"));
			}

		}

	}// END Müşteri Güncelleme //



	### Slider Silme Methodu ###
	public function deleteClientComment($clientCommentID) {
		
		$ImageData = $this->Settings_m->getSettings("tblClientComment",array(
			"clientCommentID" => $clientCommentID
		));
		unlink("uploads/".$ImageData->clientCommentImage);
		
		$delete 	= $this->Settings_m->deleteSettings("tblClientComment",array(
			"clientCommentID" => $clientCommentID
		));

		if ($delete) {
			$alert	= array(
				"title" 	=> "Tebrikler !",
				"subtitle" 	=> "Silme İşlemi Tamamlandı !",
				"type" 		=> "success"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("ClientComment"));
		} else {
			$alert	= array(
				"title" 	=> "Hata !",
				"subtitle" 	=> "Silme İşlemi Gerçekleştirilemedi !",
				"type" 		=> "error"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("ClientComment"));
		}
	}// END Slider Silme Methodu //

	### Genel Ayarlar Status Güncelleme Methodu ###
	public function updateIsActiveClientComment() {

		$dataID  = $this->input->post("dataID");
		$status  = ($this->input->post("status")=="true") ? 1 : 0 ;

		$update  = $this->Settings_m->updateSettings("tblClientComment",array(
			"clientCommentID" => $dataID
		),array(
			"clientCommentStatus" => $status
		));
		
		if ($update>0) {
			echo json_encode(array("success"=>1));
		}else{
			echo json_encode(array("success"=>0));
		}
	}// END Genel Ayarlar Status Güncelleme Methodu //

	public function updateRankClientComment() {

		$data = $this->input->post("data");
		parse_str($data,$rank);
		$value = $rank["rank"];

		foreach ($value as $rank => $id) {
			
			$this->Settings_m->updateSettings("tblClientComment",array(
				"clientCommentID" 	 => $id
			),array(
				"clientCommentRank" => $rank
			));
			
		}
		
	}


}
