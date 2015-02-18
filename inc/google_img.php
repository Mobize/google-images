<?php
function cleanString($str, $replace=array(), $delimiter='+') {
	if( !empty($replace) ) {
		$str = str_replace((array)$replace, ' ', $str);
	}
	$clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
	$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
	$clean = strtolower(trim($clean, '-'));
	$clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);
	return $clean;
}

function getGoogleImg($search, $thumb = false) {
	$clean_str = cleanString($search, array(), '+');
	$target = ($thumb ? 'tbUrl' : 'url');
	$query = 'https://ajax.googleapis.com/ajax/services/search/images?v=1.0&q='.urlencode($clean_str);
	$json = file_get_contents($query);
	$results = json_decode($json, true);
	if (!empty($results["responseData"]["results"])) {
		foreach ($results["responseData"]["results"] as $result) {
			$file_headers = @get_headers($result[$target]);
			if(strpos($file_headers[0], '403') === false &&
			   strpos($file_headers[0], '404') === false &&
			   strpos($file_headers[0], '503') === false) {
			   	return $result[$target];
			}
		}
	}
	return '';
}