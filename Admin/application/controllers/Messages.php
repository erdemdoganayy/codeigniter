<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("Settings_m");
		if (!$this->session->userdata("admin")) {
			redirect(base_url("Login"));
		}
	}

	### Genel Ayarlar (Settings_v) Veri Gönderimi ###
	public function index() { 
		$data['settings'] = $this->Settings_m->getSettings("tblSettings", array("siteID" => 1)); // TOP HEADER SİTE AYARLARI SORGUSU
		$data['count'] = $this->sm->countMes("tblMessages", array("messagesStatus" => 0)); // TOP HEADER MESAJ SAYISI SORGUSU 
		$data['messages'] = $this->sm->countMessages("tblMessages", array("messagesStatus" => 0)); // TOP HEADER MESAJ SORGUSU 
		$data['countSubs'] = $this->sm->countSubs("tblSubscribers", array("SubscribersStatus" => 0)); // TOP HEADER ABONE SAYISI SORGUSU 
		$data['subcribes'] = $this->sm->countSubscribers("tblSubscribers", array("SubscribersStatus" => 0)); // TOP HEADER ABONELER SORGUSU 
		$data['admin'] = $this->Settings_m->getSettings("tblAdmin", array("adminID" => 1)); // TOP HEADER ADMİN BİLGİLERİ SORGUSU 
		$data['messagesAll']	= $this->Settings_m->getAllSettings("tblmessages",array(),"messagesID DESC");
		$data['url']					= "messages";
		$this->load->view('Messages_v',$data);

	}// END Genel Ayarlar (Settings_v) Veri Gönderimi //


	### Genel Ayarlar messages Güncelleme Methodu ###
	public function replyMessages($messagesID) {
		$messagesReply				= $this->input->post("messagesReply");
		$messagesSubject			= $this->input->post("messagesSubject");
		$messagesMail				= $this->input->post("messagesMail");

		if (!$messagesReply) {
			$alert	= array(
				"title" 	=> "Dikkat !",
				"subtitle" 	=> "Lütfen Boş Alan Bırakmayınız !",
				"type" 		=> "warning"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Messages"));
		} else {
			$replyData = $this->Settings_m->getSettings("tblSettings",	array("siteID" => 1));
			$config = array(
				"protocol" => "smtp",
				"smtp_host" => "$replyData->siteSmtpHost",
				"smtp_port" => "$replyData->siteSmtpPort",
				"smtp_user" => "$replyData->siteSmtpUserMail",
				"smtp_pass" => "$replyData->siteSmtpUserPassword",
				"mailtype" => "html",
				"charset" => "utf-8",
				"wordwrap" => true,
				"newline" => "\r\n"
			);

			$this->load->library('email', $config);

			$this->email->from($replyData->siteSmtpUserMail, "CodeigniterFirma Mesaj Yanıtı");
			$this->email->to($messagesMail);
			$this->email->subject($messagesSubject);
			$this->email->message($messagesReply);
			$send = $this->email->send();

			
			if ($send) {
				$alert	= array(
					"title" 	=> "Tebrikler !",
					"subtitle" 	=> "Mesajınız Yanıtlandı !",
					"type" 		=> "success"
				);
				$this->Settings_m->updateSettings("tblmessages",
					array(
						"messagesID" => $messagesID
					),
					array(
						"messagesStatus" 	=> 1
					)
				);
			} else {
				echo $this->email->print_debugger();
				die();
				$alert	= array(
					"title" 	=> "Hata !",
					"subtitle" 	=> "Mesaj Yanıtlama İşlemi Gerçekleştirilemedi !",
					"type" 		=> "error"
				);
			}
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Messages"));
		}
	}// END Genel Ayarlar messages Güncelleme Methodu //

	### Genel Ayarlar messages Silme Methodu ###
	public function deleteMessages($messagesID) {
		$delete 	= $this->Settings_m->deleteSettings("tblmessages",array(
			"messagesID" => $messagesID
		));

		if ($delete) {
			$alert	= array(
				"title" 	=> "Tebrikler !",
				"subtitle" 	=> "Silme İşlemi Tamamlandı !",
				"type" 		=> "success"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Messages"));
		} else {
			$alert	= array(
				"title" 	=> "Hata !",
				"subtitle" 	=> "Silme İşlemi Gerçekleştirilemedi !",
				"type" 		=> "error"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Messages"));
		}
	}// END Genel Ayarlar messages Silme Methodu //

	// ### Genel Ayarlar Status Güncelleme Methodu ###
	// public function updateIsActivemessages() {

	// 	$dataID  = $this->input->post("dataID");
	// 	$status  = ($this->input->post("status")=="true") ? 1 : 0 ;

	// 	$update  = $this->Settings_m->updateSettings("tblmessages",array(
	// 		"messagesID" => $dataID
	// 	),array(
	// 		"messagesStatus" => $status
	// 	));

	// 	if ($update>0) {
	// 		echo json_encode(array("success"=>1));
	// 	}else{
	// 		echo json_encode(array("success"=>0));
	// 	}
	// }// END Hizmetler Status Güncelleme Methodu //
















}
