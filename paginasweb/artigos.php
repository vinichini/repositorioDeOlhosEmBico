<?php
$titulo= "Artigos";
require('../includes/config.php');


  if (isset($_GET["dia"])) {
$idblog=$_GET["dia"];
$activePage = "artigos.php?dia=$idblog";
$sql = "SELECT * FROM artigos WHERE dia='".$_GET['dia']."'";  //seleccionar os artigos que correspondem ao dia
 $result = mysqli_query($connection, $sql);
 $row = mysqli_fetch_assoc($result);

}
 date_default_timezone_set('Europe/Lisbon');
 include '../includes/comments.php';
include_once '../includes/header.php';
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
	
</head>
<body>

<div class="activeArticle">
	<h1><?php echo $row['title']; ?></h1>
	<h3><?php echo $row['location']; ?></h3>
	<div class="imgArtigo">
	   <img  src="<?php echo $row['imgartigo']; ?>"/>
	</div>
	<div class="text"><?php echo nl2br($row['content']); ?></div>
	<div class="imgArtigoMapa">
	   <img  src="<?php echo $row['imgmapa']; ?>"/>
	</div>
</div>
<?php

    if (isset($_SESSION['iduser'])) {      //area do texto da nova mensagem
    	if (isset($_GET["dia"])) {
    		$idblog=$_GET["dia"];
 echo"
<form method='POST' action='".setComments($connection)."'>  
	<input type='hidden' name='iduser' value='".$_SESSION['iduser']."'>
	<input type='hidden' name='idblog' value='".$idblog."'>
	<input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
	<textarea name='message'></textarea><br>
	<button class='comment' type='submit' name='commentSubmit'>Comment</button>
</form>";
}
} else{
	echo "Precisa de se registar para comentar!";
}

getComments($connection);

?>
</body>
</html>