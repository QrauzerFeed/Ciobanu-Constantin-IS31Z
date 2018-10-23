<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<? 
	error_reporting(E_ALL);
	$fileName = 'cars.json';
	if(!empty($_POST['brand']) && !empty($_POST['year'])){
		$fileData = file_get_contents($fileName);
		$cars = json_decode($fileData, true);
		$newElement = [
			"brand" => trim($_POST['brand']),
			"color" => trim($_POST['color']),
			"km" => 0,
			"year" => 2001
		];
		$studenti[] = $newElement;
		file_put_contents($fileName, json_encode($studenti));
	}
	?>	

	<form method="post">
		First name <input type="text" name="first_name"><br>
		Last name <input type="text" name="last_name"><br>
		<input type="submit" value="Add"><br>
	</form>

</body>
</html>