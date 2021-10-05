<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("Settings_m");
		if (!$this->session->userdata("admin")) {
			redirect(base_url("Login"));
		}
	}

	### Genel Ayarlar (Team_v.php) Veri Gönderimi ###
	public function index() { 
		$data['admin'] = $this->Settings_m->getSettings("tblAdmin", array("adminID" => 1)); // TOP HEADER ADMİN BİLGİLERİ SORGUSU 
		$data['settings'] = $this->Settings_m->getSettings("tblSettings", array("siteID" => 1)); // TOP HEADER SİTE AYARLARI SORGUSU
		$data['count'] = $this->sm->countMes("tblMessages", array("messagesStatus" => 0)); // TOP HEADER MESAJ SAYISI SORGUSU 
		$data['messages'] = $this->sm->countMessages("tblMessages", array("messagesStatus" => 0)); // TOP HEADER MESAJ SORGUSU 
		$data['countSubs'] = $this->sm->countSubs("tblSubscribers", array("SubscribersStatus" => 0)); // TOP HEADER ABONE SAYISI SORGUSU 
		$data['subcribes'] = $this->sm->countSubscribers("tblSubscribers", array("SubscribersStatus" => 0)); // TOP HEADER ABONELER SORGUSU 
		$data['teamAll']		= $this->Settings_m->getAllSettings("tblTeam",array(),"teamRank ASC");
		$data['url']			= "team";
		$this->load->view('Team_v',$data);

	}// END Genel Ayarlar (Team_v.php) Veri Gönderimi //

	### Team Ekleme ###
	public function insertTeam () {
		$teamName 			= $this->input->post("teamName");
		$teamDegree 		= $this->input->post("teamDegree");
		if (!$teamName || !$teamDegree) {
			$alert	= array(
				"title" 	=> "Dikkat !",
				"subtitle" 	=> "Lütfen Formda Boş Alan Bırakmayınız !",
				"type" 		=> "warning"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Team"));
		}else {

			if (!empty($_FILES["teamImage"]["name"])) {

				$config['upload_path']		= 'uploads/team/';
				$config['allowed_types']	= 'png|jpg|jpeg|svg|gif';
				$config['file_name']		=  uniqid();
				$this->load->library("upload",$config);

				$upload 	= $this->upload->do_upload("teamImage");
				if ($upload) {
					$uploaded_filename 	= $this->upload->data("file_name");
					$config['image_library']	= "gd2";
					$config['source_image']		= "uploads/team/".$uploaded_filename;
					$config['create_thumb']		=  FALSE;
					$config['maintain_ratio']	=  FALSE;
					$config['quality']			=  "100%";
					$config['width']			=  360;
					$config['height']			=  360;
					$this->load->library("image_lib",$config);
					$this->image_lib->resize();

					$insert = $this->Settings_m->insertSettings("tblTeam" ,array(
						"teamImage" 		=> "team/".$uploaded_filename,
						"teamDegree" 		=> $teamDegree,
						"teamName" 			=> $teamName,
						"teamStatus"		=> 1,
						"teamCreatedAt"		=> date("Y-m-d")
					));

					if ($insert) {
						$alert	= array(
							"title" 	=> "Tebrikler !",
							"subtitle" 	=> "Kişi Ekleme İşlemi Tamamlandı !",
							"type" 		=> "success"
						);
					}else {
						$alert	= array(
							"title" 	=> "Hata !",
							"subtitle" 	=> "Kişi Ekleme İşlemi Gerçekleştirilemedi !",
							"type" 		=> "error"
						);
					}
					$this->session->set_flashdata("alert", $alert);
					redirect(base_url("Team"));
				}else {
					$alert	= array(
						"title" 	=> "Hata !",
						"subtitle" 	=> "Resim Yüklenirken Bir Hata Oluştu !",
						"type" 		=> "error"
					);
					$this->session->set_flashdata("alert", $alert);
					redirect(base_url("Team"));
				}
			}else {
				$alert	= array(
					"title" 	=> "Dikkat !",
					"subtitle" 	=> "Lütfen Resim Alanını Boş Bırakmayınız !",
					"type" 		=> "warning"
				);
				$this->session->set_flashdata("alert", $alert);
				redirect(base_url("Team"));
			}

		}
	}// END Team Ekleme //	


	### Team Güncelleme ###
	public function updateTeam($teamID) {

		$teamName 			= $this->input->post("teamName");
		$teamDegree 		= $this->input->post("teamDegree");
		if (!$teamName || !$teamDegree) {
			$alert	= array(
				"title" 	=> "Dikkat !",
				"subtitle" 	=> "Lütfen Formda Boş Alan Bırakmayınız !",
				"type" 		=> "warning"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("team"));
		}else {

			if (!empty($_FILES["teamImage"]["name"])) {

				$ImageData = $this->Settings_m->getSettings("tblTeam",array(
					"teamID" => $teamID
				));
				unlink("uploads/".$ImageData->teamImage);

				$config['upload_path']		= 'uploads/team/';
				$config['allowed_types']	= 'png|jpg|jpeg|svg|gif';
				$config['file_name']		=  uniqid();
				$this->load->library("upload",$config);

				$upload 	= $this->upload->do_upload("teamImage");
				if ($upload) {
					$uploaded_filename 	= $this->upload->data("file_name");
					$config['image_library']	= "gd2";
					$config['source_image']		= "uploads/team/".$uploaded_filename;
					$config['create_thumb']		=  FALSE;
					$config['maintain_ratio']	=  FALSE;
					$config['quality']			=  "100%";
					$config['width']			=  1200;
					$config['height']			=  560;
					$this->load->library("image_lib",$config);
					$this->image_lib->resize();

					$update = $this->Settings_m->updateSettings("tblTeam" ,array(
						"teamID" => $teamID
					),array(
						"teamImage" 		=> "team/".$uploaded_filename,
						"teamName" 			=> $teamName,
						"teamDegree" 		=> $teamDegree
					));

					if ($update) {
						$alert	= array(
							"title" 	=> "Tebrikler !",
							"subtitle" 	=> "Kişi Güncelleme İşlemi Tamamlandı !",
							"type" 		=> "success"
						);
					}else {
						$alert	= array(
							"title" 	=> "Hata !",
							"subtitle" 	=> "Kişi Güncelleme İşlemi Gerçekleştirilemedi !",
							"type" 		=> "error"
						);
					}
					$this->session->set_flashdata("alert", $alert);
					redirect(base_url("Team"));
				}else {
					$alert	= array(
						"title" 	=> "Hata !",
						"subtitle" 	=> "Resim Güncellenirken Bir Hata Oluştu !",
						"type" 		=> "error"
					);
					$this->session->set_flashdata("alert", $alert);
					redirect(base_url("Team"));
				}
			}else {
				$update = $this->Settings_m->updateSettings("tblTeam" ,array(
					"teamID" => $teamID
				),array(
					"teamName" 			=> $teamName,
					"teamDegree" 		=> $teamDegree
				));

				if ($update) {
					$alert	= array(
						"title" 	=> "Tebrikler !",
						"subtitle" 	=> "Kişi Güncelleme İşlemi Tamamlandı !",
						"type" 		=> "success"
					);
				}else {
					$alert	= array(
						"title" 	=> "Hata !",
						"subtitle" 	=> "Kişi Güncelleme İşlemi Gerçekleştirilemedi !",
						"type" 		=> "error"
					);
				}
				$this->session->set_flashdata("alert", $alert);
				redirect(base_url("Team"));
			}

		}

	}// END Team Güncelleme //



	### Team Silme Methodu ###
	public function deleteTeam($teamID) {

		$ImageData = $this->Settings_m->getSettings("tblTeam",array(
			"teamID" => $teamID
		));
		unlink("uploads/".$ImageData->teamImage);


		$delete 	= $this->Settings_m->deleteSettings("tblTeam",array(
			"teamID" => $teamID
		));

		if ($delete) {
			$alert	= array(
				"title" 	=> "Tebrikler !",
				"subtitle" 	=> "Silme İşlemi Tamamlandı !",
				"type" 		=> "success"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Team"));
		} else {
			$alert	= array(
				"title" 	=> "Hata !",
				"subtitle" 	=> "Silme İşlemi Gerçekleştirilemedi !",
				"type" 		=> "error"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Team"));
		}
	}// END Team Silme Methodu //

	### Team Status Güncelleme Methodu ###
	public function updateIsActiveTeam() {

		$dataID  = $this->input->post("dataID");
		$status  = ($this->input->post("status")=="true") ? 1 : 0 ;

		$update  = $this->Settings_m->updateSettings("tblTeam",array(
			"teamID" => $dataID
		),array(
			"teamStatus" => $status
		));
		
		if ($update>0) {
			echo json_encode(array("success"=>1));
		}else{
			echo json_encode(array("success"=>0));
		}
	}// END Team Status Güncelleme Methodu //

	public function updateRankTeam() {

		$data = $this->input->post("data");
		parse_str($data,$rank);
		$value = $rank["rank"];

		foreach ($value as $rank => $id) {
			
			$this->Settings_m->updateSettings("tblTeam",array(
				"teamID" 	 => $id
			),array(
				"teamRank" => $rank
			));
			
		}
		
	}


}
