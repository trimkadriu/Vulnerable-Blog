<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends CI_Controller {

	function __construct() 
	{
        parent::__construct();
		$this->load->helper('url');	
		$this->load->helper('form_helper');
    }
	
	public function pages($page)
	{
		switch (strtolower($page))
		{
			case 'index': 
				redirect('');
			case 'news': 
				$data['news'] = $this->data->select_data('entries', 'category', 2, 'date', 'desc'); 
				$this->load->view('news', $data); 
				break;
			case 'category1': 
				$data['cat1'] = $this->data->select_data('entries', 'category', 3, 'date', 'desc');
				$this->load->view('category1', $data); 
				break;
			case 'category2': 
				$data['cat2'] = $this->data->select_data('entries', 'category', 4, 'date', 'desc');
				$this->load->view('category2', $data); 
				break;
			case 'contact': 
				$this->load->view('contact'); 
				break;
			case 'login':
				$this->load->view('login'); 
				break;
			case 'admin': 
				$this->load->view('admin'); 
				break;
			case 'logout': 
				$this->session->sess_destroy(); 
				redirect('blog/pages/index', 'refresh'); 
				break;
			default: 
				echo '<h1>Error 404</h1><p>This page does not exist.</p>'; 
				break;
		}
	}
	
	public function index()
	{
		$data['news'] = $this->data->select_data('entries', 'category', 2, 'date', 'desc', 2);
		$data['cat1'] = $this->data->select_data('entries', 'category', 3, 'date', 'desc', 2);
		$data['cat2'] = $this->data->select_data('entries', 'category', 4, 'date', 'desc', 2);
		$this->load->view('index', $data);
	}
	
}