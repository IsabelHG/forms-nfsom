<?php
include("../db-conection/conexion.php");
$con = conectar();

$id = $_GET['id'];

$sql = "SELECT * FROM Nfsom_Mc WHERE ITEM='$id'";
$query = mysqli_query($con,$sql);

$row = mysqli_fetch_array($query);

$DURACION_TOTAL  = $row['PARADAS_RELOJ'];
$DURACION_SEPARADA = explode(":", $DURACION_TOTAL);
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
    
<div class="container my-5">
    <form action="../sql-query/update.php" method="POST" class="bg-secondary">

        <input type="hidden" name="ITEM" value="<?php echo $row['ITEM'] ?>">

        <div class="pt-5 px-5">

            <div class="row">
                <div class="col-sm">
                    <label for="fecha_asignacion" class="text-light form-label">FECHA ASIGNACION</label>
                    <input id="fecha_asignacion" type="datetime-local" class="form-control mb-4" name="FECHA_HORA_DE_ASIGNACION" value="<?php if($row['FECHA_HORA_DE_ASIGNACION'] != ''){$date = new DateTime($row['FECHA_HORA_DE_ASIGNACION']); echo $date->format('Y-m-d\TH:i');} ?>">
                </div>
                <div class="col-sm">
                    <label for="ot" class="text-light form-label">OT</label>
                    <input id="ot" type="text" class="form-control mb-4" name="OT" placeholder="--" value="<?php echo $row['OT'] ?>" readonly>
                </div>
                <div class="col-sm">
                    <label for="id-eb" class="text-light form-label">ID EB</label>
                    <input id="id-eb" type="text" class="form-control mb-4" name="ID_ESTACION" placeholder="--" value="<?php echo $row['ID_ESTACION'] ?>">
                </div>
                <div class="col-sm">
                    <label for="nombre-eb" class="text-light form-label">NOMBRE EB</label>
                    <input id="nombre-eb" type="text" class="form-control mb-4" name="ESTACION_BASE" placeholder="--" value="<?php echo $row['ESTACION_BASE'] ?>">
                </div>
                <div class="col-sm">
                    <label for="tipo-trabajo" class="text-light form-label">TIPO DE TRABAJO</label>
                    <input id="tipo-trabajo" type="text" class="form-control mb-4" name="TIPO_DE_TRABAJO" placeholder="--" value="<?php echo $row['TIPO_DE_TRABAJO'] ?>" readonly>
                </div>
            </div>

            <div class="row">
                <div class="col-sm">
                    <label for="observacion" class="text-light form-label">TICKET (DESCRIPCION INICIAL)</label>
                    <textarea id="observacion" type="text" class="form-control mb-4" rows="3" name="DESCRIPCION_TICKET" placeholder="--" readonly><?php echo $row['DESCRIPCION_TICKET']?></textarea>
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
                    <label for="sistema" class="form-label">SISTEMA</label>
                    <select id="sistema" class="form-select mb-4" aria-label="select example" name="SISTEMA">
                        <option selected value="<?php echo $row['SISTEMA'] ?>"><?php echo $row['SISTEMA'] ?></option>
                        <option value="ENERGIA">ENERGIA</option>
                        <option value="RADIOACCESO">RADIOACCESO</option>
                        <option value="AIRES">AIRES</option>
                        <option value="MANO DE OBRA">MANO DE OBRA</option>
                        <option value="MANTENIMIENTO">MANTENIMIENTO</option>
                        <option value="HURTO">HURTO</option>
                    </select>
                </div>
                <div class="col-sm">
                    <label for="prioridad" class="form-label">PRIORIDAD</label>
                    <select id="prioridad" class="form-select mb-4" aria-label="select example" name="PRIORIDAD">
                        <option selected value="<?php echo $row['PRIORIDAD'] ?>"><?php echo $row['PRIORIDAD'] ?></option>
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
            </div>

            <div class="row">
                <div class="col-sm">
                    <label for="fecha_cancelacion" class="form-label">FECHA CANCELACION</label>
                    <input id="fecha_cancelacion" type="datetime-local" class="form-control mb-4" name="FECHA_CANCELACION" value="<?php if($row['FECHA_CANCELACION'] != ''){$date = new DateTime($row['FECHA_CANCELACION']); echo $date->format('Y-m-d\TH:i');} ?>">
                </div>
                <div class="col-sm">
                    <label for="field_dispatch" class="form-label">FIELD DISPATCH</label>
                    <select id="field_dispatch" class="form-select mb-4" aria-label="select example" name="FIELD_DISPATCH">
                        <option selected value="<?php echo $row['FIELD_DISPATCH'] ?>"><?php echo $row['FIELD_DISPATCH'] ?></option>
                        <option value="Jorge Antonio Santafé Cote">Jorge Antonio Santafé Cote</option>
                        <option value="Angelica Yulieth Huertas">Angelica Yulieth Huertas</option>
                        <option value="Maye Angélica Montañez Castellanos">Maye Angélica Montañez Castellanos</option>
                        <option value="Jose Mora">Jose Mora</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-sm">
                    <label for="tecnico_1" class="form-label">TECNICO 1</label>
                    <select id="tecnico_1" class="form-select mb-4" aria-label="select example" name="TECNICO_1">
                        <option selected value="<?php echo $row['TECNICO_1'] ?>"><?php echo $row['TECNICO_1'] ?></option>
                        <option value="Porterla Afanador Jose">Porterla Afanador Jose</option>
                        <option value="Ocampo Diaz Carlos Alberto">Ocampo Diaz Carlos Alberto</option>
                        <option value="Aviles Garcia Nestor Alexander">Aviles Garcia Nestor Alexander</option>
                        <option value="Tejeda Escobar Adolfo">Tejeda Escobar Adolfo</option>
                        <option value="Tejada Escobar Fabian">Tejada Escobar Fabian</option>
                        <option value="Rodriguez Jose Miguel">Rodriguez Jose Miguel</option>
                        <option value="Bonilla Patiño Oscar">Bonilla Patiño Oscar</option>
                        <option value="Guarnizo Trujillo Luis Alberto">Guarnizo Trujillo Luis Alberto</option>
                        <option value="Santafe Cote Jorge Antonio">Santafe Cote Jorge Antonio</option>
                        <option value="Londoño Juan Carlos">Londoño Juan Carlos</option>
                        <option value="Correa Ruben Dario">Correa Ruben Dario</option>
                        <option value="Murillo Asprilla Jesus Antonio">Murillo Asprilla Jesus Antonio</option>
                        <option value="Alvarez Rober">Alvarez Rober</option>
                        <option value="Ortega Lopez Fausto">Ortega Lopez Fausto</option>
                        <option value="Buelvas Berrio Luis Eduardo">Buelvas Berrio Luis Eduardo</option>
                        <option value="Reino Nieves Fabian Alfredo">Reino Nieves Fabian Alfredo</option>
                        <option value="Huertas Angelica Yulieth">Huertas Angelica Yulieth</option>
                        <option value="Tirado Rios Leonel">Tirado Rios Leonel</option>
                        <option value="Mesa Cristian Bernardo">Mesa Cristian Bernardo</option>
                        <option value="Agudelo Mora John Alejandro">Agudelo Mora John Alejandro</option>
                        <option value="Rodríguez Da Silva José">Rodríguez Da Silva José</option>
                        <option value="Burbano Delgado Jorge Enrique">Burbano Delgado Jorge Enrique</option>
                        <option value="Ramirez Arango Edgar Joel">Ramirez Arango Edgar Joel</option>
                        <option value="Castellanos Angelica">Castellanos Angelica</option>
                        <option value="Valencia Jhon Jairo">Valencia Jhon Jairo</option>
                        <option value="Montes Hernandez Luis">Montes Hernandez Luis</option>
                        <option value="Elorza Posada Fabián de Jesús">Elorza Posada Fabián de Jesús</option>
                        <option value="Silva Jaider Parra">Silva Jaider Parra</option>
                        <option value="Triana Jiménez Harold Nayid">Triana Jiménez Harold Nayid</option>
                    </select>
                </div>
                <div class="col-sm">
                    <label for="tecnico_2" class="form-label">TECNICO 2</label>
                    <select id="tecnico_2" class="form-select mb-4" aria-label="select example" name="TECNICO_2">
                        <option selected value="<?php echo $row['TECNICO_2'] ?>"><?php echo $row['TECNICO_2'] ?></option>
                        <option value="Porterla Afanador Jose">Porterla Afanador Jose</option>
                        <option value="Ocampo Diaz Carlos Alberto">Ocampo Diaz Carlos Alberto</option>
                        <option value="Aviles Garcia Nestor Alexander">Aviles Garcia Nestor Alexander</option>
                        <option value="Tejeda Escobar Adolfo">Tejeda Escobar Adolfo</option>
                        <option value="Tejada Escobar Fabian">Tejada Escobar Fabian</option>
                        <option value="Rodriguez Jose Miguel">Rodriguez Jose Miguel</option>
                        <option value="Bonilla Patiño Oscar">Bonilla Patiño Oscar</option>
                        <option value="Guarnizo Trujillo Luis Alberto">Guarnizo Trujillo Luis Alberto</option>
                        <option value="Santafe Cote Jorge Antonio">Santafe Cote Jorge Antonio</option>
                        <option value="Londoño Juan Carlos">Londoño Juan Carlos</option>
                        <option value="Correa Ruben Dario">Correa Ruben Dario</option>
                        <option value="Murillo Asprilla Jesus Antonio">Murillo Asprilla Jesus Antonio</option>
                        <option value="Alvarez Rober">Alvarez Rober</option>
                        <option value="Ortega Lopez Fausto">Ortega Lopez Fausto</option>
                        <option value="Buelvas Berrio Luis Eduardo">Buelvas Berrio Luis Eduardo</option>
                        <option value="Reino Nieves Fabian Alfredo">Reino Nieves Fabian Alfredo</option>
                        <option value="Huertas Angelica Yulieth">Huertas Angelica Yulieth</option>
                        <option value="Tirado Rios Leonel">Tirado Rios Leonel</option>
                        <option value="Mesa Cristian Bernardo">Mesa Cristian Bernardo</option>
                        <option value="Agudelo Mora John Alejandro">Agudelo Mora John Alejandro</option>
                        <option value="Rodríguez Da Silva José">Rodríguez Da Silva José</option>
                        <option value="Burbano Delgado Jorge Enrique">Burbano Delgado Jorge Enrique</option>
                        <option value="Ramirez Arango Edgar Joel">Ramirez Arango Edgar Joel</option>
                        <option value="Castellanos Angelica">Castellanos Angelica</option>
                        <option value="Valencia Jhon Jairo">Valencia Jhon Jairo</option>
                        <option value="Montes Hernandez Luis">Montes Hernandez Luis</option>
                        <option value="Elorza Posada Fabián de Jesús">Elorza Posada Fabián de Jesús</option>
                        <option value="Silva Jaider Parra">Silva Jaider Parra</option>
                        <option value="Triana Jiménez Harold Nayid">Triana Jiménez Harold Nayid</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-sm">
                    <label for="fecha_inicio_desplazamiento" class="form-label">FECHA / HORA INICIO DESPLAZAMIENTO</label>
                    <input id="fecha_inicio_desplazamiento" type="datetime-local" class="form-control mb-4" name="FECHA_HORA_INICIO_DESPLAZAMIENTO" value="<?php if($row['FECHA_HORA_INICIO_DESPLAZAMIENTO'] != ''){$date = new DateTime($row['FECHA_HORA_INICIO_DESPLAZAMIENTO']); echo $date->format('Y-m-d\TH:i');} ?>">
                </div>
                <div class="col-sm">
                    <label for="fecha_inicio_ejecucion" class="form-label">FECHA / HORA INICIO DE EJECUCION</label>
                    <input id="fecha_inicio_ejecucion" type="datetime-local" class="form-control mb-4" name="FECHA_HORA_INICIO_DE_EJECUCION" value="<?php if($row['FECHA_HORA_INICIO_DE_EJECUCION'] != ''){$date = new DateTime($row['FECHA_HORA_INICIO_DE_EJECUCION']); echo $date->format('Y-m-d\TH:i');} ?>">
                </div>
            </div>

            <div class="row">
                <div class="col-sm">
                    <label for="insumo" class="form-label">MANTENIMIENTO PREVENTIVO REQUIERE INSUMO?</label>
                    <select id="insumo" class="form-select mb-4" aria-label="select example" name="INSUMO">
                        <option selected value="<?php echo $row['INSUMO'] ?>"><?php echo $row['INSUMO'] ?></option>
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>
                    </select>
                </div>
                <div class="col-sm">
                    <label for="paradas_reloj" class="form-label">DURACION TOTAL PARADA DE RELOJ (HORAS)</label>
                    <div id="paradas_reloj" class="input-group mb-4">
                        <input type="number" class="form-control mb-4" name="PARADAS_RELOJ1" placeholder="00 hh" value="<?php echo $DURACION_SEPARADA[0] ?>">
                        <span class="input-group-text mb-4">:</span>
                        <input type="number" min="0" max="59" class="form-control mb-4" name="PARADAS_RELOJ2" placeholder="00 mm" value="<?php echo $DURACION_SEPARADA[1] ?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm">
                    <label for="fecha_fin_ejecucion" class="form-label">FECHA / HORA FIN DE EJECUCION</label>
                    <input id="fecha_fin_ejecucion" type="datetime-local" class="form-control mb-4" name="FECHA_HORA_FIN_EJECUCION" value="<?php if($row['FECHA_HORA_FIN_EJECUCION'] != ''){$date = new DateTime($row['FECHA_HORA_FIN_EJECUCION']); echo $date->format('Y-m-d\TH:i');} ?>">
                </div>
                <div class="col-sm">
                    <label for="desplazamiento" class="form-label">SE REQUIRIO DESPLAZAMIENTO?</label>
                    <select id="desplazamiento" class="form-select mb-4" aria-label="select example" name="DESPLAZAMIENTO">
                        <option selected value="<?php echo $row['DESPLAZAMIENTO'] ?>"><?php echo $row['DESPLAZAMIENTO'] ?></option>
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-sm">
                    <label for="cierre_centro_gestion" class="form-label">FALLA CERRADA CON CENTRO GESTION?</label>
                    <select id="cierre_centro_gestion" class="form-select mb-4" aria-label="select example" name="CIERRE_CENTRO_GESTION">
                        <option selected value="<?php echo $row['CIERRE_CENTRO_GESTION'] ?>"><?php echo $row['CIERRE_CENTRO_GESTION'] ?></option>
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>
                    </select>
                </div>
                <div class="col-sm">
                    <label for="cerrado_wfm" class="form-label">CASO CERRADO EN WFM?</label>
                    <select id="cerrado_wfm" class="form-select mb-4" aria-label="select example" name="CERRADO_WFM">
                        <option selected value="<?php echo $row['CERRADO_WFM'] ?>"><?php echo $row['CERRADO_WFM'] ?></option>
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>
                    </select>
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm">
                    <label for="ticket_energia" class="form-label">No. TICKET, PARA FALLAS DE ENERGIA</label>
                    <input id="ticket_energia" type="text" class="form-control mb-4" name="TICKET_ENERGIA" placeholder="--" value="<?php echo $row['TICKET_ENERGIA'] ?>">
                </div>
                <div class="col-sm">
                    <label for="incumplimiento_sla" class="form-label">CAUSA INCUMPLIMIENTO SLA</label>
                    <input id="incumplimiento_sla" type="text" class="form-control mb-4" name="INCUMPLIMIENTO_SLA" placeholder="--" value="<?php echo $row['INCUMPLIMIENTO_SLA'] ?>">
                </div>
            </div>
        </div>
        

        <div class="row justify-content-center row-buttons-edit">
            <div class="col-auto button-edit">
                <div class="p-5 text-center">
                    <a href="view-table.php" class="btn btn-danger" value="Actualizar">CANCELAR</a>
                </div>
            </div>
            <div class="col-auto button-edit">
                <div class="p-5 text-center">
                    <input type="submit" class="btn btn-success" value="GUARDAR">
                </div>
            </div>
        </div>


    </form>
</div>

</body>
</html>