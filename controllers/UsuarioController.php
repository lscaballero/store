<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsuarioController
 *
 * @author luisc
 */
//use models\Usuario as user_model;

require_once 'models/usuario.php';

class UsuarioController {

  public function index() {
    echo "Usuario Controller";
  }

  public function registro() {
    require_once 'views/usuario/registro.php';
  }

  public function save() {
    if (isset($_POST)) {
      $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
      $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
      $email = isset($_POST['email']) ? $_POST['email'] : false;
      $password = isset($_POST['password']) ? $_POST['password'] : false;

      if ($nombre && $apellidos && $email && $password) {
        $usuario = new Usuario();
        $usuario->setNombre($nombre);
        $usuario->setApellidos($apellidos);
        $usuario->setEmail($email);
        $usuario->setPassword($password);
        
        $save = $usuario->save();
        if ($save) {
          $_SESSION['register'] = 'complete';
          header("Location:" . base_url . 'usuario/registro');
        }
        else {
          $_SESSION['register'] = 'failed';
        }
      }
      else{
        $_SESSION['register'] = 'failed';
        echo "alguno de los campos no es correcto";
      }
    }
    else {
      $_SESSION['register'] = 'failed';
      header("Location:" . base_url . 'usuario/registro');
    }
  }
  
  public function login(){
    
    if(isset($_POST)){
      
      $usuario = new Usuario();
      $usuario->setEmail($_POST['email']);
      $usuario->setPassword($_POST['password']);
      
      $identity = $usuario->login();
      
      if($identity && is_object($identity)){
        $_SESSION['identity'] = $identity;       
        
        if($identity->rol == 'admin'){
          
          $_SESSION['admin'] = true;
          
        }

      }
      else{
        $_SESSION['error_login'] = 'identificación fallida !';
      }
      
    }
    header('Location: '.base_url);
    
  }
  
  public function logout(){
    
  if(isset($_SESSION['identity'])){
    unset($_SESSION['identity']);
  }
  
  if($_SESSION['identity'] == 'admin'){
        unset($_SESSION['identity']);
  }
   header('Location: '.base_url);
  }

}// fin clase
