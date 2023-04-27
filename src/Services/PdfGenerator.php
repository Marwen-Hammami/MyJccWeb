<?php

namespace App\Services;

use Dompdf\Dompdf;
use Twig\Environment;
use Symfony\Component\HttpFoundation\File\File;

class PdfGenerator
{
    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function generatePdf($contratsponsoring, $sponsor, $photographe, $filename)
    {
        $sponsorImagePath = $sponsor->getPhotob64();
        $photographeImagePath = $photographe->getPhotob64();
        $signatureSponsor = $contratsponsoring->getSignaturesponsor();
        $signaturePhotographe = $contratsponsoring->getSignaturephotographe();

        // Convertir les images à base64
        $sponsorImageB64 = base64_encode(file_get_contents($sponsorImagePath));
        $photographeImageB64 = base64_encode(file_get_contents($photographeImagePath));
        $signatureSponsorB64 = base64_encode(file_get_contents($signatureSponsor));
        if ($signaturePhotographe == "-") {
            $signaturePhotographeB64 = "-";
        } else {
            $signaturePhotographeB64 = base64_encode(file_get_contents($signaturePhotographe));
        }

        $html = $this->twig->render('pdfContratTemplate.html.twig', [
            'contratsponsoring' => $contratsponsoring,
            'sponsor' => $sponsor,
            'sponsorImageB64' => $sponsorImageB64,
            'photographe' => $photographe,
            'photographeImageB64' => $photographeImageB64,
            'signatureSponsorB64' => $signatureSponsorB64,
            'signaturePhotographeB64' => $signaturePhotographeB64,
        ]);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();

        //afficher le fichier sur le navigateur
        // return $dompdf->output();

        // Save the PDF to the specified directory
        $outputPath = 'C:/xampp/htdocs/myjcc/contrats/' . $filename;
        file_put_contents($outputPath, $dompdf->output());
    }
}
