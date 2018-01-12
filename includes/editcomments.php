<?php

require('config.php');
/*
  if (isset($_GET["dia"])) {
$sql = "SELECT * FROM artigos WHERE dia='".$_GET['dia']."'";  //seleccionar os artigos que correspondem ao dia
 $result = mysqli_query($connection, $sql);
 $row = mysqli_fetch_assoc($result);
}*/
 date_default_timezone_set('Europe/Lisbon');
 include 'comments.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
           <link href="../css/styles.css" type="text/css" rel="stylesheet">
	<meta charset="UTF-8">
	<style>
	body{
		  background-color: lightblue;
	}
</style>
	<title>Articles</title>
</head>
<body>

<?php 
$idcomments=$_POST['idcomments'];
$nickName=$_POST['iduser'];
$date=$_POST['date'];
$message=$_POST['message'];
$idblog=$_POST['idblog'];


echo"
<form method='POST' action='".editComments($connection)."''>
               <input type='hidden' name='idcomments' value='".$idcomments."'>
               <input type='hidden' name='idblog' value='".$idblog."'>
	<input type='hidden' name='iduser' value='".$nickName."'>
	<input type='hidden' name='date' value='".$date."'>'
	<textarea name='message'>".$message."</textarea><br>
	<button class='comment' type='submit' name='editSubmit'>Edit</button>
</form>";

?>
</body>
</html>