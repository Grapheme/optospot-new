<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Users_interface extends MY_Controller {
	
	public function redactorUploadImage(){
		
		if($this->loginstatus):
			$uploadPath = 'download';
			if(isset($_FILES['file']['name']) && $_FILES['file']['error'] === UPLOAD_ERR_OK):
				if($this->imageResize($_FILES['file']['tmp_name'])):
					$uploadResult = $this->uploadSingleImage(getcwd().'/'.$uploadPath);
					if($uploadResult['status'] === TRUE && !empty($uploadResult['uploadData'])):
						if($this->imageResize($_FILES['file']['tmp_name'],NULL,TRUE,100,100,TRUE)):
							$this->uploadSingleImage(getcwd().'/'.$uploadPath.'/thumbnail','thumb_'.$uploadResult['uploadData']['file_name']);
						endif;
						$file = array(
							'filelink'=>base_url($uploadPath.'/'.$uploadResult['uploadData']['file_name'])
						);
						echo stripslashes(json_encode($file));
					endif;
				endif;
			elseif($_FILES['file']['error'] !== UPLOAD_ERR_OK):
				$message['error'] = $this->getFileUploadErrorMessage($_FILES['file']);
				echo json_encode($message);
			endif;
		endif;
	}
	
	public function redactorUploadedImages(){
		
		if($this->loginstatus):
			$uploadPath = 'download';
			$fullList[0] = $fileList = array('thumb'=>'','image'=>'','title'=>'Изображение','folder'=>'Миниатюры');
			if($listDir = scandir($uploadPath)):
				$index = 0;
				foreach($listDir as $number => $file):
					if(is_file(getcwd().'/'.$uploadPath.'/'.$file)):
						$thumbnail = getcwd().'/'.$uploadPath.'/thumbnail/thumb_'.$file;
						if(file_exists($thumbnail) && is_file($thumbnail)):
							$fileList['thumb'] = site_url($uploadPath.'/thumbnail/thumb_'.$file);
						endif;
						$fileList['image'] = site_url($uploadPath.'/'.$file);
						$fullList[$index] = $fileList;
						$index++;
					endif;
				endforeach;
			endif;
			echo json_encode($fullList);
		endif;
	}
	
	function __construct(){
		
		parent::__construct();
		$this->load->model('languages');
		if($this->loginstatus):
			$this->language = $this->accounts->value($this->account['id'],'language');
		else:
			$this->language = $this->languages->getBaseLnguage();
		endif;
		if($this->uri->segment(1) === FALSE):
			if($this->language_url = $this->languages->value($this->language,'uri')):
				$this->config->set_item('base_url',$this->baseURL.$this->language_url.'/');
				redirect();
			endif;
		elseif($language = $this->languages->languageExist($this->uri->segment(1))):
			$this->language = $language['id'];
			$this->language_url = $language['uri'];
			$this->config->set_item('base_url',$this->baseURL.$this->language_url.'/');
		endif;
	}
	
	public function index(){
		
		$this->load->model(array('pages','languages','category'));
		$dataPage = $this->pages->getHomePage($this->language);
		$pagevar = array(
			'title' => (isset($dataPage[0]['title']) && !empty($dataPage[0]['title']))?$dataPage[0]['title']:'Optospot trading platform',
			'description' => (isset($dataPage[0]['description']) && !empty($dataPage[0]['description']))?$dataPage[0]['description']:'Optospot trading platform',
			'page' => (isset($dataPage))?$dataPage:array(),
			'languages' => $this->languages->visibleLanguages(),
			'main_menu' => $this->pages->readTopMenu($this->language),
			'footer' => array(),
		);
		$pagevar['footer']['category'] = $this->category->getWhere(NULL,array('language'=>$this->language),TRUE);
		$pagevar['footer']['pages'] = $this->pages->getWhere(NULL,array('language'=>$this->language),TRUE);
		$this->load->view("users_interface/index",$pagevar);
	}
	
	public function pages($page_url = ''){
		
		$this->load->model(array('pages','languages','category'));
		$dataPage = $this->pages->readFieldsUrl(noFirstSegment(uri_string()),$this->language);
		if(!$dataPage):
			show_404();
		endif;
		$pagevar = array(
			'title' => (!empty($dataPage['title']))?$dataPage['title']:'Optospot trading platform',
			'description' => $dataPage['description'],
			'content' => $dataPage['content'],
			'active_category' => $dataPage['category'],
			'main_menu' => $this->pages->readTopMenu($this->language),
			'languages' => $this->languages->visibleLanguages(),
			'footer' => array()
		);
		$pagevar['footer']['category'] = $this->category->getWhere(NULL,array('language'=>$this->language),TRUE);
		$pagevar['footer']['pages'] = $this->pages->getWhere(NULL,array('language'=>$this->language),TRUE);
		$this->load->view("users_interface/pages",$pagevar);
	}
	
	public function trade(){
		
		if($this->uri->segment(2) =='trade'):
			redirect('binarnaya-platforma/online-treiding','location',301);
		endif;
		
		$this->load->model(array('pages','languages','category'));
		$dataPage = $this->pages->readFieldsUrl('binarnaya-platforma/online-treiding',$this->language);
		$pagevar = array(
			'title' => (!empty($dataPage['title']))?$dataPage['title']:'Optospot trading platform',
			'description' => $dataPage['description'],
			'content' => $dataPage['content'],
			'languages' => $this->languages->visibleLanguages(),
			'main_menu' => $this->pages->readTopMenu($this->language),
			'client' => array(),
			'footer' => array()
		);
		$pagevar['footer']['category'] = $this->category->getWhere(NULL,array('language'=>$this->language),TRUE);
		$pagevar['footer']['pages'] = $this->pages->getWhere(NULL,array('language'=>$this->language),TRUE);
		if($this->loginstatus):
			$pagevar['client'] = $this->accounts->getWhere($this->account['id']);
			$pagevar['client']['password'] = $this->encrypt->decode($pagevar['client']['trade_password']);
		endif;
		$this->load->view("users_interface/trade",$pagevar);
	}

	public function award() {
		
		$this->load->model(array('pages','languages','category'));
		$dataPage = $this->pages->readFieldsUrl('binarnaya-platforma/online-treiding',$this->language);
		$pagevar = array(
			'title' => (!empty($dataPage['title']))?$dataPage['title']:'Optospot trading platform',
			'description' => $dataPage['description'],
			'content' => $dataPage['content'],
			'languages' => $this->languages->visibleLanguages(),
			'main_menu' => $this->pages->readTopMenu($this->language),
			'client' => array(),
			'footer' => array()
		);
		$pagevar['footer']['category'] = $this->category->getWhere(NULL,array('language'=>$this->language),TRUE);
		$pagevar['footer']['pages'] = $this->pages->getWhere(NULL,array('language'=>$this->language),TRUE);
		if($this->loginstatus):
			$pagevar['client'] = $this->accounts->getWhere($this->account['id']);
			$pagevar['client']['password'] = $this->encrypt->decode($pagevar['client']['trade_password']);
		endif;
		$this->load->view("users_interface/award",$pagevar);
		
	}

	public function chat() {
		
		$this->load->model(array('pages','languages','category'));
		$dataPage = $this->pages->readFieldsUrl('binarnaya-platforma/online-treiding',$this->language);
		$pagevar = array(
			'title' => (!empty($dataPage['title']))?$dataPage['title']:'Optospot trading platform',
			'description' => $dataPage['description'],
			'content' => $dataPage['content'],
			'languages' => $this->languages->visibleLanguages(),
			'main_menu' => $this->pages->readTopMenu($this->language),
			'client' => array(),
			'footer' => array()
		);
		$pagevar['footer']['category'] = $this->category->getWhere(NULL,array('language'=>$this->language),TRUE);
		$pagevar['footer']['pages'] = $this->pages->getWhere(NULL,array('language'=>$this->language),TRUE);
		if($this->loginstatus):
			$pagevar['client'] = $this->accounts->getWhere($this->account['id']);
			$pagevar['client']['password'] = $this->encrypt->decode($pagevar['client']['trade_password']);
		endif;
		$this->load->view("users_interface/chat",$pagevar);
		
	}
	
	public function logoff(){
		
		$this->session->unset_userdata(array('logon'=>'','profile'=>'','account'=>'','backpath'=>''));
		redirect('');
	}
	
	public function forgot_password(){
		
		$statusval = array('status'=>FALSE,'title'=>'<span class="label label-success">Successfully</span>','message'=>'New password sent to your email');
		$user_email = trim($this->input->post('user_email'));
		if(!$user_email):
			show_404();
		endif;
		$user_id = $this->mdusers->user_exist('email',trim($user_email));
		if($user_id):
			$user = $this->mdusers->read_record($user_id,'users');
			ob_start();?>
<p>Dear <em><?=$user['first_name'].' '.$user['last_name'];?></em>,</p>
<p>You have requested a new password to access the site <?=anchor('','Optospot trading platform');?></p>
<p>Login: <?=$user['trade_login'];?><br/>Password: <?=$this->encrypt->decode($user['trade_password']);?></p>
		<?php	$mailtext = ob_get_clean();
			$this->sendMail($user['email'],'robot@sysfx.com','Optospot trading platform','Requested a new password to optospot.net',$mailtext);
			$statusval['status'] = TRUE;
			$this->session->set_userdata('msgs','Password changed.');
		else:
			$statusval['title'] = '<span class="label label-warning">Specified Email does not exist</span>';
		endif;
		echo json_encode($statusval);
	}

	public function getSignupAccount(){
		
		$where['active'] = 1;
		$where['signdate'] = date('Y-m-d');
		if($days = $this->uri->segment(2)):
			$where['signdate'] = date('Y-m-d',time()-$days*86400);
		endif;
		$this->load->model('accounts');
		$accounts = $this->accounts->getFields('first_name,last_name,email,signdate,demo',$where);
		if($this->input->get('mode') == 'text'):
			print_r($where['signdate']);echo "<br/>";
			print_r($accounts);
		else:
			return $accounts;
		endif;
	}

	public function registering(){
		
		
		$this->load->model(array('pages','languages','category'));
		$dataPage = $this->pages->getHomePage($this->language);
		$pagevar = array(
			'title' => (isset($dataPage[0]['title']) && !empty($dataPage[0]['title']))?$dataPage[0]['title']:'Optospot trading platform',
			'description' => (isset($dataPage[0]['description']) && !empty($dataPage[0]['description']))?$dataPage[0]['description']:'Optospot trading platform',
			'page' => (isset($dataPage))?$dataPage:array(),
			'languages' => $this->languages->visibleLanguages(),
			'main_menu' => $this->pages->readTopMenu($this->language),
			'footer' => array(),
		);
		$pagevar['footer']['category'] = $this->category->getWhere(NULL,array('language'=>$this->language),TRUE);
		$pagevar['footer']['pages'] = $this->pages->getWhere(NULL,array('language'=>$this->language),TRUE);
		$this->load->view("users_interface/registering",$pagevar);
	}
}