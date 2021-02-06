<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model
{
    private $_table = "tb_kategori";

    public $idkategori;
    public $kategori;


    public function rules()
    {
        return [
            ['field' => 'idkategori',
            'label' => 'idkategori',
            'rules' => 'required'],

            ['field' => 'kategori',
            'label' => 'kategori',
            'rules' => 'required'],
            
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    public function getaktif()
    {
        return $this->db->get_where($this->_table, ["status" => 'Aktif'])->result();
    }
    public function carikategori($where)
    {
        $this->db->where('kategori',$where);
        return $this->db->get('tb_kategori')->num_rows();
    }
    public function getByidkategori($idkategori)
    {
        return $this->db->get_where($this->_table, ["idkategori" => $idkategori])->result();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->idkategori = $post["idkategori"];
        $this->kategori = $post["kategori"];
        $this->status = $post["status"];
        return $this->db->insert($this->_table, $this);
    }

    public function update($idkategori,$kategori,$status)
    {
        $post = $this->input->post();
        $this->idkategori = $post["idkategori"];
        $this->kategori = $post["kategori"];
        $this->status = $post["status"];
        return $this->db->update($this->_table, $this, array('idkategori' => $post['idkategori']));
    }

    public function delete($idkategori)
    {
        return $this->db->delete($this->_table, array("idkategori" => $idkategori));
    }
}