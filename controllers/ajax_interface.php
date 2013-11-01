<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Ajax_interface extends MY_Controller{
	
	function __construct(){
		
		parent::__construct();
	}
	
	/******************************************** guests interface *******************************************************/
	
	public function loginIn(){
		
		if(!$this->input->is_ajax_request()):
			show_error('В доступе отказано');
		endif;
		$json_request = array('status'=>FALSE,'responseText'=>'','redirect'=>site_url());
		if($this->postDataValidation('signin') == TRUE):
			if($user = $this->accounts->authentication($_POST['login'],$_POST['password'])):
				$json_request['status'] = TRUE;
				$json_request['message'] = '';
				$this->setLoginSession($user['id']);
				$json_request['responseText'] = $this->localization->getLocalMessage('signin','login_success');
				if($user['id'] == 0):
					$json_request['redirect'] = site_url(ADMIN_START_PAGE);
				else:
					$this->config->set_item('base_url',$this->baseURL.$this->uri->segment(1).'/');
					$json_request['redirect'] = site_url(USER_START_PAGE);
				endif;
			else:
				$json_request['responseText'] = $this->localization->getLocalMessage('signin','failure');
			endif;
		else:
			$json_request['responseText'] = $this->localization->getLocalMessage('signin','failure');
		endif;
		echo json_encode($json_request);
	}
	
	public function signUp(){
		
		if(!$this->input->is_ajax_request()):
			show_error('В доступе отказано');
		endif;
		$json_request = array('status'=>FALSE,'responseText'=>'','redirect'=>site_url());
		if($this->postDataValidation('signup') == TRUE):
			if($this->accounts->search('email',$this->input->post('email')) === FALSE):
				if($resultData = $this->sendResisterData($this->input->post())):
					$mailtext = $this->load->view('mails/signup',array('account'=>$resultData['accountID'],'reg_data'=>$resultData),TRUE);
					$this->sendMail($this->input->post('email'),'robot@sysfx.com','Optospot trading platform','Welcome to Optospot.net',$mailtext);
					$this->setLoginSession($resultData['accountID']);
					$this->config->set_item('base_url',$this->baseURL.$this->uri->segment(1).'/');
					$json_request['responseText'] = $this->localization->getLocalMessage('signup','register_success');
					$json_request['redirect'] = site_url(USER_START_PAGE);
					$json_request['status'] = TRUE;
				else:
					$json_request['responseText'] = $this->localization->getLocalMessage('signup','server_failure');
				endif;
			else:
				$json_request['responseText'] = $this->localization->getLocalMessage('signup','email_exit');
			endif;
		else:
			$json_request['responseText'] = $this->localization->getLocalMessage('signup','failure');
		endif;
		echo json_encode($json_request);
	}
	
	public function createRealAccount(){
		
		if(!$this->input->is_ajax_request()):
			show_error('В доступе отказано');
		endif;
		$json_request = array('status'=>FALSE,'responseText'=>'','redirect'=>site_url());
		if($this->postDataValidation('signup') == TRUE):
			$registerData = $this->input->post();
			$registerData['coach'] = 0;
			if($resultData = $this->sendResisterData($registerData)):
				$mailtext = $this->load->view('mails/signup',array('account'=>$registerData,'reg_data'=>$resultData),TRUE);
				$this->sendMail($registerData['email'],'robot@sysfx.com','Optospot trading platform','Welcome to Optospot.net',$mailtext);
				$json_request['status'] = TRUE;
				$this->setLoginSession($resultData['accountID']);
				$this->profile = $this->accounts->getWhere($resultData['accountID']);
				$this->session->set_userdata('profile',json_encode($this->profile));
				$json_request['redirect'] = site_url($this->uri->segment(1).'/cabinet/balance');
			else:
				$json_request['responseText'] = $this->localization->getLocalMessage('signup','failure');
			endif;
		else:
			$json_request['responseText'] = $this->localization->getLocalMessage('signup','failure');
		endif;
		echo json_encode($json_request);
	}
	
	public function forgotPassword(){
		
		if(!$this->input->is_ajax_request()):
			show_error('В доступе отказано');
		endif;
		$json_request = array('status'=>FALSE,'responseText'=>'','redirect'=>FALSE);
		if($this->postDataValidation('forgot') == TRUE):
			if($account = $this->accounts->getWhere(NULL,array('email'=>$_POST['email']))):
				$mailtext = $this->load->view('mails/forgot',$account,TRUE);
				$this->sendMail($account['email'],'robot@sysfx.com','Optospot trading platform','Requested a new password to optospot.net',$mailtext);
				$json_request['status'] = TRUE;
				$json_request['responseText'] = $this->localization->getLocalMessage('forgot','success');
			else:
				$json_request['responseText'] = $this->localization->getLocalMessage('forgot','error');
			endif;
		else:
			$json_request['responseText'] = $this->localization->getLocalMessage('forgot','valid_email');
		endif;
		echo json_encode($json_request);
	}
	
	public function getChartLink(){
		
		if(!$this->input->is_ajax_request()):
			show_error('В доступе отказано');
		endif;
		$this->load->model('settings');
		echo json_encode(array('vlink'=>$this->settings->value(2,'link')));
	}

	public function sendResisterData($registerData = FALSE){
		
		if(file_exists(getcwd().'/BaseJsonRpcClient.php') && $registerData !== FALSE):
			include getcwd().'/BaseJsonRpcClient.php';
			$this->load->model(array('settings'));
			$client = new BaseJsonRpcClient($this->settings->value(1,'link'));
			$demoStatus = TRUE;
			if($registerData['account_type'] == 1):
				$registerData['mode'] = 'demo';
				$schema = 'edforex184';
			else:
				$registerData['mode'] = 'real';
				$schema = 'eforex184';
				$demoStatus = FALSE;
			endif;
			$params = array('providerId'=>'ICTS','fields'=>array('fname'=>$registerData['fname'],'lname'=>$registerData['lname'],'schema$'=>$schema,'office'=>'Main','Send_Email'=>'N','email'=>$registerData['email'],'phone'=>'','Gen_Login'=> 'COMPANY'));
			if($registerData['account_type'] == 1):
				$params['fields']['Balance'] = '1000';
			endif;
			$response = $client->registrate($params);
			if(!empty($response->Result)):
				$registerData['remote_id'] = intval($response->Result['ACCOUNT']);
				$registerData['trade_login'] = (string)$response->Result['LOGIN'];
				$registerData['password'] = (string)$response->Result['PASSWORD'];
				$this->load->model('languages');
				$registerData['language'] = $this->languages->getLanguageID($this->uri->segment(1));
				if($registerData['remote_id']):
					if($accountID = $this->ExecuteCreatingAccount($registerData)):
						return array('accountID'=>$accountID,'demoStatus'=>$demoStatus,'login'=>$registerData['trade_login'],'password'=>$registerData['password']);
					endif;
				endif;
			else:
				$this->registerLoging($response);
				$statusval['message'] = $this->localization->getLocalMessage('signup','server_failure');
			endif;
		endif;
		return FALSE;
	}
	
	private function ExecuteCreatingAccount($registerData = NULL){
		
		$demo = 0;
		if($registerData['mode'] == 'demo'):
			$demo = 1;
		endif;
		if(!isset($registerData['coach'])):
			$registerData['coach'] = 1;

		endif;
		$this->load->library('encrypt');
		$account = array("remote_id"=>$registerData['remote_id'],'demo'=>$demo,'first_name'=>$registerData['fname'],'last_name'=>$registerData['lname'],
			'email'=>$registerData['email'],'country'=>$registerData['country'],'day_phone'=>'','coach'=>$registerData['coach'],
			'password'=>md5($registerData['password']),'trade_login'=>$registerData['trade_login'],'trade_password'=>$this->encrypt->encode($registerData['password']),
			'signdate'=>date("Y-m-d"),'language'=>$registerData['language']);
		return $this->insertItem(array('insert'=>$account,'model'=>'accounts'));
	}
	
	private function registerLoging($loginResponse = NULL){
		
		$log = array('method'=>'','fields'=>'','Error'=>'','Result'=>'');
		if(!is_null($loginResponse)):
			if(isset($loginResponse->Method)):
				$log['method'] = $loginResponse->Method;
			endif;
			if(isset($loginResponse->Params[0]['fields']) && !empty($loginResponse->Params[0]['fields'])):
				$log['fields'] = $loginResponse->Params[0]['fields'];
			endif;
			if(isset($loginResponse->Error) && !empty($loginResponse->Error)):
				$log['Error'] = $loginResponse->Error;
			endif;
			if(isset($loginResponse->Result) && !empty($loginResponse->Result)):
				$log['Result'] = $loginResponse->Result;
			endif;
		endif;
		$insert = array('data'=>json_encode($log));
		return $this->insertItem(array('insert'=>$insert,'model'=>'log'));
	}
}