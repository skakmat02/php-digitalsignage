<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
		parent::__construct();
		// $this->load->helper(array('isi','form'));
		// $this->load->model('model_admin');
	}

	function index(){
		if($this->session->userdata('admin_valid') != TRUE ){
			redirect("login");
		}
	
			$a['jenis']	= $this->model_admin->tampil_jenis()->num_rows(); //judul ambil data dari file model_admin.php dengan function tampil_jenis
		$a['agenda_aktif']	= $this->model_admin->tampil_agenda_aktif()->num_rows();
		$a['agenda_nonaktif']	= $this->model_admin->tampil_agenda_nonaktif()->num_rows();
		$a['agenda_marquee']	= $this->model_admin->tampil_agenda_marquee()->num_rows();
		$a['page']	= "home";
		
		$this->load->view('admin/index', $a);
	}	
	
	function do_upload()  
      {  
        if(isset($_FILES["image_file"]["name"]))  
           {  
                $config['upload_path'] = './uploads/';  
                $config['allowed_types'] = 'jpg|jpeg|png|gif';  
                $config['encrypt_name'] = TRUE;
                $this->load->library('upload', $config);  
                if(!$this->upload->do_upload('image_file'))  
                {  
                     echo $this->upload->display_errors();  
                }  
                else  
                {  
					
    
                     $data = $this->upload->data();  
                     echo '<img src="'.base_url().'uploads/'.$data["file_name"].'" width="300" height="225" class="img-thumbnail" name="upload" id="upload"/>';
                     echo '<br/><input readonly type="text" class="form-control" id="url" name="url" value="'.base_url().'uploads/'.$data["file_name"].'" />'  ;
                }  
           }  
}
        
     function config(){
		if($this->session->userdata('admin_valid') != TRUE ){
			redirect("login");
		}
		
		$a['editdata']	= $this->db->get_where('tb_config')->result_object();		
		$a['page']	= "config";
		
		$this->load->view('admin/index', $a);
	}
	
	function update_config(){
		$dury = $this->input->post('dury');
		$durg = $this->input->post('durg');
		$idc = $this->input->post('idc');
		$object = array(
				'durasi_youtube' => $dury,
				'durasi_gambar' => $durg,
				'user' => 'Administrator'
			);
		$this->db->where('config_id', $idc);
		$this->db->update('tb_config', $object); 

		redirect('admin/config','refresh');
	}
	
	//
		
	function agenda_marquee(){
		if($this->session->userdata('admin_valid') != TRUE ){
			redirect("login");
		}
		$a['data']	= $this->model_admin->tampil_agenda_marquee()->result_object();
		$a['page']	= "agenda_marquee";
		
		$this->load->view('admin/index', $a);
	}
	
	function tambah_marquee(){
		if($this->session->userdata('admin_valid') != TRUE ){
			redirect("login");
		}
		$a['page']	= "tambah_marquee";
		
		$this->load->view('admin/index', $a);
	}
	
	function insert_marquee(){
		
		$marquee = $this->input->post('isim');
		$umarquee = $this->input->post('userm');
		$object = array(
				'isi' => $marquee,
				'user' => $umarquee
			);
		$this->db->insert('tb_daftar_marquee', $object);

		redirect('admin/agenda_marquee','refresh');
	}
	
	function edit_marquee($id){
		
		$a['editdata']	= $this->db->get_where('tb_daftar_marquee',array('marquee_id'=>$id))->result_object();		
		$a['page']	= "edit_marquee";
		
		$this->load->view('admin/index', $a);
	}

	function update_marquee(){
		$id = $this->input->post('idm');
		$marquee = $this->input->post('isim');
		$object = array(
				'isi' => $marquee
			);
		$this->db->where('marquee_id', $id);
		$this->db->update('tb_daftar_marquee', $object); 

		redirect('admin/agenda_marquee','refresh');
	}

