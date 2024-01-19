<?php
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
                            <h6 class="text-overflow m-0">Welcome!</h6>
                        </div>
                        <a href="./examples/profile.html" class="dropdown-item">
                            <i class="ni ni-single-02"></i>
                            <span>My profile</span>
                        </a>
                        <a href="./examples/profile.html" class="dropdown-item">
                            <i class="ni ni-settings-gear-65"></i>
                            <span>Settings</span>
                        </a>
                        <a href="./examples/profile.html" class="dropdown-item">
                            <i class="ni ni-calendar-grid-58"></i>
                            <span>Activity</span>
                        </a>
                        <a href="./examples/profile.html" class="dropdown-item">
                            <i class="ni ni-support-16"></i>
                            <span>Support</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#!" class="dropdown-item">
                            <i class="ni ni-user-run"></i>
                            <span>Logout</span>
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
                <!-- Form -->
                <form class="mt-4 mb-3 d-md-none">
                    <div class="input-group input-group-rounded input-group-merge">
                        <input type="search" class="form-control form-control-rounded form-control-prepended"
                            placeholder="Search" aria-label="Search">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="fa fa-search"></span>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- Navigation -->
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class=" nav-link active " href=" ./index.php"> <i class="ni ni-tv-2 text-primary"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="./examples/icons.html">
                            <i class="ni ni-planet text-blue"></i> Icons
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="./examples/maps.html">
                            <i class="ni ni-pin-3 text-orange"></i> Maps
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="./examples/profile.html">
                            <i class="ni ni-single-02 text-yellow"></i> User profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="./examples/tables.html">
                            <i class="ni ni-bullet-list-67 text-red"></i> Tables
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./examples/login.php">
                            <i class="ni ni-key-25 text-info"></i> Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./examples/register.html">
                            <i class="ni ni-circle-08 text-pink"></i> Register
                        </a>
                    </li>
                </ul>
                <!-- Divider -->
                <hr class="my-3">
                <!-- Heading -->
                <h6 class="navbar-heading text-muted">Documentation</h6>
                <!-- Navigation -->
                <ul class="navbar-nav mb-md-3">
                    <li class="nav-item">
                        <a class="nav-link"
                            href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html">
                            <i class="ni ni-spaceship"></i> Getting started
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html">
                            <i class="ni ni-palette"></i> Foundation
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="https://demos.creative-tim.com/argon-dashboard/docs/components/alerts.html">
                            <i class="ni ni-ui-04"></i> Components
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
                <!-- Form -->
                <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
                    <div class="form-group mb-0">
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                            </div>
                            <input class="form-control" placeholder="Search" type="text">
                        </div>
                    </div>
                </form>
                <!-- User -->
                <ul class="navbar-nav align-items-center d-none d-md-flex">
                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <div class="media align-items-center">
                                <span class="avatar avatar-sm rounded-circle">
                                    <img alt="Image placeholder" src="./assets/img/theme/team-4-800x800.jpg">
                                </span>
                                <div class="media-body ml-2 d-none d-lg-block">
                                    <span class="mb-0 text-sm  font-weight-bold">Jessica Jones</span>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                            <div class=" dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome!</h6>
                            </div>
                            <a href="./examples/profile.html" class="dropdown-item">
                                <i class="ni ni-single-02"></i>
                                <span>My profile</span>
                            </a>
                            <a href="./examples/profile.html" class="dropdown-item">
                                <i class="ni ni-settings-gear-65"></i>
                                <span>Settings</span>
                            </a>
                            <a href="./examples/profile.html" class="dropdown-item">
                                <i class="ni ni-calendar-grid-58"></i>
                                <span>Activity</span>
                            </a>
                            <a href="./examples/profile.html" class="dropdown-item">
                                <i class="ni ni-support-16"></i>
                                <span>Support</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#!" class="dropdown-item">
                                <i class="ni ni-user-run"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- End Navbar -->
        <!-- Header -->
        <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
            <div class="container-fluid">
                <div class="header-body">
                    <!-- Card stats -->
                    <div class="row">
                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Qtde Imóveis</h5>
                                            <span class="h2 font-weight-bold mb-0">
                                                <?php echo $qtdeImovel ?>
                                            </span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                                <i class="ni ni-building"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <p class="mt-3 mb-0 text-muted text-sm">
                                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 300%</span>
                                        <span class="text-nowrap">Since yesterday</span>
                                    </p> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Imóveis Vendidos</h5>
                                            <span class="h2 font-weight-bold mb-0">
                                                <?php echo $qtdeImovelVendido ?>
                                            </span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                                <i class="ni ni-bag-17"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-muted text-sm">
                                        <?php
                                        $qtdeImovel = 0;
                                        $qtdeVenda = 0;

                                        // Percorre os dados da tabela movimentacao_imovel e imovel para calcular o lucro
                                        while (($dadosVlrImovelVendido = mysqli_fetch_array($queryVlrImovelVendido)) && ($dadosVlrImovelVendido2 = mysqli_fetch_array($queryVlrImovelVendido2))) {
                                            $valorVenda = $dadosVlrImovelVendido['valor_negocio'];
                                            $valorImovel = $dadosVlrImovelVendido2['valor'];

                                            $qtdeImovel = $qtdeImovel + $valorImovel;
                                            $qtdeVenda = $qtdeVenda + $valorVenda;

                                            $totalLucroV = $qtdeVenda - $qtdeImovel;
                                        }

                                        if ($totalLucroV <= 0) {
                                            ?>
                                            <span class="text-danger mr-2">
                                                <i class="fas fa-arrow-down"></i>
                                                <?php echo "R$ " . number_format($totalLucroV, 2, ',', '.'); ?>
                                            </span>
                                            <span class="text-nowrap">Lucro</span>
                                        <?php } else { ?>
                                            <span class="text-success mr-2">
                                                <i class="fas fa-arrow-up"></i>
                                                <?php echo "R$ " . number_format($totalLucroV, 2, ',', '.'); ?>
                                            </span>
                                            <span class="text-nowrap">Lucro</span>

                                        <?php } ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Imóveis Alugados</h5>
                                            <span class="h2 font-weight-bold mb-0">
                                                <?php echo $qtdeImovelAlugado ?>
                                            </span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                                <i class="fas fa-users"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-muted text-sm">
                                        <span class="text-success mr-2">
                                            <i class="fas fa-arrow-up"></i>
                                            <?php
                                            $totalLucroA = $vlrImovelAlugado * 0.15;

                                            echo "R$ " . number_format($totalLucroA, 2, ',', '.');
                                            ?>
                                        </span>
                                        <span class="text-nowrap">/ mês</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Lucro Bruto</h5>
                                            <span class="h2 font-weight-bold mb-0">
                                                <?php
                                                $totalBruto = $totalLucroA + $totalLucroV;

                                                echo number_format($totalBruto, 2, ',', '.');
                                                ?>
                                            </span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                                <i class="fas fa-percent"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-muted text-sm">
                                        <?php
                                        if ($totalBruto <= 0) {
                                            ?>
                                            <span class="text-danger mr-2">
                                                <i class="fas fa-arrow-down"></i>
                                                <span class="text-nowrap"> Saldo Negativo</span>
                                            </span>
                                        <?php } else { ?>
                                            <span class="text-success mr-2">
                                                <i class="fas fa-arrow-up"></i>
                                                <span class="text-nowrap"> Saldo Positivo</span>
                                            </span>
                                        <?php } ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>