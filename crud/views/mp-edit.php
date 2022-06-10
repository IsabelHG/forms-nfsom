<?php
include("../db-conection/conexion.php");
$con = conectar();

$id = $_GET['id'];

$sql = "SELECT * FROM Nfsom_Mp WHERE item='$id'";
$query = mysqli_query($con,$sql);

$row = mysqli_fetch_array($query);

$sqlPersonal1 = "SELECT * FROM `Personal_Ericsson` WHERE estado = 'Activo' AND email != 'despacho02@zitectelco.co' AND email != 'despacho03@zitectelco.co' AND email != 'despacho04@zitectelco.co'";
$queryTecnico1 = mysqli_query($con,$sqlPersonal1);

$sqlPersonal2 = "SELECT * FROM `Personal_Ericsson` WHERE estado = 'Activo' AND email != 'despacho02@zitectelco.co' AND email != 'despacho03@zitectelco.co' AND email != 'despacho04@zitectelco.co'";
$queryTecnico2 = mysqli_query($con,$sqlPersonal2);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <!-- Style CSS Files -->
    <link href="../assets/css/style.css" rel="stylesheet">

</head>
<body>
    
<div class="container-fluid">
    <form action="../sql-query/mp-update.php" method="POST" class="bg-dark bg-gradient">

        <input type="hidden" name="item" value="<?php echo $row['item'] ?>">

        <div class="pt-5 px-5">

            <div class="row">
                <div class="col-sm">
                    <label for="estado" class="text-light form-label">ESTADO</label>
                    <input id="estado" type="text" class="form-control mb-4" name="ESTADO" value="<?php echo $row['ESTADO'] ?>" readonly>
                </div>
                <div class="col-sm">
                    <label for="ot" class="text-light form-label">OT</label>
                    <input id="ot" type="text" class="form-control mb-4" name="OT" value="<?php echo $row['OT'] ?>" readonly>
                </div>
                <div class="col-sm">
                    <label for="cilocation" class="text-light form-label">ID EB</label>
                    <input id="cilocation" type="text" class="form-control mb-4" name="CILOCATION" value="<?php echo $row['CILOCATION'] ?>" readonly>
                </div>
                <div class="col-sm">
                    <label for="estacion_base" class="text-light form-label">NOMBRE EB</label>
                    <input id="estacion_base" type="text" class="form-control mb-4" name="ESTACION_BASE" value="<?php echo $row['ESTACION_BASE'] ?>" readonly>
                </div>
                <div class="col-sm">
                    <label for="tipo_trabajo" class="text-light form-label">TIPO DE TRABAJO</label>
                    <input id="tipo_trabajo" type="text" class="form-control mb-4" name="TIPO_DE_TRABAJO" value="<?php echo $row['TIPO_DE_TRABAJO'] ?>" readonly>
                </div>
            </div>

            <div class="row">
                <div class="col-sm">
                    <label for="fecha_asignacion" class="text-light form-label">FECHA ASIGNACION</label>
                    <input id="fecha_asignacion" type="datetime-local" class="form-control mb-4" name="FECHA_ASIGNACION" value="<?php if($row['FECHA_ASIGNACION'] != ''){$date = new DateTime($row['FECHA_ASIGNACION']); echo $date->format('Y-m-d\TH:i');} ?>" readonly>
                </div>
                <div class="col-sm">
                    <label for="centro_operacion" class="text-light form-label">CENTRO DE OPERACIÓN</label>
                    <input id="centro_operacion" type="text" class="form-control mb-4" name="CENTRO_OPERACION" value="<?php echo $row['CENTRO_OPERACION'] ?>" readonly>
                </div>
                <div class="col-sm">
                    <label for="direccion_sitio" class="text-light form-label">DIRECCION DEL SITIO</label>
                    <input id="direccion_sitio" type="text" class="form-control mb-4" name="DIRECCION_DEL_SITIO" value="<?php echo $row['DIRECCION_DEL_SITIO'] ?>" readonly>
                </div>
                <div class="col-sm">
                    <label for="tipo_operacion" class="text-light form-label">TIPO DE OPERACIÓN (S/N LISTADO DE SITIOS)</label>
                    <input id="tipo_operacion" type="text" class="form-control mb-4" name="TIPO_DE_OPERACION" value="<?php echo $row['TIPO_DE_OPERACION'] ?>" readonly>
                </div>
                <div class="col-sm">
                    <label for="supervisor" class="text-light form-label">SUPERVISOR</label>
                    <input id="supervisor" type="text" class="form-control mb-4" name="SUPERVISOR" value="<?php echo $row['SUPERVISOR'] ?>" readonly>
                </div>
            </div>

            <div class="row">
                <div class="col-sm">
                    <label for="inventario" class="text-light form-label">INVENTARIO</label>
                    <input id="inventario" type="text" class="form-control mb-4" name="INVENTARIO" value="<?php echo $row['INVENTARIO'] ?>" readonly>
                </div>
                <div class="col-sm">
                    <label for="coubicado" class="text-light form-label">COUBICADO</label>
                    <input id="coubicado" type="text" class="form-control mb-4" name="COUBICADO" value="<?php echo $row['COUBICADO'] ?>" readonly>
                </div>
                <div class="col-sm">
                    <label for="torre" class="text-light form-label">TORRE</label>
                    <input id="torre" type="text" class="form-control mb-4" name="TORRE" value="<?php echo $row['TORRE'] ?>" readonly>
                </div>
                <div class="col-sm">
                    <label for="baterias" class="text-light form-label">BATERIAS</label>
                    <input id="baterias" type="text" class="form-control mb-4" name="BATERIAS" value="<?php echo $row['BATERIAS'] ?>" readonly>
                </div>
                <div class="col-sm">
                    <label for="planta" class="text-light form-label">PLANTA</label>
                    <input id="planta" type="text" class="form-control mb-4" name="Planta" value="<?php echo $row['Planta'] ?>" readonly>
                </div>
                <div class="col-sm">
                    <label for="noplantas" class="text-light form-label">No.PLANTAS</label>
                    <input id="noplantas" type="text" class="form-control mb-4" name="NoPlantas" value="<?php echo $row['NoPlantas'] ?>" readonly>
                </div>
                <div class="col-sm">
                    <label for="olt" class="text-light form-label">OLT</label>
                    <input id="olt" type="text" class="form-control mb-4" name="OLT" value="<?php echo $row['OLT'] ?>" readonly>
                </div>
            </div>

        </div>

        <div class="rounded bg-light mx-5 mt-5 p-5">

            <div class="row">
                <div class="col-sm">
                    <label for="work-order" class="form-label">WORK ORDER</label>
                    <input id="work-order" type="text" class="form-control mb-4" name="WORK_ORDER" placeholder="--" value="<?php echo $row['WORK_ORDER'] ?>">
                </div>
                <div class="col-sm">
                    <label for="priority" class="form-label">PRIORIDAD</label>
                    <select id="priority" class="form-select mb-4" aria-label="select example" name="PRIORITY">
                        <option selected value="<?php echo $row['PRIORITY'] ?>"><?php echo $row['PRIORITY'] ?></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                </div>
                <div class="col-sm">
                    <label for="ejecutado" class="form-label">EJECUTADO</label>
                    <select id="ejecutado" class="form-select mb-4" aria-label="select example" name="EJECUTADO">
                        <option selected value="<?php echo $row['EJECUTADO'] ?>"><?php echo $row['EJECUTADO'] ?></option>
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>
                    </select>
                </div>
                <div class="col-sm">
                    <label for="documentado" class="form-label">DOCUMENTADO</label>
                    <select id="documentado" class="form-select mb-4" aria-label="select example" name="DOCUMENTADO">
                        <option selected value="<?php echo $row['DOCUMENTADO'] ?>"><?php echo $row['DOCUMENTADO'] ?></option>
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-sm">
                    <label for="fecha_ejecucion" class="form-label">FECHA EJECUCIÓN</label>
                    <input id="fecha_ejecucion" type="datetime-local" class="form-control mb-4" name="Fecha_Ejecucion" value="<?php if($row['Fecha_Ejecucion'] != ''){$date = new DateTime($row['Fecha_Ejecucion']); echo $date->format('Y-m-d\TH:i');} ?>">
                </div>
                <div class="col-sm">
                    <label for="fecha_cancelacion" class="form-label">FECHA CANCELACION</label>
                    <input id="fecha_cancelacion" type="datetime-local" class="form-control mb-4" name="FECHA_CANCELACION" value="<?php if($row['FECHA_CANCELACION'] != ''){$date = new DateTime($row['FECHA_CANCELACION']); echo $date->format('Y-m-d\TH:i');} ?>">
                </div>
            </div>

            <div class="row">
                <div class="col-sm">
                    <label for="estado_wfm" class="form-label">Estado WFM</label>
                    <select id="estado_wfm" class="form-select mb-4" aria-label="select example" name="Estado_WFM">
                        <option selected value="<?php echo $row['Estado_WFM'] ?>"><?php echo $row['Estado_WFM'] ?></option>
                        <option value="Accepted">Accepted</option>
                        <option value="Close">Close</option>
                        <option value="Dispache">Dispache</option>
                        <option value="Resolved">Resolved</option>
                        <option value="Travel">Travel</option>
                        <option value="Waiting External">Waiting External</option>
                        <option value="Waiting Internal">Waiting Internal</option>
                    </select>
                </div>
                <div class="col-sm">
                    <label for="revision_ericsson" class="form-label">Revision Ericsson</label>
                    <select id="revision_ericsson" class="form-select mb-4" aria-label="select example" name="Revision_Ericsson">
                        <option selected value="<?php echo $row['Revision_Ericsson'] ?>"><?php echo $row['Revision_Ericsson'] ?></option>
                        <option value="INICIO">INICIO</option>
                        <option value="DOCUMENTADO">DOCUMENTADO</option>
                        <option value="INFORME RECHAZADO">INFORME RECHAZADO</option>
                        <option value="PENDIENTE POR APROBACIÓN">PENDIENTE POR APROBACIÓN</option>
                        <option value="VALIDADO Q/A">VALIDADO Q/A</option>
                        <option value="NO APLICA">NO APLICA</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-sm">
                    <label for="tecnico_1" class="form-label">TECNICO 1</label>
                    <select id="tecnico_1" class="form-select mb-4" aria-label="select example" name="TECNICO_1">
                        <option selected value="<?php echo $row['TECNICO_1'] ?>"><?php echo $row['TECNICO_1'] ?></option>
                        <?php
                            while($rowPersonal = mysqli_fetch_array($queryTecnico1)){
                        ?>
                        <option value="<?php echo $rowPersonal['nombre_completo']?>"><?php echo $rowPersonal['nombre_completo']?></option>
                        <?php
                            } 
                        ?>
                    </select>
                </div>
                <div class="col-sm">
                    <label for="tecnico_2" class="form-label">TECNICO 2</label>
                    <select id="tecnico_2" class="form-select mb-4" aria-label="select example" name="TECNICO_2">
                        <option selected value="<?php echo $row['TECNICO_2'] ?>"><?php echo $row['TECNICO_2'] ?></option>
                        <?php
                            while($rowPersonal = mysqli_fetch_array($queryTecnico2)){
                        ?>
                        <option value="<?php echo $rowPersonal['nombre_completo']?>"><?php echo $rowPersonal['nombre_completo']?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm">
                    <label for="observacion" class="form-label">OBSERVACIÓN</label>
                    <textarea id="observacion" type="text" class="form-control mb-4" rows="3" name="Observacion" placeholder="--"><?php echo $row['Observacion']?></textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-sm">
                    <label for="visita_fallida_documentada" class="form-label">VISITA FALLIDA DOCUMENTADA</label>
                    <select id="visita_fallida_documentada" class="form-select mb-4" aria-label="select example" name="Visita_Fallida_Documentada">
                        <option selected value="<?php echo $row['Visita_Fallida_Documentada'] ?>"><?php echo $row['Visita_Fallida_Documentada'] ?></option>
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>
                    </select>
                </div>
                <div class="col-sm">
                    <label for="programacion" class="form-label">PROGRAMACIÓN</label>
                    <textarea id="programacion" type="text" class="form-control mb-4" rows="1" name="Programacion" placeholder="--"><?php echo $row['Programacion']?></textarea>
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm">
                    <label for="observacion_cumplimiento" class="form-label">OBSERVACIÓN DE CUMPLIMIENTO</label>
                    <textarea id="observacion_cumplimiento" type="text" class="form-control mb-4" rows="3" name="Observacion_de_Cumplimiento" placeholder="--"><?php echo $row['Observacion_de_Cumplimiento']?></textarea>
                </div>
            </div>

        </div>


        <div class="row justify-content-center row-buttons-edit">
            <div class="col-auto button-edit">
                <div class="p-5 text-center">
                    <a href="mp-table.php" class="btn btn-outline-warning" value="Actualizar">CANCELAR</a>
                </div>
            </div>
            <div class="col-auto button-edit">
                <div class="p-5 text-center">
                    <input type="submit" class="btn btn-outline-info" value="GUARDAR">
                </div>
            </div>
        </div>


    </form>
</div>

</body>
</html>