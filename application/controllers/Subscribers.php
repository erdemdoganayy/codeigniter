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
		$this->load->view('Subscribers_v',$data);

	}// END subscribers (subscribers_v) Veri Gönderimi //


	public function insertSubscribers() {
		$subs = htmlspecialchars($this->input->post("subs"));
		if (!$subs) {
			$sweet	= array(
				"title" 			=> "Dikkat !",
				"subtitle" 	=> "Lütfen Formda Boş Alan Bırakmayınız !",
				"type" 			=> "error"
			);
			$this->session->set_flashdata("sweet",$sweet);
			redirect(base_url("Home"));
		} else {
			$insert = $this->sm->insertSettings("tblSubscribers",array(
				"subscribersMail" => $subs
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
				$this->email->subject("Yeni Bir Abone !");
				$this->email->message("Tebrikler Sitenize Yeni Bir Kişi Abone Oldu !");
				$send = $this->email->send();


				$sweet	= array(
					"title" 			=> "Tebrikler !",
					"subtitle" 	=> "Başarıyla Abone Oldunuz !",
					"type" 			=> "success"
				);
				$this->session->set_flashdata("sweet",$sweet);
				redirect(base_url("Home"));
			} else {
				$sweet	= array(
					"title" 			=> "Dikkat !",
					"subtitle" 	=> "Kayıt İşleminde Hata Var !",
					"type" 			=> "error"
				);
				$this->session->set_flashdata("sweet",$sweet);
				redirect(base_url("Home"));
			}
		}
	}

	public function insertSubscribersNews() {
		$subs 		= htmlspecialchars($this->input->post("subs"));
		$newsID = $this->input->post("newsID");
		if (!$subs) {
			$sweet	= array(
				"title" 			=> "Dikkat !",
				"subtitle" 	=> "Lütfen Formda Boş Alan Bırakmayınız !",
				"type" 			=> "error"
			);
			$this->session->set_flashdata("sweet",$sweet);
			redirect(base_url("News/NewsDetail/$newsID"));
		} else {
			$insert = $this->sm->insertSettings("tblSubscribers",array(
				"subscribersMail" => $subs
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
				$this->email->subject("Yeni Bir Abone !");
				$this->email->message("Tebrikler Sitenize Yeni Bir Kişi Abone Oldu !");
				$send = $this->email->send();


				$sweet	= array(
					"title" 			=> "Tebrikler !",
					"subtitle" 	=> "Başarıyla Abone Oldunuz !",
					"type" 			=> "success"
				);
				$this->session->set_flashdata("sweet",$sweet);
				redirect(base_url("News/NewsDetail/$newsID"));
			} else {
				$sweet	= array(
					"title" 			=> "Dikkat !",
					"subtitle" 	=> "Kayıt İşleminde Hata Var !",
					"type" 			=> "error"
				);
				$this->session->set_flashdata("sweet",$sweet);
				redirect(base_url("News/NewsDetail/$newsID"));
			}
		}
	}









}
