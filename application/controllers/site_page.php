<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site_Page extends Public_Controller {

	public function __construct() {
		parent::__construct();		
		// Load Models
		$this->load->model('page/Pages');
	}
    
    public function detail($url='') {
        
        // Set detail 
        $page = $this->Pages->getPageByUrl($url);
        
        // Set data from page menus
        $data['page'] = $page;
        
        // Set data from page menus
        $data['upload_path'] = 'uploads/pagemenus/';
                
        // Set main template
		$data['main']       = 'page_detail';
        
		// Set site title page with module menu
		$data['page_title'] =  'Page '.($page->subject ? ' - '.$page->subject : '');
		
		// Set meta description for html tags in template
		//$this->meta_description = $this->clean_tags($field->text);
		
		// Load admin template
		$this->load->view('template/public/template', $this->load->vars($data));
		
	}
}

/* End of file site_page.php */
/* Location: ./application/controllers/site_page.php */