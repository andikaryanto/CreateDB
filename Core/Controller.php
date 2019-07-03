<?php
namespace Core;
use Core\Request;
use Core\Security;

class Nayo_Controller{
    protected $request = false;
    protected $session = false;
    // protected $security = false;
    public $tokenname = "";
    public $tokenhash = "";

    public function __construct(){

        if(!$this->request)
            $this->request = new Request();
        if(!$this->session)
            $this->session = new Session();

        // if($GLOBALS['config']['csrf_security']){
        //     $security = false;
        //     if(!$security){
        //         $security = new Security();   
        //     }

        //     if(!$this->session->get($security->getCsrfTokenName())){
        //         $this->session->set($security->getCsrfTokenName(), $this->request->post($security->getCsrfTokenName()));
        //         $this->session->set($security->getCsrfHash(), $this->request->post($security->getCsrfHash()));
        //     } 


        //     if($this->request->type() == "POST"){
        //         if($this->session->get($security->getCsrfHash()) != $this->request->post($security->getCsrfHash())){

        //         }
        //     }
        // } else {
        //     if($this->session->get($security->getCsrfTokenName())){
        //         $this->session->unset($security->getCsrfTokenName());
        //         $this->session->unset($security->getCsrfHash());
        //     }
        // }
    }

    public function view(string $url = "", $datas = array()){
        // echo $url;
        extract($datas) ;
        include(APP_PATH."Views/".$url.".php");

    }

    public function input(string $var){
        return $_POST[$var];
    }

    

}