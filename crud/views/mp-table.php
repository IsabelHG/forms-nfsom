<?php
include("../db-conection/conexion.php");
$con=conectar();

$sql="SELECT * FROM Nfsom_Mp";

if (isset($_POST['SEARCH_TEXT']) and $_POST['SEARCH_TEXT']!='' and $_POST['SEARCH_TYPE']!='TODOS') {
    
    $SEARCH_TEXT = $_POST['SEARCH_TEXT'];
    $SEARCH_TYPE = $_POST['SEARCH_TYPE'];

    $sql.=" WHERE $SEARCH_TYPE LIKE LOWER('%$SEARCH_TEXT%')";
}

$query=mysqli_query($con,$sql);

$rows_total = mysqli_num_rows($query);

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
    <div class="container-fluid">

        <form action="mp-table.php" method="POST">
            <div class="row justify-content-end">
                <div class="col-6">
                    <div class="input-group">
                        <select class="form-select form-select-sm mb-3" aria-label="select example" name="SEARCH_TYPE">
                            <option selected value="TODOS">TODOS</option>
                            <option value="OT">OT</option>
                            <option value="FECHA_ASIGNACION">FECHA ASIGNACION</option>
                            <option value="ESTADO">ESTADO</option>
                            <option value="TIPO_DE_TRABAJO">TIPO DE TRABAJO</option>
                            <option value="ESTACION_BASE">NOMBRE EB</option>
                        </select>
                        <input type="text" class="form-control form-control-sm mb-3" name="SEARCH_TEXT" placeholder="--">
                        <input type="submit" class="btn btn-info btn-sm mb-3" value="BUSCAR">
                    </div>
                </div>
            </div>
        </form>

        <table class="caption-top table table-hover table-bordered table-dark table-striped table-responsive">
            <caption class="text-secondary fw-bold"><?php echo $rows_total?> Filas Encontradas</caption>
            <thead class="text-uppercase">
                <tr class="sticky-top">
                    <th>Fecha Asignación</th>
                    <th>Estado</th>
                    <th>OT</th>
                    <th>Tipo de trabajo</th>
                    <th>Nombre EB</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="fs-14">
                <?php
                    while($row=mysqli_fetch_array($query)){
                ?>
                    <tr>
                        <th><?php echo $row['FECHA_ASIGNACION']?></th>
                        <th><?php echo $row['ESTADO']?></th>
                        <th><?php echo $row['OT']?></th>
                        <th><?php echo $row['TIPO_DE_TRABAJO']?></th>
                        <th><?php echo $row['ESTACION_BASE']?></th>
                        <th><a href="mp-edit.php?id=<?php echo $row['item'] ?>" class="btn btn-sm btn-outline-info">Editar</a></th>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>