<?php
include("menu.php");
include("connection/connection.php");

$sql = "SELECT * FROM imovel";
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
                                <h3 class="mb-0">Lista de Imóveis</h3>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="cad_form_imovel.php" role="button" class="btn btn-success">
                                    <span class="btn-inner--icon">
                                        <i class="ni ni-fat-add"></i>
                                    </span>
                                    <span class="btn-inner--text">Novo Imóvel</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <div>
                            <table class="table align-items-center">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" class="sort" data-sort="name">#</th>
                                        <th scope="col" class="sort" data-sort="name">Código</th>
                                        <th scope="col" class="sort" data-sort="budget">Valor (R$)</th>
                                        <th scope="col">CEP</th>
                                        <th scope="col" class="sort" data-sort="completion">Bairro</th>
                                        <th scope="col" class="sort" data-sort="status">Status</th>
                                        <th scope="col">Ações</th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    <?php while ($dados = mysqli_fetch_array($query)) {
                                        $id = $dados['id'];
                                        $codigo = $dados['codigo'];
                                        $valor = $dados['valor'];
                                        $cep = $dados['cep'];
                                        $bairro = $dados['bairro'];
                                        $status = $dados['status'];
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $id; ?>
                                            </td>
                                            <td>
                                                <?php echo $codigo; ?>
                                            </td>
                                            <td>
                                                <?php echo number_format($valor, 2, ',', '.'); ?>
                                            </td>
                                            <td>
                                                <?php echo substr($cep, 0, 5) . '-' . substr($cep, 5); ?>
                                            </td>
                                            <td>
                                                <?php echo $bairro; ?>
                                            </td>
                                            <td>
                                                <span class="badge badge-pill badge-success">
                                                    <?php echo $status; ?>
                                                </span>
                                            </td>
                                            <td>
                                                <a href="cad_form_moviment_imovel.php?id=<?php echo $id; ?>" role="button"
                                                    class="btn btn-primary">
                                                    <span class="btn-inner--icon">
                                                        <i class="ni ni-paper-diploma"></i>
                                                    </span>
                                                    <span class="btn-inner--text"></span>
                                                </a>
                                                <a href="edit_form_imovel.php?id=<?php echo $id; ?>" role="button"
                                                    class="btn btn-warning">
                                                    <span class="btn-inner--icon">
                                                        <i class="ni ni-tag"></i>
                                                    </span>
                                                    <span class="btn-inner--text"></span>
                                                </a>
                                                <a href="#" role="button" class="btn btn-danger">
                                                    <span class="btn-inner--icon">
                                                        <i class="ni ni-fat-remove"></i>
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
        <footer class="footer">
            <div class="row align-items-center justify-content-xl-between">
                <div class="col-xl-6">
                    <div class="copyright text-center text-xl-left text-muted">
                        &copy; 2024 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1"
                            target="_blank">Bruno Technologies</a>
                    </div>
                </div>
                <div class="col-xl-6">
                    <ul class="nav nav-footer justify-content-center justify-content-xl-end">
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About
                                Us</a>
                        </li>
                        <li class="nav-item">
                            <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md"
                                class="nav-link" target="_blank">MIT License</a>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
    <?php include("rodape.php"); ?>
</body>

</html>