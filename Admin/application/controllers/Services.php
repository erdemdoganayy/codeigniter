<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("Settings_m");
		if (!$this->session->userdata("admin")) {
			redirect(base_url("Login"));
		}
	}

	### Genel Ayarlar (Settings_v) Veri Gönderimi ###
	public function index() { 
		$data['admin'] = $this->Settings_m->getSettings("tblAdmin", array("adminID" => 1)); // TOP HEADER ADMİN BİLGİLERİ SORGUSU 
		$data['settings'] = $this->Settings_m->getSettings("tblSettings", array("siteID" => 1)); // TOP HEADER SİTE AYARLARI SORGUSU
		$data['count'] = $this->sm->countMes("tblMessages", array("messagesStatus" => 0)); // TOP HEADER MESAJ SAYISI SORGUSU 
		$data['messages'] = $this->sm->countMessages("tblMessages", array("messagesStatus" => 0)); // TOP HEADER MESAJ SORGUSU 
		$data['countSubs'] = $this->sm->countSubs("tblSubscribers", array("SubscribersStatus" => 0)); // TOP HEADER ABONE SAYISI SORGUSU 
		$data['subcribes'] = $this->sm->countSubscribers("tblSubscribers", array("SubscribersStatus" => 0)); // TOP HEADER ABONELER SORGUSU 
		$data['ServicesAll']	= $this->Settings_m->getAllSettings("tblServices",array(),"ServicesRank ASC");
		$data['url']					= "services";
		$this->load->view('Services_v',$data);

	}// END Genel Ayarlar (Settings_v) Veri Gönderimi //


	### Hizmetler  Veri Ekleme Methodu ###
	public function insertServices() {
		$servicesTitle 			= $this->input->post("servicesTitle");
		$servicesIcon 				= $this->input->post("servicesIcon");
		$servicesContent 		= $this->input->post("servicesContent");
		if (!$servicesTitle || !$servicesIcon  || !$servicesContent ) {
			$alert	= array(
				"title" 	=> "Dikkat !",
				"subtitle" 	=> "Lütfen Boş Alan Bırakmayınız !",
				"type" 		=> "warning"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Services"));
		}else {
			$insert 	= $this->Settings_m->insertSettings("tblservices",array(
				"servicesTitle" 			=> $servicesTitle,
				"servicesIcon" 			=> $servicesIcon,
				"servicesContent" 		=> $servicesContent,
				"servicesStatus"  		=> 1,
				"servicesRank"  			=> 0,
				"servicesCreatedAt"	=> date("Y-m-d")
			));
			if ($insert) {
				$alert	= array(
					"title" 	=> "Tebrikler !",
					"subtitle" 	=> "Kayıt İşlemi Tamamlandı !",
					"type" 		=> "success"
				);
				$this->session->set_flashdata("alert", $alert);
				redirect(base_url("Services"));
			}else {
				$alert	= array(
					"title" 	=> "Hata !",
					"subtitle" 	=> "Kayıt İşlemi Gerçekleştirilemedi !",
					"type" 		=> "error"
				);
				$this->session->set_flashdata("alert", $alert);
				redirect(base_url("Services"));
			}
		}
	}// END Genel Ayarlar Veri Ekleme Methodu //

	### Genel Ayarlar services Güncelleme Methodu ###
	public function updateServices($servicesID) {
		$servicesIcon			= $this->input->post("servicesIcon");
		$servicesTitle			= $this->input->post("servicesTitle");
		$servicesContent	= $this->input->post("servicesContent");
		if (!$servicesIcon || !$servicesTitle || !$servicesContent) {
			$alert	= array(
				"title" 	=> "Dikkat !",
				"subtitle" 	=> "Lütfen Boş Alan Bırakmayınız !",
				"type" 		=> "warning"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Services"));
		} else {
			$update = $this->Settings_m->updateSettings("tblservices",
				array(
					"servicesID" => $servicesID
				),
				array(
					"servicesIcon" 	=> $servicesIcon,
					"servicesTitle" 	=> $servicesTitle,
					"servicesContent"	=> $servicesContent
				)
			);
			if ($update) {
				$alert	= array(
					"title" 	=> "Tebrikler !",
					"subtitle" 	=> "Güncelleme İşlemi Tamamlandı !",
					"type" 		=> "success"
				);
			} else {
				$alert	= array(
					"title" 	=> "Hata !",
					"subtitle" 	=> "Güncelleme İşlemi Gerçekleştirilemedi !",
					"type" 		=> "error"
				);
			}
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Services"));
		}
	}// END Genel Ayarlar services Güncelleme Methodu //

	### Genel Ayarlar services Silme Methodu ###
	public function deleteServices($servicesID) {
		$delete 	= $this->Settings_m->deleteSettings("tblservices",array(
			"servicesID" => $servicesID
		));

		if ($delete) {
			$alert	= array(
				"title" 	=> "Tebrikler !",
				"subtitle" 	=> "Silme İşlemi Tamamlandı !",
				"type" 		=> "success"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Services"));
		} else {
			$alert	= array(
				"title" 	=> "Hata !",
				"subtitle" 	=> "Silme İşlemi Gerçekleştirilemedi !",
				"type" 		=> "error"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Services"));
		}
	}// END Genel Ayarlar services Silme Methodu //

	### Genel Ayarlar Status Güncelleme Methodu ###
	public function updateIsActiveServices() {

		$dataID  = $this->input->post("dataID");
		$status  = ($this->input->post("status")=="true") ? 1 : 0 ;

		$update  = $this->Settings_m->updateSettings("tblservices",array(
			"servicesID" => $dataID
		),array(
			"servicesStatus" => $status
		));
		
		if ($update>0) {
			echo json_encode(array("success"=>1));
		}else{
			echo json_encode(array("success"=>0));
		}
	}// END Hizmetler Status Güncelleme Methodu //

	public function updateRankServices() {

		$data = $this->input->post("data");
		parse_str($data,$rank);
		$value = $rank["rank"];

		foreach ($value as $rank => $id) {
			
			$this->Settings_m->updateSettings("tblServices",array(
				"servicesID" 	 => $id
			),array(
				"servicesRank" => $rank
			));
			
		}
		
	}















}
