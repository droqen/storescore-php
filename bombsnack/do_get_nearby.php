<?php
	// if (!isset($_GET['name'])) die("{err:'missing param: name'}");
	if (!isset($_GET['score'])) die("{err:'missing param: score'}");
	require_once __DIR__ . '/../db/def-getNear.php';
	getNear(
		$_GET['score'],
		8); // gameid