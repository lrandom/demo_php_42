<?php
require_once 'DB.php';
require_once 'IDal.php';

class DalUser extends DB implements IDal
{


    public function __construct()
    {
        parent::__construct();
        $this->setTableName("users");
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
                      (name,email,password,phone,address,role) 
                      VALUES (:name,:email,:password,:phone,:address,:role)");
            $prepareStm->bindParam(':name', $data['name']);
            $prepareStm->bindParam(':email', $data['email']);
            $prepareStm->bindParam(':password', $data['password']);
            $prepareStm->bindParam(':phone', $data['phone']);
            $prepareStm->bindParam(':address', $data['address']);
            $prepareStm->bindParam(':role', $data['role']);
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
            $prepareStm = $this->db->prepare("UPDATE $this->tableName SET name = :name,
                                                                                email = :email,
                                                                                phone = :phone,
                                                                                address = :address,
                                                                                role = :role
                                                                                WHERE id = :id");
            $prepareStm->bindParam(':name', $data['name']);
            $prepareStm->bindParam(':email', $data['email']);
            $prepareStm->bindParam(':phone', $data['phone']);
            $prepareStm->bindParam(':address', $data['address']);
            $prepareStm->bindParam(':role', $data['role']);
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