<?php
$raiz="";
$titulo= "Contacts";
$activePage = "contacts.php";
  include_once '../includes/header.php';
?>
<html>
  <head>
    
      <link href="../css/styles.css" type="text/css" rel="stylesheet"/>
      <meta charset="UTF-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <style>
    body {
    width: 100%;
    height:700px;
    background-color: rgb(255, 255, 204);
    background-size: cover;
    overflow: hidden;
    } 
    .result {
      position: absolute;
      bottom: 30px;
      right: 300px;
    }
    </style>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  
<script>
$(document).ready(function();
$("form").submit (function(e){                           //após clique:  envelope voa e link para a página após tempo
    e.preventDefault();
        $(".envelope").animate({left: '450px', bottom:'200'}, 1500, function() {
        $("form").unbind("submit").submit();
    });
    });
 });
</script>
<?php
// define variables and set to empty values
$nameErr = $apelidoErr = $emailErr = $mensagemErr = "";
$name = $apelido = $email =  $mensagem = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Nome obrigatório";
  } 
  else {
    $name = textoPreenchido($_POST["name"]);
  }
  if (empty($_POST["apelido"])) {
    $apelidoErr = " Apelido obrigatório";
  } 
  else {
    $apelido = textoPreenchido($_POST["apelido"]);
  }
  if (empty($_POST["email"])) {
    $emailErr = "E-mail é obrigatório";
  } 
    else {
    $email = textoPreenchido($_POST["email"]);
}
  if (empty($_POST["mensagem"])) {
    $mensagemErr = "Tem de escrever alguma coisa!";
  } 
  else {
    $mensagem = textoPreenchido($_POST["mensagem"]);
  }
}
function textoPreenchido($data) {
 
  $data = htmlspecialchars($data);
  return $data;
}
  
//Se tudo estiver preenchido, enviar mensagem personalizada a confirmar.
                         if (!empty($_POST["name"])  && !empty($_POST["email"]) && !empty($_POST["mensagem"])){
          $assunto = textoPreenchido($_POST["assunto"]);  //criar a variável assunto para também ser introduzida no texto.
          echo "A sua mensagem foi enviada  $name $apelido. <br>
Assim que for possivel, responderei à sua mensagem sobre $assunto";
        }
?>
   
  </head>
<body>

      





          <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                 <ul class="form" >
                          <li>
                                <label>Nome Completo <span class="obrigatorio">*<?php echo $nameErr;?><?php echo $apelidoErr;?></span></label>
                                <input type="text" name="name" class="doisCampos" placeholder="Primeiro Nome" value="<?php
if (isset($_SESSION['iduser'])) {echo $_SESSION["firstname"];} else { echo $name;}?>"/>&nbsp;<input type="text" name="apelido" class="doisCampos" placeholder="Apelido" value="<?php
if (isset($_SESSION['iduser'])) {echo $_SESSION["lastname"];} else { echo $apelido;}?>" /></li>
                          <li>
                              <label>Email <span class="obrigatorio">*<?php echo $emailErr;?></span></label>
                              <input type="email" name="email" class="campoGrande"  value="<?php
if (isset($_SESSION['iduser'])) {echo $_SESSION["email"];} else {  echo $email;}?>"/>
                          </li>
                          <li>
                              <label class="assunto">Assunto</label>
                              <select name="assunto" class="campoSelecciona">
                                      <option value="journey">Sobre a Journey</option>
                                      <option value="países">Sobre Países</option>
                                      <option value="getReady">Sobre Get Ready</option>
                                      <option value="varios assuntos">Sobre vários assuntos</option>
                              </select>
                          </li>
                          <li>
                              <label>A sua Mensagem <span class="obrigatorio">*<?php echo $mensagemErr;?></span></label>
                              <textarea type="text" name="mensagem" id="campo5" class="campoGrande campoMensagem" value="<?php echo $mensagem;?>"></textarea>
                          </li>
                          <li>
                              <input type="submit" value="Submeter" class="submeter" />
                          </li>
                </ul>
        </form>

        <img class="envelope" src="../library/images/varias/envelope.png">
        <span class="result">
          
</span>
     

    </body>
           
      
  </html>
