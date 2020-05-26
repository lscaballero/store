<?php

function controllers_autoload($clase_name){
  include 'controllers/'.$clase_name. '.php';
}

spl_autoload_register('controllers_autoload');