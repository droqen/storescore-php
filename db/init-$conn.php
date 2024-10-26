<?php
	require_once __DIR__ . '/credentials.php';
	$dsn = "mysql:host=$dbhost;dbname=$dbname";
	$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
	try {
		$conn = new PDO($dsn, $dbuser, $dbpass, $options);
	} catch (PDOException $e) {
		$errMessage = $e->getMessage();
		die("{err:'Problem! PDO connection failed: $errMessage'");
	}