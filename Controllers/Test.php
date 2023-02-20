<?php
namespace Controllers;
    class Test
    {
       public function __construct($methode) {
        $this->$methode();
       }
       public function get()
       {
        echo 'get';
       }
    }
?>