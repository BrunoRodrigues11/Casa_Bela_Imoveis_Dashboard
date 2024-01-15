<?php include("menu.php"); ?>
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
                        <h3 class="mb-0">Cadastro de Cliente</h3>
                    </div>
                    <form action="cadastros/insert_cliente.php" method="get">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nome">Nome</label>
                                        <input type="text" class="form-control form-control-alternative"
                                            placeholder="Informe o nome" name="nome" id="nome" required="" autofocus=""
                                            autocomplete="off" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="sobrenome">Sobrenome</label>
                                        <input type="text" class="form-control form-control-alternative"
                                            placeholder="Informe o sobrenome" name="sobrenome" id="sobrenome"
                                            required="" autocomplete="off" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cpf">CPF</label>
                                        <input type="text" class="form-control form-control-alternative"
                                            placeholder="Informe o CPF" name="cpf" id="cpf" required=""
                                            autocomplete="off" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control form-control-alternative"
                                            placeholder="Informe o email" name="email" id="email" required=""
                                            autocomplete="off" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="endereco">Endereço</label>
                                        <input type="text" class="form-control form-control-alternative"
                                            placeholder="Informe o endereço" name="endereco" id="endereco" required=""
                                            autocomplete="off" />
                                    </div>
                                </div>
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
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="complemento">Complemento</label>
                                        <input type="text" class="form-control form-control-alternative"
                                            placeholder="Informe o complemento" name="complemento" id="complemento"
                                            required="" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cidade">Cidade</label>
                                        <input type="text" class="form-control form-control-alternative"
                                            placeholder="Informe a cidade" name="cidade" id="cidade" required=""
                                            autocomplete="off" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="interesse">Interesse</label>
                                        <select class="form-control form-control-alternative" name="interesse"
                                            id="interesse" required="" autocomplete="off">
                                            <option value="Comprar">Comprar</option>
                                            <option value="Alugar">Alugar</option>
                                            <option value="Ambos">Ambos</option>
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
</body>

</html>