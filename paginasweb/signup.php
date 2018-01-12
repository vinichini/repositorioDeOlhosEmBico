<?php

$raiz="";
$titulo= "Sign Up";
$activePage = "signup.php";
      include '../includes/config.php';



  $error = "";


  if (isset($_POST["submit"])) {

  $firstName = htmlspecialchars($_POST["firstname"]);
  $lastName = htmlspecialchars($_POST["lastname"]);
  $nickName = htmlspecialchars($_POST["nickname"]);
   $email = htmlspecialchars($_POST["email"]);
   $paisSonho = htmlspecialchars($_POST["country"]);
   $pwd = htmlspecialchars($_POST["pwd"]);

// Check if $email is already on the user table
      $sqlMail = "select email from user where email = '".$email."'";
      $resultMail = mysqli_query($connection, $sqlMail);
      $sqlNick = "select nickname from user where nickname = '".$nickName."'";
      $resultNick = mysqli_query($connection, $sqlNick);

              if (empty($firstName) || empty($lastName) || empty($nickName) || empty($email) || empty($pwd)) {

                  $error="Tem de preencher todos os campos!";
                  
                /*  header("Location: signup.php?signup=empty");*/
                  
              } else{
                
             if (isset($resultMail) && isset($resultNick)) {

        //echo md5($pwd);

        if (mysqli_num_rows($resultMail) > 0) {
         // header("Location: signup.php?signup=emailalreadytaken");
          $error =  "Este email já se encontra registado $firstName!";
        }  elseif (mysqli_num_rows($resultNick) > 0) {
         // header("Location: signup.php?signup=emailalreadytaken");
          $error =  "Já existe este Nickname, $firstName! Tens de escolher outro";
        } else {

          //echo $_POST["email"];

          // Check max iduser and new id is max(iduser)+1
          $result = mysqli_query($connection, "select max(iduser) maxiduser from user");
   

          // finally - register my user (insert new user into user table)
          $query = "insert into user ( firstname, lastname, nickname, email, paissonho, pwd) values ('".$firstName."','".$lastName."','".$nickName."','".$email."','".$paisSonho."','".$pwd."')";

            
          //echo $query;
          if (mysqli_query($connection, $query)) {
            $error = "Registaste-te com sucesso $firstName! Faz login para entrares.";
          } else {
            $error = "Problema no registo. Tente mais tarde: ".mysqli_error($connection)."</div>";
          }
          
}
      }

    }  

  }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link href="../css/styles.css" type="text/css" rel="stylesheet">
  </head>
  <body>
   
    <div class="container">

      <h1>Sign Up</h1>


      <form method="post">
        <div class="form-group">
          <label for="name">Nome</label>
          <input name="firstname"type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Introduza o seu nome">
        </div>
         <div class="form-group">
          <label for="lastname">Apelido</label>
          <input name="lastname"type="text" class="form-control" id="lastName" aria-describedby="emailHelp" placeholder="Introduza o seu apelido">
        </div>
          <div class="form-group">
          <label for="nickname">Nome a mostar no site</label>
          <input name="nickname"type="text" class="form-control" id="nickName" aria-describedby="emailHelp" placeholder="Introduza um nome">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Introduza o seu  e-mail">
          <small id="emailHelp" class="form-text text-muted">O seu e-mail não será partilhado com ninguém</small>
        </div>
          <div class="form-group">
            <label for="country">Qual o seu País de sonho?</label>
            <select name="country" id="country"  aria-describedby="emailHelp">
                    <option value="country">Country...</option>
                    <option value="Afganistan">Afghanistan</option>
                    <option value="Albania">Albania</option>
                    <option value="Algeria">Algeria</option>
                    <option value="American Samoa">American Samoa</option>
                    <option value="Andorra">Andorra</option>
                    <option value="Angola">Angola</option>
                    <option value="Anguilla">Anguilla</option>
                    <option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
                    <option value="Argentina">Argentina</option>
                    <option value="Armenia">Armenia</option>
                    <option value="Aruba">Aruba</option>
                    <option value="Australia">Australia</option>
                    <option value="Austria">Austria</option>
                    <option value="Azerbaijan">Azerbaijan</option>
                    <option value="Bahamas">Bahamas</option>
                    <option value="Bahrain">Bahrain</option>
                    <option value="Bangladesh">Bangladesh</option>
                    <option value="Barbados">Barbados</option>
                    <option value="Belarus">Belarus</option>
                    <option value="Belgium">Belgium</option>
                    <option value="Belize">Belize</option>
                    <option value="Benin">Benin</option>
                    <option value="Bermuda">Bermuda</option>
                    <option value="Bhutan">Bhutan</option>
                    <option value="Bolivia">Bolivia</option>
                    <option value="Bonaire">Bonaire</option>
                    <option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
                    <option value="Botswana">Botswana</option>
                    <option value="Brazil">Brazil</option>
                    <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                    <option value="Brunei">Brunei</option>
                    <option value="Bulgaria">Bulgaria</option>
                    <option value="Burkina Faso">Burkina Faso</option>
                    <option value="Burundi">Burundi</option>
                    <option value="Cambodia">Cambodia</option>
                    <option value="Cameroon">Cameroon</option>
                    <option value="Canada">Canada</option>
                    <option value="Canary Islands">Canary Islands</option>
                    <option value="Cape Verde">Cape Verde</option>
                    <option value="Cayman Islands">Cayman Islands</option>
                    <option value="Central African Republic">Central African Republic</option>
                    <option value="Chad">Chad</option>
                    <option value="Channel Islands">Channel Islands</option>
                    <option value="Chile">Chile</option>
                    <option value="China">China</option>
                    <option value="Christmas Island">Christmas Island</option>
                    <option value="Cocos Island">Cocos Island</option>
                    <option value="Colombia">Colombia</option>
                    <option value="Comoros">Comoros</option>
                    <option value="Congo">Congo</option>
                    <option value="Cook Islands">Cook Islands</option>
                    <option value="Costa Rica">Costa Rica</option>
                    <option value="Cote DIvoire">Cote D'Ivoire</option>
                    <option value="Croatia">Croatia</option>
                    <option value="Cuba">Cuba</option>
                    <option value="Curaco">Curacao</option>
                    <option value="Cyprus">Cyprus</option>
                    <option value="Czech Republic">Czech Republic</option>
                    <option value="Denmark">Denmark</option>
                    <option value="Djibouti">Djibouti</option>
                    <option value="Dominica">Dominica</option>
                    <option value="Dominican Republic">Dominican Republic</option>
                    <option value="East Timor">East Timor</option>
                    <option value="Ecuador">Ecuador</option>
                    <option value="Egypt">Egypt</option>
                    <option value="El Salvador">El Salvador</option>
                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                    <option value="Eritrea">Eritrea</option>
                    <option value="Estonia">Estonia</option>
                    <option value="Ethiopia">Ethiopia</option>
                    <option value="Falkland Islands">Falkland Islands</option>
                    <option value="Faroe Islands">Faroe Islands</option>
                    <option value="Fiji">Fiji</option>
                    <option value="Finland">Finland</option>
                    <option value="France">France</option>
                    <option value="French Guiana">French Guiana</option>
                    <option value="French Polynesia">French Polynesia</option>
                    <option value="French Southern Ter">French Southern Ter</option>
                    <option value="Gabon">Gabon</option>
                    <option value="Gambia">Gambia</option>
                    <option value="Georgia">Georgia</option>
                    <option value="Germany">Germany</option>
                    <option value="Ghana">Ghana</option>
                    <option value="Gibraltar">Gibraltar</option>
                    <option value="Great Britain">Great Britain</option>
                    <option value="Greece">Greece</option>
                    <option value="Greenland">Greenland</option>
                    <option value="Grenada">Grenada</option>
                    <option value="Guadeloupe">Guadeloupe</option>
                    <option value="Guam">Guam</option>
                    <option value="Guatemala">Guatemala</option>
                    <option value="Guinea">Guinea</option>
                    <option value="Guyana">Guyana</option>
                    <option value="Haiti">Haiti</option>
                    <option value="Hawaii">Hawaii</option>
                    <option value="Honduras">Honduras</option>
                    <option value="Hong Kong">Hong Kong</option>
                    <option value="Hungary">Hungary</option>
                    <option value="Iceland">Iceland</option>
                    <option value="India">India</option>
                    <option value="Indonesia">Indonesia</option>
                    <option value="Iran">Iran</option>
                    <option value="Iraq">Iraq</option>
                    <option value="Ireland">Ireland</option>
                    <option value="Isle of Man">Isle of Man</option>
                    <option value="Israel">Israel</option>
                    <option value="Italy">Italy</option>
                    <option value="Jamaica">Jamaica</option>
                    <option value="Japan">Japan</option>
                    <option value="Jordan">Jordan</option>
                    <option value="Kazakhstan">Kazakhstan</option>
                    <option value="Kenya">Kenya</option>
                    <option value="Kiribati">Kiribati</option>
                    <option value="Korea North">Korea North</option>
                    <option value="Korea Sout">Korea South</option>
                    <option value="Kuwait">Kuwait</option>
                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                    <option value="Laos">Laos</option>
                    <option value="Latvia">Latvia</option>
                    <option value="Lebanon">Lebanon</option>
                    <option value="Lesotho">Lesotho</option>
                    <option value="Liberia">Liberia</option>
                    <option value="Libya">Libya</option>
                    <option value="Liechtenstein">Liechtenstein</option>
                    <option value="Lithuania">Lithuania</option>
                    <option value="Luxembourg">Luxembourg</option>
                    <option value="Macau">Macau</option>
                    <option value="Macedonia">Macedonia</option>
                    <option value="Madagascar">Madagascar</option>
                    <option value="Malaysia">Malaysia</option>
                    <option value="Malawi">Malawi</option>
                    <option value="Maldives">Maldives</option>
                    <option value="Mali">Mali</option>
                    <option value="Malta">Malta</option>
                    <option value="Marshall Islands">Marshall Islands</option>
                    <option value="Martinique">Martinique</option>
                    <option value="Mauritania">Mauritania</option>
                    <option value="Mauritius">Mauritius</option>
                    <option value="Mayotte">Mayotte</option>
                    <option value="Mexico">Mexico</option>
                    <option value="Midway Islands">Midway Islands</option>
                    <option value="Moldova">Moldova</option>
                    <option value="Monaco">Monaco</option>
                    <option value="Mongolia">Mongolia</option>
                    <option value="Montserrat">Montserrat</option>
                    <option value="Morocco">Morocco</option>
                    <option value="Mozambique">Mozambique</option>
                    <option value="Myanmar">Myanmar</option>
                    <option value="Nambia">Nambia</option>
                    <option value="Nauru">Nauru</option>
                    <option value="Nepal">Nepal</option>
                    <option value="Netherland Antilles">Netherland Antilles</option>
                    <option value="Netherlands">Netherlands (Holland, Europe)</option>
                    <option value="Nevis">Nevis</option>
                    <option value="New Caledonia">New Caledonia</option>
                    <option value="New Zealand">New Zealand</option>
                    <option value="Nicaragua">Nicaragua</option>
                    <option value="Niger">Niger</option>
                    <option value="Nigeria">Nigeria</option>
                    <option value="Niue">Niue</option>
                    <option value="Norfolk Island">Norfolk Island</option>
                    <option value="Norway">Norway</option>
                    <option value="Oman">Oman</option>
                    <option value="Pakistan">Pakistan</option>
                    <option value="Palau Island">Palau Island</option>
                    <option value="Palestine">Palestine</option>
                    <option value="Panama">Panama</option>
                    <option value="Papua New Guinea">Papua New Guinea</option>
                    <option value="Paraguay">Paraguay</option>
                    <option value="Peru">Peru</option>
                    <option value="Phillipines">Philippines</option>
                    <option value="Pitcairn Island">Pitcairn Island</option>
                    <option value="Poland">Poland</option>
                    <option value="Portugal">Portugal</option>
                    <option value="Puerto Rico">Puerto Rico</option>
                    <option value="Qatar">Qatar</option>
                    <option value="Republic of Montenegro">Republic of Montenegro</option>
                    <option value="Republic of Serbia">Republic of Serbia</option>
                    <option value="Reunion">Reunion</option>
                    <option value="Romania">Romania</option>
                    <option value="Russia">Russia</option>
                    <option value="Rwanda">Rwanda</option>
                    <option value="St Barthelemy">St Barthelemy</option>
                    <option value="St Eustatius">St Eustatius</option>
                    <option value="St Helena">St Helena</option>
                    <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                    <option value="St Lucia">St Lucia</option>
                    <option value="St Maarten">St Maarten</option>
                    <option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
                    <option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
                    <option value="Saipan">Saipan</option>
                    <option value="Samoa">Samoa</option>
                    <option value="Samoa American">Samoa American</option>
                    <option value="San Marino">San Marino</option>
                    <option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
                    <option value="Saudi Arabia">Saudi Arabia</option>
                    <option value="Senegal">Senegal</option>
                    <option value="Serbia">Serbia</option>
                    <option value="Seychelles">Seychelles</option>
                    <option value="Sierra Leone">Sierra Leone</option>
                    <option value="Singapore">Singapore</option>
                    <option value="Slovakia">Slovakia</option>
                    <option value="Slovenia">Slovenia</option>
                    <option value="Solomon Islands">Solomon Islands</option>
                    <option value="Somalia">Somalia</option>
                    <option value="South Africa">South Africa</option>
                    <option value="Spain">Spain</option>
                    <option value="Sri Lanka">Sri Lanka</option>
                    <option value="Sudan">Sudan</option>
                    <option value="Suriname">Suriname</option>
                    <option value="Swaziland">Swaziland</option>
                    <option value="Sweden">Sweden</option>
                    <option value="Switzerland">Switzerland</option>
                    <option value="Syria">Syria</option>
                    <option value="Tahiti">Tahiti</option>
                    <option value="Taiwan">Taiwan</option>
                    <option value="Tajikistan">Tajikistan</option>
                    <option value="Tanzania">Tanzania</option>
                    <option value="Thailand">Thailand</option>
                    <option value="Togo">Togo</option>
                    <option value="Tokelau">Tokelau</option>
                    <option value="Tonga">Tonga</option>
                    <option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
                    <option value="Tunisia">Tunisia</option>
                    <option value="Turkey">Turkey</option>
                    <option value="Turkmenistan">Turkmenistan</option>
                    <option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
                    <option value="Tuvalu">Tuvalu</option>
                    <option value="Uganda">Uganda</option>
                    <option value="Ukraine">Ukraine</option>
                    <option value="United Arab Erimates">United Arab Emirates</option>
                    <option value="United Kingdom">United Kingdom</option>
                    <option value="United States of America">United States of America</option>
                    <option value="Uraguay">Uruguay</option>
                    <option value="Uzbekistan">Uzbekistan</option>
                    <option value="Vanuatu">Vanuatu</option>
                    <option value="Vatican City State">Vatican City State</option>
                    <option value="Venezuela">Venezuela</option>
                    <option value="Vietnam">Vietnam</option>
                    <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                    <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                    <option value="Wake Island">Wake Island</option>
                    <option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
                    <option value="Yemen">Yemen</option>
                    <option value="Zaire">Zaire</option>
                    <option value="Zambia">Zambia</option>
                    <option value="Zimbabwe">Zimbabwe</option>
              </select>
         </div>
        <div class="form-group">
          <label for="pwd">Password</label>
          <input name="pwd" type="password" class="form-control" id="pwd" placeholder="Password">
        </div>
        <button name="submit" type="submit" class="btn btn-primary">Sign Up</button>
      </form>
    </div>
      <div class="personagemSup">
          <div class="balaoSup">
              <div class="talktextSup">
                  <p id="balSup"></p>
             </div>
          </div>
          <img id="chinesSup" src = "../library/images/varias/chines2.png"/>
     </div>
    
  <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script>
     var frases = [                                //frases aleatóreas a serem mostradas quando não está seleccionado nenhum menu
                  "Ao estar registado pode comentar os artigos", 
                  "Ao estar registado contrinui para as nossas estatisticas", 
                  "Ao estar registado pode guardar certas funcionalidades como a sua checklist!", 
                  
                  
                  ];


                           

             function normal() {
                 document.getElementById("balSup").innerHTML = frases[Math.floor(Math.random() * frases.length)]; //meter as frases aleatóreas
                 };
            
             function nome() {
                document.getElementById("balSup").innerHTML = "Introduza o seu primeiro nome";                //frase no nome
                };
             function apelido() {
                document.getElementById("balSup").innerHTML = "Introduza o seu apelido";                //frase no apelido
                };
             function nickname() {
               document.getElementById("balSup").innerHTML = "Introduza o nome a mostrar no site. Comentários etc...";      //frase no nickname
               };
            function email() {
               document.getElementById("balSup").innerHTML = "O seu e-mail...";                   //frase no e-mail
               };
            function pais() {
               document.getElementById("balSup").innerHTML = "O País que mais gostou ou que gostaria de conhecer";        //frase no país
               }; 
              function pwd() {
               document.getElementById("balSup").innerHTML = "Crie uma password para poder entrar";        //frase na password
               };
             <?php
if (isset($_POST["submit"])) { ?>

    document.getElementById("balSup").innerHTML = "<?php echo $error;  ?>"          //frase após submissão

       <?php }  else { ?>
             document.getElementById("balSup").innerHTML = "Registe-se para ter acesso a novas funcionalidades!";   //frase inicial 
          <?php }; ?>
                 
              
          
            document.getElementById("name").addEventListener("mouseover", nome);                   //frases com "hover" e sem "hover" 
            document.getElementById("name").addEventListener("mouseleave", normal);
            document.getElementById("lastName").addEventListener("mouseover", apelido);
            document.getElementById("lastName").addEventListener("mouseleave", normal);
            document.getElementById("nickName").addEventListener("mouseover", nickname);
            document.getElementById("nickName").addEventListener("mouseleave", normal);
            document.getElementById("email").addEventListener("mouseover", email);
            document.getElementById("email").addEventListener("mouseleave", normal);
            document.getElementById("country").addEventListener("mouseover", pais);
            document.getElementById("country").addEventListener("mouseleave", normal); 
            document.getElementById("pwd").addEventListener("mouseover", pwd);
            document.getElementById("pwd").addEventListener("mouseleave", normal);
            
           
      </script>
      </body>
</html>