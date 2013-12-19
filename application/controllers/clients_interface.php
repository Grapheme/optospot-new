<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Clients_interface extends MY_Controller{
	
	function __construct(){
		
		parent::__construct();
		if(!$this->loginstatus || !$this->account['id']):
			redirect('');
		endif;
		$this->load->model('languages');
		$userLangURI = $this->languages->value($this->profile['language'],'uri');
		if($userLangURI != $this->uri->segment(1)):
			redirect($userLangURI.'/cabinet/balance');
		else:
			$this->language = $userLangURI;
			$this->language_url = $this->uri->segment(1);
			$this->config->set_item('base_url',$this->baseURL.$this->language_url.'/');
		endif;
	}
	
	public function balance(){
		
		if($this->isDemoRegisterRealAccount()):
			return TRUE;
		endif;
		
		$this->load->model('settings');
		$pagevar = array(
			'title' => $this->localization->getProblemPlace('client_cabinet','balance_title'),
			'description' => $this->localization->getProblemPlace('client_cabinet','balance_description'),
			'action_deposit'=> $this->settings->value(3,'link'),
			'msgs' => '',
			'msgr' => ''
		);
		$postdata = http_build_query(array('j_username' => $this->profile['trade_login'], 'j_password' => $this->encrypt->decode($this->profile['trade_password'])));
		$opts = array('http' => array('method'=>'POST','header'=>'Content-type: application/x-www-form-urlencoded','content'=>$postdata));
		$context  = stream_context_create($opts);
		$json_string = file_get_contents('http://dengionline.sysfx.com:8080/deal.184/service/serviceLogin.jsp',false, $context);
		$res = json_decode($json_string,true);
		if(isset($res['errorCode'])):
			$pagevar['msgs'] = $res['message'];
		elseif( $res['status'] != 'LOGIN' ):
			$pagevar['msgr'] =  'Error while requesting user balance. Please send email to support@optospot.net with problem description.';
		endif;
		$jsessionid = @$res['jsessionid'];
		setcookie('jsessionid', $jsessionid, time() + (86400 * 7)); // 86400 = 1 day
		$opts = array('http' => array('method' => 'GET', 'header'=> 'Cookie: jsessionid=' . $jsessionid."\r\n"));
		$context = stream_context_create($opts);
		$contents = file_get_contents('http://dengionline.sysfx.com:8080/deal.184/service/secure/serviceAccounts.jsp;jsessionid='.$jsessionid, false, $context);
		$pagevar['accounts'] = json_decode($contents, true);
		$pagevar['action_deposit'] = $this->settings->value(3,'link').';jsessionid='.$jsessionid;
		$this->load->view("clients_interface/balance",$pagevar);
	}
	
	public function withdraw(){
		
		/*if($this->isDemoRegisterRealAccount()):
			return TRUE;
		endif;*/
		
		$this->load->model('settings');
		$pagevar = array(
			'title' => $this->localization->getWithdrawPlace('client_cabinet','balance_title'),
			'description' => $this->localization->getWithdrawPlace('client_cabinet','balance_description'),
			'action_deposit'=> $this->settings->value(3,'link'),
			'msgs' => '',
			'msgr' => ''
		);
		$this->load->view("clients_interface/withdraw",$pagevar);
	}
	
	private function isDemoRegisterRealAccount(){
		
		if($this->profile['demo'] == 1):
			
			$pagevar = array(
				'title' => $this->localization->getLocalMessage('client_cabinet','real_reg_title'),
				'description' => $this->localization->getLocalMessage('client_cabinet','real_reg_description'),
				'msgs' => '',
				'msgr' => '' 
			);
			$this->load->view("clients_interface/register-real-account",$pagevar);
			return TRUE;
		else:
			return FALSE;
		endif;
	}
	
	public function profile(){
		
		$msgs = $msgr = '';
		if($this->input->post('submit') !== FALSE):
			unset($_POST['submit']);
			if($this->postDataValidation('edit_account') == TRUE):
				$this->ExecuteUpdatingProfile($this->input->post());
				$this->profile = $this->accounts->getWhere($this->account['id']);
					$this->session->set_userdata('profile',json_encode($this->profile));
				$msgs = $this->localization->getLocalMessage('form_responce','profile_saved');
			else:
				$msgr = $this->localization->getLocalMessage('form_responce','no_valid_fields');
			endif;
		endif;
		$this->load->model('languages');
		$pagevar = array(
			'title' => $this->localization->getLocalMessage('client_cabinet','profile_title'),
			'description' => $this->localization->getLocalMessage('client_cabinet','profile_description'),
			'account' => $this->accounts->getWhere($this->account['id']),
			'langs' => $this->languages->getAll(),
			'msgs' => $msgs,
			'msgr' => $msgr 
		);
		
		$this->load->library('encrypt');
		$this->load->helper(array('date','form'));
		$pagevar['account']['password'] = $this->encrypt->decode($pagevar['account']['trade_password']);
		$pagevar['account']['signdate'] = swap_dot_date($pagevar['account']['signdate']);
		$this->load->view("clients_interface/profile",$pagevar);
	}
	
	private function ExecuteUpdatingProfile($post){
		
		$account = array("id"=>$this->account['id'],"first_name"=>$post['first_name'],"last_name"=>$post['last_name'],"zip_code"=>$post['zip_code'],
						"day_phone"=>$post['day_phone'],"home_phone"=>$post['home_phone'],"address1"=>$post['address1'],"address2"=>$post['address2'],
						"country"=>$post['country'],"state"=>$post['state'],"city"=>$post['city']);
		$this->updateItem(array('update'=>$account,'translit'=>NULL,'model'=>'accounts'));
		return TRUE;
	}
}