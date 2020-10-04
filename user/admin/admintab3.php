<!DOCTYPE html>
<html>
<head>
	<title>Admin - Databases</title>
=
</head>
<body>
	<table>
		<tr>
			<td>TableName</td>
			<td></td>
		</tr>

		<?php
	include "../php/conn.php";

	$tables = "SELECT name FROM databaseName.sys.Tables";
	$stmt = $conn->prepare($tables);
	$stmt->execute();
	$resTable = $stmt->fetchALL();
	foreach ($resTable as $DBtable) {?>

		<tr>
			<td><?=$DBtable['name'];?></td>
		</tr>
<?php }?>
	</table>
</body>
</html>







<?php
	
	include "../php/footer.php";
?>

