<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model("Settings_m");
		if (!$this->session->userdata("admin")) {
			redirect(base_url("Login"));
		}
	}
	public function index() {
		$data['admin'] = $this->Settings_m->getSettings("tblAdmin", array("adminID" => 1)); // TOP HEADER ADMİN BİLGİLERİ SORGUSU 
		$data['settings'] = $this->Settings_m->getSettings("tblSettings", array("siteID" => 1)); // TOP HEADER SİTE AYARLARI SORGUSU
		$data['count'] = $this->sm->countMes("tblMessages", array("messagesStatus" => 0)); // TOP HEADER MESAJ SAYISI SORGUSU 
		$data['messages'] = $this->sm->countMessages("tblMessages", array("messagesStatus" => 0)); // TOP HEADER MESAJ SORGUSU 
		$data['countSubs'] = $this->sm->countSubs("tblSubscribers", array("SubscribersStatus" => 0)); // TOP HEADER ABONE SAYISI SORGUSU 
		$data['subcribes'] = $this->sm->countSubscribers("tblSubscribers", array("SubscribersStatus" => 0)); // TOP HEADER ABONELER SORGUSU 
		$data['data']		= $this->Settings_m->getSettings("tblAdmin",array(
			"adminID" => "1"
		));
		$data['url']	= "";
		$this->load->view('Profile_v',$data);
	}

	public function updateProfileImage () {

		if (!empty($_FILES["adminImage"]["name"])) {

			$ImageData = $this->Settings_m->getSettings("tblAdmin",array(
				"adminID" => "1"
			));
			unlink("uploads/".$ImageData->adminImage);

			$config['upload_path']		= 'uploads/adminImages/';
			$config['allowed_types']	= 'png|jpg|jpeg|svg|gif';
			$config['file_name']		=  uniqid();
			$this->load->library("upload",$config);

			$upload 	= $this->upload->do_upload("adminImage");
			if ($upload) {
				$uploaded_filename 			= $this->upload->data("file_name");
				$config['image_library']	= "gd2";
				$config['source_image']	= "uploads/adminImages/".$uploaded_filename;
				$config['create_thumb']	=  FALSE;
				$config['maintain_ratio']	=  FALSE;
				$config['quality']				=  "100%";
				$config['width']					=  500;
				$config['height']				=  500;
				$this->load->library("image_lib",$config);
				$this->image_lib->resize();

				$update = $this->Settings_m->updateSettings("tblAdmin" ,array(
					"adminID" => "1"
				),array(
					"adminImage" 		=> "adminImages/".$uploaded_filename
				));
			}else {
				$alert	= array(
					"title" 	=> "Hata !",
					"subtitle" 	=> "Profil Resim Güncellenirken Bir Hata Oluştu !",
					"type" 		=> "error"
				);
				$this->session->set_flashdata("alert", $alert);
				redirect(base_url("Profile"));
			}
		}else {
			$alert	= array(
				"title" 	=> "Uyarı !",
				"subtitle" 	=> "Profil Resim Alanını Boş Bırakmayın !",
				"type" 		=> "warning"
			);

			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Profile"));
		}


		
	}


	public function updateProfileInfo ($adminID) {
		$adminName 		= $this->input->post("adminName");
		$adminMail		 	= $this->input->post("adminMail");

		if (!$adminName || !$adminMail) {
			$alert	= array(
				"title" 	=> "Uyarı !",
				"subtitle" 	=> "İsim Ve Mail Alanını Boş Bırakmayın !",
				"type" 		=> "warning"
			);

			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Profile"));
		} else {
			$update = $this->Settings_m->updateSettings("tblAdmin", array(
				"adminID" => $adminID
			),
			array(
				"adminName" => $adminName,
				"adminMail"	 => $adminMail
			)
		);

			if ($update) {
				$alert	= array(
					"title" 	=> "Tebrikler !",
					"subtitle" 	=> "İsim Ve Mail Başarıyla Güncellediniz !",
					"type" 		=> "success"
				);
				$this->session->set_flashdata("alert", $alert);
				redirect(base_url("Profile"));
			} else {
				$alert	= array(
					"title" 	=> "Hata !",
					"subtitle" 	=> "İsim Ve Mail Alanını Güncellerken Bir Hata Oluştu  !",
					"type" 		=> "error"
				);

				$this->session->set_flashdata("alert", $alert);
				redirect(base_url("Profile"));
			}

		}

	}

	public function updateProfilePassword ($adminID) {
		$passwordOne = $this->input->post("passwordOne");
		$passwordTwo = $this->input->post("passwordTwo");

		$this->load->library("form_validation");
		$this->form_validation->set_rules('passwordOne', 'Yeni Şifre', 'trim|required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('passwordTwo', 'Yeni Şifre (Tekrar)', 'trim|matches[passwordOne]|required|min_length[5]|max_length[12]');
		$this->form_validation->set_message(
			array(
				"required" =>"<b>{field}</b> Alanı Boş Bırakılamaz !",
				"matches" => "Şifreler Uyuşmuyor !",
				"min_length" => "<b>{field}</b><b> {param} </b> Karakterden Küçük Olamaz  !",
				"max_length" => "<b>{field}</b><b> {param} </b> Karakterden Büyük Olamaz !"
			)
		);
		if ($this->form_validation->run()) {
			$update = $this->Settings_m->updateSettings("tblAdmin",array("adminID" => 1),
				array(
					"adminPassword" => md5($passwordTwo)
				)
			);
			if ($update) {
				$alert	= array(
					"title" 	=> "Tebrikler !",
					"subtitle" 	=> "Şifrenizi Başarıyla Güncellediniz !",
					"type" 		=> "success"
				);
				$this->session->set_flashdata("alert", $alert);
				redirect(base_url("Profile"));
			} else {
				$alert	= array(
					"title" 	=> "Hata !",
					"subtitle" 	=> "Şifre Güncellerken Bir Hata Oluştu  !",
					"type" 		=> "error"
				);

				$this->session->set_flashdata("alert", $alert);
				redirect(base_url("Profile"));
			}
		} else {
			$admin = $this->Settings_m->getSettings("tblAdmin",array("adminID" => $adminID));
			$data['url'] = "";
			$data['data'] = $admin;
			$data["form_error"] =  true;
			$this->load->view("Profile_v",$data);
		}
	}








}