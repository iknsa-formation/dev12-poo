<?php
/**
 * Created by PhpStorm.
 * User: aston
 * Date: 18/07/2017
 * Time: 15:59
 */

namespace Aston\app;


class DB extends \PDO
{
    private $host = "localhost";
    private $user = 'root';
    private $baseName = 'poo';
    private $passWord = '';

    private $db;

    public function __construct()
    {
        $this->connect();
        return $this;
    }

    public function connect()
    {
        try {
            if(!isset($this->db)) {

                dump($this->getHost());
                dump($this->getUser());
                dump($this->getBaseName());
                $db = new \PDO(
                    'mysql:host='.$this->getHost().
                    ';dbname='.$this->getBaseName(),
                    $this->getUser(), $this->getPassWord()
                );
                $this->setDb($db);
            }
        } catch (\PDOException $e) {
            exit('Unable to connect to db');
        }
    }

    /**
     * @return mixed
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @param mixed $host
     */
    public function setHost($host)
    {
        $this->host = $host;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getBaseName()
    {
        return $this->baseName;
    }

    /**
     * @param mixed $baseName
     */
    public function setBaseName($baseName)
    {
        $this->baseName = $baseName;
    }

    /**
     * @return mixed
     */
    public function getPassWord()
    {
        return $this->passWord;
    }

    /**
     * @param mixed $passWord
     */
    public function setPassWord($passWord)
    {
        $this->passWord = $passWord;
    }

    /**
     * @return mixed
     */
    public function getDb()
    {
        return $this->db;
    }

    /**
     * @param mixed $db
     */
    public function setDb($db)
    {
        $this->db = $db;
    }


}