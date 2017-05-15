<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//======================== Administrator Access - start config - ========================//

$config['module_list.models']			= array('admin/ModuleLists');
$config['module_list.module_menu']		= array('modulelist/index'  => 'Module Lists');
$config['module_list.module_function']	= array(
											'modulelist/edit'   => 'Edit Module',
											'modulelist/trash'	=> 'Delete User Permission'
										);

/* MODULE MENU
 *
 * Current MENU is only set to user and setting
 * Accessed by administrators only
 *
 */

// Module Menu List
$config['admin_list.module_menu']	= array(
			'userhistory/index' => 'User Histories',
			'dashboard/index'   => 'Dashboard Panel',
			'user/index'	    => 'Users',
			'usergroup/index'   => 'User Groups',
			//'language/index'    => 'Languages',
			'setting/index'	    => 'Settings'
		);

/* MODULE FUNCTION
 *
 * Current FUNCTION is only set to user and setting
 * Accessed by administrators only
 */

// Module Function Menu List
$config['admin_list.module_function']	= array(
			'dashboard/add'	    => 'Add New Dashboard',
			'dashboard/view'    => 'View Dashboard',
			'dashboard/edit'    => 'Edit Dashboard',
			'dashboard/delete'  => 'Delete Dashboard',
		);

//======================== Administrator Access - end config - ========================//

