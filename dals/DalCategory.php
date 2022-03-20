<?php
require_once 'DB.php';
require_once 'IDal.php';

class DalCategory extends DB implements IDal
{
    public function __construct()
    {
        parent::__construct();
        $this->setTableName("categories");
    }

    function add($data)
    {
        /*  [
              'email' => $email,
              'password' => $password,
              'phone' => $phone,
              'address' => $address,
              'role' => $role,
          ] */
        // TODO: Implement add() method.
        try {
            $prepareStm = $this->db->prepare("INSERT INTO $this->tableName
                      (name) 
                      VALUES (:name)");
            $prepareStm->bindParam(':name', $data['name']);
            $prepareStm->execute();
            return true;
        } catch (PDOException $exception) {
            return false;
        }
    }

    function update($data, $id)
    {
        // TODO: Implement update() method.
        try {
            $prepareStm = $this->db->prepare("UPDATE $this->tableName SET name = :name
                                                                            WHERE id = :id");
            $prepareStm->bindParam(':name', $data['name']);
            $prepareStm->bindParam(':id', $id);
            $prepareStm->execute();
            return true;
        } catch (PDOException $exception) {
            //echo $exception->getMessage();
            return false;
        }
    }

}

?>