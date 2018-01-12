<?php

$raiz="";
$titulo= "Home";
$activePage = "home.php";
   include '../includes/header.php';




?>


  <!DOCTYPE html>
<html lang="en">
    <head>
      <link href="../css/styles.css" type="text/css" rel="stylesheet"/>
      <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   
           <!--Script na própria página HTML-->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script>
            $(document).ready(function(){
          /*   $(".intro").click(function(){     */                                      //após clique:  avião para países, texto que muda e link para a página após tempo
                         $(".plane")   //animação inicial com o avião a aparecer                    
                    .animate({left:'100px'},1700);

          
            $(".tailandia").click(function(){                                           //após clique:  avião para países, texto que muda e link para a página após tempo
                    $(".plane").animate({left: '480px', bottom:'200'},1700);
                    $("#bal").text("Tailândia, aqui vamos nós!!");
                    setTimeout(function(){window.location.href='paises.php?pais=Tailandia'},2000);  //tempo para carregar nova página para se ver animação
                     });
            $(".myanmar").click(function(){
                    $(".plane").animate({left: '350px', bottom:'300'},1700);
                    $("#bal").text("Myanmar, que bela escolha!");
                    setTimeout(function(){window.location.href='paises.php?pais=Myanmar'},2000);
                    });
            $(".cambodja").click(function(){
                    $(".plane").animate({left: '590px', bottom:'100'},1700);
                    $("#bal").text("Cambodja!!!!!");
                    setTimeout(function(){window.location.href='obras.html'},2000);
                    });
            $(".vietname").click(function(){
                    $(".plane").animate({left: '710px', bottom:'100'},1700);
                    $("#bal").text("Vietname, estamos a ir!!!");
                    setTimeout(function(){window.location.href='obras.html'},2000);
                    });
            $(".laos").click(function(){
                    $(".plane").animate({left:'530px', bottom:'280'},1700);
                    $("#bal").text("Tantas aventuras em Laos!");
                    setTimeout(function(){window.location.href='obras.html'},2000);
                    });
            $(".filipinas").click(function(){
                    $(".plane").animate({left: '1100px', bottom:'180'},1700);
                    $("#bal").text("Filipinas!!");
                    setTimeout(function(){window.location.href='obras.html'},2000);
                    });
            $(".singapura").click(function(){
                    $(".plane").animate({left: '550px', top:'110'},1700);
                    $("#bal").text("Singapura!!");
                    setTimeout(function(){window.location.href='obras.html'},2000);
                    });

            // balão de conversa                
            var frases = [                                //frases aleatóreas a serem mostradas quando não está seleccionado nenhum menu
                  "Ready?!..",
                  "Sitios interessantes...",
                  "Muitas aventuras inesperadas...",
                  "Conhecer outras culturas.",
                  "Aquele pôr-do-sol em Hsipaw...",
                  "Ainda indeciso?",
                  "Precisa de um guia?",
                  "Aquela comida tão boa...e tão picante!!",
                  "Muitos templos",
                  "Budas e mais budas...",
                  "Tuk-tuks que vão a 100 km/hora!!",
                  "E aquela cobra gigante em Myanmar!! ",
                  "Dicas importantes para viajar!",
                  "Journey relata  a aventura completa!",
                  "Tantos amigos que se fizeram",
                  "E o festival das luzes em Chiang Mai?!",
                  "Bangkok. Uma cidade  de loucos!",
                  "E Sapa! A paisagem, as tribos...",
                  "Praias nas Filipinas de areia branca...",
                  ];

             function normal() {


                 document.getElementById("bal").innerHTML = frases[Math.floor(Math.random() * frases.length)]; //meter as frases aleatóreas
                 };
             function home() {
                             <?php
if (isset($_SESSION['iduser'])) {?>

    document.getElementById("bal").innerHTML = "Aqui é o teu ponto de partida <?php echo $_SESSION["nickname"]; ?>!!! "
        <?php  }
          else{ ?>
             document.getElementById("bal").innerHTML = "Aqui é o seu ponto de partida";  //frase no separador home  
          <?php }; ?>
                 };
             function journey() {                //frase no separador "journey"
                <?php
if (isset($_SESSION['iduser'])) {?>

    document.getElementById("bal").innerHTML = "A aventura do inicio ao fim,  <?php echo $_SESSION["nickname"]; ?>! "
        <?php  }
          else{ ?>
             document.getElementById("bal").innerHTML = "A aventura completa!";  
          <?php }; ?>
                 };
            
             function getready() {                                   //frase no separador "get ready"
    <?php
if (isset($_SESSION['iduser'])) {?>

    document.getElementById("bal").innerHTML = "Aqui podes te preparar bem para a viagem  <?php echo $_SESSION["nickname"]; ?>! "
    <?php  }
          else { ?>
             document.getElementById("bal").innerHTML = "Informações úteis para quem quer viajar!";  
          <?php }; ?>
                 };
             
            function paises() {  
            <?php                                      //frase no separador "paises"
             if (isset($_SESSION['iduser'])) {?>

    document.getElementById("bal").innerHTML = "Aqui podes ver o que te interessa por País  <?php echo $_SESSION["nickname"]; ?>! <?php
    if($_SESSION["country"] == "Laos" ||  $_SESSION["country"] =="Phillipines" || $_SESSION["country"] =="Singapore" || $_SESSION["country"] =="Thailand" || $_SESSION["country"] =="Cambodia" || $_SESSION["country"] == "Vietnam" || $_SESSION["country"] =="Myanmar") { echo
      "O teu país de sonho ".$_SESSION['country']." encontra-se aqui!!!";
    } else { echo
      "Não está aqui o  teu país de sonho ".$_SESSION['country'].", mas são países que valem muito a pena visitar!";
    } ?>
    "; 
    <?php
  } else { ?>
     document.getElementById("bal").innerHTML = "Artigos por País!";  
          <?php }; ?>
                 };

            function contacts() {                                         //frase no separador "contacts"
             <?php
if (isset($_SESSION['iduser'])) {?>

    document.getElementById("bal").innerHTML = "Se precisares de mais informações, podes-me enviar um e-mail  <?php echo $_SESSION["nickname"]; ?>! "

          <?php
  } else { ?>
               document.getElementById("bal").innerHTML = "Entre em contacto comigo!";               
         <?php }; ?>
                 }; <?php
if (isset($_SESSION['iduser'])) {?>
            document.getElementById("bal").innerHTML = "Bem-vindo a bordo <?php echo $_SESSION["nickname"]; ?>!!!";    
            setTimeout(function(){ document.getElementById("bal").innerHTML = "Então o teu pais de sonho é <?php echo $_SESSION["country"]; ?>...";  ; }, 3000);              //frase inicial
         <?php }
          else{?>
             document.getElementById("bal").innerHTML = "Bem-vindo a bordo!";  
          <?php }; ?>
            document.getElementById("home").addEventListener("mouseover", home);                   //frases com "hover" e sem "hover" nos separadores"
            document.getElementById("home").addEventListener("mouseleave", normal);
            document.getElementById("journey").addEventListener("mouseover", journey);
            document.getElementById("journey").addEventListener("mouseleave", normal);
            document.getElementById("getReady").addEventListener("mouseover", getready);
            document.getElementById("getReady").addEventListener("mouseleave", normal);
            document.getElementById("paises").addEventListener("mouseover", paises);
            document.getElementById("paises").addEventListener("mouseleave", normal);
            document.getElementById("cont").addEventListener("mouseover", contacts);
            document.getElementById("cont").addEventListener("mouseleave", normal);
            
             });
      </script>

      

      <style>
            body{
                    background: url("../library/images/varias/world.png");
                    background-repeat: no-repeat;
                    background-size: 100% 120%;
                    background-position: 0px 70px;
                    }
      </style>

  </head>

  <body>

      <div class="personagem">
          <div class="balao">
              <div class="talktext">
                  <p id="bal"></p>
             </div>
          </div>
          <img id="chines" src = "../library/images/varias/chines2.png"/>
     </div>
      <img class="plane" src = "../library/images/varias/plane.png"/>

  </body>
</html>
