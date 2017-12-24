<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	session_start();

	class Login extends CI_Controller {
	    function __construct(){
	        parent::__construct();
        	$this->load->model('LoginModel');
        	$this->load->library('session') ;
        	$this->load->library('form_validation') ;
        	$this->load->helper('form');
	    }

	    public function loadHome(){
	    	$content['username'] = ucfirst($this->session->userdata('username'));
		    $content['idKaryawan'] = ucfirst($this->session->userdata('idKaryawan'));
		    $content['nama'] = ucfirst($this->session->userdata('nama'));
			// $content['message'] = "Selamat Datang ".ucfirst($this->session->userdata('username'))."
		 //                               <br />Anda Login Sebagai ".ucfirst($this->session->userdata('role'));
		 //    $content['title'] = "Administrasi ".ucfirst($this->session->userdata('role'));
		    $jabatan = ($this->session->userdata['logged_in']['jabatan']);
		    if ($jabatan == 'admin') {
		    	$data['header'] = $this->load->view("template/header",$content);
		    }
		    else {
		    	$data['header'] = $this->load->view("template/headerKaryawan",$content);
		    }
		    $data['content'] = $this->load->view("petugas/Home", $content);
		    $data['footer'] = $this->load->view("template/footer",$content);

		    $this->load->view("template/petugas_view", $data);
	    }

	    public function index(){
	        // $content['username'] = ucfirst($this->session->userdata('username'));
	        // $content['role'] = ucfirst($this->session->userdata('role'));
	        // $content['message'] = "Selamat Datang ".ucfirst($this->session->userdata('username'))."
	        //                        <br />Anda Login Sebagai ".ucfirst($this->session->userdata('role'));
	        // $content['title'] = "Administrasi ".ucfirst($this->session->userdata('role'));
	        // $data['content'] = $this->load->view("petugas/login");
	        if (isset($this->session->userdata['logged_in'])) {
	        	$this->loadHome();
	        }
	        else {
	        	$this->load->view("petugas/login");
	        }
	    }

	    public function login(){
	    	if (isset($this->session->userdata['logged_in'])) {
	    		$this->loadHome();
	    	}
	    	else {
	    		$username = $this->input->post('username');
	    		$password = $this->input->post('password');
	    		$result = $this->LoginModel->validasi($username,$password);
	    		if ($result == true) {
	    			$username - $this->input->post('username');
	    			$result = $this->LoginModel->get_user_info($username);
	    			if ($result != false) {
	    				$session_data = array(
	    					'username' => $result[0]->username,
	    					'idKaryawan' => $result[0]->idKaryawan,
	    					'nama' => $result[0]->nama,
	    					'jabatan' => $result[0]->jabatan
	    				);
	    				$this->session->set_userdata('logged_in',$session_data);
	    				$this->loadHome();
	    			}
	    			else {
	    				echo "<script> alert('Username atau Password Salah'); </script>";
	    				$this->load->view("petugas/login");
	    			}
	    		}
	    		else {
	    			echo "<script> alert('Username atau Password Salah'); </script>";
	    			$this->load->view("petugas/login");
	    		}
	    	}
	    }

	    public function logout() {
			$sess_array = array(
				'username' => '',
				'nama' => '',
				'idKaryawan' => '',
				'jabatan' => ''
			);
			$this->session->unset_userdata('logged_in', $sess_array);
			$data['message_display'] = 'Successfully Logout';
			$this->load->view('petugas/login', $data);
		}

	    
	}

?>