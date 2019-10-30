<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_admin extends CI_Model {

	public function tampil_config()
	{
		return $this->db->get('tb_config');
	}
	
	public function tampil_jenis()
	{
		return $this->db->get('tb_jenis_agenda');
	}

	public function tampil_agenda_aktif()
	{
		return $this->db->query("SELECT a.*, b.jenis_id, b.jenis_agenda FROM tb_daftar_agenda as a, tb_jenis_agenda as b WHERE a.jenis_id=b.jenis_id AND a.status='Aktif' AND a.user='".$this->session->userdata('admin_nama')."'");
	}
	
	public function tampil_agenda_nonaktif()
	{
		return $this->db->query("SELECT a.*, b.jenis_id, b.jenis_agenda FROM tb_daftar_agenda as a, tb_jenis_agenda as b WHERE a.jenis_id=b.jenis_id AND a.status='Tidak Aktif' AND a.user='".$this->session->userdata('admin_nama')."'");
	}
	
	public function tampil_agenda_marquee()
	{
		return $this->db->query("SELECT a.* FROM tb_daftar_marquee as a WHERE a.user='".$this->session->userdata('admin_nama')."'");
	}
/*
	public function edit_jenis($id)
	{
		return $this->db->get_where('tb_jenis_agenda',array('jenis_id'=>$id));
	}
*/
	public function hapus_jenis($id)
	{
		return $this->db->delete('tb_jenis_agenda', array('jenis_id' => $id));
	}
	
	public function hapus_marquee($id)
	{
		return $this->db->delete('tb_daftar_marquee', array('marquee_id' => $id));
	}

	public function hapus_agenda_aktif($id)
	{
		return $this->db->delete('tb_daftar_agenda', array('agenda_id' => $id));
	}
	
	public function hapus_agenda_nonaktif($id)
	{
		return $this->db->delete('tb_daftar_agenda', array('agenda_id' => $id));
	}

	public function cek_login($user, $pass)
	{
		$array = array('username' => $user, 'password' => $pass);

		$query = $this->db->where($array);

		$query = $this->db->get('agenda_login');

		return $query;
	}

	public function tampil_user()
	{
		return $this->db->get('login');
	}

	public function insert_user($object)
	{
		$this->db->insert('login', $object);
	}

	public function edit_user($id)
	{
		return $this->db->get_where('login',array('id_user'=>$id));
	}

	public function update_user($id, $object)
	{
		$this->db->where('id_user', $id);
		$this->db->update('login', $object); 
	}

	public function hapus_user($id)
	{
		return $this->db->delete('login', array('id_user' => $id));
	}
}
