<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model("Settings_m");
	}
	public function index() {
		$data['settings'] = $this->Settings_m->getSettings("tblSettings", array("siteID" => 1)); 
		$data['social'] = $this->Settings_m->getAllSettings("tblSocial",array("socialStatus" =>1), "socialID ASC");
		$data["aboutUs"]  = $this->sm->getAllSettings("tblAboutUs", array("aboutUsStatus" =>1), "aboutUsRank ASC");
		$data["project"]  = $this->sm->getAllSettings("tblProject", array("projectStatus" =>1), "projectRank ASC");
		$data["page"]  = $this->sm->getAllSettings("tblPages", array("pagesStatus" =>1), "pagesRank ASC");
		$data['url']	= "contact";
		$this->load->view('Contact_v',$data);
	}


	public function insertMessages() {
		$messagesName 		= htmlspecialchars($this->input->post("messagesName"));
		$messagesMail 			= htmlspecialchars($this->input->post("messagesMail"));
		$messagesSubject 	= htmlspecialchars($this->input->post("messagesSubject"));
		$messagesPhone 		= htmlspecialchars($this->input->post("messagesPhone"));
		$messagesContent 	= htmlspecialchars($this->input->post("messagesContent"));
		$newsID = $this->input->post("newsID");
		if (!$messagesName || !$messagesMail || !$messagesSubject || !$messagesPhone || !$messagesContent) {
			$sweet	= array(
				"title" 			=> "Dikkat !",
				"subtitle" 	=> "Lütfen Formda Boş Alan Bırakmayınız !",
				"type" 			=> "error"
			);
			$this->session->set_flashdata("sweet",$sweet);
			redirect(base_url("Contact"));
		} else {
			$insert = $this->sm->insertSettings("tblMessages",array(
				"messagesName" => $messagesName,
				"messagesMail" => $messagesMail,
				"messagesSubject" => $messagesSubject,
				"messagesPhone" => $messagesPhone,
				"messagesContent" => $messagesContent,
				"messagesStatus" => 0,
				"messagesCreatedAt" => date("Y-m-d")
			));
			if ($insert) {

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
				$this->email->to($replyData->siteSmtpNotification);
				$this->email->subject("Yeni Bir Mesaj !");
				$this->email->message("Yeni Bir Mesaj İletildi !");
				$send = $this->email->send();


				$sweet	= array(
					"title" 			=> "Tebrikler !",
					"subtitle" 	=> "Mesajınız Başarıyla Gönderildi !",
					"type" 			=> "success"
				);
				$this->session->set_flashdata("sweet",$sweet);
				redirect(base_url("Contact"));
			} else {
				$sweet	= array(
					"title" 			=> "Dikkat !",
					"subtitle" 	=> "Kayıt İşleminde Hata Var !",
					"type" 			=> "error"
				);
				$this->session->set_flashdata("sweet",$sweet);
				redirect(base_url("Contact"));
			}
		}
	}
	

}