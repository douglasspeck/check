<?php

require_once 'assets/php/mysqli/db.php';

if (isset($_POST['send-mail'])) {
    $dataset_student = [['email_student', addslashes($_POST['email'])]];
    $dataset_teacher = [['email_teacher', addslashes($_POST['email'])]];

    $student = fetchAll($db, 'student', 0, $dataset_student)->fetch_assoc();
    $teacher = fetchAll($db, 'teacher', 0, $dataset_teacher)->fetch_assoc();

    if ($student || $teacher) {
        $md5 = md5($_POST['email']);

        $subject = 'Recuperação de Senha';
        $link = 'https://ime.unicamp.br/~fracoes/newpassword.php?h=' . $md5;
        $message = 
'Recebemos o seu pedido para redefinição de senha. Para concluir este processo, clique no link para definir uma nova senha.

' . $link . '

O link para redefinição de senha é intransferível e pode ser usado somente uma vez.';
        $header = 'From: Check Frações noreply@check.com';

        if (mail($_POST['email'], $subject, $message, $header)) {
            echo '<script>document.addEventListener("DOMContentLoaded", function(event) {sucessSendMail();});</script>';        
        }
    } else {
        echo '<script>
        document.addEventListener("DOMContentLoaded", function(event) {
            const messageError = "Email não cadastrado";
            alertErrorLogin(messageError);
        });
        </script>';
    }
}

?>

<!DOCTYPE html>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recupere sua Senha</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&family=Roboto:wght@100;300;400;500;700;900&family=Source+Sans+Pro:wght@200;300;400;600;700;900&display=swap');

        .forgotpass-page * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'poppins', sans-serif;
        }

        #forgotpass-page {
            width: 100vw;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #eeeeee;
            overflow: hidden;
        }

        #forgotpass-page .error-login-message {
            position: absolute;
            top: 30px;
            padding: 6px 30px;
            background-color: rgba(255, 0, 0, 0.12);
            color: red;
            font-size: 13px;
            border-radius: 3px;
            animation: slide-top 3s cubic-bezier(0.25, 0.45, 0.45, 0.95) both;
        }

        @keyframes slide-top {
            0% {
                transform: translateY(-5px);
                opacity: 0;
            }
            5% {
                transform: translateY(0);
                opacity: 1;
            }
            95%{
                transform: translateY(0);
                opacity: 1;
            }
            100%{
                transform: translateY(-5px);
                opacity: 0;
            }
        }
                
        #forgotpass-page .forgotpass-container {
            width: 75vw;
            max-width: 370px;
            margin: 0 auto;
            padding: 35px;
            text-align: center;
            background-color: white;
            position: relative;
            border-radius: 15px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.6);
        }

        #forgotpass-page h2 {
            font-size: 20px;
            margin-bottom: 20px;
        }

        #forgotpass-page input[type="email"] {
            border: none;
            background-color: whitesmoke;
            border-radius: 18px;
            padding: 8px 35px 8px 37px;
            outline: none;
            width: 300px;
            height: 36px;
            margin-bottom: 15px;
        }

        #forgotpass-page .material-icons {
            position: absolute;
            transform: scale(0.8);
            margin-top: 5px;
            top: 86px;
            left: 44px;
            user-select: none;
        }

        #forgotpass-page button[type="submit"] {
            background: #eb6841;
            color: white;
            border-radius: 30px;
            width: 100px;
            border: none;
            outline: none;
            margin-top: 18px;
            padding: 8px 15px 8px 15px;
            font-size: 15px;
            cursor: pointer;
        }

        #forgotpass-page button[type="submit"]:hover {
            background: #da5229;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet" />
</head>
<body class="forgotpass-page" id="forgotpass-page">
    <div class="forgotpass-container">
        <form action="forgotpass.php" id="forgotpass" method="POST">
            <h2>Recuperação de Senha</h2>
            <div id="forgotpass-input">
                <input
                    type="email"
                    name="email"
                    placeholder="Digite seu Email"
                    maxlength=50
                    required
                />
                <span class="material-icons">mail</span>
                <button type="submit" name="send-mail">Enviar</button>
            </div>
        </form>
    </div>
    <script>
        function alertErrorLogin(messageError) {
            const message = document.createElement("div");
            message.classList.add("error-login-message");
            message.innerText = messageError;
            document.body.appendChild(message);
        }

        function sucessSendMail() {
            console.log('sucessSendMail() called');

            const divInputEmail = document.getElementById('forgotpass-input');
            divInputEmail.style.display = 'none';

            const divMessage = document.createElement('div');
            const paragraph = document.createElement('p');
            paragraph.textContent = 'Email enviado com sucesso! Verifique sua caixa de entrada para concluir o processo de redefinição de senha.';
            divMessage.appendChild(paragraph);

            const heading = document.querySelector('h2');
            heading.insertAdjacentElement('afterend', divMessage);
        }
    </script>
</body>
</html>