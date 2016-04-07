<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('note');
	}

	public function index()
	{
		$this->load->view('index');
	}

	public function index_get_notes()
	{
		$all_notes['notes'] = $this->note->all();
		$this->load->view('/partials/notes', $all_notes);
	}

	public function submit()
	{
		$postdata = $this->input->post();
		if(isset($postdata['title']))
		{
			$this->add_new($postdata);
		} else {
			$this->delete($postdata);
		}
	}

	public function add_new($postdata)
	{
		// $postdata = $this->input->post();
		$this->note->add_new($postdata);
		$all_notes['notes'] = $this->note->all();
		$this->load->view('/partials/notes', $all_notes);
	}

	public function update()
	{
		$new_description = $this->input->post();
		$this->note->update($new_description);
		$all_notes['notes'] = $this->note->all();
		$this->load->view('/partials/notes', $all_notes);
	}

	public function delete($delete_info)
	{
		$this->note->delete($delete_info);
		$all_notes['notes'] = $this->note->all();
		$this->load->view('/partials/notes', $all_notes);
	}
}

