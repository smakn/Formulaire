//<?php

     use Dompdf\Dompdf;
     use Dompdf\Options;
     require_once 'dompdf/autoload.inc.php';
    ob_start();
    $html= ob_get_contents();
     //definir la police d ecriture
     $options = new Options();
     // set pour creer  une option
     $options -> set('defaultFont', 'Courier');
     require_once "connect.php";
      ob_end_clean();
    $pdf=new Dompdf($options);
    $pdf ->loadHtml($html);
  // definir le type de format
    $pdf -> setPaper('A4', 'portrait');


  // demander de l envoyer
    $pdf -> render();

    //definir le nom du doccument pdf
    $fichier='Données-enregistré.pdf';
    $pdf -> stream($fichier);


?>