<?php

namespace App\Service;

// use Dompdf\Dompdf;
// use Dompdf\Options;


class ContractGenerator
{
    private $pdf;

    public function __construct()
    {
        // $this->pdf = new Dompdf();
    }

    // reste à faire ***************************************************************************
    // changer le nom des variables dans le template
    // faire un test avec des données statiques
    // faire un test avec de vraie données
    // faire un test avec l'ajout d'un contrat
    // faire un test avec modif d un contrat
    //ajouter logo myjcc
    //add diagonale background gray text watermark
    //améliorer css https://github.com/dompdf/dompdf


    public function generateContract($contractData, $pdfName)
    {
        // Load the HTML template and replace the placeholders with the contract data
        $html = file_get_contents(__DIR__ . '/../templates/contratsponsoring/pdfTemplate.html');
        $html = str_replace('[[String1]]', $contractData['String1'], $html);
        $html = str_replace('[[String2]]', $contractData['String2'], $html);
        $html = str_replace('[[String3]]', $contractData['String3'], $html);
        $html = str_replace('[[String4]]', $contractData['String4'], $html);
        $html = str_replace('[[String5]]', $contractData['String5'], $html);
        $html = str_replace('[[String6]]', $contractData['String6'], $html);
        $html = str_replace('[[String7]]', $contractData['String7'], $html);
        $html = str_replace('[[String8]]', $contractData['String8'], $html);
        $html = str_replace('[[String9]]', $contractData['String9'], $html);
        $html = str_replace('[[String10]]', $contractData['String10'], $html);
        $html = str_replace('[[String11]]', $contractData['String11'], $html);
        $html = str_replace('[[String12]]', $contractData['String12'], $html);
        $html = str_replace('[[String13]]', $contractData['String13'], $html);
        $html = str_replace('[[String14]]', $contractData['String14'], $html);

        // Set Dompdf options and load the HTML
        // $options = new Options();
        // $options->setIsRemoteEnabled(true);
        // $this->pdf->setOptions($options);
        // $this->pdf->loadHtml($html);

        // // Render the PDF
        // $this->pdf->render();
        // $output = $this->pdf->output();

        // return $output;
    }
}
