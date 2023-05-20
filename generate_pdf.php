<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

<style>
  /* @font-face{
    font-family: ;
    src: "";
  } */
</style>
১


<?php

require_once __DIR__ . '/vendor/autoload.php';

// $mpdf = new \Mpdf\Mpdf();
$mpdf = new \Mpdf\Mpdf([
  'default_font_size' => 20,
  'default_font' => 'nikosh'
]);

// include "webfonts/"

require_once "inc/const.php";
echo SITE_URL;

// ;




$ht = '<div >হ m</div>';

// $mpdf->default_font(['nikosh']);
// $mpdf-> Mpdf([
//   'default_font' => 'nikosh'
// ]);
$mpdf->WriteHTML($ht);
$mpdf->Output('THIS.pdf', 'I');



?>
</body>
</html>