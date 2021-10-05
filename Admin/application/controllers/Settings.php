<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

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
		$data['settingsAll']	= $this->Settings_m->getAllSettings("tblSocial",array(),"socialID DESC");
		$data['url']			= "settings";
		$this->load->view('Settings_v',$data);

	}// END Genel Ayarlar (Settings_v) Veri Gönderimi //

	### Genel Ayarlar Güncelleme Methodu ###
	public function updateGenericSettings($siteID) {
		$siteTitle			= $this->input->post("siteTitle");
		$siteDescription	= $this->input->post("siteDescription");
		$siteAuthor			= $this->input->post("siteAuthor");
		$siteKeywords		= $this->input->post("siteKeywords");
		$siteFooter			= $this->input->post("siteFooter");
		if (!$siteTitle || !$siteDescription || !$siteAuthor || !$siteKeywords || !$siteFooter) {
			$alert	= array(
				"title" 	=> "Dikkat !",
				"subtitle" 	=> "Lütfen Boş Alan Bırakmayınız !",
				"type" 		=> "warning"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Settings"));
		} else {
			$update = $this->Settings_m->updateSettings("tblSettings",
				array(
					"siteID" => $siteID
				),
				array(
					"siteTitle" => $siteTitle,
					"siteDescription" => $siteDescription,
					"siteAuthor" => $siteAuthor,
					"siteKeywords" => $siteKeywords,
					"siteFooter" => $siteFooter
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
			redirect(base_url("Settings"));
		}

	}// END Genel Ayarlar Güncelleme Methodu //
	

	### İletişim Ayarlar Güncelleme Methodu ###
	public function updateContactSettings($siteID) {
		$sitePhone			= $this->input->post("sitePhone");
		$siteMail			= $this->input->post("siteMail");
		$siteAdress			= $this->input->post("siteAdress");
		$siteMaps			= $this->input->post("siteMaps");
		if (!$sitePhone || !$siteMail || !$siteAdress || !$siteMaps) {
			$alert	= array(
				"title" 	=> "Dikkat !",
				"subtitle" 	=> "Lütfen Boş Alan Bırakmayınız !",
				"type" 		=> "warning"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Settings"));
		} else {
			$update = $this->Settings_m->updateSettings("tblSettings",
				array(
					"siteID" => $siteID
				),
				array(
					"sitePhone" 	=> $sitePhone,
					"siteMail" 		=> $siteMail,
					"siteAdress" 	=> $siteAdress,
					"siteMaps" 		=> $siteMaps
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
			redirect(base_url("Settings"));
		}

	}// END İletişim Ayarlar Güncelleme Methodu //
	

	### Smtp Ayarlar Güncelleme Methodu ###
	public function updateSmtpSettings($siteID) {
		$siteSmtpHost			= $this->input->post("siteSmtpHost");
		$siteSmtpUserMail		= $this->input->post("siteSmtpUserMail");
		$siteSmtpUserPassword	= $this->input->post("siteSmtpUserPassword");
		$siteSmtpPort			= $this->input->post("siteSmtpPort");
		$siteSmtpNotification	= $this->input->post("siteSmtpNotification");
		if (!$siteSmtpHost || !$siteSmtpUserMail || !$siteSmtpUserPassword || !$siteSmtpPort || !$siteSmtpNotification) {
			$alert	= array(
				"title" 	=> "Dikkat !",
				"subtitle" 	=> "Lütfen Boş Alan Bırakmayınız !",
				"type" 		=> "warning"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Settings"));
		} else {
			$update = $this->Settings_m->updateSettings("tblSettings",
				array(
					"siteID" => $siteID
				),
				array(
					"siteSmtpHost" 			=> $siteSmtpHost,
					"siteSmtpUserMail" 		=> $siteSmtpUserMail,
					"siteSmtpUserPassword" 	=> $siteSmtpUserPassword,
					"siteSmtpPort" 			=> $siteSmtpPort,
					"siteSmtpNotification" 	=> $siteSmtpNotification
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
			redirect(base_url("Settings"));
		}

	}// END Smtp Ayarlar Güncelleme Methodu //
	
	### Logo Güncelleme Methodu ###
	public function updateLogoSettings($siteID) {
		if (!empty($_FILES["siteLogo"]["name"])) {
			$logo_data	= $this->Settings_m->getSettings("tblSettings",array(
				"siteID" => $siteID
			));

			unlink('uploads/'.$logo_data->siteLogo);

			$config['upload_path']		= 'uploads/logoAndFavicon/';
			$config['allowed_types']	= 'png|jpg|jpeg|svg|gif';
			$config['file_name']		=  uniqid();
			$this->load->library("upload",$config);

			$upload 	= $this->upload->do_upload("siteLogo");
			if ($upload) {
				$uploaded_filename 	= $this->upload->data("file_name");

				$config['image_library']	= "gd2";
				$config['source_image']		= "uploads/logoAndFavicon/".$uploaded_filename;
				$config['create_thumb']		=  FALSE;
				$config['maintain_ratio']	=  FALSE;
				$config['quality']			=  "100%";
				$this->load->library("image_lib",$config);
				$this->image_lib->resize();

				$update 	= $this->Settings_m->updateSettings("tblSettings",array(
					"siteID" 	=> $siteID
				),array(
					"siteLogo" 	=> "logoAndFavicon/".$uploaded_filename
				));

				if ($update) {
					$alert	= array(
						"title" 	=> "Tebrikler !",
						"subtitle" 	=> "Logo Güncelleme İşlemi Tamamlandı !",
						"type" 		=> "success"
					);
				}else {
					$alert	= array(
						"title" 	=> "Hata !",
						"subtitle" 	=> "Logo Güncelleme İşlemi Gerçekleştirilemedi !",
						"type" 		=> "error"
					);
				}
				$this->session->set_flashdata("alert", $alert);
				redirect(base_url("Settings"));
			}else {
				$alert	= array(
					"title" 	=> "Hata !",
					"subtitle" 	=> "Logo Yüklenirken Bir Hata Oluştu !",
					"type" 		=> "error"
				);
				$this->session->set_flashdata("alert", $alert);
				redirect(base_url("Settings"));
			}
		}else {
			$alert	= array(
				"title" 	=> "Dikkat !",
				"subtitle" 	=> "Lütfen Boş Alan Bırakmayınız !",
				"type" 		=> "warning"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Settings"));
		}
	}// END Logo Güncelleme Methodu //

	### Favicon Güncelleme Methodu ###
	public function updateFaviconSettings($siteID) {
		if (!empty($_FILES["siteFavicon"]["name"])) {
			$logo_data	= $this->Settings_m->getSettings("tblSettings",array(
				"siteID" => $siteID
			));

			unlink('uploads/'.$logo_data->siteFavicon);

			$config['upload_path']		= 'uploads/logoAndFavicon/';
			$config['allowed_types']	= 'png|jpg|jpeg|svg|gif';
			$config['file_name']		=  uniqid();
			$this->load->library("upload",$config);

			$upload 	= $this->upload->do_upload("siteFavicon");
			if ($upload) {
				$uploaded_filename 	= $this->upload->data("file_name");

				$config['image_library']	= "gd2";
				$config['source_image']		= "uploads/logoAndFavicon/".$uploaded_filename;
				$config['create_thumb']		=  FALSE;
				$config['maintain_ratio']	=  FALSE;
				$config['quality']			=  "100%";
				$this->load->library("image_lib",$config);
				$this->image_lib->resize();

				$update 	= $this->Settings_m->updateSettings("tblSettings",array(
					"siteID" 	=> $siteID
				),array(
					"siteFavicon" 	=> "logoAndFavicon/".$uploaded_filename
				));

				if ($update) {
					$alert	= array(
						"title" 	=> "Tebrikler !",
						"subtitle" 	=> "Logo Güncelleme İşlemi Tamamlandı !",
						"type" 		=> "success"
					);
				}else {
					$alert	= array(
						"title" 	=> "Hata !",
						"subtitle" 	=> "Logo Güncelleme İşlemi Gerçekleştirilemedi !",
						"type" 		=> "error"
					);
				}
				$this->session->set_flashdata("alert", $alert);
				redirect(base_url("Settings"));
			}else {
				$alert	= array(
					"title" 	=> "Hata !",
					"subtitle" 	=> "Logo Yüklenirken Bir Hata Oluştu !",
					"type" 		=> "error"
				);
				$this->session->set_flashdata("alert", $alert);
				redirect(base_url("Settings"));
			}
		}else {
			$alert	= array(
				"title" 	=> "Dikkat !",
				"subtitle" 	=> "Lütfen Boş Alan Bırakmayınız !",
				"type" 		=> "warning"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Settings"));
		}
	}// END Favicon Güncelleme Methodu //

	### Genel Ayarlar Veri Ekleme Methodu ###
	public function insertSocialSettings() {
		$socialTitle 		= $this->input->post("socialTitle");
		$socialIcon 		= $this->input->post("socialIcon");
		$socialLink 		= $this->input->post("socialLink");
		if (!$socialTitle || !$socialIcon  || !$socialLink ) {
			$alert	= array(
				"title" 	=> "Dikkat !",
				"subtitle" 	=> "Lütfen Boş Alan Bırakmayınız !",
				"type" 		=> "warning"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Settings"));
		}else {
			$insert 	= $this->Settings_m->insertSettings("tblSocial",array(
				"socialTitle" 		=> $socialTitle,
				"socialIcon" 		=> $socialIcon,
				"socialLink" 		=> $socialLink,
				"socialStatus"  	=> 1,
				"socialCreatedAt"	=> date("Y-m-d")
			));
			if ($insert) {
				$alert	= array(
					"title" 	=> "Tebrikler !",
					"subtitle" 	=> "Kayıt İşlemi Tamamlandı !",
					"type" 		=> "success"
				);
				$this->session->set_flashdata("alert", $alert);
				redirect(base_url("Settings"));
			}else {
				$alert	= array(
					"title" 	=> "Hata !",
					"subtitle" 	=> "Güncelleme İşlemi Gerçekleştirilemedi !",
					"type" 		=> "error"
				);
				$this->session->set_flashdata("alert", $alert);
				redirect(base_url("Settings"));
			}
		}
	}// END Genel Ayarlar Veri Ekleme Methodu //

	### Genel Ayarlar Social Güncelleme Methodu ###
	public function updateSocialSettings($socialID) {
		$socialIcon			= $this->input->post("socialIcon");
		$socialTitle		= $this->input->post("socialTitle");
		$socialLink			= $this->input->post("socialLink");
		if (!$socialIcon || !$socialTitle || !$socialLink) {
			$alert	= array(
				"title" 	=> "Dikkat !",
				"subtitle" 	=> "Lütfen Boş Alan Bırakmayınız !",
				"type" 		=> "warning"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Settings"));
		} else {
			$update = $this->Settings_m->updateSettings("tblSocial",
				array(
					"socialID" => $socialID
				),
				array(
					"socialIcon" 	=> $socialIcon,
					"socialTitle" 	=> $socialTitle,
					"socialLink"	=> $socialLink
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
			redirect(base_url("Settings"));
		}
	}// END Genel Ayarlar Social Güncelleme Methodu //

	### Genel Ayarlar Social Silme Methodu ###
	public function deleteSocialSettings($socialID) {
		$delete 	= $this->Settings_m->deleteSettings("tblSocial",array(
			"socialID" => $socialID
		));

		if ($delete) {
			$alert	= array(
				"title" 	=> "Tebrikler !",
				"subtitle" 	=> "Silme İşlemi Tamamlandı !",
				"type" 		=> "success"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Settings"));
		} else {
			$alert	= array(
				"title" 	=> "Hata !",
				"subtitle" 	=> "Silme İşlemi Gerçekleştirilemedi !",
				"type" 		=> "error"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Settings"));
		}
	}// END Genel Ayarlar Social Silme Methodu //

	### Genel Ayarlar Status Güncelleme Methodu ###
	public function updateIsActiveSettings() {

		$dataID  = $this->input->post("dataID");
		$status  = ($this->input->post("status")=="true") ? 1 : 0 ;

		$update  = $this->Settings_m->updateSettings("tblSocial",array(
			"socialID" => $dataID
		),array(
			"socialStatus" => $status
		));
		
		if ($update>0) {
			echo json_encode(array("success"=>1));
		}else{
			echo json_encode(array("success"=>0));
		}
	}// END Genel Ayarlar Status Güncelleme Methodu //


	public function jquery() {
		$view = $this->load->view("jquery");
	}














}
