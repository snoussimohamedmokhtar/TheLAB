<?php
include '../config.php';
include '../Model/Formation.php';

class formationC
{
    public function listformation()
    {
        $sql = "SELECT * FROM formation";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteformation($id)
    {
        $sql = "DELETE FROM formation WHERE idformation = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addformation($formation)
    {
        $sql = "INSERT INTO formation  
        VALUES (NULL, :fn,:ln, :ad, :im)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'fn' => $formation->gettypeformation(),
                'ln' => $formation->getdiscription(),
                'ad' => $formation->getArticle(),
                'im' => $formation->getpd_img()

            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateformation($formation, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE formation SET 
                    typeformation = :typeformation, 
                    discription = :discription, 
                    Article = :Article,
                    pd_img = :pd_img
                WHERE idformation= :idformation'
            );
            $query->execute([
                'idformation' => $id,
                'typeformation' => $formation->gettypeformation(),
                'discription' => $formation->getdiscription(),
                'Article' => $formation->getArticle(),
                'pd_img' => $formation->getpd_img()
                
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showformation($id)
    {
        $sql = "SELECT * from formation where idformation = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $formation = $query->fetch();
            return $formation;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
