<?php
	if (!isset($_GET['name'])) die("{err:'missing param: name'}");
	if (!isset($_GET['score'])) die("{err:'missing param: score'}");
	require_once __DIR__ . '/../db/def-addScore.php';
	addScore(
		$_GET['name'],
		$_GET['score'],
		8);