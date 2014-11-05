<?php
class Form extends CI_Controller {
	function index()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
			
		// CONTACT FORM
		if ($this->input->post('contact'))
		{
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('subject', 'Subject', 'required');
			$this->form_validation->set_rules('message', 'Message', 'required');
			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('contact');
			}
			else
			{
				$email = $_REQUEST['email'] ;
				$subject = $_REQUEST['subject'] ;
				$message = $_REQUEST['message'] ;
				mail("myblog@codeigniter.com", "$subject", $message, "From: ".$email);
				redirect('blog/pages/contact/?message=Email sent successfully.', 'refresh');
			}
		}// LOGIN FORM
		else if($this->input->post('login_form'))
		{
			$this->form_validation->set_rules('username', 'Username', 'required|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'required');
			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('login');
			}
			else
			{
				$username = $_POST['username'];
        		$password = $_POST['password'];
				$results = $this->data->do_login($username, $password);
				if($results->num_rows() > 0)
				{
					$this->session->set_userdata('username', $_POST['username']);
					redirect('blog/pages/admin');
				}
				else
				{
					redirect('blog/pages/login/?message=Invalid Login!', 'refresh');
				}
			}
		}// Add ADMIN USERS
		else if($this->input->post('admin_form'))
		{
			$this->form_validation->set_rules('username', 'Username', 'required|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'required');
			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('admin');
			}
			else
			{
				$username = $_POST['username'];
        		$password = $_POST['password'];
				$this->data->insert_data(array('username' => $username, 'password' => $password), 'users');
				redirect('blog/pages/admin', 'refresh');
			}
		}// Add POST ENTRIES
		else if($this->input->post('post_form'))
		{
			$this->form_validation->set_rules('tittle', 'Tittle', 'required');
			$this->form_validation->set_rules('content', 'Content', 'required');
			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('admin');
			}
			else
			{
				$tittle = $_POST['tittle'];
        		$content = $_POST['content'];
				$category = $_POST['id'];
				$this->data->insert_data(array('tittle' => $tittle, 'content' => $content, 'date' => date("Y-m-d"), 'category' => $category), 'entries');
				redirect('blog/pages/admin', 'refresh');
			}
		}// Add NEW CATEGORY
		else if($this->input->post('category_form'))
		{
			$this->form_validation->set_rules('category_name', 'Category Name', 'required');
			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('admin');
			}
			else
			{
				$this->data->insert_data(array('category' => $_POST['category_name']), 'categories');
				redirect('blog/pages/admin', 'refresh');
			}
		}// Delete ADMIN USERS
		else if($this->input->post('delete_admin_form'))
		{
			$this->form_validation->set_rules('id', 'ID', 'required');
			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('admin');
			}
			else
			{
				$this->data->delete_data('users', 'id', $_POST['id']);
				redirect('blog/pages/admin', 'refresh');
			}
		}// Delete CATEGORIES
		else if($this->input->post('delete_category'))
		{
			$this->form_validation->set_rules('category_id', 'ID', 'required');
			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('admin');
			}
			else
			{
				$this->data->delete_data('categories', 'id', $_POST['category_id']);
				redirect('blog/pages/admin', 'refresh');
			}
		}// Delete POST ENTRIES
		else if($this->input->post('delete_entries_form'))
		{
			$this->form_validation->set_rules('post_id', 'ID', 'required');
			if ($this->form_validation->run() == FALSE)
			{
				redirect($_SERVER['HTTP_REFERER'], 'refresh');
			}
			else
			{
				$this->data->delete_data('entries', 'ID', $_POST['post_id']);
				redirect($_SERVER['HTTP_REFERER'], 'refresh');
			}
		}
	}
}
?>