<?php

include("../db-conection/conexion.php");
$con = conectar();

$ITEM = $_POST['ITEM'];
$FECHA_HORA_DE_ASIGNACION = $_POST['FECHA_HORA_DE_ASIGNACION'];
$OT = $_POST['OT'];
$ID_ESTACION = $_POST['ID_ESTACION'];
$ESTACION_BASE = $_POST['ESTACION_BASE'];
$TIPO_DE_TRABAJO = $_POST['TIPO_DE_TRABAJO'];
$OBSERVACION = $_POST['OBSERVACION'];
$WORK_ORDER = $_POST['WORK_ORDER'];
$SISTEMA = $_POST['SISTEMA'];
$PRIORIDAD = $_POST['PRIORIDAD'];
$FECHA_CANCELACION = $_POST['FECHA_CANCELACION'];
$FIELD_DISPATCH = $_POST['FIELD_DISPATCH'];
$TECNICO_1 = $_POST['TECNICO_1'];
$TECNICO_2 = $_POST['TECNICO_2'];
$FECHA_HORA_INICIO_DESPLAZAMIENTO = $_POST['FECHA_HORA_INICIO_DESPLAZAMIENTO'];
$FECHA_HORA_INICIO_DE_EJECUCION = $_POST['FECHA_HORA_INICIO_DE_EJECUCION'];
$INSUMO = $_POST['INSUMO'];
$PARADAS_RELOJ = $_POST['PARADAS_RELOJ1'].":".$_POST['PARADAS_RELOJ2'];
$FECHA_HORA_FIN_EJECUCION = $_POST['FECHA_HORA_FIN_EJECUCION'];
$DESPLAZAMIENTO = $_POST['DESPLAZAMIENTO'];
$CIERRE_CENTRO_GESTION = $_POST['CIERRE_CENTRO_GESTION'];
$CERRADO_WFM = $_POST['CERRADO_WFM'];
$TICKET_ENERGIA = $_POST['TICKET_ENERGIA'];
$INCUMPLIMIENTO_SLA = $_POST['INCUMPLIMIENTO_SLA'];

$ASIGNACION_FECHA = new DateTime($_POST['FECHA_HORA_DE_ASIGNACION']);
$MES_ASIGNACION = $ASIGNACION_FECHA->format('M');
$ANO_ASIGNACION = $ASIGNACION_FECHA->format('Y');

$EJECUCION_FIN_FECHA = new DateTime($_POST['FECHA_HORA_FIN_EJECUCION']);
$MES_FIN_DE_EJECUCION = $EJECUCION_FIN_FECHA->format('M');

if($TIPO_DE_TRABAJO == "MP COMPLETO" or $TIPO_DE_TRABAJO == "MP INSPECCIÓN"){
    $TIPO_MP = "MP";
}else{
    $TIPO_MP = "MC";
}

$sql = "UPDATE nfsom_table SET FECHA_HORA_DE_ASIGNACION='$FECHA_HORA_DE_ASIGNACION',OT='$OT',ID_ESTACION='$ID_ESTACION',ESTACION_BASE='$ESTACION_BASE',TIPO_DE_TRABAJO='$TIPO_DE_TRABAJO',OBSERVACION='$OBSERVACION',WORK_ORDER='$WORK_ORDER',SISTEMA='$SISTEMA',PRIORIDAD='$PRIORIDAD',FECHA_CANCELACION='$FECHA_CANCELACION',FIELD_DISPATCH='$FIELD_DISPATCH',TECNICO_1='$TECNICO_1',TECNICO_2 ='$TECNICO_2',FECHA_HORA_INICIO_DESPLAZAMIENTO ='$FECHA_HORA_INICIO_DESPLAZAMIENTO',FECHA_HORA_INICIO_DE_EJECUCION ='$FECHA_HORA_INICIO_DE_EJECUCION',INSUMO ='$INSUMO',PARADAS_RELOJ ='$PARADAS_RELOJ',FECHA_HORA_FIN_EJECUCION ='$FECHA_HORA_FIN_EJECUCION',DESPLAZAMIENTO ='$DESPLAZAMIENTO',CIERRE_CENTRO_GESTION='$CIERRE_CENTRO_GESTION',CERRADO_WFM='$CERRADO_WFM',TICKET_ENERGIA='$TICKET_ENERGIA',INCUMPLIMIENTO_SLA='$INCUMPLIMIENTO_SLA',MES_ASIGNACION='$MES_ASIGNACION',MES_FIN_DE_EJECUCION='$MES_FIN_DE_EJECUCION',ANO_ASIGNACION='$ANO_ASIGNACION',TIPO_MP='$TIPO_MP' WHERE ITEM='$ITEM'";
$query = mysqli_query($con,$sql);

if($query){
    Header("Location: ../views/view-table.php");
}

?>