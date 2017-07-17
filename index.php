<?php

require_once 'inc/Article.php';
require_once 'inc/db.inc.php';
require_once 'inc/ArticleManager.php';
require_once 'inc/Magazine.php';
require_once 'inc/Citroen/Voiture.php';
require_once 'inc/Peugeot/Voiture.php';

// var_dump($db);
$manager = new ArticleManager($db);
$data = ['titre' => "Mon titre", 'auteur' => ' mon  Auteur', 'message' => 'un message'];
$article1 = new Article($data);
$magazine = new Magazine($data);

// var_dump($magazine);
// var_dump($magazine->getAuteur());
// var_dump($magazine->getMessage());
// // $manager->getAllArticle();

$vPeugeot = new Peugeot\Voiture();
$vCitroen = new Citroen\Voiture();

// var_dump($vPeugeot->marque());
// var_dump($vPeugeot::MARQUE);
// var_dump($vCitroen::MARQUE);
var_dump($vPeugeot->utilB(3));