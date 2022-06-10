<?php

include("../db-conection/conexion.php");
$con = conectar();

$ITEM = $_POST['ITEM'];
$OT = $_POST['OT'];
$ID_ESTACION = $_POST['ID_ESTACION'];
$ESTACION_BASE = $_POST['ESTACION_BASE'];
$TIPO_DE_TRABAJO = $_POST['TIPO_DE_TRABAJO'];
$DESCRIPCION_TICKET = $_POST['DESCRIPCION_TICKET'];
$WORK_ORDER = $_POST['WORK_ORDER'];
$SISTEMA = $_POST['SISTEMA'];
$PRIORIDAD = $_POST['PRIORIDAD'];
$FIELD_DISPATCH = $_POST['FIELD_DISPATCH'];
$TECNICO_1 = $_POST['TECNICO_1'];
$TECNICO_2 = $_POST['TECNICO_2'];
$INSUMO = $_POST['INSUMO'];
$PARADAS_RELOJ = $_POST['PARADAS_RELOJ1'].":".$_POST['PARADAS_RELOJ2'];
$DESPLAZAMIENTO = $_POST['DESPLAZAMIENTO'];
$CIERRE_CENTRO_GESTION = $_POST['CIERRE_CENTRO_GESTION'];
$CERRADO_WFM = $_POST['CERRADO_WFM'];
$TICKET_ENERGIA = $_POST['TICKET_ENERGIA'];
$INCUMPLIMIENTO_SLA = $_POST['INCUMPLIMIENTO_SLA'];
$FECHA_HORA_DE_ASIGNACION = '';
$FECHA_CANCELACION = '';
$FECHA_HORA_INICIO_DESPLAZAMIENTO = '';
$FECHA_HORA_INICIO_DE_EJECUCION = '';
$FECHA_HORA_FIN_EJECUCION = '';
$ESTADO = '';

if($_POST['FECHA_HORA_DE_ASIGNACION']!=''){
$ASIGNACION_FECHA = new DateTime($_POST['FECHA_HORA_DE_ASIGNACION']);
$FECHA_HORA_DE_ASIGNACION = $ASIGNACION_FECHA->format('Y-m-d H:i:s');
}

if($_POST['FECHA_CANCELACION']!=''){
$CANCELACION_FECHA = new DateTime($_POST['FECHA_CANCELACION']);
$FECHA_CANCELACION = $CANCELACION_FECHA->format('Y-m-d H:i:s');
}

if($_POST['FECHA_HORA_INICIO_DESPLAZAMIENTO']!=''){
$DESPLAZAMIENTO_INICIO_FECHA = new DateTime($_POST['FECHA_HORA_INICIO_DESPLAZAMIENTO']);
$FECHA_HORA_INICIO_DESPLAZAMIENTO = $DESPLAZAMIENTO_INICIO_FECHA->format('Y-m-d H:i:s');
}

if($_POST['FECHA_HORA_INICIO_DE_EJECUCION']!=''){
$EJECUCION_INICIO_FECHA = new DateTime($_POST['FECHA_HORA_INICIO_DE_EJECUCION']);
$FECHA_HORA_INICIO_DE_EJECUCION = $EJECUCION_INICIO_FECHA->format('Y-m-d H:i:s');
}

if($_POST['FECHA_HORA_FIN_EJECUCION']!=''){
$EJECUCION_FIN_FECHA = new DateTime($_POST['FECHA_HORA_FIN_EJECUCION']);
$FECHA_HORA_FIN_EJECUCION = $EJECUCION_FIN_FECHA->format('Y-m-d H:i:s');
}

if($FECHA_HORA_DE_ASIGNACION!=''){
    if($FECHA_CANCELACION!=''){
        if($FECHA_HORA_INICIO_DESPLAZAMIENTO!='' || $FECHA_HORA_INICIO_DE_EJECUCION!='' || $FECHA_HORA_FIN_EJECUCION!=''){
            $ESTADO = 'VERIFICAR';
        }else{
            $ESTADO = 'CANCELADO';
        }
    }elseif($FECHA_HORA_INICIO_DESPLAZAMIENTO!=''){
        if($FECHA_HORA_INICIO_DE_EJECUCION!=''){
            if($FECHA_HORA_FIN_EJECUCION!=''){
                $ESTADO = 'EJECUTADO';
            }else{
                $ESTADO = 'EN EJECUCIÓN';
            }
        }else{
            if($FECHA_HORA_FIN_EJECUCION!=''){
                $ESTADO = 'VERIFICAR';
            }else{
                $ESTADO = 'EN EJECUCIÓN';
            }
        }
    }else{
        if($FECHA_HORA_INICIO_DE_EJECUCION!='' || $FECHA_HORA_FIN_EJECUCION!=''){
            $ESTADO = 'VERIFICAR';
        }else{
            $ESTADO = 'ASIGNACIÓN';
        }
    }
}

$sql = "UPDATE Nfsom_Mc SET ESTADO='$ESTADO',OT='$OT',WORK_ORDER='$WORK_ORDER',TIPO_DE_TRABAJO='$TIPO_DE_TRABAJO',SISTEMA='$SISTEMA',ID_ESTACION='$ID_ESTACION',ESTACION_BASE='$ESTACION_BASE',PRIORIDAD='$PRIORIDAD',FECHA_HORA_DE_ASIGNACION='$FECHA_HORA_DE_ASIGNACION',FECHA_CANCELACION='$FECHA_CANCELACION',FIELD_DISPATCH='$FIELD_DISPATCH',TECNICO_1='$TECNICO_1',TECNICO_2 ='$TECNICO_2',FECHA_HORA_INICIO_DESPLAZAMIENTO ='$FECHA_HORA_INICIO_DESPLAZAMIENTO',FECHA_HORA_INICIO_DE_EJECUCION ='$FECHA_HORA_INICIO_DE_EJECUCION',FECHA_HORA_FIN_EJECUCION ='$FECHA_HORA_FIN_EJECUCION',DESPLAZAMIENTO ='$DESPLAZAMIENTO',INSUMO ='$INSUMO',PARADAS_RELOJ ='$PARADAS_RELOJ',CIERRE_CENTRO_GESTION='$CIERRE_CENTRO_GESTION',CERRADO_WFM='$CERRADO_WFM',TICKET_ENERGIA='$TICKET_ENERGIA',INCUMPLIMIENTO_SLA='$INCUMPLIMIENTO_SLA',DESCRIPCION_TICKET='$DESCRIPCION_TICKET' WHERE ITEM='$ITEM'";
$query = mysqli_query($con,$sql);

if($query){
    Header("Location: ../views/mc-table.php");
}else{
    echo("ERROR");
}

?>