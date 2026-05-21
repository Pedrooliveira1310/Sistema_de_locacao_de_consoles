<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/config.php';

session_start();

use Services\Auth;

$mensagem = '';
$auth = new Auth();

// Se já estiver logado
if (Auth::verificarLogin()) {

    header('Location: index.php');
    exit;

}

// LOGIN
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($auth->login($username, $password)) {

        header('Location: index.php');
        exit;

    } else {

        $mensagem = 'Usuário ou senha inválidos';

    }

}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Login - GameRent</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
          rel="stylesheet">

    <!-- Fonte -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

    <style>

        body{

            background: linear-gradient(
                135deg,
                #0f172a,
                #020617
            );

            min-height: 100vh;

            display: flex;
            justify-content: center;
            align-items: center;

            font-family: 'Poppins', sans-serif;

            overflow: hidden;

        }

        .background-glow{

            position: absolute;

            width: 500px;
            height: 500px;

            background: rgba(124,58,237,0.15);

            filter: blur(120px);

            border-radius: 50%;

            top: -100px;
            right: -100px;

        }

        .background-glow-2{

            position: absolute;

            width: 400px;
            height: 400px;

            background: rgba(6,182,212,0.12);

            filter: blur(120px);

            border-radius: 50%;

            bottom: -120px;
            left: -120px;

        }

        .login-card{

            position: relative;

            width: 100%;
            max-width: 430px;

            background: rgba(17,24,39,0.96);

            border: 1px solid #1e293b;

            border-radius: 28px;

            padding: 2.3rem;

            backdrop-filter: blur(14px);

            box-shadow: 0 0 35px rgba(0,0,0,0.45);

            z-index: 2;

        }

        .logo{

            width: 90px;
            height: 90px;

            margin: 0 auto 1.5rem;

            border-radius: 22px;

            background: linear-gradient(
                135deg,
                #7c3aed,
                #9333ea
            );

            display: flex;
            justify-content: center;
            align-items: center;

            box-shadow: 0 0 25px rgba(124,58,237,0.4);

        }

        .logo i{

            font-size: 42px;
            color: white;

        }

        h1{

            color: white;

            text-align: center;

            font-weight: 700;

            margin-bottom: 0.3rem;

        }

        .subtitle{

            text-align: center;

            color: #94a3b8;

            margin-bottom: 2rem;

        }

        .form-label{

            color: #e2e8f0;

            font-weight: 500;

        }

        .form-control{

            background: #1e293b;

            border: 1px solid #334155;

            color: white;

            border-radius: 14px;

            padding: 0.9rem;

        }

        .form-control:focus{

            background: #1e293b;

            color: white;

            border-color: #7c3aed;

            box-shadow: 0 0 15px rgba(124,58,237,0.35);

        }

        .btn-login{

            width: 100%;

            padding: 0.9rem;

            border: none;

            border-radius: 14px;

            background: linear-gradient(
                135deg,
                #7c3aed,
                #9333ea
            );

            color: white;

            font-weight: 600;

            transition: 0.25s;

        }

        .btn-login:hover{

            transform: translateY(-2px);

            box-shadow: 0 0 18px rgba(124,58,237,0.45);

        }

        .alert{

            border-radius: 14px;

            border: none;

        }

        .footer-text{

            text-align: center;

            color: #64748b;

            margin-top: 1.7rem;

            font-size: 0.9rem;

        }

        @media(max-width: 500px){

            .login-card{

                margin: 1rem;

                padding: 2rem 1.5rem;

            }

        }

    </style>

</head>

<body>

    <!-- efeitos -->
    <div class="background-glow"></div>
    <div class="background-glow-2"></div>

    <!-- card -->
    <div class="login-card">

        <!-- logo -->
        <div class="logo">

            <i class="bi bi-controller"></i>

        </div>

        <!-- titulo -->
        <h1>GameRent</h1>

        <p class="subtitle">
            Sistema premium de locação gamer
        </p>

        <!-- mensagem -->
        <?php if ($mensagem): ?>

            <div class="alert alert-danger">

                <?= htmlspecialchars($mensagem) ?>

            </div>

        <?php endif; ?>

        <!-- form -->
        <form method="post"
              class="needs-validation"
              novalidate>

            <div class="mb-3">

                <label class="form-label">

                    Usuário

                </label>

                <input type="text"
                       name="username"
                       class="form-control"
                       placeholder="Digite seu usuário"
                       required>

            </div>

            <div class="mb-4">

                <label class="form-label">

                    Senha

                </label>

                <input type="password"
                       name="password"
                       class="form-control"
                       placeholder="Digite sua senha"
                       required>

            </div>

            <button type="submit"
                    class="btn btn-login">

                <i class="bi bi-box-arrow-in-right"></i>
                Entrar

            </button>

        </form>

        <div class="footer-text">

            © 2026 GameRent • Todos os direitos reservados

        </div>

    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>