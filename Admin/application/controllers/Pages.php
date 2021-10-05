<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pages extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("Settings_m");
		if (!$this->session->userdata("admin")) {
			redirect(base_url("Login"));
		}
	}

	### pages (pages_v) Veri Gönderimi ###
	public function index() { 
		$data['admin'] = $this->Settings_m->getSettings("tblAdmin", array("adminID" => 1)); // TOP HEADER ADMİN BİLGİLERİ SORGUSU 
		$data['settings'] = $this->Settings_m->getSettings("tblSettings", array("siteID" => 1)); // TOP HEADER SİTE AYARLARI SORGUSU
		$data['count'] = $this->sm->countMes("tblMessages", array("messagesStatus" => 0)); // TOP HEADER MESAJ SAYISI SORGUSU 
		$data['messages'] = $this->sm->countMessages("tblMessages", array("messagesStatus" => 0)); // TOP HEADER MESAJ SORGUSU 
		$data['countSubs'] = $this->sm->countSubs("tblSubscribers", array("SubscribersStatus" => 0)); // TOP HEADER ABONE SAYISI SORGUSU 
		$data['subcribes'] = $this->sm->countSubscribers("tblSubscribers", array("SubscribersStatus" => 0)); // TOP HEADER ABONELER SORGUSU 
		$data['pagesAll']			= $this->Settings_m->getAllSettings("tblpages",array(),"pagesRank ASC");
		$data['url']					= "pages";
		$this->load->view('Pages_v',$data);

	}// END pages (pages_v) Veri Gönderimi //


	### pages  Veri Ekleme Methodu ###
	public function insertPages() {
		$pagesIcon 				= $this->input->post("pagesIcon");
		$pagesTitle 			= $this->input->post("pagesTitle");
		$pagesContent 		= $this->input->post("pagesContent");
		if (!$pagesTitle || !$pagesIcon  || !$pagesContent ) {
			$alert	= array(
				"title" 	=> "Dikkat !",
				"subtitle" 	=> "Lütfen Boş Alan Bırakmayınız !",
				"type" 		=> "warning"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("pages"));
		}else {
			$insert 	= $this->Settings_m->insertSettings("tblpages",array(
				"pagesTitle" 			=> $pagesTitle,
				"pagesIcon" 			=> $pagesIcon,
				"pagesContent" 		=> $pagesContent,
				"pagesStatus"  		=> 1,
				"pagesRank"  			=> 0,
				"pagesCreatedAt"	=> date("Y-m-d")
			));
			if ($insert) {
				$alert	= array(
					"title" 	=> "Tebrikler !",
					"subtitle" 	=> "Kayıt İşlemi Tamamlandı !",
					"type" 		=> "success"
				);
				$this->session->set_flashdata("alert", $alert);
				redirect(base_url("Pages"));
			}else {
				$alert	= array(
					"title" 	=> "Hata !",
					"subtitle" 	=> "Kayıt İşlemi Gerçekleştirilemedi !",
					"type" 		=> "error"
				);
				$this->session->set_flashdata("alert", $alert);
				redirect(base_url("Pages"));
			}
		}
	}// END pages Veri Ekleme Methodu //

	###   pages Güncelleme Methodu ###
	public function updatePages($pagesID) {
		$pagesIcon			= $this->input->post("pagesIcon");
		$pagesTitle			= $this->input->post("pagesTitle");
		$pagesContent	= $this->input->post("pagesContent");
		if (!$pagesIcon || !$pagesTitle || !$pagesContent) {
			$alert	= array(
				"title" 	=> "Dikkat !",
				"subtitle" 	=> "Lütfen Boş Alan Bırakmayınız !",
				"type" 		=> "warning"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Pages"));
		} else {
			$update = $this->Settings_m->updateSettings("tblpages",
				array(
					"pagesID" => $pagesID
				),
				array(
					"pagesIcon" 	=> $pagesIcon,
					"pagesTitle" 	=> $pagesTitle,
					"pagesContent"	=> $pagesContent
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
			redirect(base_url("Pages"));
		}
	}// END  pages Güncelleme Methodu //

	###   pages Silme Methodu ###
	public function deletePages($pagesID) {
		$delete 	= $this->Settings_m->deleteSettings("tblpages",array(
			"pagesID" => $pagesID
		));

		if ($delete) {
			$alert	= array(
				"title" 	=> "Tebrikler !",
				"subtitle" 	=> "Silme İşlemi Tamamlandı !",
				"type" 		=> "success"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("pages"));
		} else {
			$alert	= array(
				"title" 	=> "Hata !",
				"subtitle" 	=> "Silme İşlemi Gerçekleştirilemedi !",
				"type" 		=> "error"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Pages"));
		}
	}// END   pages Silme Methodu //

	### pages Status Güncelleme Methodu ###
	public function updateIsActivePages() {

		$dataID  = $this->input->post("dataID");
		$status  = ($this->input->post("status")=="true") ? 1 : 0 ;

		$update  = $this->Settings_m->updateSettings("tblpages",array(
			"pagesID" => $dataID
		),array(
			"pagesStatus" => $status
		));
		
		if ($update>0) {
			echo json_encode(array("success"=>1));
		}else{
			echo json_encode(array("success"=>0));
		}
	}// END pages Status Güncelleme Methodu //

	public function updateRankPages() {

		$data = $this->input->post("data");
		parse_str($data,$rank);
		$value = $rank["rank"];

		foreach ($value as $rank => $id) {
			
			$this->Settings_m->updateSettings("tblpages",array(
				"pagesID" 	 => $id
			),array(
				"pagesRank" => $rank
			));
			
		}
		
	}















}
