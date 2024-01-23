<?php
include("menu.php");
include("header.php");
include("connection/connection.php");

$id = $_GET['id'];

$sqlimovel = "SELECT * FROM imovel WHERE id = $id";
$queryimovel = mysqli_query($conn, $sqlimovel);
$dadosimovel = mysqli_fetch_array($queryimovel);

$sqlModalidade = "SELECT * FROM modalidade";
$queryModalidade = mysqli_query($conn, $sqlModalidade);

$sqlPagamento = "SELECT * FROM pagamento";
$queryPagamento = mysqli_query($conn, $sqlPagamento);

$sqlCategoria = "SELECT * FROM categoria";
$queryCategoria = mysqli_query($conn, $sqlCategoria);
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
                        <h3 class="mb-0">Editar Imóvel</h3>
                    </div>
                    <form action="cadastros/insert_imovel.php" method="post" enctype="multipart/form-data">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="codigo">Código Imóvel</label>
                                        <input type="text" class="form-control form-control-alternative"
                                            placeholder="Informe o código" name="codigo" id="codigo"
                                            value="<?php echo $dadosimovel['codigo'] ?>" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="valor">Valor do imóvel</label>
                                        <input type="numeric" class="form-control form-control-alternative"
                                            placeholder="Informe o valor" name="valor" id="valor" required=""
                                            autocomplete="off" value="<?php echo $dadosimovel['valor'] ?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cpf">CPF do Proprietário</label>
                                        <input type="text" class="form-control form-control-alternative"
                                            placeholder="Informe o cpf" name="cpf" id="cpf"
                                            value="<?php echo $dadosimovel['cpf_cliente'] ?>" readonly />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="endereco">Endereço</label>
                                        <input type="text" class="form-control form-control-alternative"
                                            placeholder="Informe o endereço" name="endereco" id="endereco"
                                            value="<?php echo $dadosimovel['endereco'] ?>" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="numero">Número</label>
                                        <input type="text" class="form-control form-control-alternative"
                                            placeholder="Informe o número" name="numero" id="numero"
                                            value="<?php echo $dadosimovel['numero'] ?>" readonly />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="bairro">Bairro</label>
                                        <input type="text" class="form-control form-control-alternative"
                                            placeholder="Informe o bairro" name="bairro" id="bairro"
                                            value="<?php echo $dadosimovel['bairro'] ?>" readonly />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="complemento">Complemento</label>
                                        <input type="text" class="form-control form-control-alternative"
                                            placeholder="Informe o complemento" name="complemento" id="complemento"
                                            value="<?php echo $dadosimovel['complemento'] ?>" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cidade">Cidade</label>
                                        <input type="text" class="form-control form-control-alternative"
                                            placeholder="Informe a cidade" name="cidade" id="cidade"
                                            value="<?php echo $dadosimovel['cidade'] ?>" readonly />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="uf">UF</label>
                                        <input type="text" class="form-control form-control-alternative"
                                            placeholder="Informe a uf" name="uf" id="uf"
                                            value="<?php echo $dadosimovel['uf'] ?>" readonly />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="cep">CEP</label>
                                        <input type="text" class="form-control form-control-alternative"
                                            placeholder="Informe o cep" name="cep" id="cep"
                                            value="<?php echo $dadosimovel['cep'] ?>" readonly />
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
                                                <option value="<?php echo $idModalidade ?>">
                                                    <?php echo $tipoModalidade ?>
                                                </option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pagamento">Forma de Pagamento</label>
                                        <select class="form-control form-control-alternative" name="pagamento"
                                            id="pagamento" required="" autocomplete="off">
                                            <option>Selecione uma opção</option>
                                            <?php
                                            while ($dadosPagamento = mysqli_fetch_array($queryPagamento)) {
                                                $idPagamento = $dadosPagamento['id'];
                                                $tipoPagamento = $dadosPagamento['tipo'];
                                                ?>
                                                <option value="<?php echo $idPagamento ?>">
                                                    <?php echo $tipoPagamento ?>
                                                </option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="categoria">Categoria</label>
                                        <select class="form-control form-control-alternative" name="categoria"
                                            id="categoria" required="" autocomplete="off">
                                            <option>Selecione uma opção</option>
                                            <?php
                                            while ($dadosCategoria = mysqli_fetch_array($queryCategoria)) {
                                                $idCategoria = $dadosCategoria['id'];
                                                $nomeCategoria = $dadosCategoria['nome'];
                                                ?>
                                                <option value="<?php echo $idCategoria ?>">
                                                    <?php echo $nomeCategoria ?>
                                                </option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="table_imgs">Fotos</label>
                                        <table class="table" id="table_imgs" name="table_imgs">
                                            <tbody>
                                                <tr>
                                                    <?php $i = 0; ?>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="file" class="form-control-file" id="arquivo"
                                                                name="foto[<?php echo $i ?>]">
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="5" style="text-align: right;">
                                                        <button type="button" class="btn btn-primary"
                                                            onclick="AddTableRow()">
                                                            <span class="btn-inner--icon"><i
                                                                    class="ni ni-fat-add"></i></span>
                                                            <span class="btn-inner--text">Adivionar Foto</span>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
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