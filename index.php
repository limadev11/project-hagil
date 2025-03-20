<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login BioVet Agro</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <style>
        * {
            font-family: "Poppins";
        }

        body {
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            overflow-y: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #dde5f4;
            height: 100vh;
        }

        .screen-1 {
            background: #f1f7fe;
            padding: 2em;
            display: flex;
            flex-direction: column;
            border-radius: 30px;
            box-shadow: 0 0 2em #e6e9f9;
            gap: 2em;
        }

        .screen-1 .logo {
            margin-top: -3em;
        }

        .screen-1 .email,
        .screen-1 .password {
            background: white;
            box-shadow: 0 0 2em #e6e9f9;
            padding: 1em;
            display: flex;
            flex-direction: column;
            gap: 0.5em;
            border-radius: 20px;
            color: #4d4d4d;
        }

        .screen-1 .email input,
        .screen-1 .password input {
            outline: none;
            border: none;
        }

        .screen-1 .email input::placeholder,
        .screen-1 .password input::placeholder {
            color: black;
            font-size: 0.9em;
        }

        .screen-1 .login {
            padding: 1em;
            background: green;
            color: white;
            border: none;
            border-radius: 30px;
            font-weight: 600;
        }

        .screen-1 .footer {
            display: flex;
            font-size: 0.7em;
            color: #5e5e5e;
            gap: 14em;
            padding-bottom: 10em;
        }

        .screen-1 .footer span {
            cursor: pointer;
        }

        button {
            cursor: pointer;
        }

        /* Define o fundo da página */
        body {
            margin: 0;
            height: 100vh;
            background-color: #f0f0f0;
            position: relative;
            overflow: hidden;
        }

        /* Container da nuvem */
        .container {
            position: absolute;
            top: 20px;
            left: 20px;
            width: 300px;
            height: 200px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Estilo da nuvem */
        .cloud {
            background-color: #e0e0e0;
            border-radius: 50%;
            width: 250px;
            height: 150px;
            position: relative;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
            animation: float 6s ease-in-out infinite;
        }

        /* Animação da nuvem */
        @keyframes float {
            0% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }

            100% {
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->

    <div class="screen-1">
        <center>
            <img src="img/logomarca.jpeg" alt="" style="height:50px; width:50px;">
        </center>

        <!-- Formulário de login -->
        <form action="login.php" method="post">
            <div class="email">
                <?php if (isset($_SESSION['nao_autenticado'])) : ?>
                    <div class="alert alert-danger">
                        <p>ERRO: Usuário ou senha inválidos.</p>
                    </div>
                <?php endif; ?>
                <label>Email</label>
                <input type="email" name="email" placeholder="Digite seu email" required />
            </div>

            <div class="password">
                <label>Senha</label>
                <div style="display: flex; align-items: center;">
                    <input type="password" name="senha" placeholder="Digite sua senha" id="passwordInput" required />
                    <ion-icon name="eye-outline" style="cursor: pointer; margin-left: 8px;" onclick="togglePasswordVisibility()"></ion-icon>
                </div>
            </div>

            <button class="login" type="submit">Login</button>
        </form>
    </div>

    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById("passwordInput");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/parallax/parallax.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>