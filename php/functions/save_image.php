<?php

function createRandomPicName() {
    $chars = "abcdefghijkmnopqrstuvwxyz023456789";
    mt_srand((double)microtime()*1000000);
    $i = 0;
    $pass = '' ;
    while ($i <= 10) {
        $num = random_int(0, mt_getrandmax()) % 33;
        $tmp = substr($chars, $num, 1);
        $pass = $pass . $tmp;
        $i++;
    }
    return $pass;
}

$image = createRandomPicName() . ".png";
$filteredData=substr((string) $_POST['img_val'], strpos((string) $_POST['img_val'], ",")+1);
$unencodedData=base64_decode($filteredData);

file_put_contents($image, $unencodedData);

	$file = $image;
	header('Content-Description: File Transfer');
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename='.basename($file));
	header('Content-Transfer-Encoding: binary');
	header('Expires: 0');
	header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	header('Pragma: public');
	header('Content-Length: ' . filesize($file));
	ob_clean();
	flush();
	readfile($file);

	unlink( $image );

exit;

?>