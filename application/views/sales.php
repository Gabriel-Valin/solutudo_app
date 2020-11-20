<?php
defined('BASEPATH') or exit('No direct script access allowed');

$this->load->view('mytemplates/sidebar'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php base_url() ?>assets/css/sales.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@600&family=Inria+Sans&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
    <title>Vendas - Solutudo</title>
</head>

<body>
    <div class="center-all">
        <h1 class="bodymember">Vendas</h1>

        <!-- <button onclick="window.location.href='newsale'" class="btn-first">NOVA VENDA</button> -->
        <div class="my-table" style="padding-left: 250px;">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">EMPRESA</th>
                        <th scope="col">VENDEDOR</th>
                        <th scope="col">PLANO</th>
                        <th scope="col">VALOR</th>
                        <th scope="col">STATUS</th>
                        <th scope="col">DATA DA VENDA</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($sales_total)) {

                        foreach ($sales_total as $mc) : ?>
                            <tr>
                                <td><?php echo $mc['empresa'] ?></td>
                                <td><?php echo $mc['vendedor'] ?></td>
                                <td><?php echo $mc['plano'] ?></td>
                                <td><?php echo $mc['valor'] ?></td>
                                <td><?php echo $mc['status'] ?></td>
                                <td><?php echo $mc['data_venda'] ?></td>
                                <?php if ($_SESSION['logged_user']['nivel_acesso'] == 'Gerente') {
                                    echo '<td><a href="javascript:goDel(' . $mc['id'] . ')"><img src="assets/icons/delete.png" style="width: 25px;"></a></td>';
                                    echo '<td><a href="' . base_url() . 'editsale?sale=' . $mc['id'] . '"><img src="assets/icons/edit.png" style="width: 25px;"></a></td>';
                                }
                                ?>
                            </tr>
                    <?php endforeach;
                    } else {
                        echo '<h2>You didn' . 't make sales' . ' </h2>';
                    } ?>

                </tbody>
            </table>
            <script>
                function goDel(id) {
                    var myUrl = 'sales/deletesale/' + id
                    if (confirm("Are you sure you want to delete this sale?")) {
                        window.location.href = myUrl;
                    } else {
                        alert('No modified.');
                        return false;
                    }
                }
            </script>
        </div>
        <h1 class="bodymember">GRÁFICO DE BARRAS - STATUS DAS VENDAS</h1>
        <canvas class="bar-chart" id="line-chart" width="400px" height="100px"></canvas>
        <script>
            var ctx = document.getElementById('line-chart');
            var chartG = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Aprovado', 'Negado', 'Em Processo'],
                    datasets: [{
                            label: 'STATUS DAS VENDAS',
                            data: [

                                <?= $charts[0]['count'] ?>,
                                <?= $charts[1]['count'] ?>,
                                <?= $charts[2]['count'] ?>

                            ],
                            borderWidth: 1,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],

                            barThickness: 30,
                            maxBarThickness: 30,
                            barPercentage: 2.0
                        },

                    ]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                categoryPercentage: 10,
                                barPercentage: 10
                            }
                        }],
                        xAxes: [{
                            ticks: {
                                beginAtZero: true,

                            }
                        }]
                    }
                }
            });
        </script>
    </div>


</body>

</html>