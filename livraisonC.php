<?php
include 'c:/xampp/htdocs/freshshop-master/config.php';
include 'c:/xampp/htdocs/freshshop-master/livraison.php';

class livraisonC
{
    public function listlivraison()
    {
        $sql = "SELECT * FROM livraison";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deletelivraison($id)
    {
        $sql = "DELETE FROM livraison WHERE idLivreur = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addlivraison($livraison)
    {
        $sql = "INSERT INTO livraison  
        VALUES (NULL,:ln,:lc, :ad,:dateLiv)";
        $db = config::getConnexion();
        try {
            print_r($livraison->getdate()->format('Y-m-d'));
            $query = $db->prepare($sql);
            $query->execute([
                //'fn' => $livraison->getidLivreur(),
                'ln' => $livraison->getnumCmd(),
                'lc' => $livraison->getprixLiv(),
                'ad' => $livraison->getadresse(),
                'dateLiv' => $livraison->getdate()->format('Y/m/d')
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updatelivraison($livraison, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE livraison SET  
                    numCmd = :numCmd, 
                    prixLiv = :prixLiv, 
                    adresse = :adresse, 
                    dateLiv = :dateLiv
                WHERE idLivreur= :idLivreur'
            );
            $query->execute([
                'idLivreur' => $id,
                //'idLivreur' => $livraison->getidLivreur(),
                'numCmd' => $livraison->getnumCmd(),
                'prixLiv' => $livraison->getprixLiv(),
                'adresse' => $livraison->getadresse(),
                'dateLiv' => $livraison->getdate()->format('Y/m/d')
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showlivraison($id)
    {
        $sql = "SELECT * from livraison where idLivreur = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $livraison = $query->fetch();
            return $livraison;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
