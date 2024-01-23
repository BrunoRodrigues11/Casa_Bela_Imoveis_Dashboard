<?php
include("menu.php");
include("header.php");
include("connection/connection.php");

$sql = "SELECT * FROM movimentacao_imovel";
$query = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title></title>
</head>

<body>
    <div class="container-fluid mt--7">
        <!-- Table -->
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-1">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="mb-0">Lista de Trâmitações</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <div>
                            <table class="table align-items-center">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" class="sort" data-sort="name">#</th>
                                        <th scope="col" class="sort" data-sort="name">Imóvel</th>
                                        <th scope="col" class="sort" data-sort="name">Corretor</th>
                                        <th scope="col" class="sort" data-sort="name">Valor</th>
                                        <th scope="col" class="sort" data-sort="name">Data</th>
                                        <th scope="col" class="sort" data-sort="name">Status</th>
                                        <th scope="col">Ações</th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    <?php while ($dados = mysqli_fetch_array($query)) {
                                        $id = $dados['id'];
                                        $imovel = $dados['codigo_imovel'];
                                        $corretor = $dados['corretor'];
                                        $valor = $dados['valor_negocio'];
                                        $data = $dados['data'];
                                        $status = $dados['status'];
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $id; ?>
                                            </td>
                                            <td>
                                                <?php echo $imovel; ?>
                                            </td>
                                            <td>
                                                <?php echo $corretor; ?>
                                            </td>
                                            <td>
                                                <?php echo date("d/m/y", strtotime($data)) ?>
                                            </td>
                                            <td>
                                                <?php echo number_format($valor, 2, ',', '.'); ?>
                                            </td>
                                            <td>
                                                <span class="badge badge-pill <?php
                                                if ($status == 'Ativo ') {
                                                    echo 'badge-success';
                                                } elseif ($status == 'Aluguel') {
                                                    echo 'badge-primary';
                                                } elseif ($status == 'Venda') {
                                                    echo 'badge-warning';
                                                }
                                                ?>">
                                                    <?php echo $status; ?>
                                                </span>
                                            </td>
                                            <td>
                                                <a href="edit_form_cliente.php?id=<?php echo $id; ?>" role="button"
                                                    class="btn btn-warning">
                                                    <span class="btn-inner--icon">
                                                        <i class="ni ni-tag"></i>
                                                    </span>
                                                    <span class="btn-inner--text"></span>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <?php include("footer.php"); ?>
    </div>
    <?php include("rodape.php"); ?>
</body>

</html>