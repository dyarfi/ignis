<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// Preset PHP settings
error_reporting(E_ALL);
ini_set('display_errors', 1);

class Home extends Public_Controller {

	public $participant = '';

	public function __construct() {

		parent::__construct();

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

		// Check if Participant already completed
		if (@$this->participant->completed == 1 && @$this->participant->status == 1) {

			// Redirect to user landing page
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

		$data['js_files_ext'] = [
			"https://maps.google.com/maps/api/js?key=AIzaSyDbboZY7KeTOi5V6-zJNUsQG_-THlw6tyQ&amp;language=id&amp;region=ID",
			//base_url('assets/public/js/locator.js')
		];

		// Load js execution
		//$data['js_inline'] = "$('.popup_account').click()";
		$data['js_inline'] = "initialize();";

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

		// Set main template
		//$data['main'] = 'page';

		// Load admin template
		$this->load->view('page_detail', $this->load->vars($data));
	}

	// Redirect if particpant already participated
	public function participated () {

		// Check if Participant already completed
		if (!$this->participant) {

			// Redirect to user landing page
			redirect(base_url(),'refresh');

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
		$data['main'] = 'participated';

		// Load js execution
		$data['js_inline'] = "(new Image()).src = '//aw.dw.impact-ad.jp/c/map/?oid=dax.079a2cbe7270&cid={$this->participant->phone_number}&sp=jak';";

		// Load js execution
		$data['js_files_ext'] = ["//pixel.mathtag.com/event/js?mt_id=1159527&mt_adid=185618&s1=".base_url()."&s2=".$this->agent->referrer()."&s3=".$this->config->item('language').""];

		// Load site template
		$this->load->view('template/public/template', $this->load->vars($data));

	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */
