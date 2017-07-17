<?php
namespace Peugeot;
require_once 'inc/Utils.php';


class Voiture {
    use \Utils;
    const MARQUE = "Peugeot";
    public function marque() {
        echo 'Peugeot';
    }
}