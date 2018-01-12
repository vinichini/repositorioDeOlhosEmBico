<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <link href="css/styles.css" type="text/css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  


<script>
$(document).ready(function(){     

   $(".exit").click(function(){
    window.location.href='paginasweb/home.php'});

setTimeout(function(){window.location.href='paginasweb/Home.php'},60000);
 $('.setaRato')
 // setaRato - Mapa
 .delay(700)
  .animate({left:'500px'},{ duration: 400})                           //indeciso
.delay(100)
  .animate({left:'600px'},{ duration: 400})                           //indeciso
.delay(100)
 .animate({left:'480px'},{ duration: 400})                             //indeciso
.delay(100)
 .animate({left:'530px'},{ duration: 320})                            //indeciso
.delay(300)
 .animate({left:'100px'},{ duration: 1000})                            //america do norte
.delay(500)
 .animate({top:'380px'},{ duration:600})                           //guatemala
.delay(300)
 .animate({left:'250px', top:'520px'},{ duration: 600})         //america do sul
.delay(500)
 .animate({left:'370px'},{ duration: 500})                            //america do sul
 .delay(200)
 .animate({left:'750px'},{ duration: 1000})                           //africa
  .delay(200)
  .animate({left:'1280px',top:'580px'},{ duration: 1500})      //oceania
  .delay(300)
   .animate({left:'1240px',top:'460px'},{ duration: 600})       //asia indonesia
   .delay(400)
   .animate({left:'1202px',top:'400px'},{ duration: 800})     //sudeste asiático
   .delay(5200)
    .animate({left:'458px',top:'10px'},{ duration: 1800})    //separador calendário
     
//setaRato - Calendário
      .delay(790)
       .animate({left:'448px',top:'50px'},{ duration: 240})     // transição para mão - iguais pontos de intersecção e mudança de opacity 
       .animate({opacity: '0'},{ duration: 1})
        .animate({left:'942px',top:'50px'},{ duration: 400})     // deslocamento para o ponto de  mudança seguinte (invisivel)
        .delay(5500)
       .animate({opacity: '1'},{ duration: 1})
        .animate({left:'948px',top:'10px'},{ duration: 400})   //transição para a seta
        .animate({left:'348px',top:'10px'},{ duration: 1800})   //separador google

        //setaRato - Pesquisa Google
        .delay(600)
         .animate({left:'410px',top:'394px'},{ duration: 1100})  //caixa de pesquisa
         .delay(400)
         .animate({left:'410px',top:'424px'},{ duration: 1000})  //sair da caixa de pesquisa para ver texto
          .delay(9000)
         .animate({left:'610px',top:'480px'},{ duration: 1000})   //ir para cima do botão pesquisar
         .delay(800)
       .animate({left:'730px',top:'480px'},{ duration: 1000})         //ir para o botão "sinto-me com sorte"
        .delay(50)
       .animate({opacity: '0'},{ duration: 1}) 
 
     /*Primeira  Div - Mapa*/
    $('.pin')
 .delay(12000) //7000
.animate({opacity: '1', bottom:'280px' },{ duration: 800});   //pin a cair
 $('.circulo')                 /*consoante o tamanho do circulo e o grau de aumento, foram precisos vários testes para o colocar o centro no sitio exacto*/
 .delay(12900)
.animate({opacity: '1',height: '20px',width: '20px', right:'130px', bottom:'270px'},{ duration: 800})   /*circulo a aumentar pouco*/
.animate({opacity: '1',height: '10px',width: '10px', right:'135px', bottom:'275px'},{ duration: 800})   /*circulo a diminuir*/
.animate({opacity: '1',height: '20px',width: '20px', right:'130px', bottom:'270px'},{ duration: 800})   /*circulo a aumentar mais*/
.animate({opacity: '1',height: '10px',width: '10px', right:'135px', bottom:'275px'},{ duration: 800})    /*circulo a diminuir*/
.animate({opacity: '1',height: '190px',width: '190px', right:'50px', bottom:'190px'},{ duration: 800})/*circulo aumentar ainda mais*/
.delay(160)
.queue(function() {                                                      //como não se consegue utilizar delay com css, teve-se que meter uma função queue
        $(this).css("background-color","rgba(0, 38, 153,0.5)").dequeue();
    })


  /*Segunda Div - Calendário*/
$('.calendario')
 .delay(19400)//500
.animate({opacity: '1' },{ duration: 10})

$('.maoRato')             
     .delay(20000)              
     .animate({opacity: '1'},{ duration: 5})  //transição para mão
     .delay(5)                        
    .animate({left:'310px',top:'400px'},{ duration: 1000})    //dia da decisão
       .delay(800)
    .animate({left:'610px',top:'630px'},{ duration: 1600})   //dia escolhido
     .delay(1600)
    .animate({left:'935px',top:'35px'},{ duration: 1100})  //transição para seta
    .delay(1)
      .animate({opacity: '0'},{ duration: 1})
     
$('.dataEscolhida')
.delay(23500)
.animate({opacity: '1'});

 /*Terceira Div - Google pesquisa*/
$('.pesquisa')
 .delay(28600) 
.animate({opacity: '1' },{ duration: 10})
$('.escondeTexto')                                           //criei uma div de cor branca a tapar o texto, para dar a sensação de se estar a escrever
.delay(30000)
   .animate({left:'185px'},{ duration: 2800})                 //ao movimentar-se, as letras vão aparecendo
   .delay(10)
    .animate({left:'50px'},{ duration: 1100})
    .delay(400)
    .animate({left:'245px', width:'150px'},{ duration: 2800})  //como está a ir muito para a direita teve-se que diminuir o width para não sobrepor a caixa de pesquisa
    .delay(400)
    .animate({left:'390px'},{ duration: 2800});
$('.texto')
    .delay(34000)
    .animate({opacity: '0' });
     $('.texto2')
    .delay(34000)
    .animate({opacity: '1' });
  $('.bordaBotao')                                                   //Uma div criada com borda sobre o botao para dar a sensação de click
  .delay(43000)
    .animate({opacity: '1' })
    .animate({opacity: '0' });


     /*Quarta Div - viagem*/
     $('.viagem')
 .delay(44000)  //9000
.animate({opacity: '1' },{ duration: 10})
    $('.botas')
.delay(44000)//8000
   .animate({top:'485px'},{ duration: 800})//itens a cair à vez e a ir à vez para a mochila
   .delay(4400)
   .animate({left:'500',opacity:'0'})
   $('.roupa')
.delay(44600)
   .animate({top:'485px'},{ duration: 800})
    .delay(3900)
   .animate({left:'500',opacity:'0'})
   $('.havaianas')
.delay(45200)
   .animate({top:'485px'},{ duration: 800})
     .delay(3400)
   .animate({left:'500',opacity:'0'})
    $('.escova')
.delay(45800)
   .animate({top:'485px'},{ duration: 800})
     .delay(2900)
   .animate({left:'500',opacity:'0'})
    $('.calcoes')
.delay(46400)
   .animate({top:'485px'},{ duration: 800})
     .delay(2400)
   .animate({left:'500',opacity:'0'})
    $('.passaporte')
.delay(47000)
   .animate({top:'485px'},{ duration: 800})
    .delay(1900)
   .animate({left:'500',opacity:'0'})
    $('.caderno')
.delay(47600)
   .animate({top:'485px'},{ duration: 800})
    .delay(1400)
  .animate({left:'500',opacity:'0'})
    $('.mochila')
.delay(48200)
   .animate({top:'450px'},{ duration: 800})
   .delay(4600)
   .animate({top:'330px',left:'150px'},{ duration: 800})
  $('.cenario')
.delay(50400)
   .fadeIn(1000)
   .delay(3400)
   .animate({right:'2650px'},{ duration: 3200})
    $('.taxi')
.delay(51600)
   .animate({left:'50px'},{ duration: 800})
   .animate({left:'45px'},{ duration: 60})
     $('.aviao')
.delay(58200)
   .animate({bottom:'500px',left:'5800px'},{ duration: 2800})

});
</script>

