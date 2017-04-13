<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Participant extends Admin_Controller {

    public function __construct() {
            parent::__construct();

            // Load Participant model
            $this->load->model('participant/Participants');

            // Load Gallery model
            //$this->load->model('participant/Gallery');

            // Load Grocery CRUD
            $this->load->library('grocery_CRUD');

    }

    public function index() {
        try {
	    // Set our Grocery CRUD
            $crud = new grocery_CRUD();
            // Set tables
            $crud->set_table($this->Participants->table)->order_by('join_date','desc');
            // Set CRUD subject
            $crud->set_subject('Participant');
            // Set column
            //$crud->columns('name','email','phone_number','identity','profile_url','verify','join_date');
            $crud->columns('name','email','phone_number','verify','join_date');
			// Set column display
            $crud->display_as('phone_number','Phone');
            $crud->display_as('verify','Unique Code');
            $crud->callback_edit_field('modified',array($this,'_callback_time_modified'));
			// This callback escapes the default auto column output of the field name at the add form
            $crud->callback_column('identity',array($this,'_callback_identity'));
			$crud->callback_column('file_name',array($this,'_callback_filename'));
			$crud->callback_column('added',array($this,'_callback_time'));
			$crud->callback_column('modified',array($this,'_callback_time'));
			$crud->callback_column('fb_pic_url',array($this,'callback_pic'));
            $crud->callback_column('photo_url',array($this,'_callback_pic'));
            $crud->callback_column('profile_url',array($this,'_callback_profile_url'));
			$crud->unset_columns('completed');
			// Sets the required fields of add and edit fields
			// $crud->required_fields('subject','name','text','status');
            // Set upload field
            // $crud->set_field_upload('file_name','uploads/users');
			$state = $crud->getState();

			if ($state == 'export')
			{
				//Do your awesome coding here.
				$crud->callback_column('file_name',array($this,'_callback_filename_url'));
				$crud->callback_column('phone_number',array($this,'_callback_phone_number'));
			}

			//$crud->unset_add();
			//$crud->unset_edit();
			//$crud->unset_delete();
            $this->load($crud, 'participant');
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function _callback_time ($value, $row) {
		return empty($value) ? '-' : date('D, d-M-Y',$value);
    }

    public function _callback_time_added ($value, $row) {
		$time = time();
		return '<input type="hidden" maxlength="50" value="'.$time.'" name="added">';
    }

    public function _callback_time_modified ($value, $row) {
		$time = time();
		return '<input type="hidden" maxlength="50" value="'.$time.'" name="modified">';
    }

    public function _callback_total_image($value, $row) {
        $total = $this->user_model->total_image_submitted($row->participant_id);
        return $total;
    }

	public function _callback_filename($value, $row) {
		$row->file_name = strip_tags($row->file_name);
        return $row->file_name ? '<div class="text-center"><a href="'.base_url('uploads/users/'.$row->file_name).'" class="image-thumbnail"><img height="110px" src="'.base_url('uploads/users/'.$row->file_name).'"/></a></div>' : '-';
    }

    public function _callback_identity($value, $row) {
        $row->identity = $row->identity ? $row->identity : 'Website';
        return $row->identity;
    }

    public function _callback_phone_number($value, $row) {
        $row->phone_number = $row->phone_number ? '\''.$row->phone_number : $row->phone_number;
        return $row->phone_number;
    }

    public function _callback_profile_url($value, $row) {
        $row->profile_url = $row->profile_url ? $row->profile_url : '-';
        return $row->profile_url;
    }

	public function _callback_filename_url($value, $row) {
		return ($row->file_name) ? base_url('uploads/users/'.$row->file_name) : '-';
	}

    public function _callback_pic($value = '', $primary_key = null){
        return ($value) ? '<a href="'.$value.'" class="image-thumbnail"><img src="'.$value.'" height="80px"></a>' :'';
    }

    private function load($crud, $nav) {
        $output = $crud->render();
        $output->nav = $nav;
        if ($crud->getState() == 'list') {
            // Set Participant Title
            $output->page_title = 'Participant Listings';
            // Set Main Template
            $output->main       = 'template/admin/metronix';
            // Set Primary Template
            $this->load->view('template/admin/template.php', $output);
        } else {
            $this->load->view('template/admin/popup.php', $output);
        }
    }
}
