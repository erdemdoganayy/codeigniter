<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("Settings_m");
	}

	public function index() {
		$this->load->view('Login_v');
	}
	public function loginControl() {
		$adminMail 			= htmlspecialchars($this->input->post("adminMail"));
		$adminPassword 	= htmlspecialchars($this->input->post("adminPassword"));
		if (!$adminMail || !$adminPassword) {
			$alert = array(
				"title" 			=> "Uyarı !",
				"subtitle" 	=> "Lütfen E-mail Ve Şifre Alanını Eksiksiz Giriniz !",
				"type" 			=> "warning"
			);
			$this->session->set_flashdata("alert" , $alert);
			redirect(base_url("Login"));
		} else {
			$admin = $this->sm->getSettings("tblAdmin", array(
				"adminMail" 			=> $adminMail,
				"adminPassword" 	=> md5($adminPassword)
			));
			if ($admin) {
				$alert = array(
					"title" 			=> "Giriş Başarılı !",
					"subtitle" 	=> "Sayın <b>".ucfirst($admin->adminName)."</b> Yönetim Paneline Hoşgeldiniz",
					"type" 			=> "success"
				);

				$this->session->set_userdata("admin" , $admin);
				$this->session->set_flashdata("alert" , $alert);
				 redirect(base_url("Home"));
			
			} else {
				$alert = array(
					"title" 			=> "Dikkat !",
					"subtitle" 	=> "E-mail Veya Şifre Yanlış !",
					"type" 			=> "error"
				);
				$this->session->set_flashdata("alert" , $alert);
				redirect(base_url("Login"));
			}
		}
	}
	public function logout() {
		$admin = $this->session->userdata("admin");
		$this->session->sess_destroy($admin);
		redirect(base_url("Login"));
	}

}