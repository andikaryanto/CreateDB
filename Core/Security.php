<?php
namespace Core;

class Security {
    protected $length = 256;
    protected $tokenName = "CsrfNayo";

    public function getCsrfHash(){
        return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $this->length); 
    }

    public function getCsrfTokenName(){
        return $this->tokenName;
    }

}