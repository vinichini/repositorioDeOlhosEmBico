<?php
$raiz="";
$titulo= "Checklist";
$activePage = "checklist.php";
	  include_once '../includes/header.php';
      include '../includes/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link href="../css/styleschecklist.css" type="text/css" rel="stylesheet"/>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<style>
body {
    width: 100%;
    height:700px;
    background-color: rgb(255, 255, 204);
    background-size: cover;
    overflow: hidden;
}

</style>
	
</head>
<body>
<?php
ob_start();
$sql = "SELECT * FROM checklist WHERE iduser";
$result =mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($result);

if (!isset($_SESSION['iduser'])) {
	echo" Tem de fazer login para ter aceder a esta funcionalidade!";}
	else { 
		
 echo"

<div id='myDIV' class='pesquisa'>
  <h2 class='tituloChecklist'> ".$_SESSION['nickname']."  Checklist </h2>
   <form class='categoriaEscolhida' action='".novoitem($connection)."' method='POST'>
         <input name='novoItem' type='text' id='itemNovo' placeholder='Item...'>
         <input type='hidden' name='iduser' value='".$_SESSION['iduser']."'>
         <select id='categoriaNovoItem' name='categoriaEscolhida'>
	           <option selected disable value='noSelect'>Categoria:</option>  
	  	<option value='roupa' class='roupa'>Roupa</option>
	  	<option value='higiene' class='higiene'>Higiene</option>
	  	<option value='documentos' class='documentos'>Documentos</option>
	  	<option value='gadgets' class='gadgets'>Gadgets</option>
	  	<option value='saude' class='saude'>Saúde</option>
	  	<option value='outros' class='outros'>Outros</option>
        </select>
        <button name='itemNovoEscolhido' type='submit' class='inserirNovo'>Inserir Novo Item</button>
  </form> 
</div>  "; 
$iduser=$_SESSION['iduser'];
                       echo"<div class='categorias'>
                       <div>
                       	  <form action='".checkeditem($connection)."' method='POST'>
			    <ul class='roupa'>
			               <li>ROUPA</li>
			               <input type='hidden' name='categoria' value='roupa'>";
				     $sql = "SELECT * FROM checklist WHERE iduser=$iduser AND categoria='roupa' AND itenscheck=0"; //mostrar itens introduzidos mas não checkados
			                $result =mysqli_query($connection, $sql);
			                while($row = mysqli_fetch_assoc($result)) { echo "
			                	<li>
				    <input class='cat' type='submit' name='checkeditem' value='".$row['itens']."'>
				    
				    </li>";}  //listar todos os itens que correspondem à categoria
			     echo "</ul> </form></div>";
		  echo "  <div><form action='".checkeditem($connection)."' method='POST'>
		   	    <ul class='higiene'>
				    <li>HIGIENE</li>
				    <input type='hidden' name='categoria' value='higiene'>";
				     $sql = "SELECT * FROM checklist WHERE iduser=$iduser AND categoria='higiene' AND itenscheck=0";
			                $result =mysqli_query($connection, $sql);
			                while($row = mysqli_fetch_assoc($result)) { echo "
				    <li>
				  <input class='cat' type='submit' name='checkeditem' value='".$row['itens']."'>
				    </li>";}
			     echo "</ul></form></div>";
		 echo "     <div><form action='".checkeditem($connection)."' method='POST'>
		               <ul class='documentos'> 
			    <li>DOCUMENTOS</li>
			    <input type='hidden' name='categoria' value='documentos'>";
			     $sql = "SELECT * FROM checklist WHERE iduser=$iduser AND categoria='documentos' AND itenscheck=0";
		                $result =mysqli_query($connection, $sql);
		                while($row = mysqli_fetch_assoc($result)) { echo "
			    <li>
				  <input class='cat' type='submit' name='checkeditem' value='".$row['itens']."'>
				    </li>";}
			      echo "</ul></form></div>";
		echo "	   <div> <form action='".checkeditem($connection)."' method='POST'>
			      <ul class='gadgets'>
				    <li>GADGETS</li>
				    <input type='hidden' name='categoria' value='documentos'>";
			     $sql = "SELECT * FROM checklist WHERE iduser=$iduser AND categoria='gadgets' AND itenscheck=0";
		                $result =mysqli_query($connection, $sql);
		                while($row = mysqli_fetch_assoc($result)) { echo "
			    <li>
				    <input class='cat' type='submit' name='checkeditem' value='".$row['itens']."'>
				    </li>";}
			      echo "</ul></form></div>";
		echo "	     <div><form action='".checkeditem($connection)."' method='POST'>
		               <ul class='saude'>
			    <li>SAÚDE</li>
			    <input type='hidden' name='categoria' value='saude'>";
			     $sql = "SELECT * FROM checklist WHERE iduser=$iduser AND categoria='saude' AND itenscheck=0";
		                $result =mysqli_query($connection, $sql);
		                while($row = mysqli_fetch_assoc($result)) { echo " <li>
				     <input class='cat' type='submit' name='checkeditem' value='".$row['itens']."'>
				    </li>";}
			     echo "</ul></form></div>";
		echo "	    <div><form action='".checkeditem($connection)."' method='POST'>
		               <ul class='outros'>
			    <li>OUTROS</li>
			    <input type='hidden' name='categoria' value='outros'>";
			     $sql = "SELECT * FROM checklist WHERE iduser=$iduser AND categoria='outros' AND itenscheck=0";
		                $result =mysqli_query($connection, $sql);
		                while($row = mysqli_fetch_assoc($result)) { 
		                	echo "
			    <li>
				 <input class='cat' type='submit' name='checkeditem' value='".$row['itens']."'>
                                                    </li>";}
			     echo "</ul></form></div>

			</div>
			<div class='tabelaChecked'>
			<form action='".uncheckItem($connection)."' method='POST'>
		   	    <ul class=checked>
				    <h2>CHECKED ITEMS</h2>
				    <input type='hidden' name='categoria' value='higiene'>";
				     $sql = "SELECT * FROM checklist WHERE iduser=$iduser AND itenscheck=1";
			                $result =mysqli_query($connection, $sql);
			                while($row = mysqli_fetch_assoc($result)) { echo "
				    <li>
				    <input type='submit' name='uncheckeditem' value='".$row['itens']."'></li>";}
			     echo "</ul></form></div>";
}

	function novoItem($connection) {
	$sql = "SELECT * FROM checklist"; 
	$result =mysqli_query($connection, $sql);
	$row = mysqli_fetch_assoc($result);
	
	
	if(isset($_POST['itemNovoEscolhido'])) {
		if($_POST['categoriaEscolhida']=="noSelect") { echo "Tem de escolher uma categoria!";}
		else {
	$categoria=htmlspecialchars($_POST['categoriaEscolhida']);
	$novoItem=htmlspecialchars($_POST['novoItem']);
	$iduser=($_POST['iduser']);
	$sql2="INSERT INTO checklist (iduser, itens, categoria, itenscheck) VALUES ('$iduser', '$novoItem', '$categoria','0')"; //o item introduzido tem inicialmente um valor zero de unchecked
	$result2 =mysqli_query($connection, $sql2);
         }
      }  
  }
  function checkeditem($connection) {

  	if(isset($_POST['checkeditem'])) {
  	$itemchecked=($_POST['checkeditem']);
  	$categoria=htmlspecialchars($_POST['categoria']);
           $iduser=$_SESSION['iduser'];
           //meter 1 na coluna se os itens ficarem checked
  	$sql5 = "UPDATE checklist SET itenscheck=1 WHERE itens='$itemchecked'";
	$result5 =mysqli_query($connection, $sql5);}
	  
}


function uncheckItem($connection) {
	$sql = "SELECT * FROM checklist"; 
	$result =mysqli_query($connection, $sql);
	$row = mysqli_fetch_assoc($result);
	if(isset($_POST['uncheckeditem'])) {
	$categoria=htmlspecialchars($_POST['categoria']);
	$itemUnchecked=htmlspecialchars($_POST['uncheckeditem']);
	$iduser=$_SESSION['iduser'];
	$sql2= "UPDATE checklist SET itenscheck=0 WHERE itens='$itemUnchecked'";
	$result2 =mysqli_query($connection, $sql2);
	echo "<meta http-equiv='refresh' content='0'>";
       }  
      }  


?>  
	
</body>

</html>