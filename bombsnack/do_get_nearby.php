<?php
	$personal_name = '';
	if (isset($_GET['pname'])) { $personal_name = $_GET['pname']; }
	if (!isset($_GET['score'])) die("{err:'missing param: score'}");
	if (!isset($_GET['mode'])) die("{err:'missing param: mode'}");
	switch($_GET['mode']){
		case 1: $gameid = 81; break;
		case 2: $gameid = 82; break;
		case 3: $gameid = 83; break;
		case 10: $gameid = 90; break;
		default: die("{err:'invalid param value: mode (must be 1, 2, 3, or 10)'}");
	}
	require_once __DIR__ . '/../db/def-getNear.php';
	getNear($gameid, $personal_name, $_GET['score']);