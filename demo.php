<?php 
include_once 'inc/google_img.php';

$search = !empty($_GET['search']) ? $_GET['search'] : '';

if (empty($search)) {
	exit('Empty search parameter in URL.<br />Call page with ?search=... to use it.');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Google Image API Demo</title>	
</head>
<body>
	<img src="<?= getGoogleImg($search) ?>" />
</body>
</html>