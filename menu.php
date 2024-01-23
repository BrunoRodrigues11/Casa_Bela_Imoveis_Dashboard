<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
}

$userLogged = $_SESSION['usuario'];

include("connection/connection.php");

// Indicador de quantidade total de imóveis cadastrados
$sqlQtdeImovel = "SELECT COUNT(id) as qtde FROM imovel";
$queryQtdeImovel = mysqli_query($conn, $sqlQtdeImovel);
$dadosQtdeImovel = mysqli_fetch_array($queryQtdeImovel);
$qtdeImovel = $dadosQtdeImovel['qtde'];

// Indicador de quantidade de imóveis vendidos
$sqlQtdeImovelVendido = "SELECT COUNT(id) as qtde FROM movimentacao_imovel WHERE status = 'Venda'";
$queryQtdeImovelVendido = mysqli_query($conn, $sqlQtdeImovelVendido);
$dadosQtdeImovelVendido = mysqli_fetch_array($queryQtdeImovelVendido);
$qtdeImovelVendido = $dadosQtdeImovelVendido['qtde'];

// Indicador lucro das vendas
$sqlVlrImovelVendido = "SELECT * FROM movimentacao_imovel WHERE status = 'Venda'";
$queryVlrImovelVendido = mysqli_query($conn, $sqlVlrImovelVendido);

$sqlVlrImovelVendido2 = "SELECT * FROM imovel WHERE status = 'Venda'";
$queryVlrImovelVendido2 = mysqli_query($conn, $sqlVlrImovelVendido2);

// Indicador de quantidade de imóveis alugados
$sqlQtdeImovelAlugado = "SELECT COUNT(id) as qtde FROM movimentacao_imovel WHERE status = 'Aluguel'";
$queryQtdeImovelAlugado = mysqli_query($conn, $sqlQtdeImovelAlugado);
$dadosQtdeImovelAlugado = mysqli_fetch_array($queryQtdeImovelAlugado);
$qtdeImovelAlugado = $dadosQtdeImovelAlugado['qtde'];

// Indicador lucro dos alugueis
$sqlVlrImovelAlugado = "SELECT SUM(valor_negocio) as vlrAluguel FROM movimentacao_imovel WHERE status = 'Aluguel'";
$queryVlrImovelAlugado = mysqli_query($conn, $sqlVlrImovelAlugado);
$dadosVlrImovelAlugado = mysqli_fetch_array($queryVlrImovelAlugado);
$vlrImovelAlugado = $dadosVlrImovelAlugado['vlrAluguel'];

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Painel Administrativo - Imobiliária Casa Bela</title>
    <!-- Favicon -->
    <!-- <link href="./assets/img/brand/favicon.png" rel="icon" type="image/png"> -->
    <link href="./assets/img/brand/fav.png" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="./assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
    <link href="./assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="./assets/css/argon-dashboard.css?v=1.1.0" rel="stylesheet" />
</head>

<body>
    <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
        <div class="container-fluid">
            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
                aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Brand -->
            <a class="navbar-brand pt-0" href="./index.php">
                <!-- <img src="./assets/img/brand/blue.png" class="navbar-brand-img" alt="..."> -->
                <img src="./assets/img/brand/logo_blue.png" class="navbar-brand-img" alt="...">
            </a>
            <!-- User -->
            <ul class="nav align-items-center d-md-none">
                <li class="nav-item dropdown">
                    <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="ni ni-bell-55"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right"
                        aria-labelledby="navbar-default_dropdown_1">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <div class="media align-items-center">
                            <span class="avatar avatar-sm rounded-circle">
                                <img alt="Image placeholder" src="./assets/img/theme/team-1-800x800.jpg">
                            </span>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                        <div class=" dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Bem-vindo(a)!</h6>
                        </div>
                        <a href="./examples/profile.html" class="dropdown-item">
                            <i class="ni ni-single-02"></i>
                            <span>Perfil</span>
                        </a>
                        <a href="./examples/profile.html" class="dropdown-item">
                            <i class="ni ni-settings-gear-65"></i>
                            <span>Configurações</span>
                        </a>
                        <a href="./examples/profile.html" class="dropdown-item">
                            <i class="ni ni-chart-bar-32"></i>
                            <span>Estatísticas</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="user_logout.php" class="dropdown-item">
                            <i class="ni ni-user-run"></i>
                            <span>Sair</span>
                        </a>
                    </div>
                </li>
            </ul>
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Collapse header -->
                <div class="navbar-collapse-header d-md-none">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="./index.php">
                                <!-- <img src="./assets/img/brand/blue.png"> -->
                                <img src="./assets/img/brand/logo_blue.png">
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse"
                                data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false"
                                aria-label="Toggle sidenav">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Navigation -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class=" nav-link active" href=" ./index.php"> <i class="ni ni-tv-2 text-primary"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="list_imovel.php">
                            <i class="ni ni-building text-blue"></i> Imóveis
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="list_usuario.php">
                            <i class="ni ni-single-02 text-yellow"></i> Usuários
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="list_cliente.php">
                            <i class="fas fa-users text-orange"></i> Clientes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="list_tramitacao.php">
                            <i class="ni ni-key-25 text-info"></i> Tramitações
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="list_categoria.php">
                            <i class="ni ni-bullet-list-67 text-red"></i> Categorias
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="list_pagamento.php">
                            <i class="ni ni-bullet-list-67 text-red"></i> Formas de Pagamento
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="list_modalidade.php">
                            <i class="ni ni-bullet-list-67 text-red"></i> Modalidades
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="main-content">
        <!-- Navbar -->
        <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
            <div class="container-fluid">
                <!-- Brand -->
                <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.php">Dashboard</a>
                <!-- User -->
                <ul class="navbar-nav align-items-center d-none d-md-flex">
                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <div class="media align-items-center">
                                <span class="avatar avatar-sm rounded-circle">
                                    <img alt="Image placeholder" src="./assets/img/profile/cr7_profile.png">
                                </span>
                                <div class="media-body ml-2 d-none d-lg-block">
                                    <span class="mb-0 text-sm  font-weight-bold">
                                        <?php echo $userLogged ?>
                                    </span>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                            <div class=" dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Bem-vindo(a)!</h6>
                            </div>
                            <a href="profile.php" class="dropdown-item">
                                <i class="ni ni-single-02"></i>
                                <span>Perfil</span>
                            </a>
                            <a href="./examples/profile.html" class="dropdown-item">
                                <i class="ni ni-settings-gear-65"></i>
                                <span>Configurações</span>
                            </a>
                            <a href="./examples/profile.html" class="dropdown-item">
                                <i class="ni ni-chart-bar-32"></i>
                                <span>Estatísticas</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="user_logout.php" class="dropdown-item">
                                <i class="ni ni-user-run"></i>
                                <span>Sair</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- End Navbar -->
        <?php include("rodape.php"); ?>
</body>

</html>