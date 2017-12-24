<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {
    function __construct(){
        parent::__construct();
       
    }
    public function index(){
        $content['username'] = ucfirst($this->session->userdata('username'));
        $content['role'] = ucfirst($this->session->userdata('role'));
        $content['message'] = "Selamat Datang ".ucfirst($this->session->userdata('username'))."
                               <br />Anda Login Sebagai ".ucfirst($this->session->userdata('role'));
        $content['title'] = "Administrasi ".ucfirst($this->session->userdata('role'));
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
    
    function profil() {
        $table = 'petugas';
        $where = array('idPetugas' => $this->session->userdata('idPetugas'));
        $content['username'] = ucfirst($this->session->userdata('username'));
        $content['role'] = ucfirst($this->session->userdata('role'));
        $content['data'] = $this->PetugasModel->getOne($table, $where);
        $content['message'] = "Silahkan Edit Profil Anda dibawah ini!";
        $content['title'] = "Edit Profil";
        $data['navigation_horizontal'] = $this->load->view("template/navigation_horizontal",$content);
        $data['navigation_vertical'] = $this->load->view("template/navigation_vertical_".$content['role'],$content);
        $data['content'] = $this->load->view("petugas/petugas/petugas", $content);
        $data['footer'] = $this->load->view("template/footer",$content);
        
        $this->load->view("template/petugas_view", $data);
    }
    
    function updateProfil() {
        $this->form_validation->set_rules('name', 'Nama Petugas', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'matches[confirm_password]');
        if($this->input->post('password')){
            $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'required');
        }
        if($this->form_validation->run()==FALSE){
            $table = 'petugas';
            $where = array('idPetugas' => $this->session->userdata('idPetugas'));
            $content['username'] = ucfirst($this->session->userdata('username'));
            $content['role'] = ucfirst($this->session->userdata('role'));
            $content['title'] = "Edit Profil";
            $content['data'] = $this->PetugasModel->getOne($table, $where);
            $content['message'] = "Data petugas tidak dapat diupdate";
            $data['navigation_horizontal'] = $this->load->view("template/navigation_horizontal",$content);
            $data['navigation_vertical'] = $this->load->view("template/navigation_vertical_".$content['role'],$content);
            $data['content'] = $this->load->view("petugas/petugas/petugas", $content);
            $data['footer'] = $this->load->view("template/footer",$content);

            $this->load->view("template/petugas_view", $data);
        }
        else{
            if($this->input->post('password')){
                $data = array(
                    'name'=>$this->input->post('name'),
                    'username'=>$this->input->post('username'),
                    'password'=>md5($this->input->post('password'))
                );
            }else{
                $data = array(
                    'name'=>$this->input->post('name'),
                    'username'=>$this->input->post('username')
                );
            }
            
            $table = 'petugas';
            $where = array('idPetugas' => $this->session->userdata('idPetugas'));
            $role = 'petugas';
                    
            $result = $this->PetugasModel->update($table,$data,$where);
            if($result){
                $content['username'] = ucfirst($this->session->userdata('username'));
                $content['role'] = ucfirst($this->session->userdata('role'));
                $content['title'] = "Edit Profil";
                $content['data'] = $this->PetugasModel->getOne($table, $where);
//                $update = $this->login_model->updateSession($where, $content['role']);
                $content['message'] = "Edit Profil Berhasil Disimpan";
                $data['navigation_horizontal'] = $this->load->view("template/navigation_horizontal",$content);
                $data['navigation_vertical'] = $this->load->view("template/navigation_vertical_".$content['role'],$content);
                $data['content'] = $this->load->view("petugas/petugas/petugas", $content);
                $data['footer'] = $this->load->view("template/footer",$content);

                $this->load->view("template/petugas_view", $data);
                redirect('');
            }
        }
    }
    
    public function check_isvalidated(){
        if(!$this->session->userdata('validated')){
            redirect('login/login');
        }
    }
}