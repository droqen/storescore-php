<?php
	require_once __DIR__ . '/init-$conn.php';

function getTop($gameid, $personal_name_option) {
	global $conn;
	echo "{ err:0,
		scores: [";

		$firstscore = true;

		$OPTIONAL_WHEREAND = '';
		if ($personal_name_option!='') { $OPTIONAL_WHEREAND = "AND playername = '$personal_name_option'"; }

		// fetch top 10 scores.
		$res = $conn->query("SELECT playername, scorevalue FROM scores
								WHERE gameid = $gameid
								$OPTIONAL_WHEREAND
								ORDER BY scorevalue DESC LIMIT 10");
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