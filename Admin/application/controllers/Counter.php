<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Counter extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("Settings_m");
		if (!$this->session->userdata("admin")) {
			redirect(base_url("Login"));
		}
	}

	### counter (counter_v) Veri Gönderimi ###
	public function index() { 
		$data['settings'] = $this->Settings_m->getSettings("tblSettings", array("siteID" => 1)); // TOP HEADER SİTE AYARLARI SORGUSU
		$data['count'] = $this->sm->countMes("tblMessages", array("messagesStatus" => 0)); // TOP HEADER MESAJ SAYISI SORGUSU 
		$data['messages'] = $this->sm->countMessages("tblMessages", array("messagesStatus" => 0)); // TOP HEADER MESAJ SORGUSU 
		$data['countSubs'] = $this->sm->countSubs("tblSubscribers", array("SubscribersStatus" => 0)); // TOP HEADER ABONE SAYISI SORGUSU 
		$data['subcribes'] = $this->sm->countSubscribers("tblSubscribers", array("SubscribersStatus" => 0)); // TOP HEADER ABONELER SORGUSU 
		$data['admin'] = $this->Settings_m->getSettings("tblAdmin", array("adminID" => 1)); // TOP HEADER ADMİN BİLGİLERİ SORGUSU 
		$data['counterAll']			= $this->Settings_m->getAllSettings("tblcounter",array(),"counterRank ASC");
		$data['url']							= "counter";
		$this->load->view('Counter_v',$data);

	}// END counter (counter_v) Veri Gönderimi //


	### counter  Veri Ekleme Methodu ###
	public function insertCounter() {
		$counterIcon 				= $this->input->post("counterIcon");
		$counterTitle 			= $this->input->post("counterTitle");
		$counterCount 			= $this->input->post("counterCount");
		if (!$counterTitle || !$counterIcon  || !$counterCount ) {
			$alert	= array(
				"title" 	=> "Dikkat !",
				"subtitle" 	=> "Lütfen Boş Alan Bırakmayınız !",
				"type" 		=> "warning"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Counter"));
		}else {
			$insert 	= $this->Settings_m->insertSettings("tblcounter",array(
				"counterTitle" 			=> $counterTitle,
				"counterIcon" 			=> $counterIcon,
				"counterCount" 		=> $counterCount,
				"counterStatus"  		=> 1,
				"counterRank"  			=> 0,
				"counterCreatedAt"	=> date("Y-m-d")
			));
			if ($insert) {
				$alert	= array(
					"title" 	=> "Tebrikler !",
					"subtitle" 	=> "Kayıt İşlemi Tamamlandı !",
					"type" 		=> "success"
				);
				$this->session->set_flashdata("alert", $alert);
				redirect(base_url("Counter"));
			}else {
				$alert	= array(
					"title" 	=> "Hata !",
					"subtitle" 	=> "Kayıt İşlemi Gerçekleştirilemedi !",
					"type" 		=> "error"
				);
				$this->session->set_flashdata("alert", $alert);
				redirect(base_url("Counter"));
			}
		}
	}// END counter Veri Ekleme Methodu //

	###   counter Güncelleme Methodu ###
	public function updateCounter($counterID) {
		$counterIcon			= $this->input->post("counterIcon");
		$counterTitle			= $this->input->post("counterTitle");
		$counterCount	= $this->input->post("counterCount");
		if (!$counterIcon || !$counterTitle || !$counterCount) {
			$alert	= array(
				"title" 	=> "Dikkat !",
				"subtitle" 	=> "Lütfen Boş Alan Bırakmayınız !",
				"type" 		=> "warning"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Counter"));
		} else {
			$update = $this->Settings_m->updateSettings("tblcounter",
				array(
					"counterID" => $counterID
				),
				array(
					"counterIcon" 	=> $counterIcon,
					"counterTitle" 	=> $counterTitle,
					"counterCount"	=> $counterCount
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
			redirect(base_url("Counter"));
		}
	}// END  counter Güncelleme Methodu //

	###   counter Silme Methodu ###
	public function deleteCounter($counterID) {
		$delete 	= $this->Settings_m->deleteSettings("tblcounter",array(
			"counterID" => $counterID
		));

		if ($delete) {
			$alert	= array(
				"title" 	=> "Tebrikler !",
				"subtitle" 	=> "Silme İşlemi Tamamlandı !",
				"type" 		=> "success"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Counter"));
		} else {
			$alert	= array(
				"title" 	=> "Hata !",
				"subtitle" 	=> "Silme İşlemi Gerçekleştirilemedi !",
				"type" 		=> "error"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Counter"));
		}
	}// END   counter Silme Methodu //

	### counter Status Güncelleme Methodu ###
	public function updateIsActiveCounter() {

		$dataID  = $this->input->post("dataID");
		$status  = ($this->input->post("status")=="true") ? 1 : 0 ;

		$update  = $this->Settings_m->updateSettings("tblcounter",array(
			"counterID" => $dataID
		),array(
			"counterStatus" => $status
		));
		
		if ($update>0) {
			echo json_encode(array("success"=>1));
		}else{
			echo json_encode(array("success"=>0));
		}
	}// END counter Status Güncelleme Methodu //

	public function updateRankCounter() {

		$data = $this->input->post("data");
		parse_str($data,$rank);
		$value = $rank["rank"];

		foreach ($value as $rank => $id) {
			
			$this->Settings_m->updateSettings("tblcounter",array(
				"counterID" 	 => $id
			),array(
				"counterRank" => $rank
			));
			
		}
		
	}















}
