<?php 
require 'includes/database.php';

$db = new Database();
$con = $db->conectar();
?>



<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include("includes/titulo.php"); ?>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php require('css.php'); ?>
</head>

<body>
    <aside id="left-panel" class="left-panel">
        <?php include('includes/menu.php'); ?>
    </aside>
    <div id="right-panel" class="right-panel">
        <?php include('includes/header.php'); ?>
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">Cita</h4>
                            </div>


                            <?php
$insert = $con->prepare("SELECT * FROM tm_solicitud_cita_veterinaria"); #INNER JOIN tr_tipo_usuario ON tm_usuario.ID_tip_usu = tr_tipo_usuario.ID_tip_usu");

$insert->execute();
/***la variable $resultado1 es la que me va a guardar toda la informacion de la consulta */
$resultado1= $insert->fetchAll(PDO::FETCH_ASSOC);
$i=0;
?>
<table border="1">
    <tr>
    <td>#</td>
    <td>Numero de cita</td>
    <td>Fecha de la solicitud</td>
    <td>Fecha de la cita</td>
    <td>Hora</td>
    <td>Motivo</td>
    <td>Diagnostico</td>
    <td>ID_usuario</td>
    <td>ID_mascota</td>


    </tr>
<?php foreach ($resultado1 as $row)
{
    $i++; ?>

<tr>
    <td><?php echo $i?></td>
    <td><?php echo $row['ID_cita']?></td>
    <td><?php echo $row['fecha_solicitud_cit']?></td>
    <td><?php echo $row['fecha_cita_cit']?></td>
    <td><?php echo $row['hora_cit']?></td>
    <td><?php echo $row['motivo_cit']?></td>
    <td><?php echo $row['diagnostico_cit']?></td>
    <td><?php echo $row['ID_usuario']?></td>
    <td><?php echo $row['ID_mascota']?></td>


    </tr>

<?php }?>

</table>



                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="card-body">
                                        <div id="traffic-chart" class="traffic-chart"></div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                </div>
                            </div> <!-- /.row -->
                            <div class="card-body"></div>
                        </div>
                    </div><!-- /# column -->
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="clearfix"></div>
        <?php include('includes/footer.php'); ?>
    </div>
    <?php include('js.php'); ?>
</body>

</html>