<?php
$raiz="";
$titulo= "GetReady";
$activePage = "getready.php";
  include_once '../includes/header.php';
?>
<html>
   <head>  
    
        <link href="../css/styles.css" type="text/css" rel="stylesheet"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8"/>
        <style>
        body {
        width: 100%;
        height:700px;
        background-color: rgb(255, 255, 204);
        background-size: cover;
        overflow: hidden;
       </style>
  
  </head>
  <body>
   
      
    
   
  <section class="informationCenter">

        <div  style="cursor:pointer" class="inform" id="inform1"> 
              <img class= "estores" src="../library/images/varias/estores.jpg">  
              <span>CHECKLIST</span>
              <div class="suporte"></div>
              <a href="checklist.php" target="_blank">
               <img src="../library/images/varias/preparativos.jpg" alt="preparativos" class="image"> 
              </a>      
        </div>

        <div  style="cursor:pointer" class="inform" id="inform2">
              <img class= "estores" src="../library/images/varias/estores.jpg">
              <span>DICAS IMPORTANTES</span>
              <div class="suporte"></div>
              <a href="../obras.html">
              <img src="../library/images/varias/dicas.png" alt="dicas" class="image"> 
              </a> 
       </div>

        <div  style="cursor:pointer" class="inform" id="inform3">
              <img class= "estores" src="../library/images/varias/estores.jpg">  
              <span>LINKS ÚTEIS</span>
              <div class="suporte"></div>
              <a href="../obras.html">
              <img src="../library/images/varias/links.jpg" alt="links" class="image"> 
              </a>      
        </div>

    </section>


      </body>
     </html>
    