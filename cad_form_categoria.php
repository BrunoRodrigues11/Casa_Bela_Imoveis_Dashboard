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
                        <h3 class="mb-0">Cadastro de Categoria</h3>
                    </div>
                    <form action="cadastros/insert_categoria.php" method="get">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nome">Nome</label>
                                        <input type="text" class="form-control form-control-alternative"
                                            placeholder="Informe o nome da categoria" name="nome" id="nome" required=""
                                            autofocus="" autocomplete="off" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer py-4">
                            <div style="text-align: right">
                                <button class="btn btn-icon btn-success" type="submit">
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