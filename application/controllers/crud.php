<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_materi");
        $this->load->library('form_validation');
        $this->load->helper('url');
        
        
        if($this->session->userdata('status') != "login"){ //jika session userdata statusnya tidak sama dengan login maka...
            redirect(base_url("login")); //dikembalikan ke halaman login
        }
    }
    
    public function index()
    {
        $data["list_materi"] = $this->m_materi->getAll();
        $this->load->view("v_tampil", $data);
    }
    
    function buka_materi(){
        $data['list_materi'] = $this->m_materi->tampil_materi()->result();
        $this->load->view('view_materi',$data);
    }
    
    
    public function tambah(){
    $data = array();
    
    if($this->input->post('submit')){ // Jika user menekan tombol Submit (Simpan) pada form
      // lakukan upload file dengan memanggil function upload yang ada di GambarModel.php
      $upload = $this->m_materi->upload();
      
      if($upload['result'] == "success"){ // Jika proses upload sukses
         // Panggil function save yang ada di GambarModel.php untuk menyimpan data ke database
        $this->m_materi->save($upload);
        
        redirect(base_url('crud')); // Redirect kembali ke halaman awal / halaman view data
      }else{ // Jika proses upload gagal
        $data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
      }
    }
    $this->load->view('v_form', $data);
    }
    
    public function edit($id = null)
    {
        if(!isset($id)) redirect('admin/products');
        
        $materi = $this->m_materi;
        $validation = $this->form_validation;
        $validation->set_rules($materi->rules());
        
        if ($validation->run()) {
            $materi->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        
        $data["list_materi"] = $materi->getById($id);
        if (!$data["list_materi"]) show_404();
        
        $this->load->view("v_input", $data);
        }
        
        public function delete($id=null)
        {
            if (!isset($id)) show_404();
            
            if ($this->m_materi->delete($id)){
                redirect(base_url('crud'));
            }
    }
    
    function keluar(){
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

