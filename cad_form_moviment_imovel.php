<?php
include("menu.php");
include("header.php");
include("connection/connection.php");

$id = $_GET['id'];

$sqlimovel = "SELECT * FROM imovel WHERE id = $id";
$queryimovel = mysqli_query($conn, $sqlimovel);
$dadosimovel = mysqli_fetch_array($queryimovel);

$sqlUsuario = "SELECT * FROM usuarios";
$queryUsuario = mysqli_query($conn, $sqlUsuario);

$sqlModalidade = "SELECT * FROM modalidade";
$queryModalidade = mysqli_query($conn, $sqlModalidade);

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
                        <h3 class="mb-0">Tramitar Imóvel</h3>
                    </div>
                    <form action="cadastros/insert_moviment_imovel.php" method="post" enctype="multipart/form-data">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-2">
                                    <?php
                                    $cod = rand(1, 99999);
                                    ?>
                                    <div class="form-group">
                                        <label for="codigo">Código Imóvel</label>
                                        <input type="text" class="form-control form-control-alternative" name="codigo"
                                            id="codigo" value="<?php echo $dadosimovel['codigo'] ?>" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="corretor">Corretor</label>
                                        <select class="form-control form-control-alternative" name="corretor" id=""
                                            required="" autocomplete="off">
                                            <option>Selecione uma opção</option>
                                            <?php
                                            while ($dadosUsuario = mysqli_fetch_array($queryUsuario)) {
                                                $idUsuario = $dadosUsuario['id'];
                                                $usuario = $dadosUsuario['usuario'];
                                                ?>
                                                <option value="<?php echo $idUsuario ?>">
                                                    <?php echo $usuario ?>
                                                </option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="valor">Valor negócio</label>
                                        <input type="numeric" class="form-control form-control-alternative"
                                            placeholder="Informe o valor" name="valor" id="valor" required=""
                                            autocomplete="off" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="modalidade">Modalidade</label>
                                        <select class="form-control form-control-alternative" name="modalidade"
                                            id="modalidade" required="" autocomplete="off">
                                            <option>Selecione uma opção</option>
                                            <?php
                                            while ($dadosModalidade = mysqli_fetch_array($queryModalidade)) {
                                                $idModalidade = $dadosModalidade['id'];
                                                $tipoModalidade = $dadosModalidade['tipo'];
                                                ?>
                                                <option value="<?php echo $tipoModalidade ?>">
                                                    <?php echo $tipoModalidade ?>
                                                </option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer py-4">
                            <div style="text-align: right">
                                <button href="#" class="btn btn-icon btn-success" type="submit">
                                    <span class="btn-inner--icon"><i class="ni ni-check-bold"></i></span>
                                    <span class="btn-inner--text">Cadastrar</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <?php include("footer.php"); ?>
    </div>
    <?php include("rodape.php"); ?>
</body>

</html>