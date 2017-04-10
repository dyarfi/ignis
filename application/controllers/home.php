<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// Preset PHP settings
error_reporting(E_ALL);
ini_set('display_errors', 1);

class Home extends Public_Controller {

	public $participant = '';

	public function __construct() {

		parent::__construct();

		// Load User related model in admin module
		$this->load->model('admin/Users');
		$this->load->model('admin/UserProfiles');

		// Load Setting data
		$this->load->model('admin/Settings');
		// Load CAPTCHA model
		$this->load->model('Captcha');

		// Load User related model in admin module
		$this->load->model('article/Articles');
		$this->load->model('participant/Participants');

		// Check if session was made
		if ($this->session->userdata('participant')) {

			// Set temporary data
			$this->_participant = $this->Participants->getParticipant($this->session->userdata('participant')->id);

			// Unset data from session
			unset($this->participant);
			$this->session->unset_userdata('participant');

			// Set new data and to session
			$this->participant = $this->_participant;
			$this->session->set_userdata('participant',$this->participant);

		}

	}

	public function index() {

		// Set Participant
		if (@$this->participant->completed == 1 && @$this->participant->status == 1) {

			redirect('participated','refresh');

		}

		// Set articles data
		$data['articles'] =	$this->Articles->getAllArticles();

		// Set site title page with module menu
		$data['page_title'] = 'Suzuki Ignis Indonesia';

		// Set contact email info data
		$data['email_info']	= $this->Settings->getByParameter('email_info');

		// Set contactus address info data
		$data['contactus_address']	= $this->Settings->getByParameter('contactus_address');

		// Load participant data if existed
		$data['participant'] 	= $this->participant;

		// Captcha data
		$data['captcha']	= $this->Captcha->image();

		// Set main template
		$data['main'] = 'home';

		// Load js execution
		//$data['js_inline'] = "$('.popup_account').click()";
		$data['js_inline'] = "";

		// Load js execution
		$data['js_inline'] .= "";

		// Load site template
		$this->load->view('template/public/template', $this->load->vars($data));

	}

	public function menu ($menu='') {

		// Set menu data
		$data['menu'] = $menu;

		// Set pages data
		$data['pages'] = $this->Pagemenus->getPagesByMenu($menu);
		//exit('asdf');
		// Set main template
		$data['main'] = 'home';

		// Load admin template
		$this->load->view('page', $this->load->vars($data));
	}

	public function page ($menu='',$page='') {

		// Set menu data
		$data['menu'] = $menu;

		// Set pages data
		$data['page'] = $this->Pages->getPageByName($page);

		//print_r($data['pages']);

		// Set main template
		//$data['main'] = 'page';

		// Load admin template
		$this->load->view('page_detail', $this->load->vars($data));
	}

	// Redirect if particpant already participated
	public function participated () {
		// Set articles data
		$data['articles'] =	$this->Articles->getAllArticles();

		// Set site title page with module menu
		$data['page_title'] = 'Suzuki Ignis Indonesia';

		// Set contact email info data
		$data['email_info']	= $this->Settings->getByParameter('email_info');

		// Set contactus address info data
		$data['contactus_address']	= $this->Settings->getByParameter('contactus_address');

		// Load participant data if existed
		$data['participant'] 	= $this->participant;

		// Captcha data
		$data['captcha']	= $this->Captcha->image();

		// Set main template
		$data['main'] = 'participated';

		// Load js execution
		$data['js_inline'] = "$.get('http://aw.dw.impact-ad.jp/c/map/?oid=dax.079a2cbe7270&cid={$this->participant->phone_number}&sp=jak');";

		// Load site template
		$this->load->view('template/public/template', $this->load->vars($data));

	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */
