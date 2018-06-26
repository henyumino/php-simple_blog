<?php

class Session{
    public static function cek_sesi($kunci){
        return (isset($_SESSION[$kunci])) ? true : false ;
    }
    public static function set($kunci ,$nilai){
        return $_SESSION[$kunci] = $nilai;
    }
    public static function get($kunci){
        return $_SESSION[$kunci];
    }
}

?>