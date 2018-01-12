
<?php

$raiz="";
$titulo= "Journey";
$activePage = "journey.php";
  include_once '../includes/header.php';
      include '../includes/config.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
   <link href="../css/styles.css" type="text/css" rel="stylesheet">
   <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="UTF-8">
     <style>
    body {
    width: 100%;
    height:700px;
    background-color: rgb(255, 255, 204);
    background-size: cover;
    overflow: hidden;
}
  
    
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


<script>
$(document).ready(function() {                                      //Mudança de artigo ao clicar no dia
$(".botaoDia").on('click', 'button', function() {                   //ao clicar no botao, remover a classe desse dia e passar para o clicado
      $(".artigoDiasTodos").removeClass("artigoCorrente");
        var newArtigo=$(this).index();
      $(".artigoDiasTodos").eq(newArtigo).addClass("artigoCorrente");
      $(".botaoDia").removeClass("botaoCorrente");
      $(this).addClass("botaoCorrente");

});


});



</script>

<body>
  <div class="journey">
  <?php
 $sql = "SELECT * FROM artigos";
 $result = mysqli_query($connection, $sql);

function descricao($x, $length){   //limitar o texto inteiro do artigo na parte da descrição
  if(strlen($x)<=$length)
  {
    echo $x;
  }
  else
  {
    $y=substr($x,0,$length) . '...';
    echo $y;
  };
};

$i=0;
 while($row = mysqli_fetch_row($result)){ 
 
  if ($i==0) { ?>
   <div  class="artigoCorrente artigoDiasTodos"> 
 <?php } else { ?>
  <div  class="artigoDiasTodos"> 
  <?php } ?>


             <img class="mapa" src="<?php echo $row[5]; ?>"/>
             <div class="titulo"><?php echo $row[2]; ?></div>
             <div class="local"><?php echo $row[3]; ?></div>
             <img class="imgArtigo" src="<?php echo $row[6]; ?>"/>
             <div class="descricao"><?php descricao($row[4], 600); ?> </div>
              <a  href="artigos.php?dia=<?php echo $row[1]; ?>"><button class="linkArtigo">Ir para o Artigo</button></a>
       
      </div>

<?php
 $i++;}

    ?> 


       </div>
    
<div class="botaoDia">

  <?php
  $sql = "SELECT max(idblog) maxidblog FROM artigos WHERE 1";
 $result = mysqli_query($connection, $sql);
 $row = mysqli_fetch_assoc($result);
/* print_r($row);
 die();*/
  for ($i=0; $i < $row["maxidblog"]; $i++) { 
    if ($i==0) {
       echo "<button class='botaoCorrente'>Dia $i</button>"; //definir o primeiro botão com class relativo ao 1º dia a aplicar no script jquery em cima
     } else {
      echo "<button>Dia $i</button>";  //os outros botões ficam inicialmente sem class
     }
              
  }
    ?>     
       </div> 


</body>
</html>


   