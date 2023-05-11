<?php

require_once 'assets/php/mysqli/db.php';

$h = $_GET['h'];

if (isset($_SESSION['id_student'])) {
    $table_update = 'student';
    $id_user = 'id_student';
} else if (isset($_SESSION['id_teacher'])) {
    $table_update = 'teacher';
    $id_user = 'id_teacher';
}

if(!empty($h)) {
    $db->query("UPDATE $table_update SET email_status='1' WHERE MD5($id_user)='$h'");
?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Confirmação de email</title>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins&family=Roboto:wght@100;300;400;500;700;900&family=Source+Sans+Pro:wght@200;300;400;600;700;900&display=swap');

            .emailconfirm * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'poppins', sans-serif;
            }

            #emailconfirm {
                width: 100vw;
                height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                background-color: #eeeeee;
            }
                
            #emailconfirm .emailconfirm-container {
                width: 75vw;
                max-width: 500px;
                margin: 0 auto;
                padding: 35px;
                text-align: center;
                background-color: white;
                position: relative;
                border-radius: 15px;
                box-shadow: 0px 0px 10px rgba(0,0,0,0.6);
            }
            
            #emailconfirm h1 {
                font-size: 24px;
                margin-bottom: 20px;
            }
            
            #emailconfirm p {
                font-size: 15px;
                margin-bottom: 20px;
            }
            
            #emailconfirm a {
                color: #eb6841;
                text-decoration: none;
            }

            #emailconfirm a:hover {
                text-decoration: underline;
            }
        </style>
    </head>
    <body class="emailconfirm" id="emailconfirm">
        <div class="emailconfirm-container">
            <h1>Confirmação de email realizada com sucesso!</h1>
            <p>O seu email foi confirmado com sucesso. <a href="home.php">Clique aqui</a> para acessar a plataforma.</p>
        </div>
    </body>
    </html>

<?php
}
?>