<?php
include("menu.php");
include("header.php");
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
                        <h3 class="mb-0">Cadastro de Usuário</h3>
                    </div>
                    <form action="cadastros/insert_usuario.php" method="post">
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
                                        <label for="nivel_acesso">Nível de Acesso</label>
                                        <select class="form-control form-control-alternative" name="nivel_acesso"
                                            id="nivel_acesso" required="" autocomplete="off">
                                            <option value="1">Gerente</option>
                                            <option value="2">Corretor</option>
                                            <option value="3">Recepcionista</option>
                                            <option value="4">Administrador</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="usuario">Usuário</label>
                                        <input type="text" class="form-control form-control-alternative"
                                            placeholder="Informe o usuario" name="usuario" id="usuario" required=""
                                            autocomplete="off" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="senha">Senha</label>
                                        <input type="password" class="form-control form-control-alternative"
                                            placeholder="Informe o senha" name="senha" id="senha" required=""
                                            autocomplete="off" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control form-control-alternative"
                                            placeholder="Informe o email" name="email" id="email" required=""
                                            autocomplete="off" />
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