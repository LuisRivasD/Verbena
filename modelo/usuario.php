
<?php
$c_user="";
$c_pass="";
class usuario{
  protected $pass_user="";
  protected $pass_user_c="";
  protected $name_user="";

  function setpass($ppass_user){
    $this->pass_user = $ppass_user;
  }

  function getpass(){
    return $this->pass_user;
  }

  function setuser($pname_user){
    $this->name_user = $pname_user;
  }

  function getuser(){
    return $this->name_user;
  }

  function setpass_c($ppass_user_c){
    $this->pass_user_c = $ppass_user_c;
  }

  function getpass_c(){
    return $this->pass_user_c;
  }

  public function buscaadmin(){
    // echo '<p>' .$this->getuser().'</p>';
    require '..\basedatos\conexion.php';
    $result=pg_query($conexion,
    'select usuario, contrasena from administrador where usuario ='."'". $this->getuser()."'");
    while ($dato = pg_fetch_array($result)){
      $c_user = $dato['usuario'];
      $c_pass = $dato['contrasena'];
      $this->setpass_c($c_pass);
    }
    pg_close($conexion);
  }

  public function buscacolaborador(){
    require '..\basedatos\conexion.php';
    $result=pg_query($conexion,
    'select usuario, contrasena from colaborador where usuario ='."'". $this->getuser()."'");
    while ($dato = pg_fetch_array($result)){
      $c_user = $dato['usuario'];
      $c_pass = $dato['contrasena'];
      $this->setpass_c($c_pass);
    }
    pg_close($conexion);
  }

  public function buscacliente(){
    require '..\basedatos\conexion.php';
    $result=pg_query($conexion,
    'select usuario, contrasena from usuario where usuario ='."'". $this->getuser()."'");
    while ($dato = pg_fetch_array($result)){
      $c_user = $dato['usuario'];
      $c_pass = $dato['contrasena'];
      $this->setpass_c($c_pass);
    }
    pg_close($conexion);
  }

}
?>
