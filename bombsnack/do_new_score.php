<?php
	if (!isset($_GET['name'])) die("{err:'missing param: name'}");
	if (!isset($_GET['score'])) die("{err:'missing param: score'}");
	if (!isset($_GET['mode'])) die("{err:'missing param: mode'}");
	switch($_GET['mode']){
		case 1: $gameid = 81; break;
		case 2: $gameid = 82; break;
		case 3: $gameid = 83; break;
		default: die("{err:'invalid param value: mode (must be 1, 2, or 3)'}");
	}
	require_once __DIR__ . '/../db/def-addScore.php';
	addScore(
		$gameid,
		$_GET['name'],
		$_GET['score']);