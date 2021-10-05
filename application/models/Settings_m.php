<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_m extends CI_Model {

	# GENEL AYARLAR TEKLİ VERİ ÇEKİMİ
	public function getSettings($tableName,$where = array()) {
		return $this->db->where($where)->get($tableName)->row();
	} # GENEL AYARLAR TEKLİ VERİ ÇEKİMİ #END#
	
	# GENEL AYARLAR ÇOKLU VERİ ÇEKİMİ
	public function getAllSettings($tableName,$where = array(),$order) {
		return $this->db->where($where)->order_by($order)->get($tableName)->result();
	} # GENEL AYARLAR ÇOKLU VERİ ÇEKİMİ #END#
	
	# GENEL AYARLAR VERİ GÜNCELLEME 
	public function updateSettings($tableName, $where = array(), $data = array()) {
		return $this->db->where($where)->update($tableName,$data); 
	} # GENEL AYARLAR VERİ GÜNCELLEME #END#

	# GENEL AYARLAR VERİ EKLEME 
	public function insertSettings($tableName,$data = array()) {
		return $this->db->insert($tableName,$data);
	}# GENEL AYARLAR VERİ EKLEME  #END#
	
	# GENEL AYARLAR SİLME 
	public function deleteSettings($tableName,$where = array()) {
		return $this->db->where($where)->delete($tableName);
	}# GENEL AYARLAR SİLME  #END#

# GENEL AYARLAR VERİ SAYISI
	public function count($tableName,$where = array()) {
		$count = array();
		$count = $this->db->where($where)->count_all_results($tableName);
		return $count;
	}# GENEL AYARLAR VERİ SAYISI #END#
	
# GENEL AYARLAR VERİ SAYISI
	public function countMes($tableName,$where = array()) {
		$count = array();
		$count = $this->db->where($where)->count_all_results($tableName);
		return $count;
	}# GENEL AYARLAR VERİ SAYISI #END#

# GENEL AYARLAR VERİ SAYISI
	public function countMessages($tableName,$where = array()) {
		$countMessages = array();
		$countMessages = $this->db->where($where)->get($tableName)->result();
		return $countMessages;
	}# GENEL AYARLAR VERİ SAYISI #END#

# GENEL AYARLAR VERİ SAYISI
	public function countSubs($tableName,$where = array()) {
		$count = array();
		$count = $this->db->where($where)->count_all_results($tableName);
		return $count;
	}# GENEL AYARLAR VERİ SAYISI #END#

# GENEL AYARLAR VERİ SAYISI
	public function countSubscribers($tableName,$where = array()) {
		$countMessages = array();
		$countMessages = $this->db->where($where)->get($tableName)->result();
		return $countMessages;
	}# GENEL AYARLAR VERİ SAYISI #END#



}
