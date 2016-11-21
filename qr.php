<?php  

include('../qr/qrlib.php');
include('../qr/qrconfig.php');

//how to build raw content- QRCode with simple Business Card 
(VCard)$tempDir='qr/tempo';

//here our data
$link='http://localhost/vibaMusic/index.php';

//we building raw data
$codeContents='BEGIN:VCARD'."\n";
$codeContents.='LN:'.$link."\n";
$codeContents.='END:VCARD';

//generating 
QRcode::png ($codeContents,$tempDir.'025.png',QR_ECLEVEL_L,3);

//displaying
echo '<img src="'.EXAMPLE_TMP_URLRELPATH.'025.png"/>';

?>