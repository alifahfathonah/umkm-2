<?php 

class Api_kota {
    protected $api_kota;

    function __construct(){
        $this->api_kota = &get_instance();
    }

    public static function provinsi()
    {
        $link = 'https://bukacoding.my.id/project/api_indonesia/request/provinsi?id=';
        return $link;
    }

     public static function kota()
    {
        $link = 'https://bukacoding.my.id/project/api_indonesia/request/kota?id=';
        return $link;   
    }

     public static function kecamatan()
    {
        $link = 'https://bukacoding.my.id/project/api_indonesia/request/kecamatan?id=';
        return $link;
    }
} 