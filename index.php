<!DOCTYPE html>
<html lang="ro">
<head>
	<style>
form > * {
	display: block
}
	</style>
</head>
<body>
<?php
	if (isset($_GET['localTxt'])) {
		file_put_contents('data/content', $_GET['localTxt']);
	}
	elseif (isset($_GET['txt'])) {
		if (empty($_GET['host'])) {
			file_put_contents('data/global/content', $_GET['txt']);
		}
		else {
			file_get_contents(
				sprintf('http://%s?localTxt=%s', $_GET['host'], urlencode($_GET['txt']))
			);
			
			echo '<p>Expediat</p>';
		}
	}
?>
	<form>
		<a href="?open">Rezultatul global</a> <a href="?openLocal">Rezultatul local</a>
		<label>Gazda: <input placeholder="la nivel global" name="host" /></label>
		<label>Continut: <textarea name="txt"></textarea></label>
		<button>Expediaza</button>
	</form>
<?php
	if (isset($_GET['open'])) {
		echo file_get_contents('data/global/content');
	}
	
	if (isset($_GET['openLocal'])) {
		echo file_get_contents('data/content');
	}
?>
</body>
</html>