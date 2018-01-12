<?php
	session_start();
?>



      
<!DOCTYPE html>
<html lang="en">
<head>      
             <link href="../css/styles.css" type="text/css" rel="stylesheet"/>
             <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	<title><?php echo $titulo; ?></title>
</head>
<body>


	<header> 
	              <nav class="menu">  
	                       
	                        <ul class="menuLinks">
		                      <h1>DE <span id="o1">O</span>LH<span id="o2">O</span>S EM BICO</h1>
		                      <h3>Uma viagem de um mês e meio sózinho pelo Sudoeste Asiático</h3>
		                       <li id="home"<?php if($activePage == 'home.php') {echo ' class="active"';} ?>><a href="home.php">HOME</a></li>
		                       <li id="journey"<?php if($activePage == 'journey.php') {echo ' class="active"';} ?>><a href="journey.php">JOURNEY</a> </li>  
		                       <li id="paises" class="submenu<?php if($activePage == 'paises.php') {echo ' active';} ?>" >
		                             <a  class="smenu" style="cursor:pointer" href="tailandia.php">PAISES</a>
		                             <div class="smenu-info">
		                                   <a style="cursor:pointer" class="tailandia"<?php if($activePage != 'home.php') {echo ' href="paises.php?pais=Tailandia"';} ?>>Tailandia</a> <!--no home vai só depois do avião chegar ao local como já está no script-->
		                                   <a style="cursor:pointer" class="myanmar"<?php if($activePage != 'home.php') {echo ' href="paises.php?pais=Myanmar"';} ?>>Myanmar</a>
		                                   <a style="cursor:pointer" class="cambodja">Cambodja</a>
		                                   <a style="cursor:pointer" class="vietname">Vietnam</a>
		                                   <a style=" cursor:pointer" class="laos">Laos</a>
		                                   <a style="cursor:pointer" class="filipinas">Filipinas</a>
		                                   <a style="cursor:pointer" class="singapura">Singapura</a>
		                             </div>
		                       </li>  
		                       <li id="getReady"<?php if($activePage == 'getready.php' || $activePage == 'checklist.php') {echo ' class="active"';} ?>><a href="getReady.php">GET READY</a> </li> 
		                       <li id="cont" <?php if($activePage == 'contacts.php') {echo  'class="active"';} ?>><a href="contacts.php">CONTACTS</a></li>
		             </ul>  
		              <div class="login">
		                      <div class="erroLogin">
			            	<?php
			            	if(isset($_POST["error"])) {
			            		echo $_POST["error"];
			            	}
			            	?>
			            </div>
		                <?php
			          if (isset($_SESSION['iduser'])) {
			          	echo "<div class='welcome'>Olá ".$_SESSION['nickname']."!</div>" ?>
			            <form action="../includes/logout.php" method="POST">
			             <input name="activePage" type="hidden" value="<?php echo $activePage; ?>">
			              <button type="submit" name="submit">Logout</button>
			            </form>

			          <?php } else { ?>
		                                <form action="../includes/validatelogin.php" method="POST">
		                                <input name="username" type="text"  placeholder="Username/e-mail">
		                                <input name="pwd" type="password" placeholder="Password">
		                                <input name="activePage" type="hidden" value="<?php echo $activePage; ?>">

		                                <button name="submit" type="submit" >Login</button>
		                        </form>         
		                        <a href="signup.php" target="_blank"><button>Sign up</button></a>
		                     <?php }
		                        ?>
		            </div>
		             
	                

          </nav>   
      </header>
</body>
</html>