<?php
// Inclure le fichier autoload.php de PhpSpreadsheet
require_once 'vendor/autoload.php';

// Connexion à la base de données
$conn = new PDO('mysql:host=localhost;dbname=projetweb', 'root', '');

// Requête SQL pour récupérer les données
$sql = "SELECT * FROM formateur";
$result = $conn->query($sql);

// Créer un objet Spreadsheet
$spreadsheet = new PhpOffice\PhpSpreadsheet\Spreadsheet();

// Définir la feuille de calcul active
$worksheet = $spreadsheet->getActiveSheet();
$worksheet->setTitle('Formateurs');

// Ajouter les en-têtes de colonne
$worksheet->setCellValue('A1', 'ID')
          ->setCellValue('B1', 'Nom')
          ->setCellValue('C1', 'Prénom')
          ->setCellValue('D1', 'Adresse')
          ->setCellValue('E1', 'Date de naissance');

// Ajouter les données de la base de données
$row = 2;
while ($data = $result->fetch(PDO::FETCH_ASSOC)) {
    $worksheet->setCellValue('A'.$row, $data['idformateur'])
              ->setCellValue('B'.$row, $data['lastName'])
              ->setCellValue('C'.$row, $data['firstName'])
              ->setCellValue('D'.$row, $data['address'])
              ->setCellValue('E'.$row, $data['dob']);
    $row++;
}

// Enregistrer le fichier Excel
$writer = new PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
$writer->save('formateurs.xlsx');