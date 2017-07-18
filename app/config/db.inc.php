<?php

try {
    $db = new PDO ('mysql:host=localhost;dbname=poo', 'root', '');
}
catch(Exception $e)  {
    die('Erreur '. $e->getMessage());
}