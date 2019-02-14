<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_materi extends CI_Model
{
    public $_table = "list_materi";
    
    public $materi_id;
    public $image = "default.jpg";
    
    
    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    function tampil_materi(){
        $segment = $this->uri->segment('3'); //membuat segment pada urutan ke 3
        return $this->db->query("SELECT * FROM list_materi WHERE materi_id='$segment'"); //memanfaatkan segment ke 3 untuk get id db by clicked   
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["materi_id" => $id])->row();
    }
    
    function input_data($data,$table){
		$this->db->insert($table,$data);
	}
    
    
    public function update()
    {
        $post = $this->input->post();
        $this->materi_id    = $post["id"];
        $this->pelajaran    = $post["pelajaran"];
        $this->judul        = $post["judul"];
        
        if (!empty($_FILES["image"]["name"])) {
            $this->image = $this->_uploadImage();
        }else{
            $this->image = $post["old_image"];
        }
        
        $this->deskripsi    = $post["deskripsi"];
        $this->db->update($this->_table, $this, array('id' => $post['id']));
        
        
    }
    
    public function delete($id)
    {
        return $this->db->delete($this->_table, array("materi_id" => $id));
    }
    
    
    public function upload()
    {
        $config['upload_path']  = './images/';
        $config['allowed_types']  = 'gif|jpg|png';
        $config['overwrite']  = true;
        $config['max_size']  = 2024;
        
        $this->load->library('upload', $config);
        
        if ($this->upload->do_upload('image')) {
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        }else{
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
        return $return;
            
        }
        
        //return "default.jpg";
    }
    
    public function save($upload)
    {
		$data = array(
			'pelajaran' => $this->input->post('pelajaran'),
			'judul' => $this->input->post('judul'),
			'deskripsi' => $this->input->post('deskripsi'),
                        'image' => $upload['file']['file_name'],
                        'oleh' => $this->input->post('oleh')
			);
		$this->db->insert('list_materi', $data);
		
    }
}