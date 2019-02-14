<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->model('m_login');
        $this->load->library('session');
        
    }
    
    function index(){
        $this->load->view('v_login');
        if($this->session->userdata('status') == "login"){
            redirect(base_url("crud")); //cek session jika belum login maka...
        
        }
    }
    
    function aksi_login(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->db->select("username" and "level")->where( //seleksi row level dimana login berdasarkan email
                [
                    'email' => $email,
                    'password' => md5($password)
                ])->get("user")->row(); //fungsi mengambil table user yg telah di seleksi menjadi row
        if($user){

            $data_session = [
                'username' => $user->username,
                'level'  => $user->level, //fungsi menjadikan row level pada user menjadi session
                'email'     => $email,
                'status'    => "login"
                ];
            $this->session->set_userdata($data_session);
            
            redirect(base_url("crud"));
        }else{
            echo "Username dan password salah!";
        }
    }
    
    function regist(){
        
        if($this->input->post('register'))
        {
            $n= $this->input->post('name');
            $e= $this->input->post('email');
            $p= md5 ($this->input->post ('password')); //encrypt password ke md5
            $l = 'siswa';
            
            
            $query = $this->db->query("SELECT * FROM user WHERE email='".$e."'");
            $row = $query->num_rows();
            if($row)
            {
                $this->session->set_flashdata('error', 'Email has been registered. Error!!');
		redirect(base_url("login/regist"));
            }elseif($this != $row){
                $query = $this->db->query("INSERT INTO user VALUES('','$n','$e','$p','$l')");
                
                $this->session->set_flashdata('success', 'Account Create Succcess');
		redirect(base_url("login/regist"));
            }else{
                $this->session->set_flashdata('error', 'Something wrong. Error!!');
		redirect(base_url("login/regist"));
            }
        }
        if($this->session->userdata('status') == "login"){
            redirect(base_url("crud")); //cek session jika belum login maka...
        }else{
        $this->load->view('v_regist');
        }
    }
}
?>
