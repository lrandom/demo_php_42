<?php

class DB
{

    const DB_HOST = "127.0.0.1";
    const DB_USER = "root";
    const DB_PASSWORD = "koodinh@";
    const DB_NAME = "book_shop";
    const PAGE_SIZE = 10;

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
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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


    function delete($id)
    {
        // TODO: Implement delete() method.
        try {
            $prepareStm = $this->db->prepare("DELETE FROM $this->tableName WHERE id = :id");
            $prepareStm->bindParam(':id', $id);
            $prepareStm->execute();
            return true;
        } catch (PDOException $exception) {
            return false;
        }
    }

    function getTotalRows()
    {
        $sql = "SELECT COUNT(*) as total_rows FROM $this->tableName";
        $stm = $this->db->query($sql);
        $row = $stm->fetch(PDO::FETCH_OBJ);
        return $row->total_rows;//ko cần phải dùng vòng lặp
    }




    function getList($page = 1, $pageSize = self::PAGE_SIZE)
    {
        // TODO: Implement getList() method.
        $offset = ($page - 1) * $pageSize;
        $sql = "SELECT * FROM $this->tableName ORDER BY id DESC LIMIT $offset,$pageSize";
        $stm = $this->db->query($sql);
        $result = [];
        while ($row = $stm->fetch(PDO::FETCH_OBJ)) {
            $result[] = $row;
        }
        return $result;
    }

    function get($id)
    {
        // TODO: Implement get() method.
        $sql = "SELECT * FROM $this->tableName WHERE id = $id";
        $stm = $this->db->query($sql);
        return $stm->fetch(PDO::FETCH_OBJ);//ko cần phải dùng vòng lặp
    }
}

?>