<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Accounts extends MY_Model{

	protected $table = "users";
	protected $primary_key = "id";
	protected $fields = array("id","remote_id","demo","first_name","last_name","email","address1","address2","city","state","zip_code","country",
								"day_phone","home_phone","coach","password","trade_login","trade_password","signdate","active","language");

	function __construct(){
		
		parent::__construct();
	}
	
	function authentication($login = NULL,$password = NULL){
		
		if(!is_null($login) || !is_null($password)):
			$this->db->select($this->_fields());
			$this->db->where('trade_login',$login);
			$this->db->where('password',md5($password));
			$query = $this->db->get($this->table,1);
			if($data = $query->result_array()):
				return $data[0];
			endif;
		endif;
		return FALSE;
	}

	function validationTemporaryCode($code = NULL){
		
		if(!is_null($code)):
			$this->load->helper('date');
			$this->db->where('temporary_code',$code);
			$this->db->where('code_life >=',now());
			$query = $this->db->get($this->table,1);
			$data = $query->result_array();
			if($data):
				return $data[0][$this->primary_key];
			endif;
		endif;
		return FALSE;
	}
	
	function setBaseLang($language,$baseLang){

		$this->db->set('language',$baseLang);
		$this->db->where('language',$language);
		$this->db->update($this->table);
		return $this->db->affected_rows();
	}
	
	function getFields($fields,$where = NULL){
		
		$this->db->select($fields);
		if(!is_null($where)):
			$this->db->where($where);
		endif;
		$query = $this->db->get($this->table);
		if($data = $query->result_array()):
			return $data;
		endif;
		return NULL;
		
	}
}