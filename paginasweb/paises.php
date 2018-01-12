<?php
$raiz="";
$titulo= "Países"; 
require('../includes/config.php');



    if (isset($_GET["pais"])) {
$pais=$_GET["pais"];   //país em que se clicou
$activePage = "paises.php?pais=".$pais;
 $sql = "SELECT * FROM artigos WHERE mapcountry='".$_GET['pais']."'";
 $result = mysqli_query($connection, $sql);
 }
include '../includes/header.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
   <link href="../css/styles.css" type="text/css" rel="stylesheet"/>
    <meta charset="UTF-8">
  

  </head>
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

  <body class="paises">

<div id="<?php echo $row[1]; ?>Pais">
        <section class="artigoPais">
  <?php


$i=0;
 while($row = mysqli_fetch_row($result)){ 
 
  if ($i==0) { ?>

  <?php } ?>
          <div class="artigo<?php echo $row[7]; ?>">       
              <a href="artigos.php?dia=<?php echo $row[1]; ?>">
                   <img src="../library/images/journeyimages/dia<?php echo $row[1]; ?>.jpg" alt="<?php echo $row[7]; ?>"> 
                   <span class="text">
                            <p><?php echo $row[2]; ?></p> 
                            <p><?php echo $row[3]; ?></p>
                  </span>
              </a>         
          </div>
<?php
 $i++;}
 ?>
          <span id="mapaChiangmai" class="mapaCidadesTodas">
                  <img class="pin" src="../library/images/imagesInicio/pin.png">
                  <span class="nomeCidade">CHIANGMAI</span>
          </span>
          <span id="mapaBangkok" class="mapaCidadesTodas">
                  <img class="pin" src="../library/images/imagesInicio/pin.png">
                  <span class="nomeCidade">BANGKOK</span>
          </span>
            <span id="mapaYangon" class="mapaCidadesTodas">
                  <img class="pin" src="../library/images/imagesInicio/pin.png">
                  <span class="nomeCidade">YANGON</span>
          </span>
          <span id="mapaKinpun" class="mapaCidadesTodas">
                  <img class="pin" src="../library/images/imagesInicio/pin.png">
                  <span class="nomeCidade">KINPUN</span>
          </span>
          <span id="mapaBago" class="mapaCidadesTodas">
                  <img class="pin" src="../library/images/imagesInicio/pin.png">
                  <span class="nomeCidade">BAGO</span>
          </span>
          <span id="mapaInleLake" class="mapaCidadesTodas">
                  <img class="pin" src="../library/images/imagesInicio/pin.png">
                  <span class="nomeCidade">INLE LAKE</span>
          </span>
          <span id="mapaBagan" class="mapaCidadesTodas">
                  <img class="pin" src="../library/images/imagesInicio/pin.png">
                  <span class="nomeCidade">BAGAN</span>
          </span>
          <span id="mapaMandalay" class="mapaCidadesTodas">
                  <img class="pin" src="../library/images/imagesInicio/pin.png">
                  <span class="nomeCidade">MANDALAY</span>
          </span>
          <span id="mapaHsipaw" class="mapaCidadesTodas">
                  <img class="pin" src="../library/images/imagesInicio/pin.png">
                  <span class="nomeCidade">HSIPAW</span>
          </span>
      </section>
      <div class="mapa<?php echo $pais; ?>">
          <img class="mapaPais" src="../library/images/varias/<?php echo $pais; ?>.png" alt="<?php echo $pais; ?>">         
      </div>
      <div class="infoPais">
        <h1><?php echo $pais; ?></h1>
        <img id="flag<?php echo $pais; ?>" src="../library/images/varias/bandeira<?php echo $pais; ?>.png">
        <p>Área:  513 120 km&sup2</p>
        <p>População: 67 959 000 hab.</p>
        <p>Capital: Bangkok</p>
        <p>Moeda:   Baht tailandês (THB)</p>
        <p>Lingua Oficial: Tailandês</p>
        <p>Governo: Monarquia Constitucional</p>
      </div>
    </div>
  </body>
</html>