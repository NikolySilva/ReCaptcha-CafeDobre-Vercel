<?php

    if($_POST){

        //curl
        $curl = curl_init();
        
        //definiões da requisição com curl
        curl_setopt_array($curl, [
            CURLOPT_URL => ' https://www.google.com/recaptcha/api/siteverify',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => [
                'secret' => '6Lc-uw8pAAAAAEAgEQWKjC0xQ3trx8t5vQS9yRcw',
                'response' => $_POST['g-recaptch-response'] ?? ''
            ]
            ]);

            //Executa a requisição
            $response = curl_exec($curl);

            //Fecha a execução Curl
            curl_close($curl);

            //Response em array
            $responseArray = json_decode($response,true);

            //Sucesso do recaptcha
            $sucesso = $responseArray['succes'] ?? false;

            //retorno para usuário
            echo $sucesso ? "Usuário cadastrado com sucesso!" : "ReCaptcha inválido":
    }


?>
<!Doctype html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Café em Dobro - Contato</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script>
        function validaPost(){
            //verifica se o recaptcha foi selecionado
            if (grecaptcha.getResponse() != ""){
                return true;
            }else{
                alert('Selecione a caixa de "não sou um robô"');
                return false
            }
        }
    </script>
</head>

<body>
    <header class="header">
        <a href="index.html" class="logo">
          <img src="images/logo.png" alt="">
        </a>

        <nav class="navbar">
            <a href="index.html">Início</a>
            <a href="QuemSomos.html">Quem Somos</a>
            <a href="menu.html">Menu</a>
            <a href="produtos.html">Produtos</a>
            <a href="">Contato</a>
        </nav>

        <div class="icons">
            <div class="fas fa-search" id="search-btn"></div>
            <div class="fas fa-shopping-cart" id="cart-btn"></div>
            <div class="fas fa-bars" id="menu-btn"></div>
            <a href="/login.html" target="_blank"><div class="fa-solid fa-user"></div></a>
        </div>

        <div class="search-form">
            <input type="search" id="search-box" placeholder="search here...">
            <label for="search-box" class="fas fa-search"></label>
        </div>
    </header>
    <section class="contact" id="contact">

        <h1 class="heading"> <span>Contato</span> </h1>

        <div class="row">

            <iframe class="map"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3646.7893661945072!2d-46.3326703244484!3d-23.932511675332997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce0483a06d9795%3A0x1d093fb38106a820!2sMuseu%20do%20Caf%C3%A9!5e0!3m2!1spt-BR!2sbr!4v1685379031571!5m2!1spt-BR!2sbr"
                 allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

            <form action="" method="post" onsubmit="return validaPost()" id="form">

                <h3>Insira suas informações para entrar em contato</h3>
                <div class="inputBox">
                    <input type="text" placeholder="nome" class="required" oninput="nameValidate()" id="nome">
                </div>
                <span class="span-required">Digite no mínimo 3 caracteres</span>

                <div class="inputBox">
                    <input type="email" placeholder="e-mail" class="required" oninput="validaEmail()" id="email">
                </div>
                <span class="span-required">Digite um e-mail válido</span>

                <div class="inputBox">
                    <input type="tel" placeholder="(99) 99999-9999" pattern="\([0-9]{2}\) [0-9]{5}-[0-9]{4}" maxlength="15" class="required" oninput="validaTelefone()" id="tel">
                </div>
                <span class="span-required">Siga a seguinte estrutura: +xx (xx) xxxxx-xxxx</span>
                
                <div class="g-recaptcha" data-sitekey="6Lc-uw8pAAAAABcAJcyZSbdaMkZo6_7_A3ndXQTJ"></div>

                <input type="submit" value="enviar" class="btn" id="campo" onclick="confirmarFormulario()">

            </form>

        </div>

    </section>

    

        <script src="js/contato.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
</body>

</html>