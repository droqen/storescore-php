<?php
	require_once __DIR__ . '/init-$conn.php';

	function getNear($medianscore, $gameid) {
		global $conn;
		echo "{ err:0, near:$medianscore,
		scores: [";

		$firstscore = true;

		// fetch 5 above.
		$res = $conn->query("SELECT playername, scorevalue FROM scores
								WHERE gameid = $gameid
								AND scorevalue > $medianscore
								ORDER BY scorevalue ASC LIMIT 5");
		foreach ($res as $row) {
			if ($firstscore){$firstscore=false;}else{echo ",";}
			$thisplayername = $row['playername']; $thisscorevalue = $row['scorevalue'];
			echo "
			{
				name:'$thisplayername',
				score:$thisscorevalue
			}";
		}
		// fetch 5 below.
		$res= $conn->query("SELECT playername, scorevalue FROM scores
								WHERE gameid = $gameid
								AND scorevalue < $medianscore
								ORDER BY scorevalue DESC LIMIT 5");
		foreach ($res as $row) {
			if ($firstscore){$firstscore=false;}else{echo ",";}
			$thisplayername = $row['playername']; $thisscorevalue = $row['scorevalue'];
			echo "
			{
				name:'$thisplayername',
				score:$thisscorevalue
			}";
		}

		echo "
		]
}";
	}