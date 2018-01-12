<?php
  
session_start();


$error = "";


  if (isset($_POST["submit"])) {

		// Verifica se USER e PWD vêm preenchidos
		// Se algum não tiver valor --> erro
		if (!isset($_POST["username"]) || $_POST["username"] == "") {
			$error = "A username is required";?>
                                        <form name="textoErro" action="../paginasweb/<?php echo $_POST["activePage"]; ?>" method="POST">
			 	<input type="text" name="error" value="<?php echo $error; ?>"></input>
			 </form>
			 <script type="text/javascript">document.textoErro.submit();</script>
		<?php }
		if (!isset($_POST["pwd"]) || $_POST["pwd"] == "") {
			$error .= "A password is required";?>
			<form name="textoErro" action="../paginasweb/<?php echo $_POST["activePage"]; ?>" method="POST">
			 	<input type="text" name="error" value="<?php echo $error; ?>"></input>
			 </form>
			 <script type="text/javascript">document.textoErro.submit();</script>
		<?php 
	}
		else{
		      // Check if user can login

			include 'config.php';

			// read and escape POST parameters
			$user = mysqli_real_escape_string($connection, $_POST["username"]);
			$password = mysqli_real_escape_string($connection, $_POST["pwd"]);
			

			// Query DB
			$query = "SELECT * FROM user WHERE (email = '".$user."' OR nickname ='".$user."') AND pwd='".$password."'";
			$result = mysqli_query($connection, $query);
			$numeroLinhas = mysqli_num_rows($result);
			echo $numeroLinhas;

			// If query return's no data --> login failed (user or pass incorrect)
			if ($numeroLinhas < 1) {
				$error = "Username or password is wrong"; ?>
				<form name="textoErro" action="../paginasweb/<?php echo $_POST["activePage"]; ?>" method="POST">
			 	<input type="text" name="error" value="<?php echo $error; ?>"></input>
			 </form>
			 <script type="text/javascript">document.textoErro.submit();</script>
		<?php
			} else {
				// IF there's 1 row of data, login sucess -
				// 1. save SESSION info
				// 2. redirect to main.php

				$row = mysqli_fetch_row($result);
				$_SESSION["iduser"] = $row[0];
				$_SESSION["firstname"] = $row[1];
				$_SESSION["lastname"] = $row[2];
				$_SESSION["nickname"] = $row[3];
				$_SESSION["email"] = $row[4];
				$_SESSION["country"] = $row[6];

				header("Location:../paginasweb/".$_POST["activePage"]."?login=success");
				exit();

			}


		} 


	} 
?>