<?php
class Login_model extends CI_Model {
 
 
    function __construct()
    {
        parent::__construct();
    }
    
  
  function verificarCredenciales($usuario,$password)
    {    
     return true;
    }
}
?>