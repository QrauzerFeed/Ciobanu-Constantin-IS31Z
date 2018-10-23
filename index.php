<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<? 
$fileName = 'carti.json';
$fileData = file_get_contents($fileName);
$carti = json_decode($fileData, true);
?>
<table border="1">
	<thead>
		<tr>
			<th>Year</th>
			<th>Title</th>
			<th>Pagini</th>			
			<th>Autor</th>			
		</tr>
	</thead>
	<tbody>
<?
foreach ($carti as $carte) {?>
<tr>
	<td><?=$carte['anul'];?></td>
	<td><?=$carte['title'];?></td>
	<td><?=$carte['pag'];?></td>			
	<td>
		<?=$carte['autor'][0];?>	
	</td>			
</tr>	
<?}
?>
</tbody>
</table>

<button>
	<a href="http://crcars/write_json.php">Add Book</a>
</button>
	
</body>
</html>