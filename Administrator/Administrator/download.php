<?php

$file = $_GET['f']; 

header("Expires: 0");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

$ext = pathinfo($file, PATHINFO_EXTENSION);
$basename = pathinfo($file, PATHINFO_BASENAME);

header("Content-type: application/".$ext);
header('Content-length: '.filesize($file));
header("Content-Disposition: attachment; filename=\"$basename\"");
ob_clean(); 
flush();
readfile($file);
exit;

?>