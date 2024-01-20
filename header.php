<?php
$userLogged = $_SESSION['usuario'];
include("assets.php");
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
    <title></title>
</head>

<body>
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
                                <p class="mt-3 mb-0 text-muted text-sm text-white">
                                    <span class="text-white" mr-2"><i class="fa fa-arrow-up"></i> 300%</span>
                                    <span class="text-nowrap">Since yesterday</span>
                                </p>
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
                                            <i class="ni ni-money-coins"></i>
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