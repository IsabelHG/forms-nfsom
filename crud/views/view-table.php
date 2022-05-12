<?php
include("../db-conection/conexion.php");
$con=conectar();

$sql="SELECT * FROM Nfsom_Mc";

if (isset($_POST['SEARCH_TEXT']) and $_POST['SEARCH_TEXT']!='') {
    
    $SEARCH_TEXT = $_POST['SEARCH_TEXT'];
    $SEARCH_TYPE = $_POST['SEARCH_TYPE'];

    $sql.=" WHERE $SEARCH_TYPE LIKE LOWER('%$SEARCH_TEXT%')";
}else{
    $sql.=" WHERE ESTADO != 'CANCELADO' AND ESTADO != 'EJECUTADO'";
}

$query=mysqli_query($con,$sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualización Tablas</title>
    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <!-- Style CSS Files -->
    <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body>
    <div class="container m-5 mx-auto">

        <form action="view-table.php" method="POST">
            <div class="row justify-content-end">
                <div class="col-3">
                    <select class="form-select form-select-sm" aria-label="select example" name="SEARCH_TYPE">
                        <option selected value="TODOS">TODOS</option>
                        <option value="OT">OT</option>
                        <option value="FECHA_HORA_DE_ASIGNACION">FECHA ASIGNACION</option>
                        <option value="ESTADO">ESTADO</option>
                        <option value="TIPO_DE_TRABAJO">TIPO DE TRABAJO</option>
                        <option value="ESTACION_BASE">NOMBRE EB</option>
                    </select>
                </div>
                <div class="col-3">
                    <input type="text" class="form-control form-control-sm mb-3" name="SEARCH_TEXT" placeholder="--">
                </div>
                <div class="col-auto">
                    <input type="submit" class="btn btn-primary btn-sm" value="BUSCAR">
                </div>
            </div>
        </form>

        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Fecha Asignación</th>
                    <th>Estado</th>
                    <th>OT</th>
                    <th>Tipo de trabajo</th>
                    <th>Nombre EB</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($row=mysqli_fetch_array($query)){
                ?>
                    <tr>
                        <th><?php echo $row['FECHA_HORA_DE_ASIGNACION']?></th>
                        <th><?php echo $row['ESTADO']?></th>
                        <th><?php echo $row['OT']?></th>
                        <th><?php echo $row['TIPO_DE_TRABAJO']?></th>
                        <th><?php echo $row['ESTACION_BASE']?></th>
                        <th><a href="view-edit.php?id=<?php echo $row['ITEM'] ?>" class="btn btn-sm btn-secondary">Editar</a></th>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>