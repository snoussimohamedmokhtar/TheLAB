<?php
// Inclure le fichier autoload.php de PhpSpreadsheet
require_once 'vendor/autoload.php';

// Connexion à la base de données
$conn = new PDO('mysql:host=localhost;dbname=projetweb', 'root', '');

// Requête SQL pour récupérer les données
$sql = "SELECT * FROM commande";
$result = $conn->query($sql);

// Créer un objet Spreadsheet
$spreadsheet = new PhpOffice\PhpSpreadsheet\Spreadsheet();

// Définir la feuille de calcul active
$worksheet = $spreadsheet->getActiveSheet();
$worksheet->setTitle('commande');

// Ajouter les en-têtes de colonne
$worksheet->setCellValue('A1', 'numero Commande')
          ->setCellValue('B1', 'date envoi')
          ->setCellValue('C1', 'Quantité')
          ->setCellValue('D1', 'prix Commande')
          ->setCellValue('E1', 'id client');

// Ajouter les données de la base de données
$row = 2;
while ($data = $result->fetch(PDO::FETCH_ASSOC)) {
    $worksheet->setCellValue('A'.$row, $data['numCmd'])
              ->setCellValue('B'.$row, $data['dateEnvoi'])
              ->setCellValue('C'.$row, $data['qnt'])
              ->setCellValue('D'.$row, $data['prixCmd'])
              ->setCellValue('E'.$row, $data['idclient']);
    $row++;
}

// Enregistrer le fichier Excel
$writer = new PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
$writer->save('commande.xlsx');