<?php

require_once 'inc/Article.php';
require_once 'inc/db.inc.php';
require_once 'inc/ArticleManager.php';

var_dump($db);
$manager = new ArticleManager($db);
$data = ['titre' => "Mon titre", 'auteur' => ' mon  Auteur', 'message' => 'un message'];
$article1 = new Article($data);

var_dump($article1->getTitre());
var_dump($article1->getAuteur());
var_dump($article1->getMessage());
$manager->getAllArticle();