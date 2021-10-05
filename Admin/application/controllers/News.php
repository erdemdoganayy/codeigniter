<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("Settings_m");
	}

	### Genel Ayarlar (news_v) Veri Gönderimi ###
	public function index() { 
		$data['settings'] = $this->Settings_m->getSettings("tblSettings", array("siteID" => 1)); // TOP HEADER SİTE AYARLARI SORGUSU
		$data['count'] = $this->sm->countMes("tblMessages", array("messagesStatus" => 0)); // TOP HEADER MESAJ SAYISI SORGUSU 
		$data['messages'] = $this->sm->countMessages("tblMessages", array("messagesStatus" => 0)); // TOP HEADER MESAJ SORGUSU 
		$data['countSubs'] = $this->sm->countSubs("tblSubscribers", array("SubscribersStatus" => 0)); // TOP HEADER ABONE SAYISI SORGUSU 
		$data['subcribes'] = $this->sm->countSubscribers("tblSubscribers", array("SubscribersStatus" => 0)); // TOP HEADER ABONELER SORGUSU 
		$data['admin'] = $this->Settings_m->getSettings("tblAdmin", array("adminID" => 1)); // TOP HEADER ADMİN BİLGİLERİ SORGUSU 
		$data['newsAll']		= $this->Settings_m->getAllSettings("tblnews",array(),"newsID ASC");
		$data['url']			= "news";
		$this->load->view('News_v',$data);

	}// END Genel Ayarlar (news_v) Veri Gönderimi //

	### news Ekleme ###
	public function insertNews () {
		$newsTitle 				= $this->input->post("newsTitle");
		$newsContent 		= $this->input->post("newsContent");
		$newsSeoTags 		= $this->input->post("newsSeoTags");
		if (!$newsTitle || !$newsContent || !$newsSeoTags ) {
			$alert	= array(
				"title" 	=> "Dikkat !",
				"subtitle" 	=> "Lütfen Formda Boş Alan Bırakmayınız !",
				"type" 		=> "warning"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("News"));
		}else {

			if (!empty($_FILES["newsImage"]["name"])) {

				$config['upload_path']		= 'uploads/news/';
				$config['allowed_types']	= 'png|jpg|jpeg|svg|gif';
				$config['file_name']		=  uniqid();
				$this->load->library("upload",$config);

				$upload 	= $this->upload->do_upload("newsImage");
				if ($upload) {
					$uploaded_filename 	= $this->upload->data("file_name");
					$config['image_library']		= "gd2";
					$config['source_image']		= "uploads/news/".$uploaded_filename;
					$config['create_thumb']		=  FALSE;
					$config['maintain_ratio']		=  FALSE;
					$config['quality']					=  "100%";
					$config['width']						=  660;
					$config['height']					=  426;
					$this->load->library("image_lib",$config);
					$this->image_lib->resize();

					$insert = $this->Settings_m->insertSettings("tblnews" ,array(
						"newsImage" 			=> "news/".$uploaded_filename,
						"newsTitle" 			=>$newsTitle,
						"newsContent" 		=> $newsContent,
						"newsSeoTags" 		=> $newsSeoTags,
						"NewsStatus"			=> 1,
						"newsCreatedAt"	=> date("Y-m-d")
					));

					if ($insert) {
						$alert	= array(
							"title" 	=> "Tebrikler !",
							"subtitle" 	=> "Haber Ekleme İşlemi Tamamlandı !",
							"type" 		=> "success"
						);
					}else {
						$alert	= array(
							"title" 	=> "Hata !",
							"subtitle" 	=> "Haber Ekleme İşlemi Gerçekleştirilemedi !",
							"type" 		=> "error"
						);
					}
					$this->session->set_flashdata("alert", $alert);
					redirect(base_url("News"));
				}else {
					$alert	= array(
						"title" 	=> "Hata !",
						"subtitle" 	=> "Resim Yüklenirken Bir Hata Oluştu !",
						"type" 		=> "error"
					);
					$this->session->set_flashdata("alert", $alert);
					redirect(base_url("News"));
				}
			}else {
				$alert	= array(
					"title" 	=> "Dikkat !",
					"subtitle" 	=> "Lütfen Boş Alan Bırakmayınız !",
					"type" 		=> "warning"
				);
				$this->session->set_flashdata("alert", $alert);
				redirect(base_url("News"));
			}

		}
	}// END news Ekleme //	


	### news Güncelleme ###
	public function updateNews($newsID) {
		$newsTitle 				= $this->input->post("newsTitle");
		$newsContent 		= $this->input->post("newsContent");
		$newsSeoTags 		= $this->input->post("newsSeoTags");
		if (!$newsTitle || !$newsContent || !$newsSeoTags ) {
			$alert	= array(
				"title" 	=> "Dikkat !",
				"subtitle" 	=> "Lütfen Formda Boş Alan Bırakmayınız !",
				"type" 		=> "warning"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("News"));
		}else {

			if (!empty($_FILES["newsImage"]["name"])) {

				$ImageData = $this->Settings_m->getSettings("tblnews",array(
					"newsID" => $newsID
				));
				unlink("uploads/".$ImageData->newsImage);

				$config['upload_path']		= 'uploads/news/';
				$config['allowed_types']	= 'png|jpg|jpeg|svg|gif';
				$config['file_name']		=  uniqid();
				$this->load->library("upload",$config);

				$upload 	= $this->upload->do_upload("newsImage");
				if ($upload) {
					$uploaded_filename 	= $this->upload->data("file_name");
					$config['image_library']		= "gd2";
					$config['source_image']		= "uploads/news/".$uploaded_filename;
					$config['create_thumb']		=  FALSE;
					$config['maintain_ratio']		=  FALSE;
					$config['quality']					=  "100%";
					$config['width']						=  660;
					$config['height']					=  426;
					$this->load->library("image_lib",$config);
					$this->image_lib->resize();

					$update = $this->Settings_m->updateSettings("tblnews" ,array(
						"newsID" => $newsID
					),array(
						"newsImage" 			=> "news/".$uploaded_filename,
						"newsTitle" 			=>$newsTitle,
						"newsContent" 		=> $newsContent,
						"newsSeoTags" 		=> $newsSeoTags,
						"NewsStatus"			=> 1,
						"newsCreatedAt"	=> date("Y-m-d")
					));

					if ($update) {
						$alert	= array(
							"title" 	=> "Tebrikler !",
							"subtitle" 	=> "Haber Güncelleme İşlemi Tamamlandı !",
							"type" 		=> "success"
						);
					}else {
						$alert	= array(
							"title" 	=> "Hata !",
							"subtitle" 	=> "Haber Güncelleme İşlemi Gerçekleştirilemedi !",
							"type" 		=> "error"
						);
					}
					$this->session->set_flashdata("alert", $alert);
					redirect(base_url("News"));
				}else {
					$alert	= array(
						"title" 	=> "Hata !",
						"subtitle" 	=> "Haber Güncellenirken Bir Hata Oluştu !",
						"type" 		=> "error"
					);
					$this->session->set_flashdata("alert", $alert);
					redirect(base_url("News"));
				}
			}else {
				$update = $this->Settings_m->updateSettings("tblnews" ,array(
					"newsID" => $newsID
				),array(
					"newsTitle" 			=>$newsTitle,
					"newsContent" 		=> $newsContent,
					"newsSeoTags" 		=> $newsSeoTags
				));

				if ($update) {
					$alert	= array(
						"title" 	=> "Tebrikler !",
						"subtitle" 	=> "Haber Güncelleme İşlemi Tamamlandı !",
						"type" 		=> "success"
					);
				}else {
					$alert	= array(
						"title" 	=> "Hata !",
						"subtitle" 	=> "Haber Güncelleme İşlemi Gerçekleştirilemedi !",
						"type" 		=> "error"
					);
				}
				$this->session->set_flashdata("alert", $alert);
				redirect(base_url("News"));
			}

		}

	}// END news Güncelleme //


	### news Silme Methodu ###
	public function deleteNews($newsID) {
		
		$ImageData = $this->Settings_m->getSettings("tblnews",array(
			"newsID" => $newsID
		));
		unlink("uploads/".$ImageData->newsImage);
		
		$delete 	= $this->Settings_m->deleteSettings("tblnews",array(
			"newsID" => $newsID
		));

		if ($delete) {
			$alert	= array(
				"title" 	=> "Tebrikler !",
				"subtitle" 	=> "Silme İşlemi Tamamlandı !",
				"type" 		=> "success"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("News"));
		} else {
			$alert	= array(
				"title" 	=> "Hata !",
				"subtitle" 	=> "Silme İşlemi Gerçekleştirilemedi !",
				"type" 		=> "error"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("News"));
		}
	}// END news Silme Methodu //

	### Genel Ayarlar Status Güncelleme Methodu ###
	public function updateIsActiveNews() {

		$dataID  = $this->input->post("dataID");
		$status  = ($this->input->post("status")=="true") ? 1 : 0 ;


		$update  = $this->Settings_m->updateSettings("tblnews",array(
			"newsID" => $dataID
		),array(
			"newsStatus" => $status
		));
		
		if ($update>0) {
			echo json_encode(array("success"=>1));
		}else{
			echo json_encode(array("success"=>0));
		}
	}// END Genel Ayarlar Status Güncelleme Methodu //




}
