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
$iduser=$_POST['iduser'];
$date=$_POST['date'];
$idblog=$_POST['idblog'];
$idreply=$_POST['idreply'];

echo"
<form method='POST' action='".replyComments($connection)."''>
               <input type='hidden' name='idcomments' value='".$idcomments."'>
               <input type='hidden' name='idblog' value='".$idblog."'>
	<input type='hidden' name='iduser' value='".$iduser."'>
	<input type='hidden' name='date' value='".$date."'>'
	<input type='hidden' name='idreply' value='".$idreply."'>
	<textarea name='message'></textarea><br>
	<button class='comment' type='submit' name='replySubmit'>Reply</button>
</form>";

?>
</body>
</html>