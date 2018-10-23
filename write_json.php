<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<? 
	error_reporting(E_ALL);
	$fileName = 'carti.json';
	if(!empty($_POST['title']) && !empty($_POST['anul'])){
		$fileData = file_get_contents($fileName);
		$carti = json_decode($fileData, true);
		$newElement = [
			"anul" => trim($_POST['anul']),
			"title" => trim($_POST['title']),
			"pag" => trim($_POST['pag']),
			"autor" => trim($_POST['autor']),
			"id" => 299
		];
		$carti[] = $newElement;
		file_put_contents($fileName, json_encode($carti));
	}
	?>	

	<form method="post">
		Anul <input type="number" name="anul"><br>
		Titlu <input type="text" name="title"><br>
		Pagini <input type="number" name="pag"><br>
		Autori <input type="text" name="autor"><br>
		<input type="submit" value="Add"><br>
	</form>

	<button><a href="http://crcars/">Show Lista</a></button>

</body>
</html>