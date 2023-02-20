<?php
use PDO;
class Getpdo
{
    public function __construct()
    {
        $bdd = new PDO('mysql:host=localhost;dbname=nameBDD', 'root', '');
        $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $bdd;
    }   
}
