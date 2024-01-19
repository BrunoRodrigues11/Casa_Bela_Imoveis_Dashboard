<?php
include("menu.php");
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
    <script language="javascript">
        var max = 6;
        (function ($) {
            AddTableRow = function () {
                var qtde = $("#table_imgs tbody tr").length;
                if (qtde < max) {
                    var newRow = $("<tr>");
                    var cols = "";

                    cols += '<td><div class="form-group"><input type="file" class="form-control-file" id="arquivo" name="foto[' + qtde + ']"></div></td>';

                    newRow.append(cols);
                    $("#table_imgs").append(newRow);
                    return false;
                }
            };
        })(jQuery);
    </script>
</body>

</html>