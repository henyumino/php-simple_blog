<?php

class Database{
    static $INSTANCE = null;
    private $mysqli,
            $HOST   = 'localhost',
            $USER   = 'root',
            $PASS   = '',
            $DBNAME = 'db_blog';
    
    public function __construct(){
        $this->mysqli = new mysqli($this->HOST,$this->USER,$this->PASS,$this->DBNAME);
        
        if(mysqli_connect_error()){
            die('gagal koneksi');
        }
    }

    public static function getInstance(){
        if (!isset( self::$INSTANCE )) {
            self::$INSTANCE = new Database();
        }

        return self::$INSTANCE;
    }
    public function insert($tabel ,$kolom = array()){
        
        $colum = implode(", ", array_keys($kolom));

        $nilaiArray = array();

        $i = 0;

        foreach ($kolom as $key => $nilai) {
            if(is_int($nilai)){
                $nilaiArray[$i] = $this->escape($nilai);    
            }
            else {
                $nilaiArray[$i] = "'".$this->escape($nilai)."'";    
            }
            
            $i++;
        }

        $nilai = implode(", ", $nilaiArray);

        $query = "INSERT INTO $tabel ($colum) VALUES ($nilai)";

        if($this->mysqli->query($query)) return true; 
        else return false;
    }
    public function update($tabel ,$kolom = array()){
        $idpost = $kolom['idpost'];
        $u = 0;
        $hasil = array();    
        foreach($kolom as $key => $value){
            if(is_int($value)){
                $hasil[$u] = $key.' = '.$this->escape($value); 
            }
            else {
                $hasil[$u] = $key.' = '."'".$this->escape($value)."'";   
            }
            $u++;
        }
        $hasil = implode(', ',$hasil); 
        $query = "UPDATE $tabel SET $hasil WHERE idpost = '$idpost'";
        if($this->mysqli->query($query)) return true;
        else return false;
    }
    public function get_info($table, $kolom ,$nilai){
        if(!is_int($nilai)){
            $nilai = "'".$this->escape($nilai)."'";
        }
        $query = "SELECT * FROM $table WHERE $kolom = $nilai";
        $hasil = $this->mysqli->query($query);
        while($row = $hasil->fetch_assoc()){
            return $row;
        }

    }
    public function get_info_picpost($table, $kolom , $nilai){
        if(!is_int($nilai)){
            $nilai = "'".$nilai."'";
        }
        $query = "SELECT * FROM $table WHERE $kolom = '$nilai'";
        $hasil = $this->mysqli->query($query);
        return $hasil;

    }
    public function get_info_tb($param){
        $query = "SELECT * FROM $param";
        $result = $this->mysqli->query($query);
        return $result;
    }
    public function get_info_tb_limit($tabel,$limit){
        $query = "SELECT * FROM $tabel LIMIT $limit";
        $result = $this->mysqli->query($query);
        return $result;
    }
    public function get_artikel_limit($tabel,$start,$perPage){
        $query = "SELECT * FROM $tabel LIMIT $start ,$perPage";
        $result = $this->mysqli->query($query);
        return $result;
    }
    public function get_info_admin($email){
        $query = "SELECT * FROM tb_admin WHERE email = '$email'";
        $result = $this->mysqli->query($query);
        return $result;
    }
    public function update_admin($nama ,$nama_file_final, $email){
        $query = "UPDATE tb_admin SET nama = '$nama', idfoto = '$nama_file_final' WHERE email = '$email'";
        if( $this->mysqli->query($query) ) return true;
        else return false;
    }
    public function update_admin_nopic($nama, $email){
        $query = "UPDATE tb_admin SET nama = '$nama' WHERE email = '$email'";
        if( $this->mysqli->query($query) ) return true;
        else return false;
    }
    public function check_post_get($idpost){
        $query = "SELECT * FROM tb_post WHERE idpost = '$idpost'";
        $result = $this->mysqli->query($query);
        if($result = $result->num_rows){
            return true;
        }
        else {
            return false;
        }
        
    }
    public function get_post_edit($post_id){
        $query = "SELECT * FROM tb_post WHERE idpost = '$post_id'";
        $result = $this->mysqli->query($query);
        return $result;
    }
    public function get_row($tabel, $kolom, $nilai){
        $query = "SELECT * FROM $tabel WHERE $kolom = '$nilai'";
        $result = $this->mysqli->query($query);
        return $result;
    }
    public function escape($name){
        return $this->mysqli->real_escape_string($name);
    }
}
 
?>