<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Albums extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("Settings_m");
		if (!$this->session->userdata("admin")) {
			redirect(base_url("Login"));
		}
	}

	### Genel Ayarlar (albums_v) Veri Gönderimi ###
	public function index() { 
		$data['settings'] = $this->Settings_m->getSettings("tblSettings", array("siteID" => 1)); // TOP HEADER SİTE AYARLARI SORGUSU
		$data['count'] = $this->sm->countMes("tblMessages", array("messagesStatus" => 0)); // TOP HEADER MESAJ SAYISI SORGUSU 
		$data['messages'] = $this->sm->countMessages("tblMessages", array("messagesStatus" => 0)); // TOP HEADER MESAJ SORGUSU 
		$data['countSubs'] = $this->sm->countSubs("tblSubscribers", array("SubscribersStatus" => 0)); // TOP HEADER ABONE SAYISI SORGUSU 
		$data['subcribes'] = $this->sm->countSubscribers("tblSubscribers", array("SubscribersStatus" => 0)); // TOP HEADER ABONELER SORGUSU 
		$data['admin'] = $this->Settings_m->getSettings("tblAdmin", array("adminID" => 1)); // TOP HEADER ADMİN BİLGİLERİ SORGUSU 
		$data['AlbumsAll']		= $this->Settings_m->getAllSettings("tblAlbums",array(),"albumsRank ASC");
		$data['url']						= "albums";
		$this->load->view('Albums_v',$data);

	}// END Genel Ayarlar (albums_v) Veri Gönderimi //

	### albums Ekleme ###
	public function insertAlbums () {
		$albumsTitle 		= $this->input->post("albumsTitle");

		if (!$albumsTitle) {
			$alert	= array(
				"title" 	=> "Dikkat !",
				"subtitle" 	=> "Lütfen Formda Boş Alan Bırakmayınız !",
				"type" 		=> "warning"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("albums"));
		}else {

			if (!empty($_FILES["albumsImage"]["name"])) {

				$config['upload_path']		= 'uploads/albums/';
				$config['allowed_types']	= 'png|jpg|jpeg|svg|gif';
				$config['file_name']		=  uniqid();
				$this->load->library("upload",$config);

				$upload 	= $this->upload->do_upload("albumsImage");
				if ($upload) {
					$uploaded_filename 	= $this->upload->data("file_name");
					$config['image_library']		= "gd2";
					$config['source_image']		= "uploads/albums/".$uploaded_filename;
					$config['create_thumb']		=  FALSE;
					$config['maintain_ratio']		=  FALSE;
					$config['quality']					=  "100%";
					$config['width']						=  1920;
					$config['height']					=  1080;
					$this->load->library("image_lib",$config);
					$this->image_lib->resize();

					$insert = $this->Settings_m->insertSettings("tblalbums" ,array(
						"albumsImage" 		=> "albums/".$uploaded_filename,
						"albumsTitle" 		=> $albumsTitle,
						"albumsRank"			=> 0,
						"albumsStatus"		=> 1,
						"albumsCreatedAt"	=> date("Y-m-d")
					));

					if ($insert) {
						$alert	= array(
							"title" 	=> "Tebrikler !",
							"subtitle" 	=> "Albüm Ekleme İşlemi Tamamlandı !",
							"type" 		=> "success"
						);
					}else {
						$alert	= array(
							"title" 	=> "Hata !",
							"subtitle" 	=> "Albüm Ekleme İşlemi Gerçekleştirilemedi !",
							"type" 		=> "error"
						);
					}
					$this->session->set_flashdata("alert", $alert);
					redirect(base_url("Albums"));
				}else {
					$alert	= array(
						"title" 	=> "Hata !",
						"subtitle" 	=> "Resim Yüklenirken Bir Hata Oluştu !",
						"type" 		=> "error"
					);
					$this->session->set_flashdata("alert", $alert);
					redirect(base_url("Albums"));
				}
			}else {
				$alert	= array(
					"title" 	=> "Dikkat !",
					"subtitle" 	=> "Lütfen Resim Alanını Boş Bırakmayınız !",
					"type" 		=> "warning"
				);
				$this->session->set_flashdata("alert", $alert);
				redirect(base_url("Albums"));
			}

		}
	}// END albums Ekleme //	


	### albums Güncelleme ###
	public function updateAlbums($albumsID) {

		$albumsTitle 		= $this->input->post("albumsTitle");
		if (!$albumsTitle) {
			$alert	= array(
				"title" 	=> "Dikkat !",
				"subtitle" 	=> "Lütfen Formda Boş Alan Bırakmayınız !",
				"type" 		=> "warning"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Albums"));
		}else {

			if (!empty($_FILES["albumsImage"]["name"])) {

				$ImageData = $this->Settings_m->getSettings("tblalbums",array(
					"albumsID" => $albumsID
				));
				unlink("uploads/".$ImageData->albumsImage);

				$config['upload_path']		= 'uploads/albums/';
				$config['allowed_types']	= 'png|jpg|jpeg|svg|gif';
				$config['file_name']		=  uniqid();
				$this->load->library("upload",$config);

				$upload 	= $this->upload->do_upload("albumsImage");
				if ($upload) {
					$uploaded_filename 	= $this->upload->data("file_name");
					$config['image_library']	= "gd2";
					$config['source_image']	= "uploads/albums/".$uploaded_filename;
					$config['create_thumb']	=  FALSE;
					$config['maintain_ratio']	=  FALSE;
					$config['quality']				=  "100%";
					$config['width']					=  1920;
					$config['height']				=  1080;
					$this->load->library("image_lib",$config);
					$this->image_lib->resize();

					$update = $this->Settings_m->updateSettings("tblalbums" ,array(
						"albumsID" => $albumsID
					),array(
						"albumsImage" 		=> "albums/".$uploaded_filename,
						"albumsTitle" 		=> $albumsTitle
					));

					if ($update) {
						$alert	= array(
							"title" 	=> "Tebrikler !",
							"subtitle" 	=> "Albüm Güncelleme İşlemi Tamamlandı !",
							"type" 		=> "success"
						);
					}else {
						$alert	= array(
							"title" 	=> "Hata !",
							"subtitle" 	=> "Albüm Güncelleme İşlemi Gerçekleştirilemedi !",
							"type" 		=> "error"
						);
					}
					$this->session->set_flashdata("alert", $alert);
					redirect(base_url("Albums"));
				}else {
					$alert	= array(
						"title" 	=> "Hata !",
						"subtitle" 	=> "Resim Güncellenirken Bir Hata Oluştu !",
						"type" 		=> "error"
					);
					$this->session->set_flashdata("alert", $alert);
					redirect(base_url("Albums"));
				}
			}else {
				$update = $this->Settings_m->updateSettings("tblalbums" ,array(
					"albumsID" => $albumsID
				),array(
					"albumsTitle" 		=> $albumsTitle
				));

				if ($update) {
					$alert	= array(
						"title" 	=> "Tebrikler !",
						"subtitle" 	=> "Albüm Güncelleme İşlemi Tamamlandı !",
						"type" 		=> "success"
					);
				}else {
					$alert	= array(
						"title" 	=> "Hata !",
						"subtitle" 	=> "Albüm Güncelleme İşlemi Gerçekleştirilemedi !",
						"type" 		=> "error"
					);
				}
				$this->session->set_flashdata("alert", $alert);
				redirect(base_url("Albums"));
			}

		}

	}// END albums Güncelleme //



	### albums Silme Methodu ###
	public function deleteAlbums($albumsID) {

		$ImageData = $this->Settings_m->getSettings("tblalbums",array(
			"albumsID" => $albumsID
		));
		unlink("uploads/".$ImageData->albumsImage);

		$delete 	= $this->Settings_m->deleteSettings("tblalbums",array(
			"albumsID" => $albumsID
		));

		if ($delete) {
			$alert	= array(
				"title" 	=> "Tebrikler !",
				"subtitle" 	=> "Silme İşlemi Tamamlandı !",
				"type" 		=> "success"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("albums"));
		} else {
			$alert	= array(
				"title" 	=> "Hata !",
				"subtitle" 	=> "Silme İşlemi Gerçekleştirilemedi !",
				"type" 		=> "error"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Albums"));
		}
	}// END albums Silme Methodu //

	### albums Status Güncelleme Methodu ###
	public function updateIsActiveAlbums() {

		$dataID  = $this->input->post("dataID");
		$status  = ($this->input->post("status")=="true") ? 1 : 0 ;

		$update  = $this->Settings_m->updateSettings("tblalbums",array(
			"albumsID" => $dataID
		),array(
			"albumsStatus" => $status
		));
		
		if ($update>0) {
			echo json_encode(array("success"=>1));
		}else{
			echo json_encode(array("success"=>0));
		}
	}// END albums Status Güncelleme Methodu //

	### Albums Sıralama
	public function updateRankAlbums() {

		$data = $this->input->post("data");
		parse_str($data,$rank);
		$value = $rank["rank"];

		foreach ($value as $rank => $id) {
			
			$this->Settings_m->updateSettings("tblalbums",array(
				"albumsID" 	 => $id
			),array(
				"albumsRank" => $rank
			));
			
		}
		
	} // END Albums Sıralama

	//  ÇOKLU FOTOĞRAF YÜKLEME

	public function uploadPage ($albumsID) {
			$data['settings'] = $this->Settings_m->getSettings("tblSettings", array("siteID" => 1)); // TOP HEADER SİTE AYARLARI SORGUSU
		$data['count'] = $this->sm->countMes("tblMessages", array("messagesStatus" => 0)); // TOP HEADER MESAJ SAYISI SORGUSU 
		$data['messages'] = $this->sm->countMessages("tblMessages", array("messagesStatus" => 0)); // TOP HEADER MESAJ SORGUSU 
		$data['countSubs'] = $this->sm->countSubs("tblSubscribers", array("SubscribersStatus" => 0)); // TOP HEADER ABONE SAYISI SORGUSU 
		$data['subcribes'] = $this->sm->countSubscribers("tblSubscribers", array("SubscribersStatus" => 0)); // TOP HEADER ABONELER SORGUSU 
		$data['admin'] = $this->Settings_m->getSettings("tblAdmin", array("adminID" => 1)); // TOP HEADER ADMİN BİLGİLERİ SORGUSU 
		$data['AlbumsAll']		= $this->Settings_m->getAllSettings("tblAlbumsPhotos", array("albumsID" => $albumsID), "albumsPhotosRank ASC");
		$data['Albums']				= $this->Settings_m->getSettings("tblAlbums",array("albumsID" => $albumsID));
		$data['url'] 					= "albumsPhotos";
		$this->load->view("AlbumsPhotos_v",$data);
	}

	public function uploadPhotos ($albumsID) {

		$config['upload_path']		= 'uploads/albumsPhotos/';
		$config['allowed_types']	= 'png|jpg|jpeg|svg|gif';
		$config['file_name']		=  uniqid();
		$this->load->library("upload",$config);

		$upload 	= $this->upload->do_upload("file");
		if ($upload) {
			$uploaded_filename 	= $this->upload->data("file_name");
			$config['image_library']		= "gd2";
			$config['source_image']		= "uploads/albumsPhotos/".$uploaded_filename;
			$config['create_thumb']		=  FALSE;
			$config['maintain_ratio']		=  FALSE;
			$config['quality']					=  "100%";
			$config['width']						=  1920;
			$config['height']					=  1080;
			$this->load->library("image_lib",$config);
			$this->image_lib->resize();

			$insert = $this->Settings_m->insertSettings("tblAlbumsPhotos" ,array(
				"albumsPhotosImage" 			=> "albumsPhotos/".$uploaded_filename,
				"albumsID"					 			=> $albumsID,
				"albumsPhotosRank"				=> 0,
				"albumsPhotosStatus"			=> 1,
				"albumsPhotosCreatedAt"	=> date("Y-m-d")
			));

		}

	}

### albums Silme Methodu ###
	public function deleteAlbumsPhotos($albumsPhotosID) {

		$ImageData = $this->Settings_m->getSettings("tblalbumsPhotos",array(
			"albumsPhotosID" => $albumsPhotosID
		));
		unlink("uploads/".$ImageData->albumsPhotosImage);

		$delete 	= $this->Settings_m->deleteSettings("tblalbumsPhotos",array(
			"albumsPhotosID" => $albumsPhotosID
		));

		if ($delete) {
			$alert	= array(
				"title" 	=> "Tebrikler !",
				"subtitle" 	=> "Silme İşlemi Tamamlandı !",
				"type" 		=> "success"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Albums/uploadPage/$ImageData->albumsID"));
		} else {
			$alert	= array(
				"title" 	=> "Hata !",
				"subtitle" 	=> "Silme İşlemi Gerçekleştirilemedi !",
				"type" 		=> "error"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Albums/uploadPage/$albumsID"));
		}
	}// END albums Silme Methodu //


### albums Silme Methodu ###
	public function deleteAllAlbumsPhotos($albumsID) {

		$ImageData = $this->Settings_m->getAllSettings("tblalbumsPhotos",array(
			"albumsID" => $albumsID
		), "albumsPhotosRank ASC" );

		foreach ($ImageData as $ImageDataAll) {
			unlink("uploads/".$ImageDataAll->albumsPhotosImage);
		}

		$delete 	= $this->Settings_m->deleteSettings("tblalbumsPhotos",array(
			"albumsID" => $albumsID
		));

		if ($delete) {
			$alert	= array(
				"title" 	=> "Tebrikler !",
				"subtitle" 	=> "Tümünü Silme İşlemi Tamamlandı !",
				"type" 		=> "success"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Albums/uploadPage/$albumsID"));
		} else {
			$alert	= array(
				"title" 	=> "Hata !",
				"subtitle" 	=> "Tümünü Silme İşlemi Gerçekleştirilemedi !",
				"type" 		=> "error"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("Albums/uploadPage/$albumsID"));
		}
	}// END albums Silme Methodu //

### albumsPhotos Status Güncelleme Methodu ###
	public function updateIsActiveAlbumsPhotos() {

		$dataID  = $this->input->post("dataID");
		$status  = ($this->input->post("status")=="true") ? 1 : 0 ;

		$update  = $this->Settings_m->updateSettings("tblalbumsPhotos",array(
			"albumsPhotosID" => $dataID
		),array(
			"albumsPhotosStatus" => $status
		));
		
		if ($update>0) {
			echo json_encode(array("success"=>1));
		}else{
			echo json_encode(array("success"=>0));
		}
	}// END albumsPhotos Status Güncelleme Methodu //

### AlbumsPhotos Sıralama
	public function updateRankAlbumsPhotos() {

		$data = $this->input->post("data");
		parse_str($data,$rank);
		$value = $rank["rank"];

		foreach ($value as $rank => $id) {
			
			$this->Settings_m->updateSettings("tblalbumsPhotos",array(
				"albumsPhotosID" 	 => $id
			),array(
				"albumsPhotosRank" => $rank
			));
			
		}
		
	} // END AlbumsPhotos Sıralama


}
