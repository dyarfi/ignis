<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

/*
| -------------------------------------------------------------------------
| MODULE ADMIN PANEL ROUTING - [START]
| -------------------------------------------------------------------------
*/

$admin = (ADMIN) ? str_replace('/', '', ADMIN) : '';

$route[$admin]						= "admin/authenticate";
$route[$admin.'/authenticate']		= "admin/authenticate/index";
$route[$admin.'/authenticate/(:any)']	= "admin/authenticate/$1";

/***** Administrator module menu mandatory [start] *****/
$route[$admin.'/dashboard/(:any)']	= 'admin/dashboard/$1';
$route[$admin.'/user/(:any)']		= 'admin/user/$1';
$route[$admin.'/usergroup/(:any)']	= 'admin/usergroup/$1';
$route[$admin.'/language/(:any)']	= 'admin/language/$1';
$route[$admin.'/modulelist/(:any)']	= 'admin/modulelist/$1';
$route[$admin.'/setting/(:any)']	= 'admin/setting/$1';
//$route[$admin.'/serverlog/(:any)']	= 'admin/serverlog/$1';
/***** Administrator module menu mandatory [end] *****/

//$route[$admin.'/career/(:any)']		= 'career/$1';
//$route[$admin.'/division/(:any)']	= 'career/division/$1';
//$route[$admin.'/applicant/(:any)']	= 'career/applicant/$1';
//$route[$admin.'/employee/(:any)']	= 'career/employee/$1';

$route[$admin.'/page/(:any)']		= 'page/$1';
$route[$admin.'/pagemenu/(:any)']	= 'page/pagemenu/$1';
$route[$admin.'/page_gallery/(:any)']  = 'page/page_gallery/$1';

$route[$admin.'/article/(:any)']	 = 'article/$1';
$route[$admin.'/article_gallery/(:any)']  = 'article/article_gallery/$1';

// Participant and Attachment Routes
$route[$admin.'/participant/(:any)']			= 'participant/$1';
$route[$admin.'/driveparticipant/(:any)']		= 'participant/driveparticipant/$1';

/*
| -------------------------------------------------------------------------
| MODULE ADMIN PANEL ROUTING - [END]
| -------------------------------------------------------------------------
*/
$route['page/terms-and-conditions'] = 'site_page/detail/terms-and-conditions';
$route['page/privacy']		   		= 'site_page/detail/privacy';

$route['articles']				= 'site_article';
$route['read/article/(:any)']	= 'site_article/detail/$1';

/*** Rap Battle ***/
$route['rapbattle']				= 'site_page/detail/rapbattle';

//$route['quiz']					= 'site_quiz';
//$route['quiz/participated']		= 'site_quiz/participated';
$route['participated']		= 'home/participated';

$route['default_controller'] 	 = 'home';
//$route['example'] 		 = 'example/request_dropbox';
//$route['(:any)']			 = 'home/menu/$1';
//$route['(:any)/page/(:any)'] = 'home/page/$1/$2';
$route['download/(:num)']	 = 'download';
$route['404_override']		 = '';

/* End of file routes.php */
/* Location: ./application/config/routes.php */
