<?php
include("connection/connection.php");

$sql = "SELECT SUM(valor_negocio) as valor_negocio, data
        FROM movimentacao_imovel 
        WHERE status = 'Aluguel ' 
        GROUP BY data 
        ORDER BY data ASC";
$query = mysqli_query($conn, $sql);

# Charts.js - Preparando valores
$datas = "";
$valores = "";

while ($row = mysqli_fetch_array($query)) {
    $dataFormat = $row['data'];

    // Formatando a data para o padrão brasileiro
    $dataFinal = explode("-", $dataFormat); // explode() => Divide a data em partes
    $dataArray = $dataFinal[2] . "/" . $dataFinal[1] . "/" . $dataFinal[0];

    $datas .= '"' . $dataArray . '",';
    $valores .= '"' . $row['valor_negocio'] . '",';
}

// Removendo a última vírgula de cada string, se existir
$datas = rtrim($datas, ',');
$valores = rtrim($valores, ',');

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
        <canvas id="rentalsChart"></canvas>
    </div>
    <!-- GRAFICO DE LINHAS -->
    <script type="text/javascript">
        var ctx = document.getElementById('rentalsChart').getContext('2d');
        var myBarChart = new Chart(ctx, {
            type: 'bar',
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
                maintainAspectRatio: false,
                aspectRatio: 0.85,
                legend: {
                    display: false,
                    labels: {
                        fontColor: "black",
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
                                fontColor: '#000',
                                fontSize: 12
                            },
                            gridLines: {
                                display: false
                            },
                            ticks: {
                                fontColor: "black",
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
                                fontColor: '#000',
                                fontSize: 12
                            },
                            gridLines: {
                                display: false
                            },
                            ticks: {
                                min: 0,
                                fontColor: "black",
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