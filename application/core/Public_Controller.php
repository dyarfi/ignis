<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Public_Controller extends MY_Controller {
    
    // Set public controller variable
	public $session_id = '';

	// Set empty participant data
	public $participant = '';

	// Set public logged in
	public $logged_in = true;

    public function __construct() {
		
        parent::__construct();
        
        // Get libraries from system
        $this->load->library('user_agent');
		//$this->load->library('Template');

		// Load site models
		$this->load->model('admin/Configurations');
		//$this->load->model('admin/ServerLogs');
		$this->load->model('admin/Settings');
		$this->load->model('page/PageMenus');        
        $this->load->model('participant/Participants');        
        $this->load->model('participant/Attachments');
		
		// Set default site copyright
		$this->config->set_item('title_name', $this->Settings->getByParameter('title_name')->value);
		$this->config->set_item('site_title', $this->Settings->getByParameter('title_default')->value);
		$this->config->set_item('copyright', $this->Settings->getByParameter('copyright')->value);
		
		// Set site logo
        $this->logo     		= $this->Settings->getByParameter('site_logo');
        
        // Set small site logo
        $this->small_logo		= $this->Settings->getByParameter('site_logo_admin');
        
        // Set menus
		$this->menus       		= $this->PageMenus->getAllPageMenu();
      
        // Set social media links
        $this->twitter     = $this->Settings->getByParameter('socmed_twitter');        
        $this->facebook    = $this->Settings->getByParameter('socmed_facebook');
        $this->pinterest   = $this->Settings->getByParameter('socmed_pinterest');        
        $this->linkedin    = $this->Settings->getByParameter('socmed_linkedin');
        $this->youtube     = $this->Settings->getByParameter('socmed_youtube');
        // Contact information
        $this->email_info  = $this->Settings->getByParameter('email_info');
        $this->ext_link	   = $this->Settings->getByParameter('ext_link');
        $this->no_phone	   = $this->Settings->getByParameter('no_phone');
        $this->title_name  = $this->Settings->getByParameter('title_name');
        $this->gmap  	   = $this->Settings->getByParameter('contactus_gmap');        
        $this->copyright    = $this->Settings->getByParameter('copyright');
        $this->ga_analytics = $this->Settings->getByParameter('google_analytics');

		// Set site status default
		self::getSiteStatus();
		
		// Set site user access logs
		//self::setAccessLog(1);
		
		if($this->config->item('site_open') === FALSE)
        {
            show_error('Sorry the site is shut for now for maintenance.',false);
        }
	
        if( $this->agent->is_mobile() )
        {
            /*
             * Use my template library to set a theme for your staff
             *     http://philsturgeon.co.uk/code/codeigniter-template
             */
            //$this->template->set_theme('mobile');
		} else {
			// $this->template->set_theme('default');
		}

		// Set participant session objects
		$this->participant = $this->session->userdata('participant');
		
		//$user->id 			= 1;
		//$user->status 		= 0;
		//$this->participant  	= $user;

		// if (! $this->session->userdata('participant')) {

			// Set public to logged in
			// $this->logged_in = false;

		//} else {
			
			// Set temporary participant data
			//$this->participant = $this->session->userdata ('participant');

		//}

		//print_r($this->session->userdata ('participant'));
		
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

    }
	
	protected function getSiteStatus() {
		
		// Get value from tbl_configurations for maintenance
		if ($this->Configurations->getConfiguration_ByParam('maintenance')) {
			
			// Set config value for default
			$this->config->set_item('site_open', FALSE);
			
		}
		
	}
	
	protected function setAccessLog($public='') {
		
        // Set site session id
        $this->session_id = $this->session->userdata('session_id');
        
		// Set user agents and platform
		$user_agents['user_agent']	= $this->agent->agent;
		$user_agents['platform']	= $this->agent->platform;
		$user_agents['browser']		= $this->agent->browser;
        $ip_address = $this->input->ip_address();
        
		if ($public) {
			// Set ServerLog data
			$object = array(
				'session_id'	=> $this->session_id,
				'url'			=> base_url(uri_string()),
				'user_id'		=> @$object['user_id'],	
				'status_code'	=> $status_code[http_response_code()],	
				'bytes_served'	=> @$object['bytes_served'],	
				'total_time'	=> $this->benchmark->marker['total_execution_time_start'],	
				'ip_address'	=> $ip_address,	
				'geolocation'	=> '',
				'http_code'		=> http_response_code(),	
				'referrer'		=> ($this->agent->is_referral()) ? $this->agent->referrer() : '',			
				'user_agent'	=> json_encode($user_agents),
				'is_mobile'		=> $this->agent->is_mobile,
				'status'		=> 1,
				'added'			=> time()
			);            
		}
        
		// Set value for ServerLogs
		$this->ServerLogs->setServerLog($object);
	}
	
}