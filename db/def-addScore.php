<?php
	require_once __DIR__ . '/init-$conn.php';
	function addScore($gameid, $playername, $scorevalue) {
		global $conn;
		// if (!isset($_POST['pname'])) { die("Missing param p1641"); }
		// if (!isset($_POST['score'])) { die("Missing param ss114"); }
		// if (!isset($_POST['g'])) { die("Missing param ggg68"); }

		// $playername = $_POST['pname'];
		// $scorevalue = $_POST['score'];
		// $gameid = $_POST['g'];

		$stmt = $conn->prepare("INSERT INTO scores (playername, scorevalue, gameid) VALUES (?, ?, ?)");
		$insert_count = $stmt->execute([$playername, $scorevalue, $gameid]);
		if ($insert_count > 0) {
			die("{err:0}");
			// $lastinsertid = $conn->lastInsertId();
			// echo $lastinsertid; // success!
		} else {
			die("{err:'Problem inserting score $playername / $scorevalue / $gameid.'}");
		}
	}