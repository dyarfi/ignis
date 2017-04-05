<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site_Article extends Public_Controller {

	public function __construct() {
		parent::__construct();		
		// Load Models
		$this->load->model('article/Articles');
	}

    public function index() {        

        // Set data from page menus
        $data['articles'] = $this->Articles->getAllArticles();
                       
        // Set main template
		$data['main']       = 'articles';
        
		// Set site title page with module menu
		$data['page_title'] =  'Articles';
		
		// Set meta description for html tags in template
		//$this->meta_description = $this->clean_tags($field->text);
		
		// Load admin template
		$this->load->view('template/public/template', $this->load->vars($data));
		
	}

    public function detail($url='') {
        
        // Set detail data from page menus
        $article = $this->Articles->getArticlesByUrl($url);
        
        // Set data from page menus
        $data['article'] = $article;
                       
        // Set main template
		$data['main']       = 'article_detail';
        
		// Set site title page with module menu
		$data['page_title'] =  'Article '.($article->subject ? ' - '.$article->subject : '');
		
		// Set meta description for html tags in template
		//$this->meta_description = $this->clean_tags($field->text);
		
		// Load admin template
		$this->load->view('template/public/template', $this->load->vars($data));
		
	}
}

/* End of file site_page.php */
/* Location: ./application/controllers/site_page.php */