<?php

require_once 'assets/php/mysqli/db.php';

if (isset($_POST['send-new-password']) && !empty($_POST['email-user'])) {
    $email_user = $_POST['email-user'];
    $newpassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    if ($db->query("UPDATE `student` SET password='$newpassword' WHERE MD5(email_student)='$email_user'")) {
        header("Location: login.php");
    } else if ($db->query("UPDATE `teacher` SET password='$newpassword' WHERE MD5(email_teacher)='$email_user'")) {
        header("Location: login.php");
    }
}
?>

<!DOCTYPE html>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crie uma nova senha</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&family=Roboto:wght@100;300;400;500;700;900&family=Source+Sans+Pro:wght@200;300;400;600;700;900&display=swap');

        .newpassword-page * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'poppins', sans-serif;
        }

        #newpassword-page {
            width: 100vw;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #eeeeee;
            overflow: hidden;
        }
                
        #newpassword-page .newpassword-container {
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

        #newpassword-page h2 {
            font-size: 20px;
            margin-bottom: 20px;
        }

        #newpassword-page input[type="password"],
        #newpassword-page input[type="text"] {
            border: none;
            background-color: whitesmoke;
            border-radius: 18px;
            padding: 8px 35px 8px 37px;
            outline: none;
            width: 300px;
            height: 36px;
            margin-bottom: 15px;
        }

        #newpassword-page .material-icons {
            position: absolute;
            transform: scale(0.8);
            margin-top: 5px;
            top: 86px;
            left: 44px;
            user-select: none;
        }

        #visibility-icon-newpassword.material-icons {
            transform: scale(0.7);
            color: rgba(0, 0, 0, 0.4);
            margin-top: 6px;
            left: 300px;
            cursor: pointer;
        }

        #newpassword-page button[type="submit"] {
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

        #newpassword-page button[type="submit"]:hover {
            background: #da5229;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet" />
</head>
<body class="newpassword-page" id="newpassword-page">
    <div class="newpassword-container">
        <form action="newpassword.php" id="form-newpassword" method="POST">
            <input type="hidden" name="email-user" value="<?php echo $_GET['h']; ?>">
            <h2>Digite uma Nova Senha</h2>
            <div id="newpassword-input">
                <input
                    type="password"
                    name="password"
                    id="newpassword"
                    placeholder="Nova Senha"
                    minlength="8"
                    required
                />
                <span class="material-icons">lock</span>
                <span class="material-icons" id="visibility-icon-newpassword" onclick="showHide('newpassword', 'visibility-icon-newpassword')">visibility</span>
                <button type="submit" name="send-new-password">Redefinir</button>
            </div>
        </form>
    </div>
    <script>
        function showHide(id_input, id_icon) {
            const inputPassword = document.getElementById(id_input);
            const iconShowPassword = document.getElementById(id_icon);
        
            if(inputPassword.type === 'password'){
                inputPassword.setAttribute('type', 'text');
                iconShowPassword.innerText = 'visibility_off'
            } else {
                inputPassword.setAttribute('type', 'password');
                iconShowPassword.innerText = 'visibility'
            }
        }
    </script>
</body>
</html>