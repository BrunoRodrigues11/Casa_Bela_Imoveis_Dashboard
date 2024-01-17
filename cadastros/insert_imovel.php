<?php
include("../menu.php");
include("../connection/connection.php");

$codigo = $_POST['codigo'];
$valor = $_POST['valor'];
$cpf = $_POST['cpf'];
$endereco = $_POST['endereco'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$uf = $_POST['uf'];
$cep = $_POST['cep'];
$modalidade = $_POST['modalidade'];
$pagamento = $_POST['pagamento'];
$categoria = $_POST['categoria'];
$foto = $_FILES['foto'];
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
                        <h3 class="mb-0">Status Cadastro de Imóvel</h3>
                    </div>
                    <div class="container" style="margin-top:10px">
                        <?php
                        $sqlImovel = "INSERT INTO imovel (codigo,valor,cpf_cliente,endereco,numero,complemento,bairro,cidade,uf,cep,id_modalidade,id_pagamento,id_categoria)
                        VALUES ('$codigo','$valor','$cpf','$endereco','$numero','$complemento','$bairro','$cidade','$uf','$cep','$modalidade','$pagamento','$categoria')";
                        $query = mysqli_query($conn, $sqlImovel);
                        $teste = mysqli_affected_rows($conn);

                        // Criando a pasta do imóvel
                        mkdir("../fotos/$codigo");

                        if ($teste == 1) {
                            ?>
                            <center>
                                <div id='aprovado' style="width: 200px; height: 200px"></div>
                                <h4>Aprovado</h4>
                            </center>
                            <?php
                        } else {
                            ?>
                            <center>
                                <div id='erro' style="width: 200px; height: 200px"></div>
                                <h4>Reprovado</h4>
                            </center>
                            <?php
                        }

                        foreach ($_FILES['foto']["name"] as $key => $name) {

                            // Tipo da imagem
                            $_FILES['foto']['type'][$key];

                            // Nome temporário da imagem
                            $_FILES['foto']['tmp_name'][$key];

                            // Gera um nome único para a imagem
                            preg_match("/\.(png|jpg|jpeg){1}$/i", $_FILES['foto']["name"][$key], $ext);

                            $caminho_foto2 = "../fotos/$codigo/";

                            if ($ext == true) {
                                // Caminho de onde ficará a imagem
                                $nome_foto = md5(uniqid(time())) . "." . $ext[1];
                                $caminho_foto = $caminho_foto2 . $nome_foto;

                                // Faz o upload da imagem para seu respectivo caminho
                                move_uploaded_file($_FILES['foto']["tmp_name"][$key], $caminho_foto);

                                // Insere os dados no banco
                                $sql = "INSERT INTO foto (nome, id_imovel) VALUES ('$nome_foto', 1)";
                                $query = mysqli_query($conn, $sql);
                            }
                        }
                        ?>
                    </div>
                    <div class="card-footer py-4">
                        <div style="text-align: center">
                            <a href="../cad_form_imovel.php" class="btn btn-icon btn-success" role="button">
                                <span class="btn-inner--icon"><i class="ni ni-bold-left"></i></span>
                                <span class="btn-inner--text">Voltar</span>
                            </a>
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
    <?php include("../rodape.php"); ?>

    <script src="animacoes/bodymovin.js"></script>
    <script type="text/javascript">
        var svgContainer = document.getElementById('erro');
        var animItem = bodymovin.loadAnimation({
            wrapper: svgContainer,
            animType: 'svg',
            loop: true,
            autoplay: true,

            path: 'animacoes/error.json'
        });

    </script>
    <script type="text/javascript">
        var svgContainer = document.getElementById('aprovado');
        var animItem = bodymovin.loadAnimation({
            wrapper: svgContainer,
            animType: 'svg',
            loop: true,
            autoplay: true,

            path: 'animacoes/aprovado.json'
        });
    </script>
</body>

</html>