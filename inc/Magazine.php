<?php

// namespace ArticleBundle;

require_once 'Article.php';
require_once 'ArticleInterface.php';

class Magazine extends Article implements ArticleInterface {

    private $isbn;
    private $version;

    public function getVersion() {
        return $this->version;
    }

    public function getIsbn() {
        return $this->isbn;
    }

    public function parler()  {
        echo 'holl';
    }
}