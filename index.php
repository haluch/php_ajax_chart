<!DOCTYPE html>
<?php
    include ('conn.php');
    $r = $pdo->query('select * from users')->fetchAll(PDO::FETCH_ASSOC);
?>

<html>
    <body>
        <form name="frmClientes" id='frmClientes'>
            <select name='optcliente' id='optcliente'>
            <?php foreach($r as $linha){ ?>
                <option value="<?=$linha['id']; ?>"><?=$linha['name']; ?></option>
            <?php } ?>        
            </select><br>
        </form>
     ID : <span id='id'></span><br>   
     Cliente : <span id='name'></span><br>   
     <hr>
     <div class="chart-container" style="position: relative; height:40vh; width:80vw">
        <canvas id="myChart"></canvas>
     </div>
    <script src="jquery.min.js"></script>
    <script src="chart.min.js"></script>
    <script>
    $(document).ready(function(){
        $("#optcliente").change(function(){
            $.ajax({
            type: 'POST', 
            url: 'carrega_grafico.php', 
            data: {
                id:$("#optcliente").val()
            },
            }).done(function(data) {
                //alert(data['0'].vinfo);
                $('#id').text(data['0'].id);
                $('#name').text(data['0'].name);
                $('#vcpu').text(data['0'].vcpu);
                $('#vhost').text(data['0'].vhost);
                $('#vinfo').text(data['0'].vinfo);


                // -----------
                var ctx = document.getElementById('myChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['vcpu', 'vhost', 'vinfo'],
                        datasets: [{
                            label: 'Dados cliente',
                            data: [
                                    data['0'].vcpu,
                                    data['0'].vhost, 
                                    data['0'].vinfo
                                ],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            }).fail(function(xhr, desc, err) {
                alert('Uups! Ocorreu algum erro!');
            });

        });
    }); 
    </script>
    </body>
</html>

