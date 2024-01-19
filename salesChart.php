<?php
include("connection/connection.php");

$sql = "SELECT SUM(valor_negocio) as valor_negocio, data
        FROM movimentacao_imovel 
        WHERE status = 'Venda ' 
        GROUP BY data 
        ORDER BY data ASC";
$query = mysqli_query($conn, $sql);

# Charts.js - Preparando valores
$datas = "";
$valores = "";

while ($row = mysqli_fetch_array($query)) {
    $datas = $datas . '"' . $row['data'] . '",';
    $valores = $valores . '"' . $row['valor_negocio'] . '",';

    $datas = trim($datas); # trim() -> Tira os espaços da variável
    $valores = trim($valores);
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title></title>
    <!-- CDN do Chart.js -->
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <canvas id="salesChart"></canvas>
    </div>
    <!-- GRAFICO DE LINHAS -->
    <script type="text/javascript">
        var ctx = document.getElementById('salesChart').getContext('2d');
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [<?php echo $datas; ?>],
                datasets: [
                    {
                        label: 'Data',
                        data: ['<?php echo $datas; ?>'],
                        borderColor: 'rgba(255,255,0)',
                        borderWidth: 3
                    },
                    {
                        label: 'Valores',
                        data: [<?php echo $valores; ?>],
                        backgroundColor: 'rgba(0,255,255)',
                        borderColor: 'rgba(0,255,255)',
                        borderWidth: 3
                    }
                ]
            },
            options: {
                legend: {
                    display: false,
                    labels: {
                        fontColor: "white",
                        fontSize: 18
                    }
                },
                scales: {
                    xAxes: [
                        {
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Datas',
                                fontColor: '#ffffff',
                                fontSize: 12
                            },
                            gridLines: {
                                display: false
                            },
                            ticks: {
                                fontColor: "white",
                                fontSize: 12
                            }
                        }
                    ],
                    yAxes: [
                        {
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Valores',
                                fontColor: '#ffffff',
                                fontSize: 12
                            },
                            gridLines: {
                                display: false
                            },
                            ticks: {
                                fontColor: "white",
                                fontSize: 12
                            }
                        }
                    ]
                }
            }
        });
    </script>
</body>

</html>