<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("Settings_m");
		if (!$this->session->userdata("admin")) {
			redirect(base_url("Login"));
		}
	}

	### Genel Ayarlar (Project_v) Veri Gönderimi ###
	public function index() { 
		$data['admin'] = $this->Settings_m->getSettings("tblAdmin", array("adminID" => 1)); // TOP HEADER ADMİN BİLGİLERİ SORGUSU 
		$data['settings'] = $this->Settings_m->getSettings("tblSettings", array("siteID" => 1)); // TOP HEADER SİTE AYARLARI SORGUSU
		$data['count'] = $this->sm->countMes("tblMessages", array("messagesStatus" => 0)); // TOP HEADER MESAJ SAYISI SORGUSU 
		$data['messages'] = $this->sm->countMessages("tblMessages", array("messagesStatus" => 0)); // TOP HEADER MESAJ SORGUSU 
		$data['countSubs'] = $this->sm->countSubs("tblSubscribers", array("SubscribersStatus" => 0)); // TOP HEADER ABONE SAYISI SORGUSU 
		$data['subcribes'] = $this->sm->countSubscribers("tblSubscribers", array("SubscribersStatus" => 0)); // TOP HEADER ABONELER SORGUSU 
		$data['projectAll']		= $this->Settings_m->getAllSettings("tblProject",array(),"projectRank ASC");
		$data['url']			= "project";
		$this->load->view('Project_v',$data);

	}// END Genel Ayarlar (Project_v) Veri Gönderimi //

	### Project Ekleme ###
	public function insertProject () {
		$projectTitle 		= $this->input->post("projectTitle");
		$projectLink 		= $this->input->post("projectLink");

		if (!$projectTitle || !$projectLink) {
			$alert	= array(
				"title" 	=> "Dikkat !",
				"subtitle" 	=> "Lütfen Formda Boş Alan Bırakmayınız !",
				"type" 		=> "warning"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Project"));
		}else {

			if (!empty($_FILES["projectImage"]["name"])) {

				$config['upload_path']		= 'uploads/project/';
				$config['allowed_types']	= 'png|jpg|jpeg|svg|gif';
				$config['file_name']		=  uniqid();
				$this->load->library("upload",$config);

				$upload 	= $this->upload->do_upload("projectImage");
				if ($upload) {
					$uploaded_filename 	= $this->upload->data("file_name");
					$config['image_library']	= "gd2";
					$config['source_image']	= "uploads/project/".$uploaded_filename;
					$config['create_thumb']	=  FALSE;
					$config['maintain_ratio']	=  FALSE;
					$config['quality']				=  "100%";
					$config['width']					=  640;
					$config['height']				=  432;
					$this->load->library("image_lib",$config);
					$this->image_lib->resize();

					$insert = $this->Settings_m->insertSettings("tblProject" ,array(
						"projectImage" 		=> "project/".$uploaded_filename,
						"projectTitle" 		=> $projectTitle,
						"projectLink" 		=> $projectLink,
						"projectStatus"		=> 1,
						"projectCreatedAt"	=> date("Y-m-d")
					));

					if ($insert) {
						$alert	= array(
							"title" 	=> "Tebrikler !",
							"subtitle" 	=> "Proje Ekleme İşlemi Tamamlandı !",
							"type" 		=> "success"
						);
					}else {
						$alert	= array(
							"title" 	=> "Hata !",
							"subtitle" 	=> "Proje Ekleme İşlemi Gerçekleştirilemedi !",
							"type" 		=> "error"
						);
					}
					$this->session->set_flashdata("alert", $alert);
					redirect(base_url("Project"));
				}else {
					$alert	= array(
						"title" 	=> "Hata !",
						"subtitle" 	=> "Resim Yüklenirken Bir Hata Oluştu !",
						"type" 		=> "error"
					);
					$this->session->set_flashdata("alert", $alert);
					redirect(base_url("Project"));
				}
			}else {
				$alert	= array(
					"title" 	=> "Dikkat !",
					"subtitle" 	=> "Lütfen Resim Alanını Boş Bırakmayınız !",
					"type" 		=> "warning"
				);
				$this->session->set_flashdata("alert", $alert);
				redirect(base_url("Project"));
			}

		}
	}// END Project Ekleme //	


	### Project Güncelleme ###
	public function updateProject($projectID) {

		$projectTitle 		= $this->input->post("projectTitle");
		$projectLink 		= $this->input->post("projectLink");
		if (!$projectTitle || !$projectLink) {
			$alert	= array(
				"title" 	=> "Dikkat !",
				"subtitle" 	=> "Lütfen Formda Boş Alan Bırakmayınız !",
				"type" 		=> "warning"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Project"));
		}else {

			if (!empty($_FILES["projectImage"]["name"])) {

				$ImageData = $this->Settings_m->getSettings("tblProject",array(
					"projectID" => $projectID
				));
				unlink("uploads/".$ImageData->projectImage);

				$config['upload_path']		= 'uploads/project/';
				$config['allowed_types']	= 'png|jpg|jpeg|svg|gif';
				$config['file_name']		=  uniqid();
				$this->load->library("upload",$config);

				$upload 	= $this->upload->do_upload("projectImage");
				if ($upload) {
					$uploaded_filename 	= $this->upload->data("file_name");
					$config['image_library']	= "gd2";
					$config['source_image']	= "uploads/project/".$uploaded_filename;
					$config['create_thumb']	=  FALSE;
					$config['maintain_ratio']	=  FALSE;
					$config['quality']				=  "100%";
					$config['width']					=  640;
					$config['height']				=  432;
					$this->load->library("image_lib",$config);
					$this->image_lib->resize();

					$update = $this->Settings_m->updateSettings("tblProject" ,array(
						"projectID" => $projectID
					),array(
						"projectImage" 		=> "project/".$uploaded_filename,
						"projectTitle" 		=> $projectTitle,
						"projectLink" 		=> $projectLink
					));

					if ($update) {
						$alert	= array(
							"title" 	=> "Tebrikler !",
							"subtitle" 	=> "Proje Güncelleme İşlemi Tamamlandı !",
							"type" 		=> "success"
						);
					}else {
						$alert	= array(
							"title" 	=> "Hata !",
							"subtitle" 	=> "Proje Güncelleme İşlemi Gerçekleştirilemedi !",
							"type" 		=> "error"
						);
					}
					$this->session->set_flashdata("alert", $alert);
					redirect(base_url("Project"));
				}else {
					$alert	= array(
						"title" 	=> "Hata !",
						"subtitle" 	=> "Resim Güncellenirken Bir Hata Oluştu !",
						"type" 		=> "error"
					);
					$this->session->set_flashdata("alert", $alert);
					redirect(base_url("Project"));
				}
			}else {
				$update = $this->Settings_m->updateSettings("tblProject" ,array(
					"projectID" => $projectID
				),array(
					"projectTitle" 		=> $projectTitle,
					"projectLink" 		=> $projectLink
				));

				if ($update) {
					$alert	= array(
						"title" 	=> "Tebrikler !",
						"subtitle" 	=> "Proje Güncelleme İşlemi Tamamlandı !",
						"type" 		=> "success"
					);
				}else {
					$alert	= array(
						"title" 	=> "Hata !",
						"subtitle" 	=> "Proje Güncelleme İşlemi Gerçekleştirilemedi !",
						"type" 		=> "error"
					);
				}
				$this->session->set_flashdata("alert", $alert);
				redirect(base_url("Project"));
			}

		}

	}// END Project Güncelleme //



	### Project Silme Methodu ###
	public function deleteProject($projectID) {

		$ImageData = $this->Settings_m->getSettings("tblProject",array(
			"projectID" => $projectID
		));
		unlink("uploads/".$ImageData->projectImage);

		$delete 	= $this->Settings_m->deleteSettings("tblProject",array(
			"projectID" => $projectID
		));

		if ($delete) {
			$alert	= array(
				"title" 	=> "Tebrikler !",
				"subtitle" 	=> "Silme İşlemi Tamamlandı !",
				"type" 		=> "success"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Project"));
		} else {
			$alert	= array(
				"title" 	=> "Hata !",
				"subtitle" 	=> "Silme İşlemi Gerçekleştirilemedi !",
				"type" 		=> "error"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Project"));
		}
	}// END Project Silme Methodu //

	### Project Status Güncelleme Methodu ###
	public function updateIsActiveProject() {

		$dataID  = $this->input->post("dataID");
		$status  = ($this->input->post("status")=="true") ? 1 : 0 ;

		$update  = $this->Settings_m->updateSettings("tblProject",array(
			"projectID" => $dataID
		),array(
			"projectStatus" => $status
		));
		
		if ($update>0) {
			echo json_encode(array("success"=>1));
		}else{
			echo json_encode(array("success"=>0));
		}
	}// END Project Status Güncelleme Methodu //

	public function updateRankProject() {

		$data = $this->input->post("data");
		parse_str($data,$rank);
		$value = $rank["rank"];

		foreach ($value as $rank => $id) {
			
			$this->Settings_m->updateSettings("tblProject",array(
				"projectID" 	 => $id
			),array(
				"projectRank" => $rank
			));
			
		}
		
	}


}
