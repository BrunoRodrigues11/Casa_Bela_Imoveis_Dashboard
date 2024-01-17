<?php
include("menu.php");
include("connection/connection.php");


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
                        <h3 class="mb-0">Cadastro de Imóvel</h3>
                    </div>
                    <form action="cadastros/insert_imovel.php" method="post" enctype="multipart/form-data">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-2">
                                    <?php
                                    $cod = rand(1, 99999);
                                    ?>
                                    <div class="form-group">
                                        <label for="codigo">Código Imóvel</label>
                                        <input type="text" class="form-control form-control-alternative"
                                            placeholder="Informe o código" name="codigo" id="codigo"
                                            value="<?php echo $cod ?>" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="valor">Valor do imóvel</label>
                                        <input type="numeric" class="form-control form-control-alternative"
                                            placeholder="Informe o valor" name="valor" id="valor" required=""
                                            autocomplete="off" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cpf">CPF do Proprietário</label>
                                        <input type="text" class="form-control form-control-alternative"
                                            placeholder="Informe o cpf" name="cpf" id="cpf" required=""
                                            autocomplete="off" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="endereco">Endereço</label>
                                        <input type="text" class="form-control form-control-alternative"
                                            placeholder="Informe o endereço" name="endereco" id="endereco" required=""
                                            autocomplete="off" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="numero">Número</label>
                                        <input type="text" class="form-control form-control-alternative"
                                            placeholder="Informe o número" name="numero" id="numero" required=""
                                            autocomplete="off" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="bairro">Bairro</label>
                                        <input type="text" class="form-control form-control-alternative"
                                            placeholder="Informe o bairro" name="bairro" id="bairro" required=""
                                            autocomplete="off" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="complemento">Complemento</label>
                                        <input type="text" class="form-control form-control-alternative"
                                            placeholder="Informe o complemento" name="complemento" id="complemento"
                                            required="" autocomplete="off" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cidade">Cidade</label>
                                        <input type="text" class="form-control form-control-alternative"
                                            placeholder="Informe a cidade" name="cidade" id="cidade" required=""
                                            autocomplete="off" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="uf">UF</label>
                                        <select class="form-control form-control-alternative" name="uf" id="uf"
                                            required="" autocomplete="off">
                                            <option value="AC">Acre</option>
                                            <option value="AL">Alagoas</option>
                                            <option value="AP">Amapá</option>
                                            <option value="AM">Amazonas</option>
                                            <option value="BA">Bahia</option>
                                            <option value="CE">Ceará</option>
                                            <option value="DF">Distrito Federal</option>
                                            <option value="ES">Espírito Santo</option>
                                            <option value="GO">Goiás</option>
                                            <option value="MA">Maranhão</option>
                                            <option value="MT">Mato Grosso</option>
                                            <option value="MS">Mato Grosso do Sul</option>
                                            <option value="MG">Minas Gerais</option>
                                            <option value="PA">Pará</option>
                                            <option value="PB">Paraíba</option>
                                            <option value="PR">Paraná</option>
                                            <option value="PE">Pernambuco</option>
                                            <option value="PI">Piauí</option>
                                            <option value="RJ">Rio de Janeiro</option>
                                            <option value="RN">Rio Grande do Norte</option>
                                            <option value="RS">Rio Grande do Sul</option>
                                            <option value="RO">Rondônia</option>
                                            <option value="RR">Roraima</option>
                                            <option value="SC">Santa Catarina</option>
                                            <option value="SP">São Paulo</option>
                                            <option value="SE">Sergipe</option>
                                            <option value="TO">Tocantins</option>
                                            <option value="EX">Estrangeiro</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="cep">CEP</label>
                                        <input type="text" class="form-control form-control-alternative"
                                            placeholder="Informe o cep" name="cep" id="cep" required=""
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