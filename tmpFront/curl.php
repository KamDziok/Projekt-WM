<?php

class ClientURL{
    private $ch;
    private $rezult;

    public function __construct(){
        $this->ch = curl_init();
    }

    public function setGetURL($url){
        curl_setopt($this->ch, CURLOPT_URL, $url);
        curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, false); //pominiecie https (xampp nie osluguje)
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
    }

    public function setPostURL($url, $data){
        curl_setopt($this->ch, CURLOPT_URL, $url);
        curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, false); //pominiecie https (xampp nie osluguje)
        curl_setopt($this->ch, CURLOPT_POST, 1);
        curl_setopt($this->ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
    }

    public function exec(){
        $this->rezult = curl_exec($this->ch);
        curl_close($this->ch);
        return $this->rezult;
    }
}