<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends MY_Model{
	
	protected $table = "pages";
	protected $primary_key = "id";
	protected $fields = array("id","language","title","description","link","content","url","category","manage");

	function __construct(){
		parent::__construct();
	}

	function getHomePage($language){
		
		$this->db->where('language',$language);
		$this->db->where('url','');
		$this->db->where_in('category',array(0,-1));
		$this->db->order_by('category','DESC');
		$this->db->order_by('title');
		$query = $this->db->get($this->table);
		$data = $query->result_array();
		if($data) return $data;
		return NULL;
	}

	function getPages(){
			
		$this->db->select($this->fields);
		$this->db->where('url !=','');
		$this->db->where('url !=','trade');
		$this->db->where('url !=','faq');
		$this->db->where('url !=','deposit');
		$this->db->where('url !=','contact-us');
		$query = $this->db->get('pages');
		if($data = $query->result_array()):
			return $data;
		endif;
		return NULL;
	}
	
	function readTopMenu($language){
			
		$this->db->select($this->fields);
		$this->db->where('language',$language);
		$this->db->where('category',0);
		$this->db->where('manage',0);
		$this->db->order_by('id ASC');
		$query = $this->db->get($this->table);
		$data = $query->result_array();
		if(count($data)) return $data;
		return NULL;
	}
	
	function getCategoryPages($category,$language){
			
		$this->db->where('category',$category);
		$this->db->where('language',$language);
		$query = $this->db->get($this->table);
		$data = $query->result_array();
		if($data) return $data;
		return NULL;
	}

	function pageOnLanguage($language,$page){
			
		$this->db->where('id',$page);
		$this->db->where('language',$language);
		$query = $this->db->get($this->table,1);
		$data = $query->result_array();
		if($data) return TRUE;
		return FALSE;
	}

	function deleteLanguage($lang){
	
		$this->db->where('language',$lang);
		$this->db->delete($this->table);
		return $this->db->affected_rows();
	}
	
	function deleteCategory($category){
	
		$this->db->where('category',$category);
		$this->db->delete($this->table);
		return $this->db->affected_rows();
	}

	function readFieldsUrl($url,$language){
			
		$this->db->select($this->fields);
		$this->db->where('url',$url);
		$this->db->where('language',$language);
		$query = $this->db->get($this->table,1);
		if($data = $query->result_array()):
			return $data[0];
		endif;
		return NULL;
	}
}