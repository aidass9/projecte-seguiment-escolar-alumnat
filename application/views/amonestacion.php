<div class="row">
    <div class="col-sm-12 col-md-12 col-xs-12 div-elegir-grupo">
        <h2>Tria un grup</h2>

        <form method="POST" action="<?php echo site_url('cargarAlumnos') ?>">
            <select name="grupo" class="select-grupos">
                <?php
                    foreach ($grupos as $grupo) {
                ?>
                    <option value="<?php echo $grupo->grupo ?>"><?php echo $grupo->grupo ?></option>
                    <?php
                }
                ?>
            </select>
            <button type="submit" class="btn btn-primary boton-ver-alumnos">Vore alumnes</button>

        </form>

    </div>
</div>


