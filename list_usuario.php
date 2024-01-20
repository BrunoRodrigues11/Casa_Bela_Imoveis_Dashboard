<?php
include("menu.php");
include("header.php");
include("connection/connection.php");

$sql = "SELECT * FROM usuarios";
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
                                <h3 class="mb-0">Lista de Usuários</h3>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="cad_form_usuario.php" role="button" class="btn btn-success">
                                    <span class="btn-inner--icon">
                                        <i class="ni ni-fat-add"></i>
                                    </span>
                                    <span class="btn-inner--text">Novo Usuário</span>
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
                                        <th scope="col" class="sort" data-sort="name">Nome</th>
                                        <th scope="col" class="sort" data-sort="budget">Email</th>
                                        <th scope="col">Usuário</th>
                                        <th scope="col" class="sort" data-sort="completion">Nível</th>
                                        <th scope="col" class="sort" data-sort="status">Status</th>
                                        <th scope="col">Ações</th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    <?php while ($dados = mysqli_fetch_array($query)) {
                                        $id = $dados['id'];
                                        $nome = $dados['nome'];
                                        $email = $dados['email'];
                                        $usuario = $dados['usuario'];
                                        $nivel_acesso = $dados['nivel_acesso'];
                                        $status = $dados['status'];
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $id; ?>
                                            </td>
                                            <td>
                                                <?php echo $nome; ?>
                                            </td>
                                            <td>
                                                <?php echo $email; ?>
                                            </td>
                                            <td>
                                                <?php echo $usuario; ?>
                                            </td>
                                            <td>
                                                <?php echo $nivel_acesso; ?>
                                            </td>
                                            <td>
                                                <span class="badge badge-pill <?php
                                                if ($status == 'Ativo') {
                                                    echo 'badge-success';
                                                } elseif ($status == 'Inativo ') {
                                                    echo 'badge-danger';
                                                } elseif ($status == 'Bloqueado ') {
                                                    echo 'badge-warning';
                                                }
                                                ?>">
                                                    <?php echo $status; ?>
                                                </span>
                                            </td>
                                            <td>
                                                <a href="edit_form_usuario.php?id=<?php echo $id; ?>" role="button"
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
        <?php include("footer.php"); ?>
    </div>
    <?php include("rodape.php"); ?>
</body>

</html>