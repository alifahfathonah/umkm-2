<?php 

class Api_kota {
    protected $api_kota;

    function __construct(){
        $this->api_kota = &get_instance();
    }

    public static function provinsi()
    {
        $link = 'http://127.0.0.1/api_indonesia/request/provinsi?id=';
        return $link;
    }

    public static function provinsi_all()
    {
        $link = 'http://127.0.0.1/api_indonesia/request/provinsi?id=all';
        return $link;
    }

     public static function kota()
    {
        $link = 'http://127.0.0.1/api_indonesia/request/kota?id=';
        return $link;   
    }

     public static function kecamatan()
    {
        $link = 'http://127.0.0.1/api_indonesia/request/kecamatan?id=';
        return $link;
    }
} 