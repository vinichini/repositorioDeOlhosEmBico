<!DOCTYPE html>
<html lang="en">
<head>
	
</head>
<body>
<?php
date_default_timezone_set('Europe/Lisbon');
function setComments($connection) {        //inserir a nova mensagem na base de dados
	if(isset($_POST['commentSubmit'])) {
	$nickName=$_POST['iduser'];
	$idblog = $_POST['idblog'];
	$date=$_POST['date'];
	$message=$_POST['message'];
	$sql = "INSERT INTO comments (iduser, idblog, date, message)  VALUES ('$nickName', '$idblog', '$date', '$message' )";
	$result =mysqli_query($connection, $sql);

	
	$sqlUpdate="UPDATE comments SET idreply=idcomments WHERE idreply<1"; //Igualar o idreply com o idcomment somente para mensagens novas (alvo de comentários de outros usuários. Esses vão ter idreply igual à mensagem respondida, ou seja, sempre maior que zero e não alvo de Update senão teriam o valor da sua própria "idcomment")
	$resultUpdate =mysqli_query($connection, $sqlUpdate);
	

} 
};
function getComments($connection) {
	/*if(isset($_POST['commentSubmit'])) {
	$idblog = $_POST['idblog'];*/
	
             if (isset($_GET["dia"])) {
             $idblog = $_GET["dia"];                     
	$sql = "SELECT * FROM comments WHERE idblog='$idblog' ORDER  by idreply DESC, date ASC" ; //mostrar apenas os comentários referentes ao artigo (dia)
	$result =mysqli_query($connection, $sql);

	while($row = mysqli_fetch_assoc($result)) { 
		$iduser=$row['iduser'];
		$sqlUser = "SELECT * FROM user WHERE iduser='$iduser'";   //escolher mensagem da bd que corresponde ao user logado
	               $resultUser =mysqli_query($connection, $sqlUser);
	               if ($rowUser = mysqli_fetch_assoc($resultUser)) {  //mostrar nova mensagem e formatar consoante ser a principal ou a resposta
	               	 if($row['idcomments']==$row['idreply']) echo"<div class='comment-box'><p>";//principal - o id da mensagem será sempre igual ao idreply
	               	 else echo "<div class='reply-box'><p>";//resposta- o id da mensagem da resposta será sempre diferente (maior) que o idreply que corresponde ao valor da mensagem principal à qual se respondeu
	               	echo $rowUser['nickname']."<br>";
			echo $row['date']."<br>";
			echo nl2br($row['message']);
		              echo  "</p>";
			

		               if (isset($_SESSION['iduser'])) {     //verificar se está login 
		               	if($_SESSION['nickname'] ==  $rowUser['nickname'] ) {//se corresponde ao autor da mensagem que pode editar/eliminar
		               	    echo " 
		                              <form class='delete' method='post' action='".deleteComments($connection)."'>
				          <input type='hidden' name='idcomments' value='".$row['idcomments']."'>
				          <input type='hidden' name='idblog' value='".$row['idblog']."'>
				          <input type='hidden' name='idreply' value='".$row['idreply']."'>
				          <button type='submit' name='commentDelete'> Delete</button>
			             </form>
			             <form class='edit' method='post' action='../includes/editcomments.php'>
				             <input type='hidden' name='idcomments' value='".$row['idcomments']."'>
				             <input type='hidden' name='idblog' value='".$row['idblog']."'>
				             <input type='hidden' name='iduser' value='".$row['iduser']."'>
				             <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
				             <input type='hidden' name='message' value='".$row['message']."'>
				             <button> Edit</button>
			             </form>";
			            	 
		               	}	
		               	else {                                                                   //se não for igual, aparece o botão de responder
		               		    echo
		                              "<form class='edit' method='post' action='../includes/replycomments.php'>
				             <input type='hidden' name='idcomments' value='".$row['idcomments']."'>
				             <input type='hidden' name='idreply' value='".$row['idreply']."'>
				             <input type='hidden' name='iduser' value='".$_SESSION['iduser']."'>
				             <input type='hidden' name='idblog' value='".$row['idblog']."'>
				             <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
				             <button>Reply</button>
			             </form>";
			        
		               	}
		               } 
		          else {                                  //se não estiver registado, mensagem de alerta!
		          	echo "<p class='messageLogin'>Precisa de se registar para responder</p>";
		          } 
		                          echo "</div>";
	               }
	}	
} 
};
function editComments($connection) {
	if(isset($_POST['editSubmit'])) {
               $idcomments=$_POST['idcomments'];
	$iduser=$_POST['iduser'];
	$date=$_POST['date'];
	$message=$_POST['message'];
	$idblog=$_POST['idblog'];


	$sql = "UPDATE comments SET message='$message', date='$date' WHERE idcomments='$idcomments'";
	$result =mysqli_query($connection, $sql);
	header("Location:../paginasweb/artigos.php?dia=$idblog");
} 
}
function replyComments($connection) {
	if(isset($_POST['replySubmit'])) {
           $idcomments=$_POST['idcomments'];
	$nickName=$_POST['iduser'];
	$date=$_POST['date'];
	$message=$_POST['message'];
	$idblog=$_POST['idblog'];
           $idreply=$_POST['idreply'];

	$sql = "INSERT INTO comments (iduser, idblog, date, message, idreply )  VALUES ('$nickName', '$idblog', '$date', '$message', '$idreply')";
	$result =mysqli_query($connection, $sql);
	//$sql = "UPDATE comments SET idreply='$message' WHERE idcomments='$idcomments'";
	//$result =mysqli_query($connection, $sql);
	//while($row = mysqli_fetch_assoc($result)) { 
	header("Location:../paginasweb/artigos.php?dia=$idblog");
} 
}
function deleteComments($connection){
	if(isset($_POST['commentDelete'])) {
               $idcomments=$_POST['idcomments'];
               $idreply=$_POST['idreply'];
              $idblog=$_POST['idblog'];
               if($idcomments == $idreply) {              //se eliminar a mensagem principal, elimina as respostas a essa mensagem
	$sql = "DELETE FROM comments WHERE idreply='$idcomments'"; //mensagem principal tem idreply=idcomments
	$result =mysqli_query($connection, $sql);
	header("Location:artigos.php?dia=$idblog");
} else {
	$sql = "DELETE FROM comments WHERE idcomments='$idcomments'"; //senão, elimina só a mensagem de resposta
	$result =mysqli_query($connection, $sql);
	header("Location:artigos.php?dia=$idblog");
}
} 	
	               	
}

?>
</body>
</html>