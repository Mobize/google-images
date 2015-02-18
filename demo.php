<?php 
include_once 'inc/google_img.php';

$search = !empty($_GET['search']) ? $_GET['search'] : '';

if (empty($search)) {
	exit('Empty search parameter in URL.<br />Call page with ?search=... to use it.');
}

$google_img_src = getGoogleImg($search);

if (empty($google_img_src)) {
	exit('No image found for search ['.$search.']');	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Google Image API Demo</title>	
</head>
<body>
	<img src="<?= $google_img_src ?>" />
</body>
</html>