// Default modules
$config['modulelist'] = array(
	// Admin module
	'Admin' => array(
		// Admin Models list
		'models'	=> array(
			'admin/Users',
			'admin/UserProfiles',
			'admin/UserHistories',
			'admin/ModulePermissions',
			'admin/UserGroupPermissions',
			'admin/Languages',
			'admin/Settings',
			//'admin/ServerLogs',
			'admin/Sessions'
		),
		// Admin module menus
		'module_menu'	=> array(
			// Dashboard index
			'dashboard/index'   => 'Dashboard Panel',
			// User index
			'user/index'	    => 'Users',
			// User Group index
			'usergroup/index'   => 'User Groups',
			// Setting index
			'setting/index'     => 'Settings',
			// Server Log index
			//'serverlog/index'   => 'Server Logs'
		),
		// Admin module functions
		'module_function'	=> array(
			// Dashboard functions
			'dashboard/add'	    => 'Add New Dashboard',
			'dashboard/view'    => 'View Dashboard',
			'dashboard/edit'    => 'Edit Dashboard',
			'dashboard/delete'  => 'Delete Dashboard',
			'dashboard/change'  => 'Change Dashboard Status',
			// User functions
			'user/add'	    => 'Add User',
			'user/view'	    => 'View User',
			'user/edit'	    => 'Edit User',
			'user/delete'	=> 'Delete User',
			'user/change'	=> 'Change User Status',
			'user/image'	=> 'Change User Image', /** Upload temp user image **/
			'user/upload'	=> 'Upload User Image', /** Upload user image **/
			'user/export'	=> 'Export User Data', /** Export user data  **/
			// User Group functions
			'usergroup/add'	    => 'Add User Group',
			'usergroup/view'    => 'View User Group',
			'usergroup/edit'    => 'Edit User Group',
			'usergroup/delete'  => 'Delete User Group',
			'usergroup/change'  => 'Change User Group Status',
			'usergroup/export'	=> 'Export User Group Data', /** Export User Group data  **/
			// Setting functions
			'setting/add'	    => 'Add Setting',
			'setting/view'	    => 'View Setting',
			'setting/edit'	    => 'Edit Setting',
			'setting/delete'    => 'Delete Setting',
			'setting/change'    => 'Change Setting Status'
		)
	),
	// Page module
	'Page' => array (
		// Page Models list
			'models'		=> array('page/Pages','page/PageMenus'),
		// Page module menus
		'module_menu'	=> array(
			'page/index'		=> 'Pages',
			'pagemenu/index'	=> 'Page Menus'),
		// Page module functions
		'module_function'	=> array(
			// Page functions
			'page/index/add'	=> 'Add Page',
			'page/index/view'	=> 'View Page',
			'page/index/edit'	=> 'Edit Page',
			'page/index/delete'	=> 'Delete Page',
			'page/index/change'	=> 'Change Page Status',
			'page/index/export'	=> 'Export Page',
			'page/index/print'	=> 'Print Page',
			// Pages Gallery functions
            //'page_gallery/index'        => 'Gallery',
            //'page_gallery/index/add'	=> 'Add Gallery',
            //'page_gallery/index/view'	=> 'View Gallery',
            //'page_gallery/index/edit'	=> 'Edit Gallery',
            //'page_gallery/index/delete' => 'Delete Gallery',
            //'page_gallery/index/change' => 'Change Gallery',
            //'page_gallery/index/export' => 'Export Gallery',
            //'page_gallery/index/print'	=> 'Print Gallery',
            //'page_gallery/index/upload_file'	=> 'Upload Gallery',
			// Page Menu functions
			'pagemenu/index/add'	=> 'Add Page Menu',
			'pagemenu/index/view'	=> 'View Page Menu',
			'pagemenu/index/edit'	=> 'Edit Page Menu',
			'pagemenu/index/delete'	=> 'Delete Page Menu',
			'pagemenu/index/change'	=> 'Change Page Menu Status',
			'pagemenu/index/export'	=> 'Export Page Menu',
			'pagemenu/index/print'	=> 'Print Page Menu'
	    ),
	),
    // Participant Module
    'Participant' => array(// Career Models list
			'models'    => array('participant/Participants'),
		// Participant module menus
		'module_menu'		=> array(
            'participant/index' => 'IIMS & KOKAS Participant',
            'driveparticipant/index' => 'Test Drive Participant'
        ),
		'module_function'	=> array(
            // Participant functions
            'participant/index/add'	    => 'Add Participant',
            'participant/index/view'    => 'View Participant',
            'participant/index/edit'    => 'Edit Participant',
            'participant/index/delete'  => 'Delete Participant',
            'participant/index/change'  => 'Change Participant Status',
            'participant/index/export'  => 'Export Participant',
            'participant/index/print'   => 'Print Participant',
            // Participant Drive functions
            'driveparticipant/index/add'	 => 'Add Drive Participant',
            'driveparticipant/index/view'    => 'View Drive Participant',
            'driveparticipant/index/edit'    => 'Edit Drive Participant',
            'driveparticipant/index/delete'  => 'Delete Drive Participant',
            'driveparticipant/index/change'  => 'Change Drive Participant Status',
            'driveparticipant/index/export'  => 'Export Drive Participant',
            'driveparticipant/index/print'   => 'Print Drive Participant'
        )
	),
    // Article module
	'Article' => array (
		// Article Models list
		'models'		=> array('article/Articles'),

		// Article module menus
		'module_menu'	=> array(
            'article/index'	=> 'Articles'
		),
		// Article module functions
		'module_function' => array(
	        // Article functions
	        'article/index/add'		=> 'Add Article',
	        'article/index/read'	=> 'Read Article',
	        'article/index/edit'	=> 'Edit Article',
	        'article/index/delete'	=> 'Delete Article'//,

	        // Article Gallery functions
	        //'article_gallery/index'			=> 'Article Gallery',
	        //'article_gallery/index/add'		=> 'Add Article Gallery',
	        //'article_gallery/index/view'	=> 'View Article Gallery',
	        //'article_gallery/index/edit'	=> 'Edit Article Gallery',
	        //'article_gallery/index/delete'  => 'Delete Article Gallery',
	        //'article_gallery/index/change'  => 'Change Article Gallery',
	        //'article_gallery/index/export'  => 'Export Article Gallery',
	        //'article_gallery/index/print'	=> 'Print Article Gallery',
        ),
	)
);


/* End of file modules.php */
/* Location: ./application/config/modules.php */