function hapus_marquee($id){
		
		$this->model_admin->hapus_marquee($id);
		redirect('admin/agenda_marquee','refresh');
	}
	
	/* Fungsi Jenis agenda */
	function jenis_agenda(){
		$a['data']	= $this->model_admin->tampil_jenis()->result_object();
		$a['page']	= "jenis_agenda";
		
		$this->load->view('admin/index', $a);
	}

	function tambah_jenis(){
		$a['page']	= "tambah_jenis_agenda";
		
		$this->load->view('admin/index', $a);
	}

	function insert_jenis(){
		
		$jenis = $this->input->post('jenis');
		$object = array(
				'jenis_agenda' => $jenis
			);
		$this->db->insert('tb_jenis_agenda', $object);

		redirect('admin/jenis_agenda','refresh');
	}

	function edit_jenis($id){
		
		$a['editdata']	= $this->db->get_where('tb_jenis_agenda',array('jenis_id'=>$id))->result_object();		
		$a['page']	= "edit_jenis_agenda";
		
		$this->load->view('admin/index', $a);
	}

	function update_jenis(){
		$id = $this->input->post('id');
		$jenis = $this->input->post('jenis');
		$object = array(
				'jenis_agenda' => $jenis
			);
		$this->db->where('jenis_id', $id);
		$this->db->update('tb_jenis_agenda', $object); 

		redirect('admin/jenis_agenda','refresh');
	}

	function hapus_jenis($id){
		
		$this->model_admin->hapus_jenis($id);
		redirect('admin/jenis_agenda','refresh');
	}


	/* Fungsi agenda */
	
	
	function agenda_nonaktif(){
		if($this->session->userdata('admin_valid') != TRUE ){
			redirect("login");
		}
		
		$a['data']	= $this->model_admin->tampil_agenda_nonaktif()->result_object();
		$a['page']	= "agenda_nonaktif";
		
		$this->load->view('admin/index', $a);
	}
	
	function tambah_agenda_nonaktif(){
		if($this->session->userdata('admin_valid') != TRUE ){
			redirect("login");
		}
		$a['page']	= "tambah_agenda_nonaktif";
		
		$this->load->view('admin/index', $a);
	}


	
function insert_agenda_nonaktif(){
		
		$jenis = $this->input->post('jenis');
		$no = $this->input->post('no');
		$tgl = $this->input->post('tgl');
		$judul = $this->input->post('judul');
		$isi = $this->input->post('isi');
		$ket = $this->input->post('ket');
		$object = array(
				'jenis_id' => $jenis,
				'no_agenda' => $no,
				'tgl_agenda' => $tgl,
				'judul' => $judul,
				'isi' => $isi,
				'ket' => $ket
			);
		$this->db->insert('tb_daftar_agenda', $object);

		redirect('admin/agenda_nonaktif','refresh');
	}

	function edit_agenda_nonaktif($id){
		$a['editdata']	= $this->db->get_where('tb_daftar_agenda',array('agenda_id'=>$id))->result_object();		
		$a['page']	= "edit_agenda_nonaktif";
		
		$this->load->view('admin/index', $a);
	}

	function update_agenda_nonaktif(){
		
		$id = $this->input->post('id');
		$jenis = $this->input->post('jenis');
		$no = $this->input->post('no');
		$tgl = $this->input->post('tgl');
		$judul = $this->input->post('judul');
		$isi = $this->input->post('isi');
		$ket = $this->input->post('ket');
		$object = array(
				'jenis_id' => $jenis,
				'no_agenda' => $no,
				'tgl_agenda' => $tgl,
				'judul' => $judul,
				'isi' => $isi,
				'ket' => $ket
			);
		$this->db->where('agenda_id', $id);
		$this->db->update('tb_daftar_agenda', $object); 

		redirect('admin/agenda_nonaktif','refresh');
	}


	function hapus_agenda_nonaktif($id){
		
		$this->model_admin->hapus_agenda_nonaktif($id);
		redirect('admin/agenda_nonaktif','refresh');
	}
	
	

/* agenda aktif */



