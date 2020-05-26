<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductoController
 *
 * @author luisc
 */
require_once 'models/producto.php';

class ProductoController {

  public function index() {
    
    $producto = new Producto;
    $productos = $producto->getRandom(6);

    require_once 'views/layout/producto/destacados.php';
  }
  
  public function ver(){
    
     if (isset($_GET['id'])) {
        $id = $_GET['id'];

      $producto = new Producto();
      $producto->setId($id);

      $product = $producto->getOne();
     
    }
 require_once 'views/layout/producto/ver.php';
  }

  public function gestion() {
    Utils::isAdmin();
    $producto = new Producto();
    $productos = $producto->getALL();

    require_once 'views/layout/producto/gestion.php';
  }

  public function crear() {
    Utils::isAdmin();
    require_once 'views/layout/producto/crear.php';
  }

  public function save() {
    Utils::isAdmin();
    if (isset($_POST)) {
      $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
      $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
      $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
      $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;

      if ($nombre && $precio && $stock && $categoria) {
        $producto = new Producto();
        $producto->setNombre($nombre);
        $producto->setPrecio($precio);
        $producto->setStock($stock);
        $producto->setCategoria_id($categoria);

        //guaradar la imagen
        if (isset($_FILES['imagen'])) {
          $file = $_FILES['imagen'];
          $filename = $file['name'];
          $mimetype = $file['type'];

          if ($mimetype == "image/jpg" || $mimetype == "image/png" || $mimetype == "image/jpeg" || $mimetype == "image/gif") {

            if (!is_dir('uploads/images')) {
              mkdir('uploads/images', 0777, true);
            }

            move_uploaded_file($file['tmp_name'], 'uploads/images/' . $filename);
            $producto->setImagen($filename);
          }
        }
        if (isset($_GET['id'])) {
          $id = $_GET['id'];
          $producto->setId($id);
          $save = $producto->edit();
        }
        else {
          $save = $producto->save();
        }


        if ($save) {
          $_SESSION['producto'] = 'complete';
        }
        else {
          $_SESSION['producto'] = 'failded';
        }
      }
      else {
        $_SESSION['producto'] = 'failded';
      }
    }
    else {
      $_SESSION['producto'] = 'failded';
    }

    header('Location: ' . base_url . 'producto/gestion');
  }

  public function editar() {
    Utils::isAdmin();
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $edit = true;

      $producto = new Producto();
      $producto->setId($id);

      $pro = $producto->getOne();
      require_once 'views/layout/producto/crear.php';
    }
    else {
      header('Location:' . base_url . 'producto/gestion');
    }
  }

  public function eliminar() {
    Utils::isAdmin();

    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $producto = new Producto();
      $producto->setId($id);
      $delete = $producto->delete();

      if ($delete) {
        $_SESSION['delete'] = 'complete';
      }
      else {
        $_SESSION['delete'] = 'failed';
      }
    }
    else {
      $_SESSION['delete'] = 'failed';
    }
    header('Location:' . base_url . 'producto/gestion');
  }

}
