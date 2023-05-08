<?php
include 'C:/xampp/htdocs/freshshop-master/config.php';
include 'C:/xampp/htdocs/freshshop-master/client.php';

class clientC
{
    public function listclient()
    {
        $sql = "SELECT * FROM client";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteclient($id)
    {
        $sql = "DELETE FROM client WHERE idclient = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addclient($client)
    {
        $sql = "INSERT INTO client  
        VALUES (NULL, :fn ,:ad,:v, :pwd)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'fn' => $client->getfirstname(),
                'ad' => $client->getadresse(),
                'v' => $client->getville(),
                'pwd' => $client->getpassword()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateclient($client, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE client SET 
                    firstname = :firstname,
                    adresse = :adresse, 
                    ville = :ville, 
                    password = :password
                    
                WHERE idclient= :idclient'
            );
            $query->execute([
                'idclient' => $id,
                'firstname' => $client->getfirstname(),
                'adresse' => $client->getadresse(),
                'ville' => $client->getville(),
                'password' => $client->getpassword()
                
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showclient($id)
    {
        $sql = "SELECT * from client where idclient = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $client = $query->fetch();
            return $client;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
