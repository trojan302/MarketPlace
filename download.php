<?php 


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'localhost/oop-shopping-cart/content.php');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$my_html = curl_exec($ch);
curl_close($ch);

require_once './vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->set('isRemoteEnabled', TRUE);

$dompdf = new Dompdf($options);
$contxt = stream_context_create([ 
    'ssl' => [ 
        'verify_peer' => FALSE, 
        'verify_peer_name' => FALSE,
        'allow_self_signed'=> TRUE
    ] 
]);
$dompdf->setHttpContext($contxt);

$dompdf->loadHtml($my_html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream('products-report.pdf',array('Attachment'=>0));


?>