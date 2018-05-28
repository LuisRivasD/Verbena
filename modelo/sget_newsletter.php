<?php

class news{
  protected $identificador="";
  protected $email="";

  function setid($pidentificador){
    $this->identificador = $pidentificador;
  }

  function getid(){
    return $this->identificador;
  }


    function setemail($pemail){
      $this->email = $pemail;
    }

    function getemail(){
      return $this->email;
    }

}

?>
