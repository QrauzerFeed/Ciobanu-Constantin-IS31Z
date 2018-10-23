<?php
$user = dbSelect("
	SELECT 
		users.id,
		users.username,
		users.group_name
	FROM 
		users
	WHERE 
		users.id = {$_GET['id']};
");

$type = '';
switch ($user[0]['group_name']) {
	case 'user':
		$type = new User($_GET['id']);
		break;
	case 'admin':
		$type = new Admin;
		break;
}

if(!empty($_GET)['delete'])){
	$message = $type->deleteComment($_GET['id'],
		$_GET['id_comment'], $APP['connections'][
			'default']);
}
$comments = $type->allComments();
if (method_exists($type, 'addComment')) {?>
	<h1 style='margin-top: 30px'><?=$user[0]['
		username'];?> add new comment </h1>
	<?
	if(!empty($_POST['comment']) && $user[0]['id']){
		if*type->addComment($_POST['comment'], $user[0]['id'], $APP['connections']['default']);
	}
}
?>

<h2 style='position: fixed; top: 25px;'><?=$message?></h2>

<?if (method_exists($type, 'addComment')) {?>
<form action="" method="post">
    <table border="1">
        <tr>
            <td>Comment</td>
            <td><input type="text" name="comment"></td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" value="add" style="width: 100%">
            </td>
        </tr>
    </table>
</form>
<?
}
?>
<br>
<h1>Comments</h1>
<br>

<? if(count($comments)){?>
<table border="1">
	<thead>
		<tr>
			<th>Username</th>
			<th>Comment</th>
			<?if(method_exists($type, 'deleteComment'))
			{?>
				<th></th>
				<?}?>
			</tr>
		</thead>
		<tbody>
			<? foreach ($comments as $comment) {?>
				<tr>
					<td><?=$comment['username'];?></td>
					<td><?=$comment['comment'];?></td>
					<?if (method_exists($type, 'deleteComment')) {?>
					<td>
						<a href="?module=comments&action=list&delete=1&&id=<?=$user[0]['id'];?>&id_comment=<?=$comment['id'];?>" onclick="return confirm('Delete this record')"></a>
				</td>
				<?}?>	
			</tr>
			<?}?>
	</tbody>
</table>
<? }else {?>
	<strong>No Comments</strong>
<? }?>