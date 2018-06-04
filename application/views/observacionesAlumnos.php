<?php $evaluacionActiva = $this->session->userdata('evaluacionActiva') ?>

<div class="tabla-alumnos">
    <div class="card p-2 mb-5 div-header-observaciones">

        <div class="div-buscador-volver-atras">

            <form id="formulario-buscador" class="form-inline mt-2 ml-2" method="POST" action="">
                <input class="form-control my-0 py-0" name="buscadorAlumno" value="<?= $_SESSION['buscadorAlumno'] ?>"
                       type="text" placeholder="Buscar alumne" style="max-width: 150px;">
                <button class="btn btn-sm btn-primary ml-2 px-1 btn-buscar" type="submit"><i class="fa fa-search"></i></button>
                <button class="btn btn-sm btn-primary ml-2 px-1 btn-borrar" onclick="borrarBuscador()"><i class="fa fa-times-circle"></i>
                </button>

            </form>

        </div>

        <div class="div-btn-volver-atras">
            <a href="<?= site_url('login/volverElegirGrupo') ?>">
                <button class="btn btn-light my-2 my-sm-0 pull-right" id="boton-volver-atras" type="submit">Tornar enrere</button>
            </a>
        </div>

        <div class="div-select-evaluacion">
            <form name="formularioSeleccionarEvaluacion" method="POST">
                <p>Seleccionar avaluació:</p>
                <select name="selectEvaluacion" onchange="this.form.submit()">
                    <option value="0" <?php if ($selectGrupo === '0') echo 'selected' ?>>Avalució 0</option>
                    <option value="1" <?php if ($selectGrupo === '1') echo 'selected' ?>>1ª avaluació</option>
                    <option value="2" <?php if ($selectGrupo === '2') echo 'selected' ?>>2ª avaluació</option>
                    <option value="3" <?php if ($selectGrupo === '3') echo 'selected' ?>>3ª avaluació</option>
                </select>			
            </form>

        </div>
    </div>


    <div class="table-wrapper-pc">
        <h2 class="titulo-grupo"><?= $_SESSION['grupo'] ?></h2>

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
                        echo "<b>NIA:</b> " . $alumno->NIA . " <br>";
                        echo "<b>Cognoms:</b> " . $alumno->apellido1 . " " . $alumno->apellido2 . " <br>";
                        echo "<b>Nom:</b> " . $alumno->nombre . " <br>";
                        echo "<b>Data naixement:</b> " . $alumno->fecha_nac . " <br>";
                        if ($alumno->telefono1 != "")
                            echo "<b>Teléfono 1:</b> " . $alumno->telefono1 . " <br>";
                        if ($alumno->telefono2 != "")
                            echo "<b>Teléfono 2:</b> " . $alumno->telefono2 . " <br>";
                        if ($alumno->telefono3 != "")
                            echo "<b>Teléfono 3:</b> " . $alumno->telefono3 . " <br>";
                        ?>

    <?php
    echo "</td>";
    ?>

                    <input type="hidden" name="nia" value="<?php echo $alumno->NIA ?>">

                    <td>
                        <div class="form-group">
                            <label for="comment">Avaluació inicial</label>
                            <textarea class="form-control" rows="5" name="0avaluacio"
                                      id="0avaluacio" <?php if ($evaluacionActiva != '0') { ?> readonly="readonly" <?php } ?>><?= $alumno->inicial ?></textarea>
                        </div>
                    </td>

                    <td>
                        <div class="form-group">
                            <label for="comment">1ª avaluació</label>
                            <textarea class="form-control" rows="5" name="1avaluacio"
                                      id="1avaluacio" <?php if ($evaluacionActiva != '1') { ?> readonly="readonly" <?php } ?>><?= $alumno->primera ?></textarea>
                        </div>
                    </td>

                    <td class="d-xs-none">
                        <div class="form-group">
                            <label for="comment">2ª avaluació</label>
                            <textarea class="form-control" rows="5" name="2avaluacio"
                                      id="2avaluacio" <?php if ($evaluacionActiva != '2') { ?> readonly="readonly" <?php } ?>><?= $alumno->segona ?></textarea>
                        </div>
                    </td>

                    <td class="d-xs-none">
                        <div class="form-group">
                            <label for="comment">3ª avaluació</label>
                            <textarea class="form-control" rows="5" name="3avaluacio"
                                      id="3avaluacio"<?php if ($evaluacionActiva != '3') { ?> readonly="readonly"  <?php } ?> ><?= $alumno->tercera ?></textarea>
                        </div>
                    </td>

                    <td>
                        <button type="submit" class="btn btn-primary boton-guardar-observaciones">Guardar</button>
                    </td>


                    </tr>
                </form>


    <?php
}
?>


            </tbody>

        </table>

    </div>

    <!-- MOVIL -->
    <div class="table-wrapper-movil">
        <h2 class="titulo-grupo text-center"><?= $_SESSION['grupo'] ?></h2>
        <p class="text-center">Dades alumne</p>
        <div class="tabla-alumnos-movil">	
            <?php
            foreach ($alumnos as $alumno) {
            ?>
                <form name="formulario-avaluaciones" action="<?php echo site_url('AnotacionesAvaluaciones/guardarAnotaciones') ?>" method="POST">
                    <div class="datos-alumno">
                        <?php
                        echo "<td>";
                        echo "NIA: " . $alumno->NIA . " <br>";
                        echo "Cognoms: " . $alumno->apellido1 . " " . $alumno->apellido2 . " <br>";
                        echo "Nom: " . $alumno->nombre . " <br>";
                        echo "Data naixement: " . $alumno->fecha_nac . " <br>";
                        if ($alumno->telefono1 != "")
                            echo "Teléfono 1: " . $alumno->telefono1 . " <br>";
                        if ($alumno->telefono2 != "")
                            echo "Teléfono 2: " . $alumno->telefono2 . " <br>";
                        if ($alumno->telefono3 != "")
                            echo "Teléfono 3: " . $alumno->telefono3 . " <br>";
                        ?>
                    </div>
                    <input type="hidden" name="nia" value="<?php echo $alumno->NIA ?>">
                    <div class="datos-alumno">
                        <div class="form-group">
                            <label for="comment">Avaluació inicial</label>
                            <textarea class="form-control" rows="5" name="0avaluacio"
                                      id="0avaluacio" <?php if ($evaluacionActiva != '0') { ?> readonly="readonly" <?php } ?>><?= $alumno->inicial ?></textarea>
                        </div>
                    </div>
                    <div class="datos-alumno">
                        <div class="form-group">
                            <label for="comment">1ª avaluació</label>
                            <textarea class="form-control" rows="5" name="1avaluacio"
                                      id="1avaluacio" <?php if ($evaluacionActiva != '1') { ?> readonly="readonly" <?php } ?>><?= $alumno->primera ?></textarea>
                        </div>
                    </div>
                    <div class="datos-alumno">
                        <div class="form-group">
                            <label for="comment">2ª avaluació</label>
                            <textarea class="form-control" rows="5" name="2avaluacio"
                                      id="2avaluacio" <?php if ($evaluacionActiva != '2') { ?> readonly="readonly" <?php } ?>><?= $alumno->segona ?></textarea>
                        </div>
                    </div>
                    <div class="datos-alumno">
                        <div class="form-group">
                            <label for="comment">3ª avaluació</label>
                            <textarea class="form-control" rows="5" name="3avaluacio"
                                      id="3avaluacio"<?php if ($evaluacionActiva != '3') { ?> readonly="readonly"  <?php } ?> ><?= $alumno->tercera ?></textarea>
                        </div>
                    </div>
                    <div class="datos-alumno">
                        <button type="submit" class="btn btn-primary boton-guardar-observaciones">Guardar</button>
                    </div>						
                </form>
    <?php
}
?>
        </div>













        <td>

        </td>


        </tr>


    </div>

</div>
