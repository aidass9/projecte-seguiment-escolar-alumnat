<h1>tria el grup</h1>

<form method="POST" action="<?php echo site_url('cargarAlumnos') ?>">
    <select name="grupo">
        <?php
        foreach ($grupos as $grupo) {
            echo $grupo->grupo;
            ?>
            <option value="<?php echo $grupo->grupo ?>"><?php echo $grupo->grupo ?></option>
            <?php
        }
        ?>
    </select>
    <button>Cargar alumnos</button>


</form>

