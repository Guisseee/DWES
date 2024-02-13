<?
class Usuario {
  private $id;
  private $usuario;
  private $password;

  public function setid($id) {
    $this->id= $id;
  }

  public function getid() {
    return  $this->id;
  }

  public function setusuario($usuario) {
    $this->usuario= $usuario;
  }

  public function getusuario() {
    return $this->usuario;
  }

  public function setPassword($contraseña){
    $this->password= $contraseña;
  }

  public function getPassword(){
    return $this->password;
  }
}