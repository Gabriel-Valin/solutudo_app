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

    <title>Empresas - Solutudo</title>
</head>

<body>
    <div class="center-all">
        <h1 class="bodymember">Veja todas as empresas aqui.</h1>

        <!-- <button onclick="window.location.href='newcompany'" class="btn-first">NOVA EMPRESA</button> -->
        <div class="my-table">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">NOME DA EMPRESA</th>
                        <th scope="col">TELEFONE</th>
                        <th scope="col">ENDEREÇO</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">ESTADO</th>
                        <th scope="col">CIDADE</th>
                        <th scope="">DELETAR</th>
                        <th scope="">EDITAR</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($all_companys as $mc) : ?>
                        <tr>
                            <td><?php echo $mc['nome'] ?></td>
                            <td><?php echo $mc['telefone'] ?></td>
                            <td><?php echo $mc['endereco'] ?></td>
                            <td><?php echo $mc['email'] ?></td>
                            <td><?php echo $mc['estado'] ?></td>
                            <td><?php echo $mc['cidade'] ?></td>
                            <td> <a href="javascript:goDel(<?php echo $mc['id'] ?>)"><img src="assets/icons/delete.png" style="width: 25px;"></a></td>
                            <td><a href="<?php base_url() ?>editcompany?company=<?= $mc['id'] ?>"><img src="assets/icons/edit.png" style="width: 25px;"></a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <script>
                function goDel(id) {
                    var myUrl = 'companys/deletecompany/' + id
                    if (confirm("Deseja realmente excluir essa memoria?")) {
                        window.location.href = myUrl;
                    } else {
                        alert('Registro não alterado!');
                        return false;
                    }
                }
            </script>
        </div>

        <h1 class="bodymember">GRÁFICO DE BARRAS - Empresas por estado</h1>

        <canvas class="bar-chart" id="line-chart" width="400px" height="100px"></canvas>
        <script>
            var ctx = document.getElementById('line-chart');
            var chartG = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['SP', 'PE', 'ES'],
                    datasets: [{
                            label: 'Empresas por estado',
                            data: [

                                <?= $charts[0]['count'] ?>,
                                <?= $charts[1]['count'] ?>,
                                <?= $charts[2]['count'] ?>,

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