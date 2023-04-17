<?php

$con = new mysqli("localhost","root","","concesionario_autos"); // Conectar a la BD
$sql = "select * from venta"; // Consulta SQL
$query = $con->query($sql); // Ejecutar la consulta SQL
$data = array(); // Array donde vamos a guardar los datos
while($r = $query->fetch_object()){ // Recorrer los resultados de Ejecutar la consulta SQL
    $data[]=$r; // Guardar los resultados en la variable $data
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Grafica de Barra y Lineas con PHP y MySQL</title>
    <script src="chart.min.js"></script>
</head>
<body>
<h1>Examen P2 Idalid, Juan Pablo y Daily</h1>
<canvas id="idventa" style="width:100%;" height="100"></canvas>
<script>
var ctx = document.getElementById("idventa");
var data = {
        labels: [ 
        <?php foreach($data as $d):?>
        "<?php echo $d->mes?>", 
        <?php endforeach; ?>
        ],
        datasets: [{
            label: '$ Venta',
            data: [
        <?php foreach($data as $d):?>
        <?php echo $d->valores;?>, 
        <?php endforeach; ?>
            ],
            backgroundColor: "#5EFFF6",
            borderColor: "#5EFFF6",
            borderWidth: 2
        }]
    };
var options = {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    };
var idventa = new Chart(ctx, {
    type: 'bar', /* valores: line, bar*/
    data: data,
    options: options
});
</script>
</body>
</html>