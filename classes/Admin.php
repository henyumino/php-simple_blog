<?php

class Admin{
    private $_db;

    public function __construct(){
        $this->_db = Database::getInstance();
    }

    public function register_admin($kolom = array()){
       
       if( $this->_db->insert('tb_admin',$kolom) ) return true;
       else return false;
    }
    public function login_admin($email ,$password){
       $data = $this->_db->get_info('tb_admin','email',$email);
       if (password_verify($password , $data['password'])) return true;
       return false;
    }
    public function profile_admin($email){
        $result = $this->_db->get_info_admin($email);
        return $result;
    }
    public function update_profile($nama ,$nama_file_final, $email){
        if( $this->_db->update_admin($nama ,$nama_file_final, $email))  return true;
        else return false; 
    }
    public function update_profile_nopic($nama , $email){
        if( $this->_db->update_admin_nopic($nama , $email))  return true;
        else return false; 
    }
    public function insert_post($tabel,$kolom = array()){
        if( $this->_db->insert($tabel, $kolom) ) return true;
        else return false;
        // return $kolom;
    }
    public function check_post($idpost){
        if($this->_db->check_post_get($idpost)) return true;
        else return false;
    }
    public function get_post($post_id){
        $result = $this->_db->get_post_edit($post_id);
        return $result;
    }
    public function add_category($kolom = array()){
        if($this->_db->insert('tb_category',$kolom)) return true;
        else return false;
    }
    public function get_category($param){
        return $this->_db->get_info_tb($param);
    }
    public function upload_multi_image($table ,$kolom = array()){
        if($this->_db->insert($table ,$kolom)) return true;
        else return false;
    }
    public function get_picpost($table ,$kolom ,$nilai){
        return $this->_db->get_info_picpost($table ,$kolom ,$nilai);
    }
    public function update_post($table ,$kolom = array()){
        if($this->_db->update($table, $kolom)) return true;
        else return false;
    }
    public function get_postdata($table, $kolom ,$nilai){
        return $this->_db->get_info($table, $kolom ,$nilai);
    }
    public function recent_post(){
        return $this->_db->get_info_tb_limit('tb_post',4);
    }
    public function get_imgrecent($param){
        return $this->_db->get_info('tb_imagepost','idallimagepost',$param);
    }
    public function get_row_tb($tabel, $kolom, $nilai){
        return $this->_db->get_row($tabel, $kolom, $nilai);
    }
    public function get_artikel($tabel,$start,$perPage){
        return $this->_db->get_artikel_limit($tabel,$start,$perPage);
    }
    public function get_artikel_all($param){
        return $this->_db->get_info_tb($param);
    }
    public function update_read($tabel, $kolom){
        return $this->_db->update($tabel, $kolom);
    }
    public function input_comment($tabel, $kolom){
        return $this->_db->insert($tabel, $kolom);
    }
    public function get_comment($tabel, $kolom, $nilai){
        return $this->_db->get_row($tabel, $kolom, $nilai);
    }
    public function input_reply($tabel, $kolom){
        return $this->_db->insert($tabel, $kolom);
    }
    public function get_reply($tabel, $kolom, $nilai){
        return $this->_db->get_row($tabel, $kolom, $nilai);
    }
    public function get_featpost($tabel, $limit){
        return $this->_db->get_info_tb_limit($tabel, $limit);
    }
}

?>  

