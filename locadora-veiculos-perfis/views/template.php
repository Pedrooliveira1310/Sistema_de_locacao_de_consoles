<?php
require_once __DIR__ . '/../services/Auth.php';

use Services\Auth;

$usuario = Auth::getUsuario();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>GameRent - Locadora Gamer</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Fonte -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>

        body{
            background: linear-gradient(135deg, #0f172a, #020617);
            color: white;
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
        }

        h1{
            font-weight: 700;
            letter-spacing: 1px;
            color: #ffffff;
        }

        h4{
            color: #ffffff;
            font-weight: 600;
        }

        .card{
            background: rgba(17,24,39,0.95);
            border: 1px solid #1e293b;
            border-radius: 22px;
            overflow: hidden;
            backdrop-filter: blur(10px);
            box-shadow: 0 0 25px rgba(0,0,0,0.4);
            transition: 0.3s;
        }

        .card:hover{
            transform: translateY(-3px);
            box-shadow: 0 0 30px rgba(124,58,237,0.25);
        }

        .card-header{
            background: transparent;
            border-bottom: 1px solid #1e293b;
            padding: 1rem 1.4rem;
        }

        .card-body{
            padding: 1.5rem;
            color: white;
        }

        .form-label{
            color: #e2e8f0;
            font-weight: 500;
        }

        .form-control,
        .form-select{
            background: #1e293b;
            border: 1px solid #334155;
            color: white;
            border-radius: 14px;
            padding: 0.75rem;
        }

        .form-control:focus,
        .form-select:focus{
            background: #1e293b;
            color: white;
            border-color: #7c3aed;
            box-shadow: 0 0 15px rgba(124,58,237,0.4);
        }

        .form-control::placeholder{
            color: #94a3b8;
        }

        .btn{
            border-radius: 14px;
            font-weight: 500;
            transition: 0.2s;
        }

        .btn:hover{
            transform: scale(1.02);
        }

        .btn-primary{
            background: linear-gradient(135deg, #7c3aed, #9333ea);
            border: none;
        }

        .btn-primary:hover{
            background: linear-gradient(135deg, #6d28d9, #7e22ce);
        }

        .btn-info{
            background: linear-gradient(135deg, #06b6d4, #0891b2);
            border: none;
            color: white;
        }

        .btn-info:hover{
            color: white;
        }

        .btn-danger{
            background: linear-gradient(135deg, #dc2626, #b91c1c);
            border: none;
        }

        .btn-warning{
            background: linear-gradient(135deg, #f59e0b, #d97706);
            border: none;
            color: white;
        }

        .table{
            color: white;
        }

        .table thead th{
            color: #000;
            font-weight: 600;
        }

        .table td,
        .table th{
            border-color: #334155;
            vertical-align: middle;
        }

        .table-striped>tbody>tr:nth-of-type(odd){
            background: rgba(255,255,255,0.02);
        }

        .table-hover tbody tr:hover{
            background: rgba(124,58,237,0.08);
        }

        .badge{
            padding: 0.6rem 0.9rem;
            border-radius: 999px;
            font-size: 0.8rem;
        }

        .user-info{
            background: rgba(17,24,39,0.95);
            border: 1px solid #1e293b;
            padding: 0.8rem 1rem;
            border-radius: 18px;
            color: white;
            backdrop-filter: blur(10px);
        }

        .welcome-text strong{
            background: linear-gradient(135deg, #7c3aed, #9333ea);
            color: white;
            padding: 0.3rem 0.7rem;
            border-radius: 10px;
        }

        .btn-outline-danger{
            border-color: #dc2626;
            color: white;
        }

        .btn-outline-danger:hover{
            background: #dc2626;
            border-color: #dc2626;
            color: white;
        }

        .action-wrapper{
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-group-actions{
            display: flex;
            gap: 0.5rem;
            align-items: center;
        }

        .rent-group{
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .days-input{
            width: 70px !important;
            text-align: center;
        }

        .logo-icon{
            color: #8b5cf6;
        }

        .system-subtitle{
            color: #cbd5e1;
            margin-top: -5px;
        }

        .top-banner{
            background: linear-gradient(
                135deg,
                rgba(124,58,237,0.2),
                rgba(6,182,212,0.15)
            );

            border: 1px solid #334155;
            border-radius: 20px;
            padding: 1.5rem;
            margin-bottom: 2rem;
        }

        .console-tag{
            background: rgba(124,58,237,0.15);
            border: 1px solid rgba(124,58,237,0.3);
            padding: 0.4rem 0.8rem;
            border-radius: 999px;
            font-size: 0.8rem;
            color: #c4b5fd;
        }

        @media (max-width: 768px){

            .action-wrapper,
            .btn-group-actions,
            .rent-group{
                flex-direction: column;
                width: 100%;
            }

            .days-input{
                width: 100% !important;
            }

            h1{
                font-size: 1.8rem;
            }

        }

    </style>

</head>

<body>

<div class="container py-4">

    <!-- HEADER -->
    <div class="top-banner">

        <div class="d-flex justify-content-between align-items-center flex-wrap gap-4">

            <div>

                <h1 class="mb-1">
                    <i class="bi bi-controller logo-icon"></i>
                    GameRent
                </h1>

                <p class="system-subtitle mb-0">
                    Sistema premium de locação gamer
                </p>

            </div>

            <div class="d-flex align-items-center gap-3 user-info">

                <span>
                    <i class="bi bi-person-circle" style="font-size: 26px;"></i>
                </span>

                <span class="welcome-text">
                    Bem-vindo,
                    <strong><?= htmlspecialchars($usuario['username']) ?></strong>
                </span>

                <a href="?logout=1"
                   class="btn btn-outline-danger d-flex align-items-center gap-2">

                    <i class="bi bi-box-arrow-right"></i>
                    Sair

                </a>

            </div>

        </div>

        <div class="d-flex gap-2 mt-4 flex-wrap">

            <span class="console-tag">PlayStation 5</span>
            <span class="console-tag">Xbox Series X</span>
            <span class="console-tag">Nintendo Switch</span>
            <span class="console-tag">Steam Deck</span>
            <span class="console-tag">Meta Quest</span>

        </div>

    </div>

    <!-- ALERTA -->
    <?php if ($mensagem): ?>

        <div class="alert alert-info alert-dismissible fade show" role="alert">

            <?= htmlspecialchars($mensagem) ?>

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    <?php endif; ?>

    <!-- CARDS -->
    <div class="row g-4">

        <?php if (Auth::isAdmin()): ?>

        <!-- ADICIONAR -->
        <div class="col-md-6">

            <div class="card h-100">

                <div class="card-header">

                    <h4 class="mb-0">
                        <i class="bi bi-plus-circle"></i>
                        Adicionar Novo Console
                    </h4>

                </div>

                <div class="card-body">

                    <form method="post" class="needs-validation" novalidate>

                        <div class="mb-3">

                            <label class="form-label">
                                Nome do Console
                            </label>

                            <input type="text"
                                   name="modelo"
                                   class="form-control"
                                   placeholder="Ex: PlayStation 5"
                                   required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Edição / Versão
                            </label>

                            <input type="text"
                                   name="placa"
                                   class="form-control"
                                   placeholder="Ex: Slim / OLED / Digital"
                                   required>

                        </div>

                        <div class="mb-4">

                            <label class="form-label">
                                Plataforma
                            </label>

                            <select name="tipo"
                                    class="form-select"
                                    required>

                                <option value="Carro">PlayStation</option>
                                <option value="Moto">Xbox</option>
                                <option value="Nintendo">Nintendo</option>
                                <option value="Steam">Steam Deck</option>
                                <option value="VR">Meta Quest VR</option>

                            </select>

                        </div>

                        <button type="submit"
                                name="adicionar"
                                class="btn btn-primary w-100">

                            <i class="bi bi-plus-lg"></i>
                            Adicionar Console

                        </button>

                    </form>

                </div>

            </div>

        </div>

        <?php endif; ?>

        <!-- CALCULAR -->
        <div class="col-<?= Auth::isAdmin() ? 'md-6' : '12' ?>">

            <div class="card h-100">

                <div class="card-header">

                    <h4 class="mb-0">
                        <i class="bi bi-cash-coin"></i>
                        Simular Locação
                    </h4>

                </div>

                <div class="card-body">

                    <form method="post" class="needs-validation" novalidate>

                        <div class="mb-3">

                            <label class="form-label">
                                Plataforma
                            </label>

                            <select name="tipo_calculo"
                                    class="form-select"
                                    required>

                                <option value="Carro">PlayStation</option>
                                <option value="Moto">Xbox</option>
                                <option value="Nintendo">Nintendo</option>
                                <option value="Steam">Steam Deck</option>
                                <option value="VR">Meta Quest VR</option>

                            </select>

                        </div>

                        <div class="mb-4">

                            <label class="form-label">
                                Quantidade de Dias
                            </label>

                            <input type="number"
                                   name="dias_calculo"
                                   class="form-control"
                                   value="1"
                                   min="1"
                                   required>

                        </div>

                        <button type="submit"
                                name="calcular"
                                class="btn btn-info w-100">

                            <i class="bi bi-calculator"></i>
                            Calcular Previsão

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

    <!-- TABELA -->
    <div class="row mt-4">

        <div class="col-12">

            <div class="card">

                <div class="card-header">

                    <h4 class="mb-0">
                        <i class="bi bi-controller"></i>
                        Consoles Cadastrados
                    </h4>

                </div>

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-striped table-hover">

                            <thead>

                            <tr>

                                <th>Plataforma</th>
                                <th>Console</th>
                                <th>Versão</th>
                                <th>Status</th>

                                <?php if (Auth::isAdmin()): ?>
                                    <th>Ações</th>
                                <?php endif; ?>

                            </tr>

                            </thead>

                            <tbody>

                            <?php foreach ($locadora->listarVeiculos() as $veiculo): ?>

                                <tr>

                                    <td>

                                        <span class="badge bg-dark">

                                            <?= $veiculo instanceof \Models\Carro
                                                ? 'PlayStation'
                                                : 'Xbox' ?>

                                        </span>

                                    </td>

                                    <td>
                                        <?= htmlspecialchars($veiculo->getModelo()) ?>
                                    </td>

                                    <td>
                                        <?= htmlspecialchars($veiculo->getPlaca()) ?>
                                    </td>

                                    <td>

                                        <span class="badge bg-<?= $veiculo->isDisponivel() ? 'success' : 'warning' ?>">

                                            <?= $veiculo->isDisponivel()
                                                ? 'Disponível'
                                                : 'Alugado' ?>

                                        </span>

                                    </td>

                                    <?php if (Auth::isAdmin()): ?>

                                    <td>

                                        <div class="action-wrapper">

                                            <form method="post"
                                                  class="btn-group-actions">

                                                <input type="hidden"
                                                       name="modelo"
                                                       value="<?= htmlspecialchars($veiculo->getModelo()) ?>">

                                                <input type="hidden"
                                                       name="placa"
                                                       value="<?= htmlspecialchars($veiculo->getPlaca()) ?>">

                                                <!-- DELETE -->
                                                <button type="submit"
                                                        name="deletar"
                                                        class="btn btn-danger btn-sm">

                                                    <i class="bi bi-trash"></i>

                                                </button>

                                                <!-- RENT -->
                                                <div class="rent-group">

                                                    <?php if (!$veiculo->isDisponivel()): ?>

                                                        <button type="submit"
                                                                name="devolver"
                                                                class="btn btn-warning btn-sm">

                                                            <i class="bi bi-arrow-return-left"></i>
                                                            Devolver

                                                        </button>

                                                    <?php else: ?>

                                                        <input type="number"
                                                               name="dias"
                                                               class="form-control days-input"
                                                               value="1"
                                                               min="1"
                                                               required>

                                                        <button type="submit"
                                                                name="alugar"
                                                                class="btn btn-primary btn-sm">

                                                            <i class="bi bi-controller"></i>
                                                            Alugar

                                                        </button>

                                                    <?php endif; ?>

                                                </div>

                                            </form>

                                        </div>

                                    </td>

                                    <?php endif; ?>

                                </tr>

                            <?php endforeach; ?>

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>