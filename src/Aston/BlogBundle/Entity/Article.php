<?php
/**
 * Created by PhpStorm.
 * User: aston
 * Date: 19/07/2017
 * Time: 10:42
 */

namespace Aston\BlogBundle\Entity;


class Article {

    private $_titre;
    private $_auteur;
    private $_date;
    private $_image;
    private $_message;

    public function __construct($data) {
        $this->hydrate($data);
    }
    public function getTitre() {
        return $this->_titre;
    }
    public function getAuteur() {
        return $this->_auteur;
    }
    public function getDate() {
        return $this->_date;
    }
    public function getImage() {
        return $this->_image;
    }
    public function getMessage() {
        return $this->_message;
    }
    public function setTitre($titre) {
        if(is_numeric($titre)) {
            echo "Le titre doit etre une chaine de caractere";
        } else {
            $this->_titre = $titre;
        }
    }
    public function setAuteur($auteur) {
        if(is_numeric($auteur)) {
            echo "Le auteur doit etre une chaine de caractere";
        } else {
            $this->_auteur = $auteur;
        }
    }
    public function setMessage($message) {
        if(is_numeric($message)) {
            echo "Le message doit etre une chaine de caractere";
        } else {
            $this->_message = $message;
        }
    }
    public function hydrate (array $data) {
        foreach($data as $key => $value) {
            $method = 'set'.ucfirst($key);
            if(method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
}
