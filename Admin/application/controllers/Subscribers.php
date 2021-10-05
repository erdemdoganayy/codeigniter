<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscribers extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("Settings_m");
		if (!$this->session->userdata("admin")) {
			redirect(base_url("Login"));
		}
	}

	### subscribers (subscribers_v) Veri Gönderimi ###
	public function index() { 
		$data['admin'] = $this->Settings_m->getSettings("tblAdmin", array("adminID" => 1)); // TOP HEADER ADMİN BİLGİLERİ SORGUSU 
		$data['settings'] = $this->Settings_m->getSettings("tblSettings", array("siteID" => 1)); // TOP HEADER SİTE AYARLARI SORGUSU
		$data['count'] = $this->sm->countMes("tblMessages", array("messagesStatus" => 0)); // TOP HEADER MESAJ SAYISI SORGUSU 
		$data['messages'] = $this->sm->countMessages("tblMessages", array("messagesStatus" => 0)); // TOP HEADER MESAJ SORGUSU 
		$data['countSubs'] = $this->sm->countSubs("tblSubscribers", array("SubscribersStatus" => 0)); // TOP HEADER ABONE SAYISI SORGUSU 
		$data['subcribes'] = $this->sm->countSubscribers("tblSubscribers", array("SubscribersStatus" => 0)); // TOP HEADER ABONELER SORGUSU 
		$data['subscribersAll']			= $this->Settings_m->getAllSettings("tblsubscribers",array(),"subscribersID DESC");
		$data['url']							= "subscribers";
		$this->load->view('Subscribers_v',$data);

	}// END subscribers (subscribers_v) Veri Gönderimi //


	// ### subscribers  Veri Ekleme Methodu ###
	// public function insertsubscribers() {
	// 	$subscribersIcon 				= $this->input->post("subscribersIcon");
	// 	$subscribersTitle 			= $this->input->post("subscribersTitle");
	// 	$subscribersCount 			= $this->input->post("subscribersCount");
	// 	if (!$subscribersTitle || !$subscribersIcon  || !$subscribersCount ) {
	// 		$alert	= array(
	// 			"title" 	=> "Dikkat !",
	// 			"subtitle" 	=> "Lütfen Boş Alan Bırakmayınız !",
	// 			"type" 		=> "warning"
	// 		);
	// 		$this->session->set_flashdata("alert", $alert);
	// 		redirect(base_url("subscribers"));
	// 	}else {
	// 		$insert 	= $this->Settings_m->insertSettings("tblsubscribers",array(
	// 			"subscribersTitle" 			=> $subscribersTitle,
	// 			"subscribersIcon" 			=> $subscribersIcon,
	// 			"subscribersCount" 		=> $subscribersCount,
	// 			"subscribersStatus"  		=> 1,
	// 			"subscribersRank"  			=> 0,
	// 			"subscribersCreatedAt"	=> date("Y-m-d")
	// 		));
	// 		if ($insert) {
	// 			$alert	= array(
	// 				"title" 	=> "Tebrikler !",
	// 				"subtitle" 	=> "Kayıt İşlemi Tamamlandı !",
	// 				"type" 		=> "success"
	// 			);
	// 			$this->session->set_flashdata("alert", $alert);
	// 			redirect(base_url("subscribers"));
	// 		}else {
	// 			$alert	= array(
	// 				"title" 	=> "Hata !",
	// 				"subtitle" 	=> "Kayıt İşlemi Gerçekleştirilemedi !",
	// 				"type" 		=> "error"
	// 			);
	// 			$this->session->set_flashdata("alert", $alert);
	// 			redirect(base_url("subscribers"));
	// 		}
	// 	}
	// }// END subscribers Veri Ekleme Methodu //

	

	###   subscribers Silme Methodu ###
	public function deletesubscribers($subscribersID) {
		$delete 	= $this->Settings_m->deleteSettings("tblsubscribers",array(
			"subscribersID" => $subscribersID
		));

		if ($delete) {
			$alert	= array(
				"title" 	=> "Tebrikler !",
				"subtitle" 	=> "Silme İşlemi Tamamlandı !",
				"type" 		=> "success"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Subscribers"));
		} else {
			$alert	= array(
				"title" 	=> "Hata !",
				"subtitle" 	=> "Silme İşlemi Gerçekleştirilemedi !",
				"type" 		=> "error"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Subscribers"));
		}
	}// END   subscribers Silme Methodu //

	### subscribers Status Güncelleme Methodu ###
	public function updateIsActiveSubscribers() {

		$dataID  = $this->input->post("dataID");
		$status  = ($this->input->post("status")=="true") ? 1 : 0 ;

		$update  = $this->Settings_m->updateSettings("tblsubscribers",array(
			"subscribersID" => $dataID
		),array(
			"subscribersStatus" => $status
		));
		
		if ($update>0) {
			echo json_encode(array("success"=>1));
		}else{
			echo json_encode(array("success"=>0));
		}
	}// END subscribers Status Güncelleme Methodu //















}