function agenda_aktif(){
	
	if($this->session->userdata('admin_valid') != TRUE ){
			redirect("login");
		}
		
		$a['data']	= $this->model_admin->tampil_agenda_aktif()->result_object();
		$a['page']	= "agenda_aktif";
		
		$this->load->view('admin/index', $a);
	}
	
	function tambah_agenda(){
		if($this->session->userdata('admin_valid') != TRUE ){
			redirect("login");
		}
		$a['page']	= "tambah_agenda";
		
		$this->load->view('admin/index', $a);
	}


	function insert_agenda(){
		
		$jenis = $this->input->post('jenis');
		$tgl = $this->input->post('tgl');
		$judul = $this->input->post('judul');
	//	$isi = $this->input->post('isi');
		$url = $this->input->post('url');
	//	$durasi = $this->input->post('durasi');
		$status = $this->input->post('status');
		$user = $this->input->post('user');
		$object = array(
				'jenis_id' => $jenis,
				'tgl_agenda' => $tgl,
				'judul' => $judul,
			//	'isi' => $isi,
				'url' => $url,
			//	'durasi' => $durasi,
				'status' => $status,
				'user' => $user
			);
		$this->db->insert('tb_daftar_agenda', $object);

		redirect('admin/agenda_aktif','refresh');
	}

	function edit_agenda($id){
		$a['editdata']	= $this->db->get_where('tb_daftar_agenda',array('agenda_id'=>$id))->result_object();		
		$a['page']	= "edit_agenda";
		
		$this->load->view('admin/index', $a);
	}

	function update_agenda(){
		$id = $this->input->post('id');
		$jenis = $this->input->post('jenis');
		$tgl = $this->input->post('tgl');
		$judul = $this->input->post('judul');
	//	$isi = $this->input->post('isi');
		$url = $this->input->post('url');
	//	$durasi = $this->input->post('durasi');
		$status = $this->input->post('status');
		$user = $this->input->post('user');
		$object = array(
				'jenis_id' => $jenis,
				'tgl_agenda' => $tgl,
				'judul' => $judul,
	//			'isi' => $isi,
				'url' => $url,
		//		'durasi' => $durasi,
				'status' => $status,
				'user' => $user
			);
		$this->db->where('agenda_id', $id);
		$this->db->update('tb_daftar_agenda', $object); 

		redirect('admin/agenda_aktif','refresh');
	}


	function hapus_agenda($id){
		
		$this->model_admin->hapus_agenda_aktif($id);
		redirect('admin/agenda_aktif','refresh');
	}	

	/* Fungsi Manage User */
	function manage_user(){
		$a['data']	= $this->model_admin->tampil_user()->result_object();
		$a['page']	= "manage_user";
		
		$this->load->view('admin/index', $a);
	}

	function tambah_user(){
		$a['page']	= "tambah_user";
		
		$this->load->view('admin/index', $a);
	}

	function insert_user(){
		
		$user 	  = $this->input->post('user');
		$password = $this->input->post('password');
		$nama	  = $this->input->post('nama');

		$object = array(
				'username' => $user,
				'password' => md5($password),
				'nama' => $nama
			);
		$this->model_admin->insert_user($object);

		redirect('admin/manage_user','refresh');
	}

	function edit_user($id){
		$a['editdata']	= $this->model_admin->edit_user($id)->result_object();		
		$a['page']	= "edit_user";
		
		$this->load->view('admin/index', $a);
	}

	function update_user(){
		$id 	  = $this->input->post('id');
		$user 	  = $this->input->post('user');
		$password = $this->input->post('password');
		$pass_old = $this->input->post('pass_old');
		$nama	  = $this->input->post('nama');

		if (empty($password)) {
			$object = array(
				'username' => $username,
				'password' => $password,
				'nama' => $nama
			);
		}else{
			$object = array(
				'username' => $username,
				'password' => $pass_old,
				'nama' => $nama
			);
		}

		
		$this->model_admin->update_user($id, $object);

		redirect('admin/agenda_aktif','refresh');
	}

	function hapus_user($id){
		
		$this->model_admin->hapus_user($id);
		redirect('admin/manage_user','refresh');
	}	


}

