<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class faq extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("Settings_m");
		if (!$this->session->userdata("admin")) {
			redirect(base_url("Login"));
		}
	}

	### Faq (Faq_v) Veri Gönderimi ###
	public function index() { 
		$data['settings'] = $this->Settings_m->getSettings("tblSettings", array("siteID" => 1)); // TOP HEADER SİTE AYARLARI SORGUSU
		$data['count'] = $this->sm->countMes("tblMessages", array("messagesStatus" => 0)); // TOP HEADER MESAJ SAYISI SORGUSU 
		$data['messages'] = $this->sm->countMessages("tblMessages", array("messagesStatus" => 0)); // TOP HEADER MESAJ SORGUSU 
		$data['countSubs'] = $this->sm->countSubs("tblSubscribers", array("SubscribersStatus" => 0)); // TOP HEADER ABONE SAYISI SORGUSU 
		$data['subcribes'] = $this->sm->countSubscribers("tblSubscribers", array("SubscribersStatus" => 0)); // TOP HEADER ABONELER SORGUSU 
		$data['admin'] = $this->Settings_m->getSettings("tblAdmin", array("adminID" => 1)); // TOP HEADER ADMİN BİLGİLERİ SORGUSU 
		$data['FaqAll']			= $this->Settings_m->getAllSettings("tblfaq",array(),"faqRank ASC");
		$data['url']					= "faq";
		$this->load->view('Faq_v',$data);

	}// END Faq (Faq_v) Veri Gönderimi //


	### Faq  Veri Ekleme Methodu ###
	public function insertFaq() {
		$faqTitle 			= $this->input->post("faqTitle");
		$faqIcon 				= $this->input->post("faqIcon");
		$faqContent 		= $this->input->post("faqContent");
		if (!$faqTitle || !$faqIcon  || !$faqContent ) {
			$alert	= array(
				"title" 	=> "Dikkat !",
				"subtitle" 	=> "Lütfen Boş Alan Bırakmayınız !",
				"type" 		=> "warning"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Faq"));
		}else {
			$insert 	= $this->Settings_m->insertSettings("tblfaq",array(
				"faqTitle" 			=> $faqTitle,
				"faqIcon" 			=> $faqIcon,
				"faqContent" 		=> $faqContent,
				"faqStatus"  		=> 1,
				"faqRank"  			=> 0,
				"faqCreatedAt"	=> date("Y-m-d")
			));
			if ($insert) {
				$alert	= array(
					"title" 	=> "Tebrikler !",
					"subtitle" 	=> "Kayıt İşlemi Tamamlandı !",
					"type" 		=> "success"
				);
				$this->session->set_flashdata("alert", $alert);
				redirect(base_url("Faq"));
			}else {
				$alert	= array(
					"title" 	=> "Hata !",
					"subtitle" 	=> "Kayıt İşlemi Gerçekleştirilemedi !",
					"type" 		=> "error"
				);
				$this->session->set_flashdata("alert", $alert);
				redirect(base_url("Faq"));
			}
		}
	}// END Faq Veri Ekleme Methodu //

	###   Faq Güncelleme Methodu ###
	public function updateFaq($faqID) {
		$faqIcon			= $this->input->post("faqIcon");
		$faqTitle			= $this->input->post("faqTitle");
		$faqContent	= $this->input->post("faqContent");
		if (!$faqIcon || !$faqTitle || !$faqContent) {
			$alert	= array(
				"title" 	=> "Dikkat !",
				"subtitle" 	=> "Lütfen Boş Alan Bırakmayınız !",
				"type" 		=> "warning"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Faq"));
		} else {
			$update = $this->Settings_m->updateSettings("tblfaq",
				array(
					"faqID" => $faqID
				),
				array(
					"faqIcon" 	=> $faqIcon,
					"faqTitle" 	=> $faqTitle,
					"faqContent"	=> $faqContent
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
			redirect(base_url("Faq"));
		}
	}// END  Faq Güncelleme Methodu //

	###   Faq Silme Methodu ###
	public function deleteFaq($faqID) {
		$delete 	= $this->Settings_m->deleteSettings("tblfaq",array(
			"faqID" => $faqID
		));

		if ($delete) {
			$alert	= array(
				"title" 	=> "Tebrikler !",
				"subtitle" 	=> "Silme İşlemi Tamamlandı !",
				"type" 		=> "success"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Faq"));
		} else {
			$alert	= array(
				"title" 	=> "Hata !",
				"subtitle" 	=> "Silme İşlemi Gerçekleştirilemedi !",
				"type" 		=> "error"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Faq"));
		}
	}// END   Faq Silme Methodu //

	### Faq Status Güncelleme Methodu ###
	public function updateIsActiveFaq() {

		$dataID  = $this->input->post("dataID");
		$status  = ($this->input->post("status")=="true") ? 1 : 0 ;

		$update  = $this->Settings_m->updateSettings("tblfaq",array(
			"faqID" => $dataID
		),array(
			"faqStatus" => $status
		));
		
		if ($update>0) {
			echo json_encode(array("success"=>1));
		}else{
			echo json_encode(array("success"=>0));
		}
	}// END Faq Status Güncelleme Methodu //

	public function updateRankFaq() {

		$data = $this->input->post("data");
		parse_str($data,$rank);
		$value = $rank["rank"];

		foreach ($value as $rank => $id) {
			
			$this->Settings_m->updateSettings("tblfaq",array(
				"faqID" 	 => $id
			),array(
				"faqRank" => $rank
			));
			
		}
		
	}















}
