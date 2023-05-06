<?php
include 'C:/xampp/htdocs/freshshop-master/config.php';
include 'C:/xampp/htdocs/freshshop-master/commande.php';

class commandeC
{
    public function listcommande()
    {
        $sql = "SELECT * FROM commande";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deletecommande($id)
    {
        $sql = "DELETE FROM commande WHERE numCmd = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addcommande($commande)
    {
        $sql = "INSERT INTO commande  
        VALUES (NULL,:ln,:lc, :ad,:idclient)";
        $db = config::getConnexion();
        try {
            print_r($commande->getdateEnvoi()->format('Y-m-d'));
            $query = $db->prepare($sql);
            $query->execute([
                'ln' => $commande->getdateEnvoi()->format('Y/m/d'),
                'lc' => $commande->getqnt(),
                'ad' => $commande->getprixCmd(),
                'idclient' => $commande->getidclient()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updatecommande($commande, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE commande SET  
                    dateEnvoi = :dateEnvoi,
                    qnt = :qnt, 
                    prixCmd = :prixCmd, 
                    idclient = :idclient
                WHERE numCmd= :numCmd'
            );
            $query->execute([
                'numCmd' => $id,
                'dateEnvoi' => $commande->getdateEnvoi()->format('Y/m/d'),
                'qnt' => $commande->getqnt(),
                'prixCmd' => $commande->getprixCmd(),
                'idclient' => $commande->getidclient()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showcommande($id)
    {
        $sql = "SELECT * from commande where numCmd = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $commande = $query->fetch();
            return $commande;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
