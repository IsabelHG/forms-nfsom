<?php

include("../db-conection/conexion.php");
$con = conectar();

$item = $_POST['item'];
$ESTADO = $_POST['ESTADO'];
$OT = $_POST['OT'];
$CILOCATION = $_POST['CILOCATION'];
$ESTACION_BASE = $_POST['ESTACION_BASE'];
$TIPO_DE_TRABAJO = $_POST['TIPO_DE_TRABAJO'];
$CENTRO_OPERACION = $_POST['CENTRO_OPERACION'];
$DIRECCION_DEL_SITIO = $_POST['DIRECCION_DEL_SITIO'];
$TIPO_DE_OPERACION = $_POST['TIPO_DE_OPERACION'];
$SUPERVISOR = $_POST['SUPERVISOR'];
$INVENTARIO = $_POST['INVENTARIO'];
$COUBICADO = $_POST['COUBICADO'];
$TORRE = $_POST['TORRE'];
$BATERIAS = $_POST['BATERIAS'];
$Planta = $_POST['Planta'];
$NoPlantas = $_POST['NoPlantas'];
$OLT = $_POST['OLT'];
$WORK_ORDER = $_POST['WORK_ORDER'];
$PRIORITY = $_POST['PRIORITY'];
$EJECUTADO = $_POST['EJECUTADO'];
$DOCUMENTADO = $_POST['DOCUMENTADO'];
$Estado_WFM = $_POST['Estado_WFM'];
$Revision_Ericsson = $_POST['Revision_Ericsson'];
$TECNICO_1 = $_POST['TECNICO_1'];
$TECNICO_2 = $_POST['TECNICO_2'];
$Observacion = $_POST['Observacion'];
$Visita_Fallida_Documentada = $_POST['Visita_Fallida_Documentada'];
$Observacion_de_Cumplimiento = $_POST['Observacion_de_Cumplimiento'];
$FECHA_ASIGNACION = '';
$Fecha_Ejecucion = '';
$FECHA_CANCELACION = '';
$Programacion = '';
$ESTADO = '';

if($_POST['FECHA_ASIGNACION']!=''){
$ASIGNACION_FECHA = new DateTime($_POST['FECHA_ASIGNACION']);
$FECHA_ASIGNACION .= $ASIGNACION_FECHA->format('Y-m-d H:i:s');
}

if($_POST['Fecha_Ejecucion']!=''){
$EJECUCION_FECHA = new DateTime($_POST['Fecha_Ejecucion']);
$Fecha_Ejecucion .= $EJECUCION_FECHA->format('Y-m-d H:i:s');
}

if($_POST['FECHA_CANCELACION']!=''){
$CANCELACION_FECHA = new DateTime($_POST['FECHA_CANCELACION']);
$FECHA_CANCELACION .= $CANCELACION_FECHA->format('Y-m-d H:i:s');
}

if($_POST['Programacion']!=''){
$Programacion_FECHA = new DateTime($_POST['Programacion']);
$Programacion .= $Programacion_FECHA->format('Y-m-d H:i:s');
}

if($FECHA_ASIGNACION!=''){
    if($Fecha_Ejecucion!=''){
        if($EJECUTADO=='SI'){
            if($DOCUMENTADO=='SI'){
                $ESTADO = 'DOCUMENTADO';
            }elseif($DOCUMENTADO=='NO'){
                $ESTADO = 'EJECUTADO';
            }
        }elseif($EJECUTADO=='NO'){
            if($DOCUMENTADO=='SI'){
                $ESTADO = 'VERIFICAR';
            }elseif($DOCUMENTADO=='NO'){
                $ESTADO = 'EN EJECUCIÓN';
            }
        }
    }elseif($Fecha_Ejecucion==''){
        if($EJECUTADO=='SI' || $DOCUMENTADO=='SI'){
            $ESTADO = 'VERIFICAR';
        }else{
            $ESTADO = 'ASIGNACION';
        }
    }
}elseif($FECHA_ASIGNACION==''){
    $ESTADO = 'VERIFICAR';
}

$sql = "UPDATE Nfsom_Mp SET TIPO_DE_TRABAJO='$TIPO_DE_TRABAJO',CILOCATION='$CILOCATION',OT='$OT',WORK_ORDER='$WORK_ORDER',ESTACION_BASE='$ESTACION_BASE',DIRECCION_DEL_SITIO='$DIRECCION_DEL_SITIO',CENTRO_OPERACION='$CENTRO_OPERACION',TIPO_DE_OPERACION='$TIPO_DE_OPERACION',SUPERVISOR='$SUPERVISOR',PRIORITY='$PRIORITY',TECNICO_1='$TECNICO_1',TECNICO_2='$TECNICO_2',INVENTARIO='$INVENTARIO',COUBICADO='$COUBICADO',TORRE='$TORRE',BATERIAS='$BATERIAS',Planta='$Planta',NoPlantas='$NoPlantas',OLT='$OLT',EJECUTADO='$EJECUTADO',DOCUMENTADO='$DOCUMENTADO',Fecha_Ejecucion='$Fecha_Ejecucion',Estado_WFM='$Estado_WFM',Revision_Ericsson='$Revision_Ericsson',Observacion='$Observacion',Visita_Fallida_Documentada='$Visita_Fallida_Documentada',Programacion='$Programacion',Observacion_de_Cumplimiento='$Observacion_de_Cumplimiento',FECHA_CANCELACION='$FECHA_CANCELACION',ESTADO='$ESTADO',ESTADO='$ESTADO',FECHA_ASIGNACION='$FECHA_ASIGNACION' WHERE item='$item'";
$query = mysqli_query($con,$sql);

if($query){
    Header("Location: ../views/mp-table.php");
}else{
    echo("ERROR");
}

?>