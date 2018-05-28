<!--<table border="1">
    //<?php
//foreach ($alumnos as $alumno) {
//  echo "<tr>";
//  echo "<td>" . $alumno->apellido1 . "</td>";
//  echo "<td>" . $alumno->nombre . "</td>";
//  echo "<td>" . $alumno->telefono1 . "</td>";
//  echo "</tr>";
//}
//?>
</table>-->

<?php $evaluacionActiva = $this->session->userdata('evaluacionActiva') ?>

<div class="card p-2 mb-5">


    <div class="col-lg-3 div-buscador-volver-atras">

        <form id="formulario-buscador" class="form-inline mt-2 ml-2" method="POST" action="">
            <input class="form-control my-0 py-0" name="buscadorAlumno" value="<?= $_SESSION['buscadorAlumno'] ?>"
                   type="text" placeholder="Buscar alumne" style="max-width: 150px;">
            <button class="btn btn-sm btn-primary ml-2 px-1" type="submit"><i class="fa fa-search"></i></button>
            <button class="btn btn-sm btn-primary ml-2 px-1" onclick="borrarBuscador()"><i class="fa fa-times-circle"></i>
            </button>

        </form>

        <div class="div-btn-cerrar-sesion">
            <a href="<?= site_url('login/volverElegirGrupo') ?>">
                <button class="btn btn-light my-2 my-sm-0 pull-right" id="boton-cerrar-sesion" type="submit">Tornar enrere</button>
            </a>
        </div>


    </div>


</div>


<div class="table-wrapper">
    <h2><?= $_SESSION['grupo'] ?></h2>


    <!--<h2><?php $datos->grupo ?></h2>-->

    <table class="table table-hover mb-0 tabla-seguimiento-alumnos">


        <thead>
        <tr>
            <th class="th-lg"><i class="fa fa-user ml-1"></i> Dades alumne</th>

        </tr>
        </thead>

        <tbody>
        <?php
        foreach ($alumnos as $alumno) {
            ?>
            <form name="formulario-avaluaciones"
                  action="<?php echo site_url('AnotacionesAvaluaciones/guardarAnotaciones') ?>" method="POST">


                <tr id="alumno<?= $alumno->NIA ?>">

                    <?php
                    echo "<td>";
                    echo "NIA: " . $alumno->NIA . " <br>";
                    echo "Cognoms: " . $alumno->apellido1 . " " . $alumno->apellido2 . " <br>";
                    echo "Nom: " . $alumno->nombre . " <br>";
                    echo "Data naixement: " . $alumno->fecha_nac . " <br>";
                    if($alumno->telefono1 != "") echo "Teléfono 1: " . $alumno->telefono1 . " <br>";
                    if($alumno->telefono2 != "") echo "Teléfono 2: " . $alumno->telefono2 . " <br>";
                    if($alumno->telefono3 != "") echo "Teléfono 3: " . $alumno->telefono3 . " <br>";
                    //echo "comentari: " . $alumno->comentari . " <br>";
                    echo "Evaluacion activa" .$evaluacionActiva;
                    ?>

                    <!--<select name="grupo" class="select-grupos">
                        <option>Avaluació inicial</option>
                        <option>1ª avaluació</option>
                        <option>2ª avaluació</option>
                        <option>3ª avaluació</option>
                    </select>-->

                    <?php
                    echo "</td>";
                    ?>

                    <input type="hidden" name="nia" value="<?php echo $alumno->NIA ?>">

                    <td>
                        <div class="form-group">
                            <label for="comment">Avaluació inicial</label>
                            <textarea class="form-control" rows="5" name="0avaluacio"
                                      id="0avaluacio" <?php if( $evaluacionActiva != '0') {?> readonly="readonly" <?php } ?>><?= $alumno->inicial ?></textarea>
                        </div>
                    </td>

                    <td>
                        <div class="form-group">
                            <label for="comment">1ª avaluació</label>
                            <textarea class="form-control" rows="5" name="1avaluacio"
                                      id="1avaluacio" <?php if( $evaluacionActiva != '1') { ?> readonly="readonly" <?php } ?>><?= $alumno->primera ?></textarea>
                        </div>
                    </td>

                    <td class="d-xs-none">
                        <div class="form-group">
                            <label for="comment">2ª avaluació</label>
                            <textarea class="form-control" rows="5" name="2avaluacio"
                                      id="2avaluacio" <?php if( $evaluacionActiva != '2') { ?> readonly="readonly" <?php } ?>><?= $alumno->segona ?></textarea>
                        </div>
                    </td>

                    <td class="d-xs-none">
                        <div class="form-group">
                            <label for="comment">3ª avaluació</label>
                            <textarea class="form-control" rows="5" name="3avaluacio"
                                      id="3avaluacio"<?php if( $evaluacionActiva != '3') { ?> readonly="readonly"  <?php } ?> ><?= $alumno->tercera ?></textarea>
                        </div>
                    </td>

                    <td>
                        <button type="submit" class="btn btn-primary boton-guardar-observaciones">Guardar</button>
                        <!--<input type='submit' name="guardarAnotacion" class='btn btn-info botones-editar-guardar-alumnos' value='Guardar'>-->
                    </td>


                </tr>
            </form>


            <?php
        }
        ?>


        </tbody>

    </table>

    <!--<hr class="my-0">-->


</div>
