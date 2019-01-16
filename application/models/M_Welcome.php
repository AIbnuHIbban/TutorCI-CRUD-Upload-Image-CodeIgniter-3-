<?php
class M_Welcome extends CI_Model{

    public function getDataGambar(){
        return $this->db->get('foto');
    }

    public function insertGambar($judul){
        $data = array(
            'nama' => $this->input->post('judul'),
            'foto' => $judul
        );

        return $this->db->insert('foto', $data);
    }

    public function hapusFile($id){
        $this->db->where('id', $id);
        return $this->db->delete('foto');
    }

    public function getDataByID($id){
        return $this->db->get_where('foto', array('id'=>$id));
    }

    public function updateFile($id, $data){
        $this->db->where('id', $id);
        return $this->db->update('foto', $data);
    }
    

}


