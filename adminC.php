<?php
//include 'C:/xampp/htdocs/freshshop-master/config.php';
include 'C:/xampp/htdocs/freshshop-master/admin.php';

class adminC
{
    public function listadmin()
    {
        $sql = "SELECT * FROM admin";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteadmin($id)
    {
        $sql = "DELETE FROM admin WHERE idadmin = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addadmin($admin)
    {
        $sql = "INSERT INTO admin  
        VALUES (NULL, :fn ,:ad,:v, :pwd)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'fn' => $admin->getfirstname(),
                'ad' => $admin->getadresse(),
                'v' => $admin->getville(),
                'pwd' => $admin->getpassword()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateadmin($admin, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE admin SET 
                    firstname = :firstname,
                    adresse = :adresse, 
                    ville = :ville, 
                    password = :password
                    
                WHERE idadmin= :idadmin'
            );
            $query->execute([
                //'idadmin' => $id,
                'firstname' => $admin->getfirstname(),
                'adresse' => $admin->getadresse(),
                'ville' => $admin->getville(),
                'password' => $admin->getpassword()
                
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showadmin($id)
    {
        $sql = "SELECT * from admin where idadmin = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $admin = $query->fetch();
            return $admin;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