<title>Inicio</title>
</head>
	

<body>
<div class="intro">
      <div class="rato">
          <img class="setaRato" src="library/images/imagesInicio/setaRato.png"/>
          <img class="maoRato" src="library/images/imagesInicio/maoRato.png"/>
      </div>
     <div class="mapaMundo">
	 <img class="mapa" src="library/images/imagesInicio/googleMaps.png"/>
	 <img class="pin" src="library/images/imagesInicio/pin.png"/>
	 <div class="circulo" ></div>
    </div>
    <div class="calendario">
        <img class="cal" src="library/images/imagesInicio/calendario.png"/>
        <div class="dataActual"></div>
        <div class="dataEscolhida"></div>
    </div>
    <div class="pesquisa">
        <img class="pesq" src="library/images/imagesInicio/google.png"/>
      	 <div class="caixaPesquisa">
      		<span class="texto">Flights to Thailand</span>
      		<span class="texto2">Cheap Flights to Thailand and nice places to stay </span>
      		<div class="escondeTexto"></div>
      	</div>
        <div class="bordaBotao"></div>
    </div>
    <div class="viagem">

            <div class="itensViagem">
                <img class="botas" src="library/images/imagesInicio/botas.png"/>
                <img class="roupa" src="library/images/imagesInicio/roupa.png"/>
                <img class="havaianas" src="library/images/imagesInicio/havaianas.png"/>
                <img class="escova" src="library/images/imagesInicio/escova.png"/>
                <img class="calcoes" src="library/images/imagesInicio/calcoes.png"/>
                <img class="passaporte" src="library/images/imagesInicio/passaporte.png"/>
                <img class="caderno" src="library/images/imagesInicio/caderno.png"/>
                 <img class="mochila" src="library/images/imagesInicio/mochila.png"/>
              </div>
                 <img class="taxi" src="library/images/imagesInicio/taxi.png"/>
            <div class="cenario">
                 <img class="estrada" src="library/images/imagesInicio/estrada.jpg"/>
                 <img class="aeroporto" src="library/images/imagesInicio/aeroporto.png"/>
                 <img class="aviao" src="library/images/varias/plane.png"/>
                 <div class="arvores"></div>
          </div>
          </div>
          <button style="cursor:pointer" class="exit" >Skip Intro</button>
      

</div>

	
</body>
</html>