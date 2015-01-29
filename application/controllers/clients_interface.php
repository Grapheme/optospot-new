<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Clients_interface extends MY_Controller {
	
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
			'accounts'=>array(),
			'msgs' => '',
			'msgr' => ''
		);
		$dengiOnLineAccount = $this->getTradeAccountInfoDengiOnLine();
		$rbkMoneyAccount = $this->getTradeAccountInfoRBKMoney();
		$okPayAccount = $this->getTradeAccountInfoOkPay();
//		$astroPay = $this->getTradeAccountAstroPay();
		$pagevar['accounts'] = array(
			'rbkmoney'=>$rbkMoneyAccount['accounts'],
			'dengionline'=>$dengiOnLineAccount['accounts'],
			'okpay'=>$okPayAccount['accounts'],
//			'astropay'=>$astroPay['accounts']
		);
		$pagevar['accounts']['dengionline']['deposit'] = $this->settings->value(3,'link').';'.$dengiOnLineAccount['action_deposit'];
		$pagevar['accounts']['rbkmoney']['deposit'] = $this->settings->value(4,'link').';'.$rbkMoneyAccount['action_deposit'];
		$pagevar['accounts']['okpay']['deposit'] = $this->settings->value(5,'link').';'.$okPayAccount['action_deposit'];
//		$pagevar['accounts']['astropay']['deposit'] = $this->settings->value(6,'link').';'.$astroPay['action_deposit'];

		if($this->input->get('status') == 'success'):
			$pagevar['msgs'] = $this->localization->getLocalMessage('payment','success');
		endif;
		if($this->input->get('status') == 'failure'):
			$pagevar['msgr'] = $this->localization->getLocalMessage('payment','failure');
		endif;
		$pagevar['accounts']['dengionline']['information'] = $this->localization->getLocalMessage('dengionline','deposit_info');
		$pagevar['accounts']['rbkmoney']['information'] = $this->localization->getLocalMessage('rbkmoney','deposit_info');
		$pagevar['accounts']['okpay']['information'] = $this->localization->getLocalMessage('okpay','deposit_info');
//		$pagevar['accounts']['astropay']['information'] = $this->localization->getLocalMessage('astropay','deposit_info');
		$this->load->view("clients_interface/balance",$pagevar);
	}
	
	public function withdraw(){
		
		/*if($this->isDemoRegisterRealAccount()):
			return TRUE;
		endif;*/
		
		$this->load->model(array('settings','users_documents'));
		$pagevar = array(
			'title' => $this->localization->getWithdrawPlace('client_cabinet','balance_title'),
			'description' => $this->localization->getWithdrawPlace('client_cabinet','balance_description'),
			'action_deposit'=> $this->settings->value(3,'link'),
			'documents' => $this->users_documents->getWhere(NULL,array('user_id'=>$this->account['id']),TRUE),
			'msgs' => '',
			'msgr' => ''
		);
		$hasNotApprovedDocuments = FALSE;
		if (count($pagevar['documents'])):
			foreach($pagevar['documents'] as $document):
				if ($document['approved'] == 0):
					$hasNotApprovedDocuments = TRUE;
					break;
				endif;
			endforeach;
		endif;
		if ($hasNotApprovedDocuments || count($pagevar['documents']) == 0):
			$pagevar['title'] = $this->localization->getUserDocuments('client_cabinet','title');
			$pagevar['description'] = $this->localization->getUserDocuments('client_cabinet','description');
			$this->load->view("clients_interface/documents",$pagevar);
		else:
			$this->load->view("clients_interface/withdraw",$pagevar);
		endif;
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
	
	public function openAccount(){
		
		$pagevar = array('msgs' => '','msgr' => '','accounts' =>array());
		if($accounts = $this->accounts->getWhere(NULL,array('email'=>$this->profile['email']),TRUE)):
			foreach($accounts as $account):
				$pagevar['accounts'][$account['demo']] = $account;
			endforeach;
		endif;
		if($this->input->get('reg') == 'real' && !isset($pagevar['accounts'][0])):
			$pagevar['title'] = $this->localization->getLocalMessage('client_cabinet','real_reg_title');
			$pagevar['description'] = $this->localization->getLocalMessage('client_cabinet','real_reg_description');
			$this->load->view("clients_interface/register-real-account",$pagevar);
		elseif($this->input->get('reg') == 'demo' && !isset($pagevar['accounts'][1])):
			$pagevar['title'] = $this->localization->getLocalMessage('client_cabinet','real_demo_title');
			$pagevar['description'] = $this->localization->getLocalMessage('client_cabinet','real_demo_description');
			$this->load->view("clients_interface/register-demo-account",$pagevar);
		else:
			show_404();
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
	
	public function myAccounts(){
		
		$pagevar = array(
			'title' => $this->localization->getLocalMessage('client_cabinet','my_accounts_title'),
			'description' => $this->localization->getLocalMessage('client_cabinet','my_accounts_description'),
			'accounts' => array(),
			'langs' => $this->languages->getAll(),
		);
		if($accounts = $this->accounts->getWhere(NULL,array('email'=>$this->profile['email']),TRUE)):
			foreach($accounts as $account):
				$pagevar['accounts'][$account['demo']] = $account;
			endforeach;
		endif;
		
		$this->load->view("clients_interface/my-accounts",$pagevar);
	}
	
	private function ExecuteUpdatingProfile($post){
		
		$account = array("id"=>$this->account['id'],"first_name"=>$post['first_name'],"last_name"=>$post['last_name'],"zip_code"=>$post['zip_code'],
						"day_phone"=>$post['day_phone'],"home_phone"=>$post['home_phone'],"address1"=>$post['address1'],"address2"=>$post['address2'],
						"country"=>$post['country'],"state"=>$post['state'],"city"=>$post['city']);
		$this->updateItem(array('update'=>$account,'translit'=>NULL,'model'=>'accounts'));
		return TRUE;
	}

	public function uploadWithdrawDocument(){

		$uploadPath = 'download/accounts';
		if(isset($_FILES['file']['name']) && $_FILES['file']['error'] === UPLOAD_ERR_OK):
			if($uploadResult = $this->uploadSingleImage(getcwd().'/'.$uploadPath,'tif|tiff|gif|jpg|png|pdf')):
				$insert = array('user_id'=>$this->account['id'],'path'=>$uploadPath.'/'.$uploadResult,'original_name'=>$_FILES['file']['name'],'filesize'=>$_FILES['file']['size'],'mimetype'=>$_FILES['file']['type'],'approved'=>0,'created_at'=>date('Y-m-d H:i:s'));
				$this->db->insert('users_documents',$insert);
			endif;
		endif;
		redirect($this->language.'/cabinet/withdraw');
	}
}