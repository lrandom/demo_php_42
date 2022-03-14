<?php

class DB
{

    const DB_HOST = "127.0.0.1";
    const DB_USER = "root";
    const DB_PASSWORD = "koodinh@";
    const DB_NAME = "book_shop";


    protected $db;
    protected $tableName = "";

    /**
     * @param string $tableName
     */
    public function setTableName($tableName)
    {
        $this->tableName = $tableName;
    }



    public function __construct()
    {
        $this->db = new PDO("mysql:host=" . self::DB_HOST . ";dbname=" . self::DB_NAME,
            self::DB_USER,
            self::DB_PASSWORD);
        PDO::setAttribute($this->db, PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->db->exec("set names utf8");
    }

    public function closeConnect()
    {
        $this->db = null;
    }

    function _destruct()
    {
        $this->closeConnect();
    }
}

?>